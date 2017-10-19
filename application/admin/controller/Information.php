<?php

namespace app\admin\controller;

use think\Db;
use think\Loader;
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

    public function create()
    {
        $pointsType = Db::name('points_rule')->field('id,name')->select();
        $this->assign([
            'pointsType' => $pointsType
        ]);
        return $this->fetch();
    }

    public function edit()
    {
        $pointsType = Db::name('points_rule')->field('id,name')->select();
        $data = Db::name($this->request->controller())->find(input('param.id'));
        $this->assign([
            'data_view'  => $data,
            'pointsType' => $pointsType
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

    public function update()
    {
        $data = input('param.');
        $data['post_user_id'] = session($this->salt.'aid');
        $res = $this->saveData($data);
        ($res !== false)?$this->success('修改文章成功'):$this->error('修改文章失败');
    }

    public function save()
    {
        $data = input('param.');
        $data['post_user_id'] = session($this->salt.'aid');
        $data['score'] = time();
        $res = $this->saveData($data);
        ($res !== false)?$this->success('添加文章成功'):$this->error('添加文章失败');
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