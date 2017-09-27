<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25 0025
 * Time: 11:09
 */

namespace app\admin\validate;
use think\Validate;

class Config extends Validate
{
    protected $rule = [
        'key'    => 'require|max:60|token',
        'value'  => 'require'
    ];

    protected $message = [
        'key.require'   =>  '配置不得为空',
        'key.max'   =>  '配置不得超过60位',
        'value.require'   =>  '配置值不得为空',
    ];
}