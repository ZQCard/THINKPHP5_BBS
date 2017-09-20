<?php
namespace app\index\controller;

use think\Db;
use think\Request;

class Information extends Base
{
    public function index()
    {
        $Query = Db::name($this->request->controller());
        $informations = $Query->where("status = 1 AND is_del = 1")->field('id,author,title,brief,pic,look,comment,create_time')->order('look desc')->paginate(5);
        $recommend = $this->recInfo();
        $this->assign([
            'informations' => $informations,
            'recommend'     => $recommend
        ]);
        return $this->fetch();
    }

    public function information($id)
    {
        $Query = Db::name($this->request->controller());
        $information = $Query->where("status = 1 AND is_del = 1")->find($id);
        if (is_null($information)){
            echo '参数错误';die;
        }

        //浏览一次增加资讯评分100分并且更新浏览次数
        $res = $this->updateInfo($id);
        if (!$res){
            echo '数据更新失败';die;
        }
        //查找上一篇和下一篇
        $res = $Query->where('id','<',$id)->limit(1)->order('id desc')->field('id,title')->find();
        $information['prev_has'] = 0;
        if ($res){
            $information['prev_has'] = 1;
            $information['prev_id'] = $res['id'];
            $information['prev_title'] = $res['title'];
        }

        $res = $Query->where('id','>',$id)->limit(1)->order('id asc')->field('id,title')->find();
        $information['back_has'] = 0;
        if ($res){
            $information['back_has'] = 1;
            $information['back_id'] = $res['id'];
            $information['back_title'] = $res['title'];
        }

        $recommend = $this->recInfo();
        $this->assign([
            'recommend'   => $recommend,
            'information' => $information,
        ]);
        return $this->fetch('information');
    }

    /**
     * @return array 返回推荐位资讯
     */
    private function recInfo()
    {
        $data = Db::name($this->request->controller())->field('id,title,pic,create_time')->order('update_time DESC')->limit(4)->select();
        return $data;
    }


    /**
     * @param $id  资讯id
     * @return boolean  是否更新数据成功
     */
    private function updateInfo($id)
    {
        $Query = Db::name($this->request->controller());
        $incLook  = $Query->where('id',$id)->setInc('look');
        $incScore = $Query->where('id',$id)->setInc('score',86400);
        return ($incLook&&$incScore);
    }
}