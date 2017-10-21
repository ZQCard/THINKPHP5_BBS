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
/**
 * @param string $city 城市名称
 * @return mixed       设置cookle
 */
function saveWeatherCookies($city=''){
    //如果cookie存在
    if (!is_null(cookie('weather'))){
        return cookie('weather');
    }
    //如果没有传入城市名称
    if (empty($city)){
        $res = getLocation(request()->ip());
        $city = $res['city'];
    }

    // 心知天气接口调用凭据
    $key = config('XINZHI_KEY'); // 测试用 key，请更换成您自己的 Key
    $uid = config('XINZHI_ID'); // 测试用 用户 ID，请更换成您自己的用户 ID
    // 参数
    $api = 'https://api.seniverse.com/v3/weather/daily.json'; // 接口地址
    $location = $city;
    $param = [
        'ts' => time(),
        'ttl' => 300,
        'uid' => $uid,
    ];
    $sig_data = http_build_query($param);
    $sig = base64_encode(hash_hmac('sha1', $sig_data, $key, TRUE));
    $param['sig'] = $sig; // 签名
    $param['location'] = $location;
    $param['start'] = 0;
    $param['days'] = 2;
    // 构造url
    $url = $api . '?' . http_build_query($param);
    $res = \curl\Curl::cUrl($url);
    $weather = $res['results'][0]['daily'];
    cookie('weather',$weather);
}

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
    $hash = md5($param.time());
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
    $query = \think\Db::name('UsersHash');
    $data['user_id']  = $uid;
    $data['hash'] = $hash;
    $data['end_time'] = time()+$time;
    $res = $query->where('user_id',$uid)->field('id')->find();
    if ($res){
        $res = $query->where('id',$res['id'])->update($data);
    }else{
        $res = $query->insert($data);
    }
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
    $res = $Query->where('user_id',$uid)->where('hash',$hash)->where('end_time','>',time())->find();
    if ($res){
        return $res;
    }
    return false;
}


/**
 * @param $data   传入的数组
 * @param int $length  新数组的长度
 * @return array      筛选过后的数组
 */
function randArray($data,$length = 5){
    $array = [];
    for ($i = 0; $i < $length;$i++){
        $key = array_rand($data);
        $array[] = $data[$key];
        unset($data[$key]);
    }
    return $array;
}

/**
 * 删除数组中的指定元素
 * @param $data     初始数组
 * @param $value    要删除的元素值
 * @return mixed    最终数组
 */
function removeValue($value,$data=array()){
    if (in_array($value,$data)){
        $data = array_values($data);
        $key = array_search($value,$data);
        array_splice($data,$key,1);
    }
    return $data;
}

/**
 * @param $timestamp    时间戳
 * @return string       距离现在的汉字时间
 */
function timeToString($timestamp){
    $str = '';
    $seconds = time() - $timestamp;
    $str = '刚刚';

    if ($seconds > 60){
        $str = '几分钟前';
    }
    if ($seconds > 10*60){
        $str = '十分钟前';
    }
    if ($seconds > 30*60){
        $str = '30分钟前';
    }
    if ($seconds>1*60*60){
        $str = '1 小时前';
    }

    if ($seconds>5*60*60){
        $str = '5 小时前';
    }

    if ($seconds>12*60*60){
        $str = '12 小时前';
    }

    if ($seconds>24*60*60){
        $str = '一天前';
    }

    if ($seconds>2*24*60*60){
        $str = '两天天前';
    }
    if ($seconds>5*24*60*60){
        $str = '五天前';
    }
    if ($seconds>7*24*60*60){
        $str = '一周前';
    }

    if ($seconds>2*7*24*60*60){
        $str = date('H:i:s',$timestamp);
    }

    return $str;
}

/**
 * @param $level    数据库中的等级配置
 * @param $point    当前积分
 * @return array    ['分配的等级','对应的ICON链接字符串组成的数组']
 *                  eg: [81,
 *                          [
 *                              'img1',
 *                              'img2',
 *                              'img3',
 *                              'img4',
 *                              ]
 *                      ]
 */
function processLevel($level,$point)
{
    $processRes = [0 => 0,1 => '',2=>0];
    $k = 0;
    foreach ($level as $key => $value){
        $k++;
        $levelArray[$key] = (int)($point/$value['point']);
        $processRes[0] += $value['number'] * $levelArray[$key];
        for ($i = 0 ; $i < $levelArray[$key]; $i++){
            $processRes[1] = $processRes[1].'-'.$value['icon'];
        }
        $point = $point%$value['point'];
    }
    $next = $level[$k-1]['point'];
    $processRes[2] = $next - $point;
    if (empty($processRes[1])){
        $res = end($level);
        $processRes[1] = '-'.$res['icon'];
    }
    return $processRes;
}
