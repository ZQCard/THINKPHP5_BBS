<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"D:\wamp64\www\bbs\public/../application/index\view\information\information.html";i:1506757448;s:62:"D:\wamp64\www\bbs\public/../application/index\view\layout.html";i:1506663648;}*/ ?>
<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $information['title']; ?></title>
    <meta name="keywords" content='<?php echo $config["keywords"]; ?>,<?php echo $information['title']; ?>' />
    <meta name="description" content="<?php echo $config['description']; ?>" />
    <!--本地资源链接-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_common_1.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_portal_index_1.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/main_1.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/flexslider_1.css" />
    <link href="__STATIC__/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="__STATIC__/plugins/layer/theme/default/layer.css" rel="stylesheet">
    <!--
    在线资源链接
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    -->
    
    
</head>

<body>
<h1 style="display: none;">学编程论坛</h1>
<!--顶部导航到此开始-->
<div class="header-sm">
    <div class="hdc cl" style="display: none;">
        <h2>
            <a href="./" title="Discuz! Board">
                <img src="__STATIC__/index/picture/logo_1.png" alt="Discuz! Board" border="0" />
            </a>
        </h2>
    </div>
    <div class="header-main">
        <div class="container-sm clearfix">
            <h1>
                <a href="/" title=""><img src="__STATIC__/index/picture/logo_1.png" alt="" border="0" /></a>
            </h1>
            <?php if($sessionUid): ?>
            <div class="user">
                <div id="um">
                    <div class="ui-login-toggle">
                        <span class="user-avatar"><img src="http://123.56.195.228/rw/chuizi/uc_server/avatar.php?uid=3&amp;size=small"></span>
                        <span class="user-name hide-row"><?php echo \think\Cookie::get('bbszhouqiusername'); ?></span>
                    </div>
                    <div class="ui-login-status" style="display: none;">
                        <ul>
                            <li class="user-primary-info">
                                <p class="user-avatar-name">
                                    <span class="user-avatar"><a href="home.php?mod=space&amp;uid=3"><img src="http://123.56.195.228/rw/chuizi/uc_server/avatar.php?uid=3&amp;size=small"></a></span>
                                    <span class="user-name hide-row"><a href="home.php?mod=space&amp;uid=3" target="_blank" title="访问我的空间"><?php echo \think\Cookie::get('bbszhouqiusername'); ?></a></span>
                                </p>
                            </li>
                            <li class="user-alert"><a href="home.php?mod=space&amp;do=notice">提醒</a></li>
                            <li class="user-message"><a href="home.php?mod=space&amp;do=pm" id="pm_ntc">消息</a></li>
                            <li class="user-favorite"><a href="home.php?mod=space&amp;do=favorite">收藏</a></li>
                            <li class="user-setting"><a href="home.php?mod=spacecp">设置</a></li>
                            <li class="user-logout"><a id="logout">退出</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="user">
                <div class="fastlg cl">
                    <div>
                 <span class="xi2">
                    <a id="user-login" href="/login">登录</a>
                 </span>
                        <span class="pipe">|</span>
                        <span class="xi2">
                    <a id="user-register" href="/register">注册</a>
                 </span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <ul class="header-menu">
                <?php if(is_array($navData) || $navData instanceof \think\Collection || $navData instanceof \think\Paginator): if( count($navData)==0 ) : echo "" ;else: foreach($navData as $key=>$nav): ?>
                <li class="a" >
                    <a href="<?php echo $nav['link']; ?>" hidefocus="true"><?php echo $nav['name']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="p_pop h_pop" id="mn_userapp_menu" style="display: none"></div>
    <div id="mu" class="cl"></div>
</div>
<!--顶部导航到此结束-->
<!--主要内容开始-->

