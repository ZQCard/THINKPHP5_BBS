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
        //天气预报
        saveWeatherCookies();
        $this->salt = config('SALT');
        $this->now = date('Y-m-d');
        $sessionUid = session($this->salt.'uid');
        $this->uid = $sessionUid;
        //友情连接
        $navData = $this->getCategory();
        $linkData = Db::name('link')->where("status = 1 AND end_time >=".$this->now)->field('name,link')->order('sort desc')->select();
        $headImg = Db::name('users')->where('id',$this->uid)->field('headimg')->find();
        //找到网站keywords和description
        $configData = Db::name('config')->where('key','keywords')->whereOr('key','description')->select();
        $config = [];
        foreach ($configData as $key => $value){
            $config[$value['key']] = $value['value'];
        }
        $this->assign([
            'weather'   => cookie('weather'),
            'headImg'   => $headImg['headimg'],
            'config'    => $config,
            'sessionUid'=> $sessionUid,
            'navData'   => $navData,
            'linkData'  => $linkData,
        ]);
    }

    //查找首页导航
    private function getCategory(){
        //取出redis分类数据
        $categorys = [];
        $redis = redis();
        //排序值从大到小
        $categorySort = $redis->zRevRange('category:score',0,-1,true);
        if (!empty($categorySort)){
            foreach ($categorySort as $key => $value){
                $category = $redis->hGetAll($key);
                if ($category['status'] == 1){
                    $categorys[] = $category;
                }
            }
        }else{
            $categorys = Db::name('category')->where('status',1)->field('name,link')->order('sort desc')->select();
        }
        return $categorys;
    }
}