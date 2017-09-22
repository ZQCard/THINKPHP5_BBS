<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"D:\wamp64\www\bbs\public/../application/index\view\information\information.html";i:1505823982;s:62:"D:\wamp64\www\bbs\public/../application/index\view\layout.html";i:1505824909;}*/ ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>爱编程论坛</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_common_1.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_portal_index_1.css" /><script type="text/javascript">var STYLEID = '2', STATICURL = 'static/', IMGDIR = 'template/mountain_chuizi/michael_img/common/', VERHASH = 'I28', charset = 'utf-8', discuz_uid = '0', cookiepre = 'FQ7o_2132_', cookiedomain = '', cookiepath = '/', showusercard = '1', attackevasive = '0', disallowfloat = 'newthread', creditnotice = '1|威望|,2|金钱|,3|贡献|', defaultstyle = '', REPORTURL = 'aHR0cDovLzEyMy41Ni4xOTUuMjI4L3J3L2NodWl6aS9wb3J0YWwucGhw', SITEURL = 'http://123.56.195.228/rw/chuizi/', JSPATH = 'static/js/', CSSPATH = 'data/cache/style_', DYNAMICURL = '';</script>
    <script src="__STATIC__/index/js/jquery.min_1.js" type="text/javascript"></script>
    <script src="__STATIC__/index/js/common_1.js" type="text/javascript"></script>
    <script src="__STATIC__/index/js/portal_1.js" type="text/javascript"></script>
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
            <div class="user">
                <script src="__STATIC__/index/js/logging_1.js" type="text/javascript"></script>
                <form method="post" autocomplete="off" id="lsform" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes&amp;infloat=yes&amp;lssubmit=yes" onsubmit="return lsSubmit();">
                    <div class="fastlg cl">
                        <div>
                     <span class="xi2">
                        <a id="user-login" href="">登录</a>
                     </span>
                            <span class="pipe">|</span>
                            <span class="xi2">
                        <a id="user-register" href="">注册</a>
                     </span>
                        </div>
                    </div>
                </form>
            </div>

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
                            <h1 class="ph"><?php echo $information['title']; ?> </h1>
                            <p class="xg1" style="margin: 20px;">
                                <?php echo date("Y-m-d H:i",$information['create_time']); ?><span class="pipe">|</span>
                                发布者: <a href="home.php?mod=space&amp;uid=1"><?php echo $information['author']; ?></a>
                                <span class="pipe">|</span>
                                查看: <em id="_viewnum"><?php echo $information['look']; ?></em>
                                <span class="pipe">|</span>
                                评论:<?php echo $information['comment']; ?>
                            </p>
                        </div>
                        <div class="s" style="margin: 20px">
                            <div>
                                <strong>摘要</strong><?php echo $information['brief']; ?>
                            </div>
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
<div id="back-top" class="back-top"></div>
<!--顶部内容结束-->



</body>
</html>

