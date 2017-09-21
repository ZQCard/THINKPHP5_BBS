<?php

namespace app\admin\controller;
use think\Controller;
use Qiniu\Auth AS Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class Common extends Controller
{
    /**
     * 图片上传
     * @return String 图片的完整URL
     */
    public function upload($type)
    {
        if(request()->isPost()){
            $file = request()->file('file');
            $filePath = $file->getRealPath();
            $ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);
            // 上传到七牛后保存的文件名
            $key ='bbs_'.$type.'_'.substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
            require_once APP_PATH . '/../vendor/qiniu/autoload.php';
            // 需要填写你的 Access Key 和 Secret Key
            $accessKey = config('ACCESSKEY');
            $secretKey = config('SECRETKEY');
            // 构建鉴权对象
            $auth = new Auth($accessKey, $secretKey);
            // 要上传的空间
            $bucket = config('BUCKET');
            $token = $auth->uploadToken($bucket);
            // 初始化 UploadManager 对象并进行文件的上传
            $uploadMgr = new UploadManager();
            list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
            if ($err !== null) {
                return json($err);
            } else {
                return json(config('DOMAINIMG').$ret['key']);
            }
        }
    }


    /**
     * @param $link  七牛云资源链接
     * @return bool  如果删除成功返回true 失败返回false
     */
    public static function deleteFile($link)
    {
        require_once APP_PATH . '/../vendor/qiniu/autoload.php';
        // 需要填写你的 Access Key 和 Secret Key
        $accessKey = config('ACCESSKEY');
        $secretKey = config('SECRETKEY');
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);
        // 文件的域名空间
        $bucket = config('BUCKET');
        $domain = config('DOMAINIMG');
        //将链接前缀去掉  获取文件key值
        $key = str_replace($domain,'',$link);
        $Manager = new BucketManager($auth);
        $res = $Manager->delete($bucket,$key);
        //删除失败
        if ($res !== null){
            //echo $res->message();die;
            return false;
        }
        return true;
    }
}