<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/27 0027
 * Time: 16:20
 */

namespace app\common\validate;

use think\Validate;

class InformationComment extends Validate
{
    protected $rule = [
        'post_id'       => 'require',
        'post_user_id'  => 'require',
        'reply_user_id' => 'require',
        'content'       => 'require',
    ];

    protected $message =[
        'post_id.require'   => '信息错误',
        'post_user_id.require'   => '信息错误',
        'reply_user_id.require'   => '信息错误',
        'content.require'   => '评论不得为空',
    ];
}