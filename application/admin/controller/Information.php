<?php

namespace app\admin\controller;

use think\Loader;
use think\Request;
use app\admin\model\Information AS InformationModel;

class Information extends Base
{
    public function index()
    {
        $BannerModel = new InformationModel();
        $data = $BannerModel->field('content',true)->order(['look'=>'desc','comment'=>'desc','status'])->paginate(8);
        $this->assign([
            'data' =>$data,
        ]);
        return $this->fetch();
    }

    public function read($id)
    {
        $information = InformationModel::find($id);
        $this->assign([
            'data' =>$information,
        ]);
        return $this->fetch();
    }

    public function update(Request $request)
    {
        if ($request->isPut()){
            $res = $this->saveData(input('param.'));
            ($res !== false)?$this->success('修改文章成功'):$this->error('修改文章失败');
        }
    }

    public function save(Request $request)
    {
        if ($request->isPost()){
            $data = input('param.');
            $data['score'] = time();
            $res = $this->saveData($data);
            ($res !== false)?$this->success('添加文章成功'):$this->error('添加文章失败');
        }
    }

    public function saveData($data)
    {
        $Validate = Loader::validate('information');
        //操作简要说明
        $data['brief'] = substr($data['content'],0,strpos($data['content'],'>',3)).'>';
        ($Validate->check($data)) || $this->error($Validate->getError());
        $res = (new InformationModel())->saveData($data);
        return $res;
    }
}