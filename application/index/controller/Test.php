<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class Test extends Controller
{
    public function index(Request $request)
    {
        $res = getLocation($request->ip());
        var_dump($res);
    }
}