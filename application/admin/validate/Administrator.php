<?php

namespace app\admin\validate;
use think\Validate;

class Administrator extends Validate{
    protected $rule = [
        'username'  => 'require|max:20|token|unique:administrator',
        'password'  => 'require|checkPsd',
        'phone'     => 'require|max:12',
    ];

    protected $message = [
        'username.require' => '用户名不得为空',
        'username.max'     => '用户名不得超出20位',
        'password.require' => '密码不得为空',
        'username.unique'  => '用户名已存在',
        'phone.require'    => '电话不得为空',
        'phone.max'        => '电话不得超过12位',
    ];

    protected $scene = [
        'login' => ['username' => 'require','password'],
        'update'  => ['phone']
    ];

    protected function checkPsd($value,$rule,$data)
    {
        if (isset($data['repassword'])){
            return ($value == $data['repassword'])?true:'两次密码输入不一致';
        }
        return true;
    }
}