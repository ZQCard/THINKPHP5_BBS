<?php

namespace app\admin\validate;
use think\Validate;

class Banner extends Validate
{
    protected $rule = [
        'name'          => 'require|max:30|token',
        'pic'           => 'require',
        'link'          => 'require',
        'sort'          => 'require|between:1,100',
        'start_time'    => "date|checkNow",
        'end_time'    => 'date|checkDate',
    ];

    protected $message = [
        'name.require'      => 'BANNER图名称不得为空',
        'pic.require'       => '图片不得为空',
        'link.require'      => '引导链接不得为空',
        'sort.between'      => '排序值为1-100之间',
        'start_time.after'        => '开启时间不得小于今天',
        'start_time.date'        => '开启时间必须为2017-01-01格式',
        'end_time.date'        => '关闭时间必须为2017-01-01格式',
    ];

    protected function checkNow($value,$rule,$data)
    {
        if ($value < date('Y-m-d')){
            return '开启时间不得早于今天';
        }
        return true;
    }

    protected function checkDate($value,$rule,$data)
    {
        if ($value < $data['start_time']){
            return '结束时间不得早于开启时间';
        }
        return true;
    }

}