<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/12 0012
 * Time: 11:03
 */

namespace app\common\model;


use think\Db;

class PostsComment extends Base
{
    protected $dateFormat = 'Y-m-d H:i:s';

    //模型事件
    protected static function init()
    {
        //评论之后推送消息给帖子发出者
        //帖子评论数量+1
        PostsComment::beforeInsert(function ($comment){
            Db::name('posts')->where('id',$comment->post_id)->setInc('comment');

            $data['post_user_id'] = $comment->reply_user_id;
            $data['post_user_name'] = $comment->reply_user_name;
            $data['get_user_id'] = $comment->post_user_id;
            $data['info'] = '评论帖子';
            $data['content_id'] = $comment->post_id;
            $data['user_type'] = $comment->user_type;
            (new Message())->save($data);
        });
    }

    //关联管理员模型
    public function administrator()
    {
        return $this->belongsTo('administrator','reply_user_id')->field('id,username,headimg');
    }

    //关联用户模型
    public function users()
    {
        return $this->belongsTo('users','reply_user_id')->field('id,nickname,points,post_num,headimg,fans_num');
    }
}