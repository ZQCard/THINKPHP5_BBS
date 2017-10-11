<?php

namespace app\index\controller;

use think\Db;

class Index extends Base
{
    public function index()
    {
        //轮播图筛选
        $banner = Db::name('banner')
                    ->where('status',1)
                    ->where('start_time','<=',$this->now)
                    ->where('end_time','>=',$this->now)
                    ->order('sort desc')
                    ->select();
        //找出所有的资讯和板块推荐
        $information = Db::name('information')->where('status = 1')->field('id,author,title,pic,brief,look,comment,create_time')->order('look DESC')->limit(5)->select();

        //找出所有二级模块
        $module = Db::name('module')->where('status = 1 AND pid != 0')->field('id,name')->order('sort DESC')->select();
        //博客园抓取的新闻
        $newsInfo = Common::getBlogNews();
        $this->assign([
            'banner'     => $banner,
            'newsInfo'   => $newsInfo,
           'information' => $information,
            'module'     => $module
        ]);
        return $this->fetch();
    }
}
