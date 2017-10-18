<?php
namespace app\common\model;

use think\Db;

class PointsLog extends Base{
    protected static function init()
    {
        //插入积分记录之前更新用户积分 并且查找对应的积分模块
        PointsLog::beforeInsert(function ($log){
            $data = $log->data;
            $res = '';
            if ($data['type'] == 1){
                $res = Db::name('users')->where('id',$log->user_id)->setInc('points',$log->points);
            }else if ($data['type'] == 2){
                $res = Db::name('users')->where('id',$log->user_id)->setDec('points',$log->points);
            }
            return $res;
        });
    }
}