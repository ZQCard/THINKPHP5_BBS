<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\wamp64\www\bbs\public/../application/index\view\forum\index.html";i:1506039767;s:62:"D:\wamp64\www\bbs\public/../application/index\view\layout.html";i:1507537501;}*/ ?>
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
                            <li class="user-message">
                                <a href="home.php?mod=space&amp;do=pm">
                                    消息 <span style="color: red"  id="userNotice"></span>
                                </a>
                            </li>
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

    <style id="diy_style" type="text/css">#framefGO92O {  border:#000000 0px none !important;margin:0px !important;background-color:#f5f5f5 !important;background-image:none !important;}#portal_block_3 {  border:0px none !important;margin:0px !important;}#portal_block_3 .dxb_bc {  margin:0px !important;}#frameMuaMy1 {  border:#000000 0px none !important;margin:0px !important;background-color:#f5f5f5 !important;background-image:none !important;}</style>

    <div class="main forums-page clearfix">
        <div class="container-sm">
            <div class="section">
                <?php if(is_array($module) || $module instanceof \think\Collection || $module instanceof \think\Paginator): if( count($module)==0 ) : echo "" ;else: foreach($module as $key=>$fModule): ?>
                <!--推荐大模块开始-->
                <div class="foldableBox content">
                    <h4>
                        <a href="#"><?php echo $fModule['name']; ?></a>
                    </h4>
                    <div class="forumList-sm section-content">
                        <ul class="clearfix">
                            <!--推荐子模块开始-->
                            <?php if(is_array($fModule['child']) || $fModule['child'] instanceof \think\Collection || $fModule['child'] instanceof \think\Paginator): if( count($fModule['child'])==0 ) : echo "" ;else: foreach($fModule['child'] as $key=>$cModule): ?>
                            <li>
                                <a href="/forum/<?php echo $cModule['id']; ?>">
                                    <img src="<?php echo $cModule['pic']; ?>" align="left" alt="">
                                </a>
                                <dl>
                                    <dt>
                                        <h2><a href="/forum/<?php echo $cModule['id']; ?>"><?php echo $cModule['name']; ?></a></h2>
                                    </dt>
                                    <dd>帖数：<?php echo $cModule['post_num']; ?></dd>
                                </dl>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--推荐子模块结束-->
                        </ul>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <!--推荐大模块结束-->
            </div>
            <div class="sidebar">
                <!--[diy=um_forum_diy1]-->
                <!--推荐帖子开始-->
                <div id="um_forum_diy1" class="area">
                    <div id="framefGO92O" class=" frame move-span cl frame-1">
                        <div id="framefGO92O_left" class="column frame-1-c">
                            <div id="framefGO92O_left_temp" class="move-span temp">

                            </div>
                            <div id="portal_block_3" class="block move-span">
                                <div id="portal_block_3_content" class="dxb_bc">
                                    <div class="right-module ">
                <h4>帖子推荐</h4>
                <ul class="thread-list"><li>

                    <a target="_blank" href="forum.php?mod=viewthread&amp;tid=39"><img src="picture/191614swy7upuupi7y6p98_1.png" alt="转至锤子"></a>
                    <dl>
                        <dt><a target="_blank" href="forum.php?mod=viewthread&amp;tid=39">转至锤子</a></dt>
                        <dd>
                            一次性转移其它安卓手机数据。
                        </dd>

                    </dl>

                </li><li>

                    <a target="_blank" href="forum.php?mod=viewthread&amp;tid=38"><img src="picture/191545khayuhmeif7mavhv_1.png" alt="锤子桌面"></a>
                    <dl>
                        <dt><a target="_blank" href="forum.php?mod=viewthread&amp;tid=38">锤子桌面</a></dt>
                        <dd>
                            从未如此美观、易用、人性化。
                        </dd>

                    </dl>

                </li><li>

                    <a target="_blank" href="forum.php?mod=viewthread&amp;tid=37"><img src="picture/191455ibhn8va8zplu6h4l_1.png" alt="HandShaker"></a>
                    <dl>
                        <dt><a target="_blank" href="forum.php?mod=viewthread&amp;tid=37">HandShaker</a></dt>
                        <dd>
                            在 Mac&amp;PC 上方便地管理手机。
                        </dd>

                    </dl>

                </li><li>

                    <a target="_blank" href="forum.php?mod=viewthread&amp;tid=36"><img src="picture/191427dk66qj2z686li8qt_1.png" alt="锤子邮件"></a>
                    <dl>
                        <dt><a target="_blank" href="forum.php?mod=viewthread&amp;tid=36">锤子邮件</a></dt>
                        <dd>
                            简洁、易用、优雅、精美。
                        </dd>

                    </dl>

                </li><li>

                    <a target="_blank" href="forum.php?mod=viewthread&amp;tid=35"><img src="picture/191403pbse8bgeb1e1b2gr_1.png" alt="锤子便笺"></a>
                    <dl>
                        <dt><a target="_blank" href="forum.php?mod=viewthread&amp;tid=35">锤子便笺</a></dt>
                        <dd>
                            雅致的信纸、精心的排版。
                        </dd>

                    </dl>

                </li><li>

                    <a target="_blank" href="forum.php?mod=viewthread&amp;tid=34"><img src="picture/191206y9z3otzpo2qc9o59_1.png" alt="锤子时钟"></a>
                    <dl>
                        <dt><a target="_blank" href="forum.php?mod=viewthread&amp;tid=34">锤子时钟</a></dt>
                        <dd>
                            时钟拟物化的界面风格和动画。
                        </dd>

                    </dl>

                </li></ul>
            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--推荐帖子结束-->
                <!--[/diy]-->
            </div>
        </div>
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
    //获取消息数量
    getMessageNum();
    function getMessageNum() {
        if (!uid) return false;
        $.post("<?php echo url('common/getMessageNum'); ?>",{uid:uid},function (res) {
            var num = 0;
            if (res.code == 1){
                num = res.msg.message_num;
            }
            $("#userNotice").html('('+num+')');
        })
    }
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
        return true;
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

    //二维码生成
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

