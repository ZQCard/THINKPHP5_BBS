<?php

namespace app\admin\validate;
use think\Validate;

class Module extends Validate
{
    protected $rule = [
        'name'  => 'require|max:20|token',
        'sort'  => 'require|between:1,100',
    ];

    protected $message = [
        'name.require'  => '分类名称不得为空',
        'name.max'  => '分类名称不得超过20位',
        'sort.require'  => '排序值不得为空',
        'sort.between'  => '排序值必须在1-100之间',
    ];
}