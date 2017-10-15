<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/15 0015
 * Time: 8:50
 */

namespace app\admin\controller;


use think\Db;
use think\Loader;
use app\common\model\Level AS LevelModel;

class Level extends Base
{
    public function index()
    {
        $data = Db::name('level')->order('number')->paginate(8);
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function save()
    {
        $data = input('param.');
        $res = $this->saveData($data);
        ($res != false)?$this->success('添加等级成功'):$this->error('添加等级失败');
    }

    public function update()
    {
        $data = input('param.');
        $res = $this->saveData($data);
        ($res != false)?$this->success('修改等级成功'):$this->error('修改等级失败');
    }

    private function saveData($data)
    {
        $Validate  = Loader::validate('level');
        $Validate->check($data)||$this->error($Validate->getError());
        $res = (new LevelModel())->saveData($data);
        return $res;
    }

    public function delete()
    {
        $data = input('param.');
        $res = \app\common\model\Level::destroy(intval($data['id']));
        ($res != false)?$this->success('删除成功'):$this->error('删除失败');
    }
}