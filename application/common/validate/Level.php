<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/15 0015
 * Time: 9:44
 */

namespace app\common\validate;

use think\Validate;

class Level extends Validate
{
    protected $rule = [
        'name'  => 'require|token|max:20',
        'point' => 'require|number',
        'icon'  => 'require',
        'number'=> 'require|number'
    ];

    protected $field = [
        'name'  => '等级名称',
        'point' => '等级最低积分',
        'icon'  => '等级图标',
    ];
}