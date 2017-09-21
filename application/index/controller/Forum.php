<?php

namespace app\index\controller;

use think\Db;

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

    public function forum()
    {
        return $this->fetch();
    }

    //推荐帖子
    private function recPost()
    {
        return '';
    }
}