<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/30 0030
 * Time: 8:48
 */

namespace app\admin\controller;


class Test extends Base
{
    public function index()
    {
        //取出redis分类数据
        $categorys = [];
        $redis = redis();
        //排序值从大到小
        $categorySort = $redis->zRevRange('category:score',0,-1,true);
        foreach ($categorySort as $key => $value){
            $category = $redis->hGetAll($key);
            if ($category['status'] == 1){
                $categorys[] = $category;
            }
        }
    }
}