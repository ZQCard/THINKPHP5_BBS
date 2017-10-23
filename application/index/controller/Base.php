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
        //友情连接
        $navData = $this->getCategory();
        $linkData = $this->getLink();
        $headImg = Db::name('users')->where('id',$this->uid)->field('headimg')->find();
        //pv
        $global['pv'] = $this->getPv();
        $global['uv'] = $this->getUv();
        $this->assign([
            'global'    => $global,
            'headImg'   => $headImg['headimg'],
            'sessionUid'=> $sessionUid,
            'navData'   => $navData,
            'linkData'  => $linkData,
        ]);
    }

    //查找首页导航
    private function getCategory(){
        $redis = redis();
        //取出redis分类数据
        $categorys = [];
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

    //查找友情链接
    private function getLink(){
        //取出redis友情链接数据
        $time = date('Y-m-d');
        $links = [];
        $redis = redis();
        //排序值从大到小
        $linkSort = $redis->zRevRange('link:score',0,-1,true);
        if (!empty($linkSort)){
            foreach ($linkSort as $key => $value){
                $link = $redis->hGetAll($key);
                if (($link['status'] == 1)&&($time>=$link['start_time'])&&($time<=$link['end_time'])){
                    $links[] = $link;
                }
            }
        }else{
            $links = Db::name('link')->where('status',1)->field('name,link')->order('sort desc')->select();
        }
        return $links;
    }

    //全局pv数据
    private function getPv(){
        $redis = redis();
        $res = $redis->incr('global:pv');
        return $res;
    }

    //全局uv数据
    private function getUv(){
        $redis = redis();
        $ip = request()->ip();
        if (!$redis->sIsMember('global:uv',$ip)){
            $redis->sAdd('global:uv',$ip);
        }
        $res = $redis->sCard('global:uv');
        return $res;
    }
}