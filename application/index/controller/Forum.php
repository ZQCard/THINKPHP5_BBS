<?php

namespace app\index\controller;

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
            $res = Db::name('module')->field('name')->find($data['id']);
            $kindEditor = 1;
            if (strpos($res['name'],'官方') !== false){
                $kindEditor = 0;
            }
            $this->assign([
                'kindEditor' => $kindEditor,
                'module'     => $res['name']
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