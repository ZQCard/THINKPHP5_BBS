<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25 0025
 * Time: 9:37
 */

namespace app\admin\controller;


use think\Loader;
use think\Request;
use app\admin\model\Config AS ConfigModel;

class Config extends Base
{
    public function save(Request $request)
    {
        if ($request->isPost()) {
            $res = $this->saveData(input('param.'));
            ($res !== false)?$this->success('添加配置成功'):$this->error('添加配置失败');
        }
    }

    public function update(Request $request)
    {
        if ($request->isPut()) {
            $res = $this->saveData(input('param.'));
            ($res !== false)?$this->success('修改配置成功'):$this->error('修改配置失败');
        }
    }

    public function saveData($data)
    {
        $validate = Loader::validate('config');
        $validate->check($data) || $this->error($validate->getError());
        $res = (new ConfigModel())->saveData($data);
        return $res;
    }
}