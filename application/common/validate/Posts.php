<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/30 0030
 * Time: 9:36
 */

namespace app\common\validate;

use think\Validate;

class Posts extends Validate
{
    protected $rule = [
        'title' =>  'require|max:80|token',
        'content' =>  'require',
        'module_id' =>  'require',
    ];

    protected $message = [
        'title.require' =>  '标题不得为空',
        'title.max' =>  '标题不得超过80个字',
        'content.require' =>  '内容不得为空',
        'module_id.require' =>  '所属栏目不得为空',
    ];
}