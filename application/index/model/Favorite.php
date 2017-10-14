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
            $data['get_user_id'] = $favorite->article_user_id;
            $data['content_id'] = $favorite->article_id;
            $data['user_type'] = $favorite->user_type;
            $data['type'] = 3;
            (new Message())->save($data);
        });

        //删除之前先将相对应的文章内的收藏的用户去掉
        Favorite::beforeDelete(function ($favorite){
            $query = null;
            if ($favorite->article_type == 1){
                $query = Db::name('information');
            }

            if ($favorite->article_type == 2){
                $query = Db::name('posts');
            }
            $favorite_users = $query->field('favorite_users')->find($favorite->article_id);
            $favorite_users = json_decode($favorite_users['favorite_users']);
            if (is_null($favorite_users))return false;
            if (in_array($favorite->user_id,$favorite_users)){
                foreach ($favorite_users as $key => $value){
                    if ($value == $favorite->user_id){
                        unset($favorite_users[$key]);
                        $favorite_users = array_values($favorite_users);
                    }
                }
            }
            $favorite_users = json_encode($favorite_users);
            $res = $query->where('id',$favorite->article_id)->update(['favorite_users'=>$favorite_users]);
            return $res;
        });
    }
}