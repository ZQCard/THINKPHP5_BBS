<?php

namespace app\admin\model;

class Category extends Base
{
    /**
     * @param $data  表单提交数据
     * @return bool  操作是否成功
     */
    public function saveData($data)
    {
        //前端状态选择框控制
        $data['status'] = isset($data['status'])?1:2;
        $redis = redis();
        if (isset($data['id']))
        {
            $res = $this->isUpdate(true)->save($data);
            $id  = $data['id'];
        }
        else
        {
            $res = $this->isUpdate(false)->save($data);
            $id = $this->getLastInsID();
        }
        unset($data['__token__']);
        //信息存入redis哈希表
        $redis->zAdd('category:score',$data['sort'],'category:'.$id);
        $redis->hMset('category:'.$id,$data);
        return $res;
    }
}