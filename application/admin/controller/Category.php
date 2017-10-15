<?php

namespace app\admin\controller;

use app\admin\model\Category AS CategoryModel;
use think\Loader;

class Category extends Base
{
    public function index()
    {
        $data = (new CategoryModel)->order(['status','sort'=>'desc'])->paginate(8);
        $this->assign([
            'data' => $data
        ]);
        return $this->fetch();
    }

    public function save()
    {
        $res = $this->saveData(input('param.'));
        ($res != false)?$this->success('添加分类成功'):$this->error('添加分类失败');
    }

    public function update()
    {
        $res = $this->saveData(input('param.'));
        ($res != false)?$this->success('修改分类成功'):$this->error('修改分类失败');
    }

    private function saveData($data)
    {
        $Validate  = Loader::validate('category');
        $Validate->check($data)||$this->error($Validate->getError());
        $res = (new CategoryModel())->saveData($data);
        return $res;
    }
}