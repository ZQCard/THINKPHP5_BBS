<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10 0010
 * Time: 11:06
 */

namespace app\index\controller;

use app\common\model\Posts AS PostModel;

class Posts extends Base
{
    public function index($id)
    {
        $PostModel = new PostModel();
        $post = $PostModel->find($id);

        if ($post->user_type == 1){//管理员
            $post->user_username = $post->administrator->username;
            $post->user_headimg  = $post->administrator->headimg;
            $post->user_points   = '保密';
            $post->user_post_num = '保密';
            $post->user_fans_num = '保密';
        } elseif($post->user_type == 2){//用户
            $post->user_username = $post->users->nickname;
            $post->user_headimg  = $post->users->headimg;
            $post->user_points  = $post->users->points;
            $post->user_post_num  = $post->users->post_num;
            $post->user_fans_num  = $post->users->fans_num;
        }
        $this->assign([
            'post' => $post
        ]);
        return $this->fetch();
    }
}