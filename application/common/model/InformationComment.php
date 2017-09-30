<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/27 0027
 * Time: 16:27
 */

namespace app\common\model;

class InformationComment extends Base
{
    //忽略非表单字段
    protected $field = true;

    //模型事件
    protected static function init()
    {
        //评论之后推送消息给资讯发出者
        InformationComment::afterInsert(function ($comment){
            $data['post_user_id'] = $comment->reply_user_id;
            $data['post_user_name'] = $comment->reply_user_name;
            $data['get_user_id'] = $comment->post_user_id;
            $data['info'] = '评论咨询';
            $data['content_id'] = $comment->post_id;
            $data['user_type'] = 1;
            (new Message())->save($data);
        });
    }

    //关联users表
    public function users()
    {
        return $this->belongsTo('users','reply_user_id')->field('id,headimg,nickname');
    }
}