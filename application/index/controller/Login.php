<?php
namespace app\index\controller;

use app\common\model\Users;
use think\Db;
use think\Loader;
use think\Request;

class Login extends Base
{
    public function __construct()
    {
        parent::__construct();
        //验证机制   session    cookie+token+ip
        $salt = config('SALT');
        session($salt.'uid')&&$this->redirect('index/index/index');
        if ($cookie = cookie($salt.'username'))
        {
            $user = (new Users())->where('username',$cookie)->find();
            if($user->last_login_ip != request()->ip())
            {
                if($user->verify_token == cookie($salt.'token'))
                {
                    session($salt.'uid',$user->id);
                    session($salt.'username',$user->username);
                    $this->redirect('index/index/index');
                }
            }
        }

    }

    public function index(Request $request)
    {
        if ($request->isPost()){
            $User = new Users();
            $data = input('param.');

            //先验证极验数据是否正确
            if (empty($data['geetest_challenge']) ||empty($data['geetest_challenge']) ||empty($data['geetest_challenge']))
            {
                $this->error('验证码不得为空');
            }
            $res = \app\index\controller\Common::VerifyLoginServlet($data['geetest_challenge'],$data['geetest_validate'],$data['geetest_seccode']);
            (!$res)&&$this->error('验证码错误');


            $user = $User->where('username',$data['username'])->field('id,username,password,login_times')->find();
            if ($data['password'] != $user->password)$this->error('用户名或密码错误');

            $ip = $request->ip();
            $location = getLocation($ip);
            $saveData['province'] = $location['province'];
            $saveData['city'] = $location['city'];
            $saveData['last_login_ip'] = $ip;
            $saveData['login_times'] = $user->login_times+1;
            $res = $user->save($saveData);
            if($res){
                //注册成功预置信息
                $salt = config('SALT');
                $num = rand(1,1000);
                $token = config('SALT').$num.$user->username;
                cookie($salt.'username',$data['username']);
                cookie($salt.'uid',$user->id);
                session($salt.'username',$data['username']);
                session($salt.'uid',$user->id);
                cookie($salt.'token',$token);
            }
            ($res !== false)?$this->success('登陆成功'):$this->error('登陆失败');
        }else{
            return $this->fetch();
        }
    }

    public function register(Request $request)
    {
        if ($request->isPost()){
            $data = input('param.');
            //先验证极验数据是否正确
            if (empty($data['geetest_challenge']) ||empty($data['geetest_challenge']) ||empty($data['geetest_challenge']))
            {
                $this->error('验证码不得为空');
            }
            //先验证极验数据是否正确
            $res = \app\index\controller\Common::VerifyLoginServlet($data['geetest_challenge'],$data['geetest_validate'],$data['geetest_seccode']);
            (!$res)&&$this->error('验证码错误');

            $data['nickname'] = $data['username'];
            $Validate = Loader::validate('users');
            ($Validate->scene('login')->check($data)) || $this->error($Validate->getError());
            //添加注册时所在省份
            $location = getLocation($request->ip());
            $data['reg_province'] = $location['province'];
            $data['reg_city'] = $location['city'];
            $Users = new Users();
            $res = $Users->save($data);
            (!$res)&&$this->error('用户保存失败');

            $uid = $Users->getLastInsID();
            $hash = getHash($uid);
            $href = 'www.studycoding.top/check/uid/'.$uid.'/hash/'.$hash;
            $message = '欢迎注册爱编程论坛,请点击下面网址进行激活账号^_^~'.$href;
            //保存hash验证值
            $res = saveHash($uid,$hash);
            (!$res)&&$this->error('HASH保存失败');

            //发送邮件
            $res = \phpmailer\Email::send($data['email'],'爱编程论坛注册通知',$message);
            (!$res)&&$this->error('邮件发送失败');

            //注册成功预置信息
            $salt = config('SALT');
            $num = rand(1,1000);
            $token = config('SALT').$num.$Users->username;
            cookie($salt.'username',$data['username']);
            cookie($salt.'uid',$uid);
            session($salt.'username',$data['username']);
            session($salt.'uid',$uid);
            cookie($salt.'token',$token);
            ($res !== false)?$this->success('注册成功,请去邮箱激活账号'):$this->error('注册失败');
        }else{
            return $this->fetch();
        }
    }


    public function check()
    {
        $data = input('param.');
        $res = findHash($data['uid'],$data['hash']);
        if ($res){
            $res = Db::name('Users')->where('id',$data['uid'])->update(['is_validate'=>1]);
            $this->success('账号激活成功','/index');
        }else{
            echo '密钥已经过期';
        }
    }

}