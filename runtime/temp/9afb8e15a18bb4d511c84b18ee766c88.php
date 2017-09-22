<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\wamp64\www\bbs\public/../application/index\view\login\register.html";i:1505913524;s:62:"D:\wamp64\www\bbs\public/../application/index\view\layout.html";i:1505920680;}*/ ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>爱编程论坛</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_common_1.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_portal_index_1.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/main_1.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/flexslider_1.css" />
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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
    <div id="ct" class="ptm wp cl">
        <div class="mn">
            <div class="bm" id="main_message">
                <div class="bm_h bbs" id="main_hnav">
                    <span class="y">
                        <a href="/login" class="xi2">已有帐号？前去登陆</a>
                    </span>
                </div>

                <p id="returnmessage4"></p>
                <form method="post" action="/register">
                    <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
                    <div id="layer_reg" class="bm_c">
                        <div class="mtw">
                            <div id="reginfo_a">
                                <div class="rfm">

                                </div>
                                <div class="rfm">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th><span class="rq">*</span><label >用户名:</label></th>
                                                <td><input type="text" name="username" class="px" tabindex="1" value="" autocomplete="off" size="25" maxlength="15"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="rfm">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th><span class="rq">*</span><label >密码:</label></th>
                                                <td><input type="password" name="password" size="25" tabindex="1" class="px"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="rfm">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th><span class="rq">*</span><label>确认密码:</label></th>
                                                <td><input type="password" name="repassword" size="25" tabindex="1" value="" class="px"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label>邮箱:</label></th>
                                            <td><input type="text" name="email" size="25" tabindex="1" value="" class="px"></td>
                                        </tr>
                                        </tbody>
                                    </table>
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

                    </div>

                    <div id="layer_reginfo_b">
                        <div class="rfm mbw bw0">
                            <table width="100%">
                                <tbody>
                                <tr>
                                    <th>&nbsp;</th>
                                    <td>
                                        <em>&nbsp;</em>
                                            <a class="pn pnc" id="formSubmitAdd" tabindex="1">
                                                <strong>提交</strong>
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
        <div class="copyright">
            <h6>Powered by
                <strong><a href="http://www.discuz.net" target="_blank">THINKPHP5.0---</a></strong> <em>5.0.9</em>
            </h6>
            <div id="flk" class="y">
                <p>
                    <a href="archiver/" >Archiver</a>
                    <span class="pipe">|</span>
                    <a href="forum.php?mobile=yes" >手机版</a>
                    <span class="pipe">|</span>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/layer/3.0/layer.min.js"></script>
<script>
    //添加表单提交
    $("#formSubmitAdd").click(function () {
        var form = $("form");
        $.post(form.attr('action'),form.serialize(),success);
    });

    //退出登陆
    $("#logout").click(function () {
        $.get('/logout',{},function (res) {
            parent.layer.msg(res.msg,{time:2000}, function () {
                if (res.code == 1) {
                    alert(res.msg);
                    window.location.reload();
                }
            });
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

