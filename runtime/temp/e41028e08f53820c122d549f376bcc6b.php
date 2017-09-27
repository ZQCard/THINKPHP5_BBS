<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\wamp64\www\bbs\public/../application/index\view\login\index.html";i:1506039767;s:62:"D:\wamp64\www\bbs\public/../application/index\view\layout.html";i:1506499021;}*/ ?>
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
    <div id="ct" class="ptm wp cl">
        <div class="mn">
            <div class="bm" id="main_message">
                <div class="bm_h bbs" id="main_hnav">
                    <span class="y">
                        <a href="/register" class="xi2">没有帐号？前去注册</a>
                    </span>
                </div>
                <p id="returnmessage4"></p>
                <form method="post" action="/login">
                    <div id="layer_reg" class="bm_c">
                        <div class="mtw">
                            <div id="reginfo_a">
                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label>用户名:</label></th>
                                            <td><input type="text" name="username" class="px" tabindex="1" value="" autocomplete="off" size="25" maxlength="15" required=""></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label>密码:</label></th>
                                            <td><input type="password" name="password" size="25" tabindex="1" class="px" required=""></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="rfm">
                                <table>
                                    <tbody>
                                    <tr>
                                        <th><span class="rq">*</span><label>验证码:</label></th>
                                        <td><div id="captcha"></div></td>
                                    </tr>
                                    <tr>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                    <div id="layer_reginfo_b">
                        <div class="rfm mbw bw0">
                            <table width="100%">
                                <tbody>
                                <tr>
                                    <th>&nbsp;</th>
                                    <td>
                                        <span id="reginfo_a_btn">
                                        <em>&nbsp;</em>
                                            <a class="pn pnc" tabindex="1">
                                                <strong id="formSubmitAdd">提交</strong>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
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
    //检测是否登陆
    function isLogin() {
        var uid = "<?php echo \think\Session::get('bbszhouqiuid'); ?>";
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
        $.get('/logout',{},function (res) {
            layer.msg(res.msg,{time:2000}, original);
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
    //原页刷新函数
    function original(res) {
        layer.msg(res.msg,{time:2000}, function () {
            if (res.code == 1) {
                window.location.reload();
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

<script src="http://static.geetest.com/static/tools/gt.js"></script>
<script>
    var handler = function (captchaObj) {
        captchaObj.appendTo("#captcha");
    };
    // 获取验证码
    $.get("/index/common/StartCaptchaServlet", function(data) {
        initGeetest({
            gt: data.gt,
            challenge: data.challenge,
            product: "popup",
            offline: !data.success
        }, handler);
    },'json');
</script>

</body>
</html>

