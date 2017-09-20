<?php
namespace app\admin\controller;

use think\Cookie;
use think\Session;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    public function logout()
    {
        //清空session和cookie
        Cookie::delete($this->salt.'username');
        Cookie::delete($this->salt.'token');
        Session::clear();
        $this->success('退出成功');
    }
}
