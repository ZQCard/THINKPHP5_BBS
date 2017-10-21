<?php
namespace app\index\controller;

use PHPMailer\PHPMailer\PHPMailer;
use think\Controller;


class Test extends Controller
{
    public function index()
    {
        $redis = new \Redis();
        $conn = $redis->connect('127.0.0.1');
        $redis->set('author','zhouqi');
        echo $redis->get('author');
    }

    public function info()
    {
        phpinfo();
    }

    public function sendEmail()
    {
        $mail = new PHPMailer();
        // 设置PHPMailer使用SMTP服务器发送Email
        $mail->IsSMTP();
        // 设置邮件的字符编码，若不指定，则为'UTF-8'
        $mail->CharSet='UTF-8';
        // 添加收件人地址，可以多次使用来添加多个收件人
        $mail->AddAddress('445864742@qq.com');
        // 设置邮件正文
        $mail->Body='正文';
        // 设置邮件头的From字段。
        $mail->From='zq_13382925923@163.com';
        // 设置发件人名字
        $mail->FromName='zhouqi';
        // 设置邮件标题
        $mail->Subject='title';
        // 设置SMTP服务器。
        $mail->Host='smtp.163.com';
        // 设置为"需要验证"
        $mail->SMTPAuth=true;
        // 设置用户名和密码。
        $mail->Username='zq_13382925923@163.com';
        $mail->Password='zhouqi445864742';
        // 发送邮件。
        return($mail->Send());
    }
}