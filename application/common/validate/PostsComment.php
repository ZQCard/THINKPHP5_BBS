<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/12 0012
 * Time: 10:55
 */

namespace app\common\validate;

use think\Validate;

class PostsComment extends Validate
{
    protected $rule = [
        'post_id'           => 'require|token',
        'post_user_id'      => 'require',
        'user_type'         => 'require',
        'content'           => 'require',
        'reply_user_id'     => 'require',
        'reply_user_name'   => 'require',
    ];

    protected $field = [
        'post_id'           => '用户',
        'post_user_id'      => '用户',
        'user_type'         => '用户',
        'content'           => '内容',
        'reply_user_id'     => '用户',
        'reply_user_name'   => '用户',
    ];

}