<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18 0018
 * Time: 15:44
 */

namespace app\admin\controller;


use think\Loader;
use app\admin\model\PointsType as PointsTypeModel;

class PointsType extends Base
{
    public function save()
    {
        $res = $this->saveData(input('param.'));
        ($res !== false)?$this->success('添加积分规则成功'):$this->error('添加积分规则失败');
    }

    public function update()
    {
        $res = $this->saveData(input('param.'));
        ($res !== false)?$this->success('修改积分规则成功'):$this->error('修改积分规则失败');
    }

    public function saveData($data)
    {
        $validate = Loader::validate('pointsType');
        $validate->check($data) || $this->error($validate->getError());
        $res = (new PointsTypeModel())->saveData($data);
        return $res;
    }
}