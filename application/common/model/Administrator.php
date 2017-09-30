<?php

namespace app\common\model;

class Administrator extends Base
{
    public function getIsDelAttr($value)
    {
        $isDel = ['1'=>'未删除','2'=>'已删除'];
        return $isDel[$value];
    }

    public function getAuthIdAttr($value)
    {
        $isDel = ['1'=>'超级管理员','2'=>'普通管理员'];
        return $isDel[$value];
    }

    protected function setPasswordAttr($value)
    {
        return md5($value);
    }
}