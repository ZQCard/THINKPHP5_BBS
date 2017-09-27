<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/26 0026
 * Time: 14:05
 */

namespace app\common\validate;
use think\Validate;

class Message extends Validate
{
    protected $rule = [
        'post_id'   => 'require',
        'post_user_id'   => 'require',
        'reply_user_id'   => 'require',
        'content'   => 'require',
    ];

    protected $message = [
        'post_id.require' => '参数错误',
        'post_user_id.require' => '参数错误',
        'reply_user_id.require' => '参数错误',
        'content.require' => '参数错误',
    ];
}