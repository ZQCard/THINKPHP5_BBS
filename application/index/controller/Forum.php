<?php

namespace app\index\controller;

use app\common\model\Posts;
use think\Db;
use think\Request;

class Forum extends Base
{
    public function index()
    {
        $moduleData = Db::name('module')->where('status',1)->where('is_del',1)->field('id,name,pid,post_num,update_time,pic')->select();
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
        $recInfo = $this->recPost();
        $this->assign([
            'recInfo' => $recInfo,
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
            //模块信息
            $module = Db::name('module')->field('name,post_num')->find($data['id']);
            $kindEditor = 1;
            if (strpos($module['name'],'官方') !== false){
                $kindEditor = 0;
            }
            //子贴数量以及排名
            $res = Db::name('day_posts')->where('date',date('Y-m-d'))->where('module_id',$data['id'])->field('module_id,post_num')->order('post_num DESC')->select();
            if (!empty($res)){
                foreach ($res as $key => $value){
                    if ($data['id'] == $value['module_id']){
                        $module['sort'] = $key+1;
                        $module['post_child_num'] = $value['post_num'];
                        break;
                    }
                }
            }else{
                $res = Db::name('day_posts')->where('date',date('Y-m-d'))->field('id')->count();
                $module['sort'] = $res+1;
                $module['post_child_num'] = 0;
            }

            $this->assign([
                'posts'      => $posts,
                'kindEditor' => $kindEditor,
                'module'     => $module
            ]);
            return $this->fetch();
        }
    }

    //推荐帖子
    private function recPost()
    {
        return '';
    }
}