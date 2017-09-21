<?php

namespace app\admin\model;
use app\admin\controller\Common AS CommonFunction;

class Module extends Base
{
    protected static function init()
    {
        //更新查看图片是否更改  如果更改就删除七牛云的老图片
        Module::beforeUpdate(function ($module){
            if ($module->pic){
                if ($module->pic !== Module::get($module->id)->pic){
                    return CommonFunction::deleteFile(Module::get($module->id)->pic);
                }
            }
            return true;
        });
        //删除图片
        Module::beforeDelete(function ($module){
            return CommonFunction::deleteFile($module->pic);
        });
    }
}