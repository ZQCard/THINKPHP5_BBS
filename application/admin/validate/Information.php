<?php

namespace app\admin\validate;
use think\Validate;

class Information extends Validate
{
    protected $rule = [
        'title' => 'require|max:30',
        'pic' => 'require',
        'content' => 'require',
    ];

    protected $message = [
        'title.require' => '文章标题不得为空',
        'title.max' => '文章标题长度不得超过30',
        'pic.require' => '文章首页图不得为空',
        'content.require' => '文章内容不得为空',
    ];
}