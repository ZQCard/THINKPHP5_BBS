<?php

namespace app\admin\controller;

use think\Db;
use think\Loader;
use think\Request;
use app\admin\model\Module AS ModuleModel;

class Module extends Base
{
    public function index()
    {
        $ModuleModel = Db::name($this->request->controller());
        $list = $ModuleModel->where(['pid'=>0])->order(['is_del','sort'=>'desc'])->paginate(1);
        $data = [];
        foreach ($list as $key => $value){
            $value['is_del'] = ($value['is_del'] == 1)?'未删除':'已删除';
            $data[] = $value;
            $res = $ModuleModel->where(['pid'=>$value['id']])->order(['is_del','sort'=>'desc'])->select();
            foreach ($res as $k => $v)
            {
                $v['name'] = '|----'.$v['name'];
                $v['is_del'] = ($v['is_del'] == 1)?'未删除':'已删除';
                $data[]  = $v;
            }
        }
        $this->assign([
            'data' => $data,
            'list' => $list,
        ]);
        return $this->fetch();
    }
    public function create()
    {
        //取出所有一级分类
        $firstModel = Db::name($this->request->controller())->where('pid',0)->select();
        $this->assign([
            'firstModel' => $firstModel,
        ]);
        return $this->fetch();
    }

    public function edit()
    {
        if ($this->request->isGet())
        {
            $Table = Db::name($this->request->controller());
            $data = $Table->find(input('param.id'));
            //取出所有一级分类
            $firstModel = $Table->where('pid',0)->select();
            $this->assign([
                'firstModel' => $firstModel,
                'data_view'  => $data
            ]);
            return $this->fetch();
        }
    }

    public function save(Request $request)
    {
        if ($request->isPost())
        {
            $res = $this->saveData(input('param.'));
            ($res != false)?$this->success('添加分类成功'):$this->error('添加分类失败');
        }
    }

    public function update(Request $request)
    {
        if ($request->isPut()){
            $res = $this->saveData(input('param.'));
            ($res != false)?$this->success('修改分类成功'):$this->error('修改分类失败');
        }
    }

    private function saveData($data)
    {
        $Validate  = Loader::validate('module');
        $Validate->check($data)||$this->error($Validate->getError());
        $res = (new ModuleModel())->saveData($data);
        return $res;
    }


}