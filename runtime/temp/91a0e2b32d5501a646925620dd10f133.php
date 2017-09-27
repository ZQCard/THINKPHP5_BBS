<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\wamp64\www\bbs\public/../application/index\view\information\index.html";i:1506039767;s:62:"D:\wamp64\www\bbs\public/../application/index\view\layout.html";i:1506318935;}*/ ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>学编程论坛</title>
    <meta name="keywords" content='<?php echo $config["keywords"]; ?>' />
    <meta name="description" content="<?php echo $config['description']; ?>" />
    <!--本地资源链接-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_common_1.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_portal_index_1.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/main_1.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/flexslider_1.css" />
    <link href="__STATIC__/admin/css/bootstrap.min.css" rel="stylesheet">
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
                        <span class="user-name hide-row">test123</span>
                    </div>
                    <div class="ui-login-status" style="display: none;">
                        <ul>
                            <li class="user-primary-info">
                                <p class="user-avatar-name">
                                    <span class="user-avatar"><a href="home.php?mod=space&amp;uid=3"><img src="http://123.56.195.228/rw/chuizi/uc_server/avatar.php?uid=3&amp;size=small"></a></span>
                                    <span class="user-name hide-row"><a href="home.php?mod=space&amp;uid=3" target="_blank" title="访问我的空间">test123</a></span>
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
    <div class="wp">
        <!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
    </div>

    <div class="main clearfix">
        <div class="container-sm mtm clearfix">
            <div class="section">
                <div class="content">
                    <h4>资讯</h4>
                    <div class="section-content">
                        <!--文章开始-->
                        <?php if(is_array($informations) || $informations instanceof \think\Collection || $informations instanceof \think\Paginator): if( count($informations)==0 ) : echo "" ;else: foreach($informations as $key=>$information): ?>
                        <div class="content-box">
                            <h2><a href="/information/<?php echo $information['id']; ?>" target="_blank" style=""><?php echo $information['title']; ?></a> </h2>
                            <ul class="post-info">
                                <li class="author"><?php echo $information['author']; ?></li>
                                <li class="time">发表于：<?php echo date("Y-m-d",$information['create_time']); ?></li>
                                <li class="review"><?php echo $information['look']; ?></li>
                                <li class="browse"><?php echo $information['comment']; ?></li>
                            </ul>
                            <div class="content-picture" style="margin-top: 20px;">
                                <a href="/information/<?php echo $information['id']; ?>"><img src="<?php echo $information['pic']; ?>"></a>
                            </div>
                            <p>
                                <span> <a target="_blank" href="/information/<?php echo $information['id']; ?>">查看文章</a></span>
                            </p>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <!--文章结束-->
                    </div>
                    <div class="forum-list-pager clearfix">
                        <div class="pager-wrapper clearfix">
                            <div class="pgs cl">
                                <?php echo $informations->render(); ?>
                            </div>
                        </div>
                    </div>
                    <!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]-->
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

    <div class="wp mtn">
        <!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
    </div>
</div>

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
<script src="__STATIC__/admin/js/plugins/layer/layer.min.js"></script>
<!--
在线资源链接
<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/layer/3.0/layer.min.js"></script>
-->
<!--页面折合代码-->
<script src="__STATIC__/index/js/index_1.js" type="text/javascript"></script>
<script src="__STATIC__/index/js/jquery.qrcode.min.js" type="text/javascript"></script>
<script>
    //添加表单提交
    $("#formSubmitAdd").click(function () {
        var form = $("form");
        $.post(form.attr('action'),form.serialize(),success);
    });

    //退出登陆
    $("#logout").click(function () {
        $.get('/logout',{},function (res) {
            if (res.code == 1) {
                alert(res.msg);
                window.location.reload();
            }
        });
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



</body>
</html>

