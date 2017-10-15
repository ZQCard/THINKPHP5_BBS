<?php

namespace app\admin\controller;

use app\admin\model\Link AS LinkModel;
use think\Loader;

class Link extends Base
{
    public function index()
    {
        $LinkModel = new LinkModel();
        $data = $LinkModel->order(['status','sort'=>'desc','end_time'=>'desc'])->paginate(8);
        $num = $LinkModel->where('status',1)->count();
        $this->assign([
            'data' =>$data,
            'num'  => $num,
        ]);
        return $this->fetch();
    }

    public function save()
    {
        $res = $this->saveData(input('param.'));
        ($res !== false)?$this->success('添加友情链接成功'):$this->error('添加友情链接失败');
    }

    public function update()
    {
        $res = $this->saveData(input('param.'));
        ($res !== false)?$this->success('修改友情链接成功'):$this->error('修改友情链接失败');
    }

    public function saveData($data)
    {
        $Validate = Loader::validate('link');
        ($Validate->check($data)) || $this->error($Validate->getError());
        $res = (new LinkModel())->saveData($data);
        return $res;
    }
}