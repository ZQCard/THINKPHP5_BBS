<?php
namespace app\index\controller;

use think\Controller;

class Test extends Controller
{
    public function index()
    {
        $news = Common::getBlogNews();
        dump($news);
    }
}