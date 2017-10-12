<?php

namespace app\index\controller;
use think\Controller;
use think\Db;

class Base extends Controller
{
    protected $now;
    protected $salt;
    protected $uid;
    public function _initialize()
    {
        parent::_initialize();
        header("Content-type:text/html;charset=utf-8");
        $this->salt = config('SALT');
        $this->now = date('Y-m-d');
        $sessionUid = session($this->salt.'uid');
        $this->uid = $sessionUid;
        //查找首页导航和友情连接
        $navData = Db::name('category')->where('status',1)->field('name,link')->order('sort desc')->select();
        $linkData = Db::name('link')->where("status = 1 AND end_time >=".$this->now)->field('name,link')->order('sort desc')->select();
        $headImg = Db::name('users')->where('id',$this->uid)->field('headimg')->find();
        //找到网站keywords和description
        $configData = Db::name('config')->where('key','keywords')->whereOr('key','description')->select();
        $config = [];
        foreach ($configData as $key => $value){
            $config[$value['key']] = $value['value'];
        }
        $this->assign([
            'headImg'   =>$headImg['headimg'],
            'config'    => $config,
            'sessionUid'=> $sessionUid,
            'navData'   => $navData,
            'linkData'  => $linkData,
        ]);
    }
}