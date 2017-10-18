<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25 0025
 * Time: 11:09
 */

namespace app\admin\validate;
use think\Validate;

class PointsType extends Validate
{
    protected $rule = [
        'name'    => 'require|max:60|token',
        'points'  => 'require|number'
    ];

    protected $field = [
        'name'    => '规则名称',
        'points'  => '积分数量'
    ];
}