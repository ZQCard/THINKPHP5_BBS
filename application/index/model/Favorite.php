<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11 0011
 * Time: 15:35
 */
namespace app\index\model;

use app\common\model\Base;
use app\common\model\Message;
use think\Db;

class Favorite extends Base
{
    protected static function init()
    {
        //收藏之前给原文章添加收藏者集合   给帖子所属者发送有人收藏信息
        Favorite::beforeInsert(function ($favorite){
            $query = null;
            if ($favorite->article_type == 1){//咨询
                $query = Db::name('information');
            }else{//帖子
                $query = Db::name('posts');
            }
            $users = [];
            $usersJson = $query->where('id',$favorite->article_id)->field('favorite_users')->find();
            if (!is_null($usersJson)){
                $users = json_decode($usersJson['favorite_users']);
            }
            $users[] = $favorite->user_id;
            $users = json_encode($users);
            $query->where('id',$favorite->article_id)->update(['favorite_users'=>$users]);


            if ($favorite->article_type == 1){//咨询
                $data['info'] = '收藏咨询';
            }else{//帖子
                $data['info'] = '收藏帖子';
            }
            $data['post_user_id'] = $favorite->user_id;
            $data['post_user_name'] = session(config('SALT').'username');
            $data['get_user_id'] = $favorite->article_user;
            $data['content_id'] = $favorite->article_id;
            $data['user_type'] = $favorite->article_type;
            (new Message())->save($data);
        });
    }
}