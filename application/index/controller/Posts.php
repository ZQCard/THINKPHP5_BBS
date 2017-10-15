<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10 0010
 * Time: 11:06
 */

namespace app\index\controller;

use app\common\model\Posts AS PostModel;
use app\common\model\PostsComment;
use think\Db;
use think\Loader;
use think\Request;

class Posts extends Base
{
    public function index($id)
    {
        $postModel = new PostModel();
        $postModel->where('id',$id)->setInc('lookover');
        $post = $postModel->find($id);
        //是否收藏
        $favorite = json_decode($post->favorite_users);
        $post->favorite = 0;
        if (is_array($favorite)){
            if (in_array($this->uid,$favorite)){
                $post->favorite = 1;
            }
        }
        $post->favorite_num = count($favorite);
        //处理积分等级
        $postsLevel = Db::name('level')->field('point,icon,number')->order('point DESC')->select();
        if ($post->user_type == 1){//管理员
            $post->user_username = $post->administrator->username;
            $post->user_headimg  = $post->administrator->headimg;
            $post->user_points   = '保密';
            $post->user_post_num = '保密';
            $post->user_fans_num = '保密';
        } elseif($post->user_type == 2){//用户
            $post->user_username = $post->users->nickname;
            $post->user_headimg  = $post->users->headimg;
            $post->user_points   = $post->users->points;
            $post->user_post_num = $post->users->post_num;
            $post->user_fans_num = $post->users->fans_num;
            $level = processLevel($postsLevel,$post->user_points);
            $post->user_level = $level[0];
            $post->level_icon = $level[1];
        }

        //处理评论
        $commentModel = new PostsComment();
        $comments = $commentModel->where('post_id',$id)->order('upvote DESC')->paginate(3);
        foreach ($comments as $key => $value){
            if ($value->reply_user_type == 1){//管理员
                $comments[$key]->user_username = $value->administrator->username;
                $comments[$key]->user_headimg  = $value->administrator->headimg;
                $comments[$key]->user_points   = '保密';
                $comments[$key]->user_post_num = '保密';
                $comments[$key]->user_fans_num = '保密';
            } elseif($value->reply_user_type == 2){//用户
                $comments[$key]->user_username = $value->users->nickname;
                $comments[$key]->user_headimg  = $value->users->headimg;
                $comments[$key]->user_points   = $value->users->points;
                $comments[$key]->user_post_num = $value->users->post_num;
                $comments[$key]->user_fans_num = $value->users->fans_num;
                $level = processLevel($postsLevel,$comments[$key]->user_points);
                $comments[$key]->user_level = $level[0];
                $comments[$key]->level_icon = $level[1];
            }
            $comments[$key]->content = $this->incLength($value->content);
        }
        //处理过短的帖子
        $post->content = $this->incLength($post->content);

        $this->assign([
            'post'     => $post,
            'comments'  => $comments
        ]);
        return $this->fetch();
    }

    //发送帖子
    public function posts(Request $request)
    {
        if ($request->isPost()){
            $data = input('param.');
            $data['user_id']    = $this->uid;
            $data['user_type']  = 2;
            $data['status']     = 1;
            $validate = Loader::validate('posts');
            ($validate->check($data)) || $this->error($validate->getError());
            $res = (new PostModel())->saveData($data);
            (false !== $res)?$this->success('发帖成功,积分+50'):$this->error('发帖失败');
        }
    }

    //发送评论
    public function comment(Request $request)
    {
        if ($request->isPost()){
            $data = input('param.');
            $data['reply_user_id']   = $this->uid;
            $data['reply_user_name'] = session($this->salt.'username');
            $validate = Loader::validate('posts_comment');
            ($validate->check($data)) || $this->error($validate->getError());
            $res = (new PostsComment())->allowField(true)->save($data);
            ($res !== false)?$this->success('评论成功!'):$this->error('评论失败');
        }
    }

    /**
     * @param $content  接受内容
     * @return mixed    返回适当长度内容
     */
    private function incLength($content,$fitLength = 330){
        $length = strlen($content);
        if ( $length< $fitLength){
            $needLength = $fitLength-$length;
            for ($i = 0; $i<$needLength; $i++){
                $content .= "&nbsp";
            }
        }
        return $content;
    }


}