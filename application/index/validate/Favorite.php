<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11 0011
 * Time: 15:31
 */

namespace app\index\validate;

use think\Validate;

class Favorite extends Validate
{
    protected $rule = [
        'user_id'      => 'require',
        'article_id'   => 'require',
        'article_type' => 'require',
        'article_user' => 'require',
    ];
}