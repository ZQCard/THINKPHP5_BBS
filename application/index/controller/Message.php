<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/20 0020
 * Time: 8:47
 */

namespace app\index\controller;


use think\Db;
use think\Request;
use app\common\model\Message AS MessageModel;
class Message extends Auth
{
    public function index($type='')
    {
        $condition = (empty($type))?0:1;
        $messages = Db::name('message')->where('get_user_id',$this->uid)->where('user_type = 2 AND is_del = 2 AND is_read = '.$condition)->order('create_time DESC')->paginate();
        $item = [];
        foreach ($messages as $value){
            $item[] = $value;
        }

        //下标0标为未读  下标1表示已读
        $is_read = [0,0];
        foreach ($item as $key => $value){
            $is_read[$value['is_read']]++;
            $item[$key]['user_url'] = '/user/'.$value['post_user_id'];
            if(empty($value['content_info'])){
                $item[$key]['tips']=$value['info'];
            }else{
                $item[$key]['tips']=$value['content_info'];
            }
            switch ($value['type']){
                case 1:
                    $item[$key]['info_url'] = '/information/'.$value['content_id'];
                    break;
                case 2;
                    $item[$key]['info_url'] = '/information/'.$value['content_id'];
                    break;
                case 3:
                    $item[$key]['info_url'] = '/posts/'.$value['content_id'];
                    break;
                case 4:
                    $item[$key]['info_url'] = '/posts/'.$value['content_id'];
                    break;
                default:
                    $item[$key]['info_url'] = '/';
                    ;
            }
        }
        $this->assign([
            'condition'=> $condition,
            'list'     => $messages,
            'is_read'  => $is_read,
            'messages' => $item,
            'nowType'  => 'message'
        ]);
        return $this->fetch();
    }

    public function infoDel(Request $request)
    {
        if ($request->isDelete()){
            $query = Db::name('message');
            $data = input('param.');
            //id集合
            $ids = explode('-',$data['id']);
            $ids = array_filter($ids);
            //找出用户所有的收藏
            $resId = $query->where('get_user_id',$this->uid)->column('id');
            foreach ($ids as $value){
                if (!in_array($value,$resId)){
                    $this->error('数据删除错误,存在不属于自己的收藏信息');
                }
            }
            if ($data['type']=='update'){
                $field = 'is_read';
                $info  = '更新';
            }else{
                $field = 'is_del';
                $info  = '删除';
            }
            $updateData = [];
            foreach ($ids as $key => $value){
                $updateData[$key]['id'] = $value;
                $updateData[$key][$field] = 1;
            }
            $res2 = $this->updateMessageNum(count($ids));
            if (!$res2)$this->error('更新用户信息数量出错');
            $res = (new MessageModel())->saveAll($updateData);
            (false !== $res)?$this->success($info.'成功'):$this->error($info.'失败');
        }
    }

    private function updateMessageNum($num)
    {
        return Db::name('users')->where('id',$this->uid)->setDec('message_num',$num);
    }
}