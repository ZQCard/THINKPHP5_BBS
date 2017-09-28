<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/28 0028
 * Time: 9:28
 */

namespace app\index\controller;

use think\Db;
use think\Request;

class Users extends Base
{
    public function resendMail(Request $request)
    {
        if ($request->isPost()){
            $data = input('param.');
            $message = "爱编程论坛,请点击下面网址进行激活账号^_^~,有效时间为24小时.";
            $hash = getHash($data['uid']);
            $href = config('DOMAIN').'/check/uid/'.$data['uid'].'/hash/'.$hash;
            $message = $message.$href;

            //保存hash验证值
            $res = saveHash($data['uid'],$hash);
            if (!$res){
                $data['status']  = 2;
                $data['message'] = '保存hash验证值失败';
                return $data;
            }
            $res = Db::name('Users')->where('id',$data['uid'])->field('email')->find();
            $res = Common::sendEmail($data['uid'],$res['email'],$message);
            if ($res['status'] == 2){
                $this->error($res['message']);
            }
            $this->success('邮件发送成功,请前去邮箱验证');
        }
    }
    public function check()
    {
        $data = input('param.');
        $res = findHash($data['uid'],$data['hash']);
        if ($res){
            $res = Db::name('Users')->where('id',$data['uid'])->update(['is_validate'=>1]);
        }
        if($res !== false){
            $this->assign([
                'signal' => 'success'
            ]);
        }else{
            $this->assign([
                'signal' => 'fail'
            ]);
        }
        return $this->fetch();
    }
}