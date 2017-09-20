<?php

namespace app\admin\model;
use app\admin\controller\Common AS CommonFunction;
class Banner extends Base
{
    protected static function init()
    {
        //更新查看图片是否更改  如果更改就删除七牛云的老图片
        Banner::beforeUpdate(function ($banner){
            if ($banner->pic !== Banner::get($banner->id)->pic){
                return CommonFunction::deleteFile(Banner::get($banner->id)->pic);

            }
            return true;
        });
        //删除图片
        Banner::beforeDelete(function ($banner){
            return CommonFunction::deleteFile($banner->pic);
        });
    }
}