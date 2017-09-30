<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/30 0030
 * Time: 8:48
 */

namespace app\admin\controller;


class Test extends Base
{
    public function index()
    {
        return $this->fetch();
    }
}