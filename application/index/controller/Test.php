<?php
namespace app\index\controller;

use think\Controller;


class Test extends Controller
{
    public function index()
    {
        $data = [1,2,3,4];
        echo serialize($data);
    }
}