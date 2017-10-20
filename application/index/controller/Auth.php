<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/20 0020
 * Time: 8:48
 */

namespace app\index\controller;


class Auth extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        if (empty($this->uid)){
            $this->error('你未登陆，请前去登陆','/login');
        }
    }
}