<?php

namespace app\admin\controller;

use think\Db;
use think\Loader;
use think\Request;
use app\common\model\Module AS ModuleModel;

class Module extends Base
{
    public function index()
    {
        $ModuleModel = Db::name($this->request->controller());
        $list = $ModuleModel->where(['pid'=>0])->order(['sort'=>'desc'])->paginate(1);
        $data = [];
        foreach ($list as $key => $value){

            $data[] = $value;
            $res = $ModuleModel->where(['pid'=>$value['id']])->order(['sort'=>'desc'])->select();
            foreach ($res as $k => $v)
            {
                $v['name'] = '|----'.$v['name'];
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
        //取出所有一级模块
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
            //取出所有一级模块
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
            ($res != false)?$this->success('添加模块成功'):$this->error('添加模块失败');
        }
    }

    public function update(Request $request)
    {
        if ($request->isPut()){
            $res = $this->saveData(input('param.'));
            ($res != false)?$this->success('修改模块成功'):$this->error('修改模块失败');
        }
    }

    private function saveData($data)
    {
        $Validate  = Loader::validate('module');
        $Validate->check($data)||$this->error($Validate->getError());
        $res = (new ModuleModel())->saveData($data);
        return $res;
    }

    public function delete()
    {
        if ($this->request->isDelete())
        {
            $data = input('param.');
            $res = \app\common\model\Module::destroy(intval($data['id']));
            ($res != false)?$this->success('删除成功'):$this->error('删除失败');
        }
    }

}