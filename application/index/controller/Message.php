<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/20 0020
 * Time: 8:47
 */

namespace app\index\controller;


class Message extends Auth
{
    public function index()
    {
        $this->assign([
            'nowType' => 'message'
        ]);
        return $this->fetch();
    }
}