<?php

namespace app\index\controller;

use app\common\model\Posts;
use think\Db;
use think\Request;

class Forum extends Base
{
    public function index()
    {
        $moduleData = Db::name('module')->where('status',1)->field('id,name,pid,post_num,update_time,pic')->select();

        $module = [];
        //一级模块
        foreach ($moduleData as $key=>$value)
        {
            if ($value['pid']==0)
            {
                $module[] = $value;
                unset($moduleData[$key]);
            }
        }

        //查找子模块
        foreach ($module as $key => $value)
        {
            $module[$key]['child'] = [];
            foreach ($moduleData as $k => $v)
            {
                if ($value['id'] == $v['pid'])
                {
                    $module[$key]['child'][] = $v;
                }
            }
        }

        $recInfo = $this->recommend();

        $this->assign([
            'recommend' => $recInfo,
            'module'  => $module
        ]);
        return $this->fetch();
    }

    public function forum(Request $request)
    {
        if ($request->isGet()){
            $data = input('param.');
            //帖子信息
            $posts = (new Posts())->where('module_id='.$data['id'].' AND status = 1')->field('content,update_time',true)->order('is_top,is_good,score DESC')->paginate(10);
            //当前模块信息
            $module = Db::name('module')->field('name,post_num,pic')->find($data['id']);
            $kindEditor = 1;
            if (strpos($module['name'],'官方') !== false){
                $kindEditor = 0;
            }
            //子贴数量以及排名
            $res = Db::name('day_posts')->where('date',date('Y-m-d'))->field('module_id,post_num')->order('post_num DESC')->select();

            foreach ($res as $key => $value){
                if ($data['id'] == $value['module_id']){
                    $module['sort'] = $key + 1;
                    $module['post_child_num'] = $value['post_num'];
                }
            }
            if (!isset($module['sort'])){
                $module['sort'] = count($res) + 1;
                $module['post_child_num'] = 0;
            }
            //全部模块信息
            $moduleInfo = Db::name('module')->where('status=1 AND pid != 0')->field('id,name')->select();
            foreach ($moduleInfo as $key => $value){
                if (strpos($value['name'],'官方') !== false){
                    unset($moduleInfo[$key]);
                }
            }

            $this->assign([
                'moduleInfo'=> $moduleInfo,
                'module_id'  => $data['id'],
                'posts'      => $posts,
                'kindEditor' => $kindEditor,
                'module'     => $module
            ]);
            return $this->fetch();
        }
    }

    //推荐帖子
    private function recommend()
    {
        $postModel = new Posts();
        $recommend = $postModel->where('status=1')->order('score DESC')->limit(10)->select();
        return $recommend;
    }
}