<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * @param $ip  IP地址
 * @return mixed|SimpleXMLElement   高德地图返回的所在地数据
 */
function getLocation($ip)
{
    ($ip == '127.0.0.1')&&$ip = '115.196.225.254';
    $locationUrl = "http://restapi.amap.com/v3/ip?key=".config('GAODEKEY')."&ip=".$ip;
    $location = \curl\Curl::cUrl($locationUrl);
    return $location;
}
/**
 * @param string $param 参数
 * @return string       自定义加密数据
 */
function getHash($param = '')
{
    $salt = config('SALT');
    if (empty($param)){
        $param = $salt;
    }else{
        $param = $salt.$param;
    }
    $hash = md5($param);
    return $hash;
}

/**
 * @param $uid          用户id
 * @param $hash         hash值
 * @param int $time     过期时间戳
 * @return int|string   是否插入成功
 */
function saveHash($uid,$hash,$time=86400)
{
    $data['uid']  = $uid;
    $data['hash'] = $hash;
    $data['end_time'] = time()+$time;
    $res = \think\Db::name('UsersHash')->insert($data);
    return $res;
}

/**
 * @param $uid   用户id
 * @param $hash  HASH值
 * @return array|false|int|PDOStatement|string|\think\Model  记录存在并删除返回true   记录不存在返回false
 */
function findHash($uid,$hash)
{
    $Query = \think\Db::name('UsersHash');
    $res = $Query->where('hash',$hash)->where('uid',$uid)->where('end_time','>',time())->find();
    if ($res){
        $res = $Query->where('id',$res['id'])->delete();
        return $res;
    }
    return false;
}

