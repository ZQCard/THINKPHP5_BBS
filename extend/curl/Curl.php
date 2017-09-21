<?php

namespace curl;

class Curl
{

    /**
     * [cUrl cURL(支持HTTP/HTTPS，GET/POST)]
     * @author qiuguanyou
     * @copyright 烟火里的尘埃
     * @version   V1.0
     * @date      2017-04-12
     * @param     [string]     $url    [请求地址]
     * @param     [Array]      $header [HTTP Request headers array('Content-Type'=>'application/x-www-form-urlencoded')]
     * @param     [Array]      $data   [参数数据 array('name'=>'value')]
     * @return    [type]               [如果服务器返回xml则返回xml，不然则返回json]
     */
    public static  function cUrl($url,$header=null, $data = null){
        //初始化curl
        $curl = curl_init();
        //设置cURL传输选项

        if(is_array($header)){

            curl_setopt($curl, CURLOPT_HTTPHEADER  , $header);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);


        if (!empty($data)){//post方式
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        //获取采集结果
        $output = curl_exec($curl);

        //关闭cURL链接
        curl_close($curl);

        //解析json
        $json=json_decode($output,true);
        //判断json还是xml
        if ($json) {
            return $json;
        }else{
            #验证xml
            libxml_disable_entity_loader(true);
            #解析xml
            $xml = simplexml_load_string($output, 'SimpleXMLElement', LIBXML_NOCDATA);
            return $xml;
        }
    }
}