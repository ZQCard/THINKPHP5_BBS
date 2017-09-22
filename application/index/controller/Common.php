<?php
namespace app\index\controller;

use curl\Curl;
use think\Controller;
use geetcode\Geetcode;

/**
 * Class Common  前台公共方法类
 * @package app\index\controller
 */
class Common extends Controller
{
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
        session(null);
        cookie(null);
        $this->success('退出成功');
    }

    //抓取博客园新闻链接  返回10条
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
}