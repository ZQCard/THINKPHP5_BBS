<?php

namespace app\common\model;

class Users extends Base
{
    protected $field = true;
    protected $dateFormat = 'Y-m-d H:i:s';


    protected function setPasswordAttr($value){
        return md5($value);
    }
}