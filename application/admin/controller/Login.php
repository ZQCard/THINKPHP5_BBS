<?php

namespace app\admin\controller;
use app\common\model\Administrator;
use think\Controller;
use think\Loader;
use think\Request;


class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //验证机制   session    cookie+token+ip
        $salt = config('SALT');
        session($salt.'aid')&&$this->redirect('admin/index/index');

        if ($cookie = cookie($salt.'username'))
        {
            $admin = (new Administrator())->where('username',$cookie)->find();
            if($admin->last_login_ip != request()->ip())
            {
                if($admin->verify_token == cookie($salt.'token'))
                {
                    session($salt.'aid',$admin->id);
                    session($salt.'aname',$admin->username);
                    $this->redirect('admin/index/index');
                }
            }
        }

    }

    public function index()
    {
        return $this->fetch();
    }

    public function login(Request $request)
    {
        if ($request->isPost())
        {
            $data = input('param.');
            (!captcha_check($data['captcha']))&&$this->error('验证码错误');
            $Validate = Loader::validate('Administrator');
            ($Validate->scene('login')->check($data)) || $this->error($Validate->getError());
            $admin = (new Administrator())->where('username',$data['username'])->find();
            (!$admin)&&$this->error('管理员不存在');
            ($admin->password != md5($data['password']))&&$this->error('管理员名或密码错误');
            ($admin->status != '正常')&&$this->error('管理员已被冻结');
            ($admin->is_del != '未删除')&&$this->error('管理员已删除');
            //登陆成功更新防伪随机数
            $num = rand(1,1000);
            $salt = config('SALT');
            $token = config('SALT').$num.$admin->username;
            $admin->verify_token = md5($token);
            $admin->inc('login_times');
            $res = $admin->save();
            if ($res)
            {
                //设置session和cookie
                cookie($salt.'username',$admin->username,60*60*24*7);
                cookie($salt.'token',md5($token),60*60*24*7);
                session($salt.'aid',$admin->id);
                session($salt.'aname',$admin->username);
                $this->success('登陆成功');
            }
        }
    }
}