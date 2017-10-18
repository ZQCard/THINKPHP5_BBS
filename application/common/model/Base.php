<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/26 0026
 * Time: 14:14
 */

namespace app\common\model;

use think\Model;

class Base extends Model
{
    //忽略非表单字段
    protected $field = true;

    public function getStatusAttr($value)
    {
        $status = [1 => '正常', 2 => '冻结'];
        return $status[$value];
    }

    /**
     * @param $data  表单提交数据
     * @return bool  操作是否成功
     */
    public function saveData($data)
    {
        //前端状态选择框控制
        $data['status'] = isset($data['status'])?1:2;
        if (isset($data['id'])) {
            $res = $this->isUpdate(true)->save($data);
        }else{
            $res = $this->isUpdate(false)->save($data);
        }
        return $res;
    }
}