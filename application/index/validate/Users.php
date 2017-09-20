<?php

namespace app\index\validate;

use think\Validate;

class Users extends Validate
{
    protected $rule = [
        'username'  => 'require|max:20|min:6|token|unique:users',
        'email'     => 'email|unique:users',
        'password'  => 'require|checkPsd|min:6',

    ];

    protected $message = [
        'username.require' => '用户名不得为空',
        'username.max'     => '用户名不得超出20位',
        'username.min'     => '用户名不得小于6位',
        'password.min'     => '密码不得小于6位',
        'password.require' => '密码不得为空',
        'username.unique'  => '用户名已存在',
        'email.email'  => '邮箱不正确',
        'email.unique'  => '邮箱已存在',

    ];

    protected $scene = [
        'login' => ['username','password','email'],
    ];

    protected function checkPsd($value,$rule,$data)
    {
        if (isset($data['repassword'])){
            return ($value == $data['repassword'])?true:'两次密码输入不一致';
        }
        return true;
    }
}