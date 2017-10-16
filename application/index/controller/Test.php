<?php
namespace app\index\controller;

use app\common\model\InformationComment;
use think\Controller;


class Test extends Controller
{
    public function index()
    {
        $uid = 1;
        $email = '445864742@qq.com';
        $message = 'hello';
        $res = Common::sendEmail($uid,$email,$message);
        dump($res);
    }

    public function info()
    {
        phpinfo();
    }
}