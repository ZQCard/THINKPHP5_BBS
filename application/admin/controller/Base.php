<?php

namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;

class Base extends Controller
{
    protected $salt;
    public function _initialize()
    {
        $this->salt = config('SALT');
        (empty(session($this->salt.'aid')))&&$this->redirect('Admin/login/index');
        $this->assign('controller',$this->request->controller());
    }


    public function index()
    {
        $data = Db::name($this->request->controller())->paginate(8);
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function create()
    {
        return $this->fetch();
    }




    public function edit()
    {
        if ($this->request->isGet())
        {
            $data =Db::name($this->request->controller())->find(input('param.id'));
            input('param.id')&&$this->assign('data_view',$data);
            return $this->fetch();
        }
    }

    public function delete()
    {
        if ($this->request->isDelete())
        {
            $data = input('param.');
            if($data['type'] == 2){
                $res =Db::name($this->request->controller())->where('id',$data['id'])->update(['is_del' => 2]);
            }else{
                $res = Db::name($this->request->controller())->where('id',$data['id'])->delete();
            }
            (false !== $res)?$this->success('删除成功!'):$this->error('删除失败!');
        }
    }

    public function changeInfo()
    {
        if ($this->request->isPatch())
        {
            $data = input('param.');
            (false !== Db::name($this->request->controller())->where('id',$data['id'])->update([$data['name'] => $data['value']]))?$this->success('更新状态成功!'):$this->error('更新状态失败!');
        }
    }

    /*
     * 空操作
     */
    /*public function _empty()
    {
        abort(404,'页面不存在啊！');
    }*/

}