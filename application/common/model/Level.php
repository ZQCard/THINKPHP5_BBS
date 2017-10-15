<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/15 0015
 * Time: 9:40
 */

namespace app\common\model;


use app\admin\controller\Common AS BCommon;

class Level extends Base
{
    protected static function init()
    {
        Level::beforeUpdate(function ($level){
            if ($level->icon !== Level::get($level->id)->icon){
                return BCommon::deleteFile(Level::get($level->id)->icon);
            }
            return true;
        });

        //删除图片
        Level::beforeDelete(function ($level){
            return BCommon::deleteFile($level->icon);
        });
    }
}