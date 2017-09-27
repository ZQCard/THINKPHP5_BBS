<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/27 0027
 * Time: 17:01
 */

namespace app\common\model;

use think\Db;
use think\Model;

class Message extends Model
{
    //模型事件
    protected static function init()
    {
        //评论之后推送消息给资讯发出者
        self::afterInsert(function ($message){
            if ($message->user_type == 1){//发给管理员
                Db::name('administrator')->where('id',$message->get_user_id)->setInc('message_num');
            }elseif ($message->user_type == 2){//发给用户
                Db::name('users')->where('id',$message->get_user_id)->setInc('message_num');
            }
        });
    }
}