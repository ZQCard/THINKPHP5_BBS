<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/30 0030
 * Time: 9:01
 */

namespace app\admin\controller;

use app\common\model\Posts AS PostsModel;
use think\Db;
use think\Loader;

class Posts extends Base
{
    public function index()
    {
        $posts = (new PostsModel())->order('score DESC')->field('content,update_time',true)->paginate(8);
        $this->assign([
            'posts'     => $posts
        ]);
        return $this->fetch();
    }

    public function create()
    {
        //找出所有一级
        $module = Db::name('module')->where('pid',0)->field('id,name')->select();
        $this->assign([
            'module'    => $module,
        ]);
        return $this->fetch();
    }


    public function save()
    {
        $res = $this->saveData(input('param.'));
        ($res !== false)?$this->success('发帖成功'):$this->error('发帖失败');
    }

    public function update()
    {
        $res = $this->saveData(input('param.'));
        ($res !== false)?$this->success('发帖成功'):$this->error('发帖失败');
    }

    public function saveData($data)
    {
        $validate = Loader::validate('posts');
        ($validate->check($data)) || $this->error($validate->getError());
        $res = (new PostsModel())->saveData($data);
        return $res;
    }

    public function getChild()
    {
        $pid = input('param.pid');
        $childModule = Db::name('module')->where('pid',$pid)->field('id,name')->select();
        ($childModule != false)?$this->success('查找成功','',$childModule):$this->error('没有子分类');
    }
}