<div id="wp" class="wp">
    <div class="main clearfix">
        <div class="container-sm mtm">
            <div class="section clearfix">
                <div class="content" >
                    <div class="vw" style="margin: 50px 150px;">
                        <div class="h hm">
                            <h1 class="ph"><?php echo $information['title']; ?></h1>
                            <p class="xg1" style="margin: 20px;">
                                <?php echo date("Y-m-d H:i",$information['create_time']); ?><span class="pipe">|</span>
                                发布者: <a href="home.php?mod=space&amp;uid=1"><?php echo $information['author']; ?></a>
                                <span class="pipe">|</span>
                                查看: <em id="_viewnum"><?php echo $information['look']; ?></em>
                                <span class="pipe">|</span>
                                评论:<?php echo $information['comment']; ?>
                            </p>
                        </div>
                        <div class="d">
                            <div style="margin: 20px;">
                                <img src="<?php echo $information['pic']; ?>" alt="">
                            </div>
                            <?php echo $information['content']; ?>
                        </div>
                    </div>
                    <div class="pren pbm cl" style="margin-top: 50px;">
                        <em style="float: left; margin-left: 100px;">上一篇：<?php if($information['prev_has'] == '1'): ?><a href="/information/<?php echo $information['prev_id']; ?>"><?php echo $information['prev_title']; ?></a><?php else: ?>没有了<?php endif; ?></em>
                        <em style="float: right; margin-right: 100px;">下一篇：<?php if($information['back_has'] == '1'): ?><a href="/information/<?php echo $information['back_id']; ?>"><?php echo $information['back_title']; ?></a><?php else: ?>没有了<?php endif; ?></em>
                    </div>
                    <div class="foldableBox discuss ">
                        <h4>热帖推荐</h4>
                        <div class="js-list">
                            <?php if(is_array($comments) || $comments instanceof \think\Collection || $comments instanceof \think\Paginator): if( count($comments)==0 ) : echo "" ;else: foreach($comments as $key=>$comment): ?>
                            <div class="discuss-box">
                                <div class="discuss-content" style="margin-top: -10px;">
                                    <h5>&nbsp;&nbsp;&nbsp;
                                        <?php echo $comment['content']; ?>
                                        <div class="portrait" >
                                            <a href="/user/<?php echo $comment->users->id; ?>">
                                                <img src="<?php echo $comment->users->headimg; ?>">
                                            </a>
                                        </div>
                                        <ul class="post-info" data-id="<?php echo $comment['id']; ?>" data-user="<?php echo $comment->users->id; ?>" >
                                            <li class="author">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $comment->users->nickname; ?></a>&nbsp;&nbsp;&nbsp;</li>
                                            <li class="time">&nbsp;&nbsp;&nbsp;发表于 <?php echo $comment['create_time']; ?>&nbsp;&nbsp;&nbsp;</li>
                                            <li class="browse">
                                                <?php if($comment['is_oppose'] == '0'): ?>
                                                <img src="__STATIC__/index/images/oppose-f.png" style="height: 20px;width: 20px;" class="browse-c">
                                                <?php else: ?>
                                                <img src="__STATIC__/index/images/oppose-b.png" style="height: 20px;width: 20px;" class="browse-c">
                                                <?php endif; ?>
                                                <b><?php echo $comment['oppose']; ?></b>
                                            </li>
                                            <li class="review">
                                                <?php if($comment['is_upvote'] == '0'): ?>
                                                <img src="__STATIC__/index/images/upvote-f.png" class="review-c">
                                                <?php else: ?>
                                                <img src="__STATIC__/index/images/upvote-b.png" class="review-c">
                                                <?php endif; ?>
                                                <b><?php echo $comment['upvote']; ?></b>
                                            </li>
                                        </ul>
                                    </h5>
                                </div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <div style="float: right;"><?php echo $comments->render(); ?></div>
                        </div>
                    </div>
                    <div class="pren pbm cl" style="margin-top: 50px;">
                        <form action="<?php echo url('comment'); ?>" method="post" enctype="multipart/form-data">
                            <textarea id="editor_id" name="content" style="width:100%;height:300px;margin: 0 auto;"><?php if(empty($sessionUid) || (($sessionUid instanceof \think\Collection || $sessionUid instanceof \think\Paginator ) && $sessionUid->isEmpty())): ?>登陆以后才能发布评论噢<?php endif; ?></textarea>
                            <div class="fastpost-content-bottom ptm pnpost">
                                <?php if(empty($sessionUid) || (($sessionUid instanceof \think\Collection || $sessionUid instanceof \think\Paginator ) && $sessionUid->isEmpty())): ?>
                                <p style="width: 130px;float: right;" class="btn-post btn-post-B"><strong><a href="/login" style="color: #fffaf3">登陆</a></strong></p>
                                <?php else: ?>
                                <p style="width: 130px;float: right;" id="comment" class="btn-post btn-post-B"><strong>发表评论</strong></p>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <!--[diy=um_article_view_diy1]-->
                <div id="um_article_view_diy1" class="area">
                    <div id="frameW75ggg" class=" frame move-span cl frame-1">
                        <div id="frameW75ggg_left" class="column frame-1-c">
                            <div id="frameW75ggg_left_temp" class="move-span temp"></div>
                            <div id="portal_block_12" class="block move-span">
                                <div id="portal_block_12_content" class="dxb_bc">
                                    <div class="right-module ">
                                        <h4>资讯推荐</h4>
                                        <ul class="thread-list">
                                            <!--咨询推荐开始-->
                                            <?php if(is_array($recommend) || $recommend instanceof \think\Collection || $recommend instanceof \think\Paginator): if( count($recommend)==0 ) : echo "" ;else: foreach($recommend as $key=>$recommend): ?>
                                            <li>
                                                <a target="_blank" href="portal.php?mod=view&amp;aid=16">
                                                    <img src="<?php echo $recommend['pic']; ?>" alt="<?php echo $recommend['title']; ?>">
                                                </a>
                                                <dl>
                                                    <dt><a target="_blank" href="/information/<?php echo $recommend['id']; ?>"><?php echo $recommend['title']; ?></a></dt>
                                                    <dd><?php echo date("Y-m-d",$recommend['create_time']); ?></dd>
                                                </dl>
                                            </li>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                            <!--咨询推荐结束-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--[/diy]-->
            </div>
        </div>
    </div>
</div>
<span id="backJson"></span>

