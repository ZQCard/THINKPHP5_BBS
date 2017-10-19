<?php
namespace app\index\controller;

use app\common\model\PointsLog;
use app\index\model\Favorite;
use curl\Curl;
use think\Controller;
use geetcode\Geetcode;
use think\Db;
use think\Loader;
use think\Request;

/**
 * Class Common  前台公共方法类
 * @package app\index\controller
 */
class Common extends Controller
{
    /**
     * @param $uid  用户id
     * @return array 信息数组
     */
    public static function checkUid($uid)
    {
        $uid = (int)$uid;
        $salt = config('SALT');
        $sid = (int)session($salt.'uid');
        $message = [1,''];
        $flag = true;
        if ($uid !== $sid){
            $message = [0,'非法用户'];
            $flag = false;
        }
        if ($flag){
            $user = Db::name('users')->field('status')->find();
            if ($user['status'] === 0){
                $message = [0,'用户已经被冻结'];
            }
        }
        return $message;
    }


    //极验滑动验证码展示接口
    public function StartCaptchaServlet()
    {
        $GtSdk = new Geetcode(config('GEET_ID'), config('GEET_KEY'));
        $ip = request()->ip();
        cookie('jeetestcode',$ip.time());
        $uid = cookie('jeetestcode');
        $data = array(
            "user_id" => $uid, # 网站用户id
            "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => $ip # 请在此处传输用户请求验证时所携带的IP
        );
        $status = $GtSdk->pre_process($data, 1);
        session('gtserver',$status);
        session(cookie('jeetestcode'),$data['user_id']);
        echo $GtSdk->get_response_str();
    }

    //极验滑动验证码二次验证
    public static function VerifyLoginServlet($challenge,$validate,$seccode)
    {
        $GtSdk = new Geetcode(config('GEET_ID'), config('GEET_KEY'));
        $ip = request()->ip();
        if (is_null(session(cookie('jeetestcode'))))return false;
        $data = array(
            "user_id" => session(cookie('jeetestcode')), # 网站用户id
            "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => $ip # 请在此处传输用户请求验证时所携带的IP
        );
        if (session('gtserver') == 1) {   //服务器正常
            $result = $GtSdk->success_validate($challenge, $validate, $seccode, $data);
            if ($result) {
                return true;
            } else{
                return false;
            }
        }else{  //服务器宕机,走failback模式
            if ($GtSdk->fail_validate($challenge,$validate,$seccode)) {
                return true;
            }else{
                return false;
            }
        }
    }

    //退出
    public function logout()
    {
        //注册成功预置信息
        $salt = config('SALT');
        cookie($salt.'username',null);
        cookie($salt.'uid',null);
        session($salt.'username',null);
        session($salt.'uid',null);
        cookie($salt.'token',null);
        $this->success('退出成功','/index');
    }

    //抓取博客园新闻链接  返回5条
    public static function getBlogNews()
    {
        if (!cookie('newsInfo')){
            $url = "https://news.cnblogs.com";
            $file_contents = Curl::cUrl($url,2);
            //一次筛选链接
            $data = [];
            $patten='/<a href=\"\/n(.*?)\".*?>(.*?)<\/a>/i';
            if(preg_match_all($patten, $file_contents, $matches)){
                //获取到的链接
                $data = $matches[0];
            }

            //为a链接加上网络路径前缀并去除其他无效链接(没有  target="_blank")
            $finally = [];
            $identify = "_blank";
            $identify2 = 'comment';
            foreach ($data as $key => $value){
                if (strpos($value,$identify) !== false){
                    $res = str_replace('/n',$url.'/n',$value);
                    $finally[] = $res;
                }
            }
            foreach ($finally as $key => $value){
                if (strpos($value,$identify) !== false){
                    $res = str_replace('/n',$url.'/n',$value);
                    $finally[] = $res;
                }
            }
            foreach ($finally as $key => $value){
                if (strpos($value,$identify2) !== false){
                    unset($finally[$key]);
                }
            }
            $finally = array_values($finally);
            $res = serialize($finally);
            cookie('newsInfo',$res,12*60*60);
        }
        $newsInfo = unserialize(cookie('newsInfo'));
        $res = randArray($newsInfo,10);
        return $res;
    }

    //返回用户二维码
    public function qrcode($type,$id)
    {
        return config('DOMAIN').'/'.$type.'/'.$id;
    }

    public function getMessageNum(Request $request)
    {
        if ($request->isPost()){
            $uid = session('bbszhouqiuid');
            if (input('post.uid') == $uid){
                $res = Db::name('users')->where('id',$uid)->field('message_num')->find();
                $this->success($res);
            }
        }
    }

    public function favorite(Request $request)
    {
        if ($request->isPost()){
            $data = input('param.');
            $res = Common::checkUid($data['user_id']);
            if ($res['0'] === 0)$this->error($res[1]);
            //不得收藏自己的文章
            if ($data['article_type'] == 2){
                if ($data['article_user_id'] == $data['user_id']) return $this->error('不能收藏自己的帖子');
            }
            $validate = Loader::validate('favorite');
            ($validate->check($data))||$this->error($validate->getError());
            $res = (new Favorite())->save($data);
            (false !== $res)?$this->success('收藏成功'):$this->error('收藏失败');
        }
    }

    /**
     * @param $uid      用户id
     * @param $point    积分
     * @param $bakname  备注信息
     * @param $type     操作类型
     * @param $limit    奖励限制数量
     */
    public static function incrPoint($uid,$points,$type,$info)
    {
        $data['user_id'] = $uid;
        $data['points']  = $points;
        $data['type']    = $type;
        $data['bakname'] = $info;
        $res = (new PointsLog())->saveData($data);
        return $res;
    }


    //miss路由
    public function miss()
    {
        $this->error('网址参数错误');
    }

}