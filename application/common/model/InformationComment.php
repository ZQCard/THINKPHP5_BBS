<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/27 0027
 * Time: 16:27
 */

namespace app\common\model;

use app\index\controller\Common;

class InformationComment extends Base
{
    //忽略非表单字段
    protected $field = true;
    protected $dateFormat = 'Y-m-d H:i:s';
    //模型事件
    protected static function init()
    {
        //评论之后推送消息给资讯发出者
        InformationComment::beforeInsert(function ($comment){
            $data['post_user_id'] = $comment->reply_user_id;
            $data['post_user_name'] = $comment->reply_user_name;
            $data['get_user_id'] = $comment->post_user_id;
            $data['info'] = $comment->info;
            $data['content_id'] = $comment->information_id;
            $data['user_type'] = 1;
            $res1 = (new Message())->save($data);
            $res2 = Common::incrPoint($comment->reply_user_id,$comment->comment_points,$comment->points_type,$comment->info);
            return ($res1&&$res2);
        });
    }

    //关联users表
    public function users()
    {
        return $this->belongsTo('users','reply_user_id')->field('id,headimg,nickname');
    }
}