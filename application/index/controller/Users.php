<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/28 0028
 * Time: 9:28
 */

namespace app\index\controller;

use app\common\model\PointsLog;
use app\index\model\Favorite;
use app\common\model\Users AS userModel;
use think\Db;
use think\Debug;
use think\Loader;
use think\Request;

class Users extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        if (empty($this->uid)){
            $this->error('你未登陆，请前去登陆','/login');
        }
    }
    //用户中心
    public function index($id)
    {
        $user = userModel::get($id);
        if ((!$user) || $user['status']==2)$this->error('该用户不存在或被冻结');
        //处理积分等级
        $pointsLevel = Db::name('level')->field('point,icon,number')->order('point DESC')->select();
        $level = processLevel($pointsLevel,$user->points);
        $user->user_level = $level[0];
        $user->level_icon = $level[1];
        $user->nextLevel  = $level[2];
        $this->assign([
            'id'   => $id,
            'user' => $user,
        ]);
        return $this->fetch();
    }

    public function setting(Request $request)
    {
        if ($request->isPost()){
            $userModel = new userModel();
            $data = input('param.');
            $data['id'] = $this->uid;
            $user = $userModel->field('nickname,email')->find();
            if (empty($data['password'])){
                unset($data['password']);
                unset($data['repassword']);
            }
            if ($user['email'] == $data['email']){
                unset($data['email']);
            }
            if ($user['nickname'] == $data['nickname']){
                unset($data['nickname']);
            }
            if (empty($data['birthday'])){
                $data['birthday'] = null;
            }
            $validate = Loader::validate('users');
            ($validate->scene('update')->check($data))||$this->error($validate->getError());
            $res = $userModel->saveData($data);
            (false !== $res)?$this->success('信息修改成功'):$this->error('信息修改失败');
        }else{
            $user = userModel::get($this->uid);
            $this->assign([
                'user' => $user
            ]);
            return $this->fetch();
        }
    }

    public function points()
    {
        $this->getUserLevel();
        return $this->fetch();
    }

    public function pointslog()
    {
        $pointsLog = (new PointsLog())->where('user_id',$this->uid)->field('bakname,type,points,create_time')->order('create_time')->paginate(15);
        $this->assign([
            'pointsLog' => $pointsLog,
        ]);
        return $this->fetch();
    }

    public function pointsrule()
    {
        $rule = Db::name('points_rule')->field('name,points,type,limit_num')->select();
        $this->assign([
            'rule' => $rule
        ]);
        return $this->fetch();
    }

    public function level()
    {
        $level = array_reverse($this->getUserLevel());
        $this->assign([
            'level' => $level
        ]);
        //查找等级
        return $this->fetch();
    }

    private function getUserLevel(){
        $userModel = new userModel();
        $user = $userModel->field('points')->find($this->uid);
        //处理积分
        $points = (new PointsLog())->field('bakname,type,count(id)  AS num')->group('type,bakname')->select();
        $pointsLevel = Db::name('level')->field('point,name,icon,number')->order('number DESC')->select();
        $level = processLevel($pointsLevel,$user['points']);
        $user->user_level = $level[0];
        $user->level_icon = $level[1];
        $user->nextLevel  = $level[2];
        $this->assign([
            'points' => $points,
            'user'   => $user
        ]);
        return $pointsLevel;
    }
    
    //用户收藏
    public function favorite($type='')
    {
        if (!($this->uid))$this->error('需要您先登陆噢=￣ω￣=',url('/login'));
        $query = Db::name('favorite');
        //根据条件筛选
        if (empty($type)){
            $list = $query->where('user_id',$this->uid)->order('create_time DESC')->paginate(8);
        }else{
            $list = $query->where('user_id',$this->uid)->where('article_type',$type)->order('create_time DESC')->paginate(8);
        }
        $favorites = [];
        foreach ($list as $key => $value){
            $favorites[] = $value;
        }

        foreach ($favorites as $key => $value){
            $favorites[$key]['create_time'] = timeToString($value['create_time']);
        }
        $page = $list->render();
        $this->assign([
            'page'      => $page,
            'type'      => $type,
            'favorites' => $favorites,
        ]);
        return $this->fetch();
    }

    public function favoriteDel(Request $request)
    {
        if (!($this->uid))$this->error('需要您先登陆噢=￣ω￣=',url('/login'));
        if ($request->isDelete()){
            $query = Db::name('favorite');
            $data = input('param.');
            //id集合
            $ids = explode('-',$data['id']);
            $ids = array_filter($ids);
            //找出用户所有的收藏
            $resId = $query->where('user_id',$this->uid)->column('id');
            foreach ($ids as $value){
                if (!in_array($value,$resId)){
                    $this->error('数据删除错误,存在不属于自己的收藏信息');
                }
            }
            $res = Favorite::destroy($ids);
            (false !== $res)?$this->success('删除成功'):$this->error('删除失败');
        }
    }

    /*//重新发送邮件
    public function resendMail(Request $request)
    {
        if ($request->isPost()){
            $data = input('param.');
            if (($this->uid) != $data['uid'])$this->error('非法用户=￣ω￣=',url('/login'));
            $message = "爱编程论坛,请点击下面网址进行激活账号^_^~,有效时间为24小时.";
            $hash = getHash($data['uid']);
            $href = config('DOMAIN').'/check/uid/'.$data['uid'].'/hash/'.$hash;
            $message = $message.$href;

            //保存hash验证值
            $res = saveHash($data['uid'],$hash);
            if (!$res){
                $data['status']  = 2;
                $data['message'] = '保存hash验证值失败';
                return $data;
            }
            $res = Db::name('Users')->where('id',$data['uid'])->field('email')->find();
            $res = Common::sendEmail($data['uid'],$res['email'],$message);
            if ($res['status'] == 2){
                $this->error($res['message']);
            }
            $this->success('邮件发送成功,请前去邮箱验证');
        }
    }


    //验证hash
    public function check()
    {
        if (!($this->uid))$this->error('需要您先登陆噢=￣ω￣=',url('/login'));
        $data = input('param.');
        $res = findHash($data['uid'],$data['hash']);
        if ($res){
            $res = Db::name('Users')->where('id',$data['uid'])->update(['is_validate'=>1]);
        }
        if($res !== false){
            $this->success('验证成功!',url('/user/'.$data['uid']));
        }else{
            $this->assign([
                'signal' => 'fail'
            ]);
        }
        return $this->fetch();
    }*/


}