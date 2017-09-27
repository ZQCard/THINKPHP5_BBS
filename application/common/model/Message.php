<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/26 0026
 * Time: 14:11
 */

namespace app\common\model;

use think\Db;

class Message extends Base
{
    protected static function init()
    {
        //插入信息后向用户表或者管理员插入新增一条信息提示
        Message::afterInsert(function ($message){
            //资讯信息
            if ($message['type'] == 1){
                $informationTable = Db::name('information');
                $res = $informationTable->find($message['post_id']);
                $informationTable->where('id',$res['id'])->setInc('comment');
                if ($res['type']==1){//管理员
                    $query = Db::name('administrator');
                }else{//用户
                    $query = Db::name('user');
                }
                $query->where('id',$res['post_user_id'])->setInc('message_num');
            }elseif ($message['type'] == 2){//帖子信息
                echo 2;
            }
        });
    }
}