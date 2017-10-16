<?php

namespace app\common\model;

class Users extends Base
{
    protected $field = true;
    protected $dateFormat = 'Y-m-d H:i:s';

    protected function getSexAttr($value){
        $array = ['未知','男','女'];
        return $array[$value];
    }

    protected function getbirthdayAttr($value){
        if (is_null($value)){
            return '未知';
        }else{
            return $value;
        }
    }

    protected function setPasswordAttr($value){
        return md5($value);
    }
}