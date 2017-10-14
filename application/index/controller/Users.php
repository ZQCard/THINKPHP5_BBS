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
    //用户收藏
    public function favorite($id,$type='')
    {
        $res = Common::checkUid($id);
        if ($res['0'] === 0)$this->error($res[1]);
        $query = Db::name('favorite');
        //根据条件筛选
        if (empty($type)){
            $list = $query->where('user_id',$id)->order('create_time DESC')->paginate(8);
        }else{
            $list = $query->where('user_id',$id)->where('article_type',$type)->order('create_time DESC')->paginate(8);
        }
        $favorites = [];
        foreach ($list as $key => $value){
            $favorites[] = $value;
        }

        foreach ($favorites as $key => $value){
            $favorites[$key]['create_time'] = timeToString($value['create_time']);

        }
        $page = $list->render();
        $this->assign([
            'page'      => $page,
            'type'      => $type,
            'id'        => $id,
            'favorites' => $favorites,
        ]);
        return $this->fetch();
    }

    //重新发送邮件
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


    //验证hash
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

    public function favoriteDel(Request $request)
    {
        if ($request->isDelete()){
            $data = input('param.');
            $query = Db::name('favorite');
            if (!($this->uid))$this->error('非法用户');
            $res = $query->where('user_id',$this->uid)->where('id',$data['id'])->find();
            if (!$res)$this->error('不可以删除不属于自己的收藏');
            $res = $query->delete($data['id']);
            (false !== $res)?$this->success('删除成功'):$this->error('删除失败');
        }
    }
}