<?php

namespace app\index\validate;

use think\Validate;

class Users extends Validate
{
    protected $rule = [
        'username'  => 'require|max:20|min:6|token|unique:users',
        'email'     => 'email|unique:users',
        'password'  => 'require|checkPsd|min:6',
        'nickname'  => 'max:60|unique:users'
    ];

    protected $message = [
        'username.require' => '用户名不得为空',
        'username.max'     => '用户名不得超出20位',
        'username.min'     => '用户名不得小于6位',
        'password.min'     => '密码不得小于6位',
        'password.require' => '密码不得为空',
        'username.unique'  => '用户名已存在',
        'email.email'  => '邮箱格式不正确',
        'email.unique'  => '邮箱已存在',

    ];

    protected $field = [
        'username'    => '用户名',
        'email'    => '邮箱',
        'password'    => '密码',
        'birthday'    => '生日',
        'nickname'    => '昵称',
    ];

    protected $scene = [
        'login' => ['username','password','email'],
        'update'=> ['nickname','headimg','email','sex','is_show']
    ];

    protected function checkPsd($value,$rule,$data)
    {
        if (isset($data['repassword'])){
            return ($value == $data['repassword'])?true:'两次密码输入不一致';
        }
        return true;
    }
}