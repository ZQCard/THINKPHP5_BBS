<?php

namespace app\admin\controller;
use app\common\model\Administrator AS AdministratorModel;
use think\Loader;
use think\Request;

class Administrator extends Base
{
    public function index()
    {
        $data = (new AdministratorModel())->order(['is_del','status','login_times desc','update_time desc'])->paginate(8);
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function save(Request $request)
    {
        if ($request->isPost())
        {
            $data = input('param.');
            $Validate = Loader::validate('administrator');
            ($Validate->check($data)) || $this->error($Validate->getError());
            $res = (new AdministratorModel())->saveData($data);
            ($res !== false)?$this->success('添加管理员成功'):$this->error('添加管理员失败');
        }
    }
    
    public function update(Request $request)
    {
        if ($request->isPut())
        {
            $data = input('param.');
            //特殊判断
            $data['is_del'] = (isset($data['is_del']))?2:1;
            $AdministratorModel = new AdministratorModel();
            $Validate = Loader::validate('administrator');
            ($Validate->scene('update')->check($data)) || $this->error($Validate->getError());
            $res = $AdministratorModel->saveData($data);
            ($res !== false)?$this->success('更新管理员成功'):$this->error('更新管理员失败');
        }
    }
}