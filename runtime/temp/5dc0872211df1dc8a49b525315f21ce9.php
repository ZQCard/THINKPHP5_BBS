<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\wamp64\www\bbs\public/../application/index\view\forum\forum.html";i:1506761305;s:62:"D:\wamp64\www\bbs\public/../application/index\view\layout.html";i:1506663648;}*/ ?>
<!doctype html>
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
    <link href="__STATIC__/plugins/layer/theme/default/layer.css" rel="stylesheet">
    <!--
    在线资源链接
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    -->
    
<link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_forum_forumdisplay.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_widthauto_1.css" />

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

    <div id="main" class="main forums-page clearfix">
        <div class="container-sm">

            <div class="section">
                <!-- 注释 子版块引入 -->
                <!-- 注释 直播贴 -->
                <div class="content">
                    <div class="forum-list-panel">
                        <div class="forum-list-panel-top">
                            <ul class="forum-list-panel-category">
                                <li id="ttp_all"><a href="forum.php?mod=forumdisplay&amp;fid=41">全部</a></li>
                            </ul>
                            <button id="filter-post-btn" class="btn-post js-needLogin-btn" onclick="showWindow('newthread', 'forum.php?mod=post&amp;action=newthread&amp;fid=41')" title="发布新帖">发布新帖</button>
                        </div>
                        <div class="forum-list-panel-bottom">
                            <div class="forum-list-panel-filter clearfix">
                                <span>筛选：</span>
                            </div>
                            <div class="forum-list-panel-options clearfix">
                                <ul>
                                    <li><a href="forum.php?mod=forumdisplay&amp;fid=41">默认</a></li>
                                    <li><a href="forum.php?mod=forumdisplay&amp;fid=41&amp;filter=lastpost&amp;orderby=lastpost" class="xi2">最新</a></li>
                                    <li><a href="forum.php?mod=forumdisplay&amp;fid=41&amp;filter=digest&amp;digest=1" class="xi2">精华</a></li>
                                    <li><a href="forum.php?mod=forumdisplay&amp;fid=41&amp;filter=reply&amp;orderby=views">查看</a></li>
                                    <li><a href="forum.php?mod=forumdisplay&amp;fid=41&amp;filter=reply&amp;orderby=replies">回复/查看</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="threadlist" class="tl bm bmw">
                        <div class="bm_c">
                            <script type="text/javascript">var lasttime = 1504577144;var listcolspan= '5';</script>
                            <div id="forumnew" style="display:none"></div>
                            <form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=41&amp;infloat=yes&amp;nopost=yes">
                                <input type="hidden" name="formhash" value="ba9699b0">
                                <input type="hidden" name="listextra" value="page%3D1">
                                <table summary="forum_41" cellspacing="0" cellpadding="0" id="threadlisttableid">
                                    <!--帖子记录开始-->
                                    <tbody id="stickthread_29">
                                        <?php if(is_array($posts) || $posts instanceof \think\Collection || $posts instanceof \think\Paginator): if( count($posts)==0 ) : echo "" ;else: foreach($posts as $key=>$post): ?>
                                        <tr>
                                            <td colspan="5">
                                                <div class="forum-list-content">
                                                    <ul class="js-threadList">
                                                        <li>
                                                            <a class="forum-list-item-avatar" target="_blank" href="">
                                                                <img src="<?php echo $post->users->headimg; ?>" alt="">
                                                            </a>
                                                            <dl class="forum-list-item-summary">
                                                                <dt>
                                                                    <h3 class="common">
                                                                        <a href="/posts/<?php echo $post->id; ?>"><?php echo $post->title; ?></a>
                                                                        <?php if($post->is_good == '1'): ?>
                                                                        <span title="精华" class="icon icon-finepick"></span>
                                                                        <?php endif; ?>
                                                                    </h3>
                                                                </dt>
                                                                <dd>
                                                                    <a href="/user/<?php echo $post->users->id; ?>"><?php echo $post->users->nickname; ?></a>
                                                                    <span>发表于 <?php echo $post->create_time; ?></span>
                                                                </dd>
                                                            </dl>
                                                            <div class="forum-list-item-info">
                                                                <span><i class="icon-forum-view"></i><?php echo $post->lookover; ?></span>
                                                                <span><i class="icon-forum-comment"></i><?php echo $post->comment; ?></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                    <!--帖子记录结束-->
                                </table><!-- end of table "forum_G[fid]" branch 1/3 -->
                            </form>
                        </div>
                    </div>

                    <!--分页开始-->
                    <div class="forum-list-pager clearfix">
                        <div class="pager-wrapper clearfix">
                            <?php echo $posts->render(); ?>
                        </div>
                    </div>
                    <!--分页结束-->
                </div>
                <?php if($kindEditor == '1'): ?>
                <div class="pren pbm cl" style="margin-top: 50px;">
                    <form action="<?php echo url('comment'); ?>" method="post" enctype="multipart/form-data">
                        <textarea id="editor_id" name="content" style="width:100%;height:300px;margin: 0 auto;"><?php if(empty($sessionUid) || (($sessionUid instanceof \think\Collection || $sessionUid instanceof \think\Paginator ) && $sessionUid->isEmpty())): ?>登陆以后才能发布评论噢<?php endif; ?></textarea>
                        <div class="fastpost-content-bottom ptm pnpost">
                            <p style="width: 130px;float: right;" id="comment" class="btn-post btn-post-B"><strong>发表评论</strong></p>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
            <div class="sidebar">
                <div class="profile">
                    <a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=forum&amp;id=41&amp;handlekey=favoriteforum&amp;formhash=ba9699b0" class="collect"><i class="icon-fav-star"></i>收藏本版</a>
                    <div class="profile-card">
               <span class="avatar">
                                                   <img src="picture/common_41_icon_1.png" alt="">
                                       </span>
                        <p><span class="name"><?php echo $module['name']; ?></span></p>
                    </div>
                    <ul class="profile-col-3 clearfix">
                        <li><span>今日</span><em><?php echo $module['post_child_num']; ?></em></li>
                        <li><span>发帖数量</span><em><?php echo $module['post_num']; ?></em></li>
                        <li><span>排名</span><em><?php echo $module['sort']; ?></em></li>
                    </ul>
                </div>
            </div><!--[/diy]-->
            </div>
        </div>

    </div>

    <style id="diy_style" type="text/css">#portal_block_13 {  border:0px none !important;margin:0px !important;}#portal_block_13 .dxb_bc {  margin:0px !important;}#frameQ90vU9 {  border:#000000 0px none !important;margin:0px !important;background-color:#f5f5f5 !important;background-image:none !important;}#frameYT2EKP {  border:#000000 0px none !important;margin:0px !important;background-color:#f5f5f5 !important;background-image:none !important;}#portal_block_16 {  border:0px none !important;margin:0px !important;}#portal_block_16 .dxb_bc {  margin:0px !important;}</style>
    <!--[diy=diynavtop]--><div id="diynavtop" class="area"></div><!--[/diy]--><div class="wp">
    <!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
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
        });
    });
</script>

</body>
</html>

