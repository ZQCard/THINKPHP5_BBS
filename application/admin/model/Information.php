<?php

namespace app\admin\model;

class Information extends Base
{
    protected function getIsDelAttr($value)
    {
        $idDel = [1=>'未删除',2=>'已删除'];
        return $idDel[$value];
    }

    protected static function init()
    {
        //更新查看图片是否更改  如果更改就删除七牛云的老图片
        Banner::beforeUpdate(function ($infomation){
            if ($infomation->pic !== Banner::get($infomation->id)->pic){
                return CommonFunction::deleteFile(Banner::get($infomation->id)->pic);

            }
            return true;
        });
        //删除图片
        Banner::beforeDelete(function ($infomation){
            return CommonFunction::deleteFile($infomation->pic);
        });
    }
}