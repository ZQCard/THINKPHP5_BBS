<?php
namespace phpmailer;
use phpmailer\Phpmailer;
//发送邮件类
class Email{
    public static function send($address,$title,$message)
    {
        $Email = new Phpmailer();
        //设置PHPMailer使用SMTP服务器发送email
        $Email->IsSMTP();

        //设置字符串编码
        $Email->CharSet = 'UTF-8';

        //添加收件人地址，可以使用多次来添加多个收件人
        $Email->AddAddress($address);

        //设置邮件正文
        $Email->Body = $message;

        //设置邮件头的FROM字段
        $Email->From = config('email.EMAIL_ADDRESS');

        //设置发件人名称
        $Email->FromName = '周起';

        //设置邮件标题
        $Email->Subject = $title;

        //设置SMTP服务器
        $Email->Host = config('email.EMAIL_SMTP');

        //设置为验证码
        $Email->SMTPAuth = true;

        //设置用户名密码
        $Email->Username = config('email.EMAIL_LOGINNAME');
        $Email->Password = config('email.EMAIL_PASSWORD');

        //发送邮件
        $Email->Send();
        echo $Email->ErrorInfo;
        die;
        //return ($Email->Send());
    }
}