<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/30 0030
 * Time: 9:01
 */

namespace app\common\model;


use app\admin\model\Module;
use think\Db;

class Posts extends Base
{
    protected static function init()
    {
        Posts::beforeInsert(function ($post){
            //增加主模块发贴数量
            Db::name('module')->where('id',$post->module_id)->setInc('post_num');

            //增加子模块今日发帖数量
            $now = date('Y-m-d');
            $query = Db::name('day_posts');
            if ($query->where('date',$now)->where('module_id',$post->module_id)->field('id')->find()){
                $query->where('date',$now)->where('module_id',$post->module_id)->setInc('post_num');
            }else{
                $data['module_id'] = $post->module_id;
                $data['date'] = $now;
                $query->where('date',date('Y-m-d'))->where('module_id',$post->module_id)->insert($data);
            }
        });
    }

    /**
     * @param $data  表单提交数据
     * @return bool  操作是否成功
     */
    public function saveData($data)
    {
        //前端状态选择框控制
        $data['status'] = isset($data['status'])?1:2;
        $data['is_top'] = isset($data['is_top'])?1:2;
        $data['score']  = time();
        if (isset($data['id']))
        {
            $res = $this->isUpdate(true)->save($data);
        }
        else
        {
            $res = $this->isUpdate(false)->save($data);
        }
        return $res;
    }


    //关联管理员模型
    public function administrator()
    {
        return $this->belongsTo('administrator','user_id')->field('id,username');
    }

    //关联用户模型
    public function users()
    {
        return $this->belongsTo('users','user_id')->field('id,nickname,headimg');
    }
}