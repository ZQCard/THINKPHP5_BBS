<?php
namespace app\index\controller;

use app\common\model\InformationComment;
use app\common\model\Message;
use think\Db;
use think\Loader;
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
        //查看评论
        $comment = (new InformationComment())->where('post_id = '.$id)->order('create_time DESC')->paginate(4);
        foreach ($comment as $key => $value){
            $comment[$key]->is_upvote = $this->is_in_array($this->uid,$value->upvote_user);
            $comment[$key]->is_oppose = $this->is_in_array($this->uid,$value->oppose_user);
        }
        $this->assign([
            'comments'     => $comment,
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


    public function comment(Request $request)
    {
        if ($request->isPost()){
            $data = input('param.');
            $validate = Loader::validate('information_comment');
            ($validate->check($data)) || $this->error($validate->getError());
            $res = (new InformationComment())->allowField(true)->save($data);
            ($res !== false)?$this->success('评论成功!'):$this->error('评论失败');
        }
    }

    public function attitude(Request $request)
    {
        if ($request->isPost()){
            $backJson = [];
            //$backJson['status'] = 请求状态
            //$backJson['type'] = 动作类型
            //$backJson['message'] = 提示信息
            //$backJson['icon'] = 返回图标地址
            //$backJson['num'] = 点赞值
            $query = Db::name('information_comment');
            $data  = input('param.');
            $res   = $query->field('id,upvote,upvote_user,oppose,oppose_user')->find($data['id']);
            //信息数据
            $messageData = input('param.');
            //删除不必要信息和新的信息
            unset($messageData['id']);
            unset($messageData['uid']);
            unset($messageData['attitude']);
            $messageData['info'] = '点赞成功';
            $messageData['type'] = 2;
            $messageData['user_type'] = 2;
            if ($data['attitude'] == 1){//点赞同
                //默认点赞+1
                $updateData['upvote'] = $res['upvote'] + 1;
                $backJson['type']     = 1;
                $backJson['message']  = '点赞成功';
                $backJson['icon']     = '/static/index/images/upvote-b.png';
                //处理点赞数据
                if (is_null($res['upvote_user'])){
                    $upvoteUser[] = $data['uid'];
                    $updateData['upvote_user'] = serialize($upvoteUser);
                    $this->incMessage($messageData);
                }else{
                    $upvoteUser = unserialize($res['upvote_user']);
                    if (in_array($data['uid'],$upvoteUser)){//已经点过赞,取消点赞
                        $upvoteUser           = removeValue($data['uid'],$upvoteUser);
                        $updateData['upvote'] = $res['upvote'] - 1;
                        $backJson['message']  = '取消点赞成功';
                        $backJson['icon']     = '/static/index/images/upvote-f.png';
                    }else{
                        $this->incMessage($messageData);
                        $upvoteUser[] = $data['uid'];      //没有点过赞  进行点赞
                    }
                    $updateData['upvote_user'] = serialize($upvoteUser);
                }
                $backJson['num'] = $updateData['upvote'];
            }else{//反对
                $updateData['oppose'] = $res['oppose'] - 1;
                $backJson['type']    = 2;
                $backJson['message'] = '反对成功';
                $backJson['icon'] = '/static/index/images/oppose-b.png';
                if (is_null($res['oppose_user'])){
                    $opposeUser['oppose_user'] = $data['uid'];
                    $updateData['oppose_user'] = serialize($opposeUser);
                }else{
                    $opposeUser = unserialize($res['oppose_user']);
                    if (in_array($data['uid'],$opposeUser)){//取消反对
                        $opposeUser = removeValue($data['uid'],$opposeUser);
                        $updateData['oppose'] = $res['oppose'] + 1;
                        $backJson['message'] = '取消反对成功';
                        $backJson['icon'] = '/static/index/images/oppose-f.png';
                    }else{
                        $opposeUser[] = $data['uid'];
                    }
                    $updateData['oppose_user'] = serialize($opposeUser);
                }
                $backJson['num'] = $updateData['oppose'];
            }
            $res = $query->where('id',$res['id'])->update($updateData);
            if ($res){
                $backJson['status'] = 1;
            }else{
                $backJson['message'] = '操作失败';
                $backJson['status'] = 2;
            }
            echo json_encode($backJson);
        }
    }

    /**
     * @param $data 消息数组
     * @return bool 是否成功发送消息
     */
    private function incMessage($data){
        $res = (new Message())->save($data);
        return (boolean)$res;
    }

    /**
     * 检查值是否在序列化过后的字符串中存在
     * @param $value        要检查的值
     * @param $string       序列化后的字符串
     * @return bool         是否存在
     */
    private function is_in_array($value,$string){
        $array = unserialize($string);
        if (!$array)$array = [];
        if (!in_array($value,$array)){
            return 0;
        }
        return 1;
    }
}