<!--主要内容结束-->
<!--底部内容开始-->
<div class="footer">
    <div class="container-sm">
        <div class="link clearfix">
            <ul class="clearfix">
                <!--友情链接开始-->
                <?php if(is_array($linkData) || $linkData instanceof \think\Collection || $linkData instanceof \think\Paginator): if( count($linkData)==0 ) : echo "" ;else: foreach($linkData as $key=>$link): ?>
                <li><a href="<?php echo $link['link']; ?>" target="_blank"><?php echo $link['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <!--友情连接结束-->
            </ul>
        </div>
        <!-- 二维码生成注释
        <div id="output"></div>
        <div style="width: 200px;height: 200px;background:#000;" class="getQRCode"></div>-->
        <div class="copyright">
            <h6>Powered by
                <strong><a href="http://www.discuz.net" target="_blank">THINKPHP5.0---</a></strong> <em>5.0.9</em>
            </h6>
            <div id="flk" class="y">
                <p>
                    <a href="forum.php?mobile=yes" >手机版</a>
                    <span class="pipe">|</span>
                </p>
            </div>
        </div>
    </div>
</div>
<!--本地资源链接-->
<script src="__STATIC__/admin/js/jquery.min.js"></script>
<script src="__STATIC__/plugins/layer/layer.js"></script>
<!--
在线资源链接
<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/layer/3.0/layer.min.js"></script>
-->
<!--页面折合代码-->
<script src="__STATIC__/index/js/index_1.js" type="text/javascript"></script>
<script src="__STATIC__/index/js/jquery.qrcode.min.js" type="text/javascript"></script>
<script>
    var uid = "<?php echo \think\Session::get('bbszhouqiuid'); ?>";
    var nickname = "<?php echo \think\Session::get('bbszhouqiusername'); ?>";
    //检测是否登陆
    function isLogin() {
        if (!uid){
            layer.confirm('您还未登陆,是否前去登陆？', {
                btn: ['快点O(∩_∩)O','等会吧']
            }, function(){
                window.location.href = "/login";
            }, function(){
                layer.msg('我会等你的噢',{time:1000});
            });
            return false;
        }
    }
    //添加表单提交
    $("#formSubmitAdd").click(function () {
        var form = $("form");
        $.post(form.attr('action'),form.serialize(),success);
    });

    //退出登陆
    $("#logout").click(function () {
        $.get('/logout',{},original);
    });

    //请求成功回调函数
    function success(res) {
        layer.msg(res.msg,{time:2000}, function () {
            if (res.code == 1) {
                window.location = document.referrer;
            }else{
                window.location.reload();
            }
        });
    }
    //原页刷新函数
    function original(res) {
        layer.msg(res.msg,{time:2000}, function () {
            window.location.reload();
        });
    }

    //二维码生产
    /*jQuery(function(){
        $(".getQRCode").mouseenter(function () {
            $type = 'users';
            $id   = 1;
            var postData = {type:$type,id:$id};
            $.get('/index/common/qrcode',postData,function (res) {
                var content = res;
                $('#output').qrcode({
                    render	: "table",
                    width   : 200,
                    height   : 200,
                    text	: content
                });
            });
        });
        $(".getQRCode").mouseleave(function () {
            $('#output').html('');
        });
    });*/
</script>
<!--顶部内容结束-->

<script  src="__STATIC__/plugins/kindeditor/kindeditor-all-min.js"></script>
<script  src="__STATIC__/plugins/kindeditor/lang/zh-CN.js"></script>
<script>
    //编辑器
    KindEditor.ready(function(K) {
        editor  = K.create('#editor_id');
        $("#comment").click(function(){
            isLogin();
            var data = {
                '__token__':"<?php echo \think\Request::instance()->token(); ?>",
                'content':editor.text(),
                'post_id':"<?php echo $information['id']; ?>",
                'post_user_id':"<?php echo $information['post_user_id']; ?>",
                'reply_user_id':uid,
                'reply_user_name':"<?php echo \think\Cookie::get('bbszhouqiusername'); ?>",
            };
            $.post("<?php echo url('comment'); ?>",data,original);
        });
    });
    //支持
    $(".review-c").click(function () {
        sendAttitude(1,$(this));
    });
    //反对
    $(".browse-c").click(function () {
        sendAttitude(2,$(this));
    });

    function sendAttitude(attitude,that){
        var res = isLogin();
        if (!res)return false;
        var comment_user = that.parent().parent().data('user');
        var id = that.parent().parent().data('id');
        var data = {
            "id":id,
            "uid":uid,
            "attitude":attitude,
            "post_user_id":uid,
            "post_user_name":nickname,
            "get_user_id":comment_user,
            "content_id":id,
        };

        $.post("<?php echo url('attitude'); ?>",data,function (res) {
            var data = JSON.parse(res);
            if (data.status == 1){
                that.attr('src',data.icon);
                that.next().html(data.num);
                layer.msg(data.message,{time:2000});
            }else{
                layer.msg(data.message,{time:2000});
            }
        });
    }
</script>

</body>
</html>

