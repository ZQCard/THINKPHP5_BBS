<?php

namespace app\index\controller;
use think\Controller;
use think\Db;

class Base extends Controller
{
    protected $now;
    protected $salt;
    public function _initialize()
    {
        parent::_initialize();
        $this->salt = config('SALT');
        $this->now = date('Y-m-d');
        $sessionUid = session($this->salt.'uid');

        //查找首页导航和友情连接
        $navData = Db::name('category')->where('status',1)->field('name,link')->order('sort desc')->select();
        $linkData = Db::name('link')->where("status = 1 AND end_time >=".$this->now)->field('name,link')->order('sort desc')->select();
        $this->assign([
            'sessionUid' => $sessionUid,
            'navData'    => $navData,
            'linkData'   => $linkData,
        ]);
    }
}