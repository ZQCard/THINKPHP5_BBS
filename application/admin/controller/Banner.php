<?php

namespace app\admin\controller;

use app\admin\model\Banner AS BannerModel;
use think\Loader;

class Banner extends Base
{
    public function index()
    {
        $BannerModel = new BannerModel();
        $data = $BannerModel->order(['status','sort'=>'desc','end_time'=>'desc'])->paginate(8);
        $num = $BannerModel->where('status',1)->count();
        $this->assign([
            'data' =>$data,
            'num'  => $num,
        ]);
        return $this->fetch();
    }

    public function save()
    {
        $data = input('param.');
        //数据验证
        $Validate = Loader::validate('banner');
        $Validate->check($data)||$this->error($Validate->getError());
        $res = (new BannerModel())->saveData($data);
        ($res !== false)?$this->success('添加轮播图成功'):$this->error('添加轮播图失败');
    }

    public function update()
    {
        $data = input('param.');
        //数据验证
        $Validate = Loader::validate('banner');
        $Validate->check($data)||$this->error($Validate->getError());
        $res = (new BannerModel())->saveData($data);
        ($res !== false)?$this->success('修改轮播图成功'):$this->error('修改轮播图失败');
    }

    public function delete()
    {
        $data = input('param.');
        $res = \app\admin\model\Banner::destroy(intval($data['id']));
        ($res != false)?$this->success('删除成功'):$this->error('删除失败');
    }

}