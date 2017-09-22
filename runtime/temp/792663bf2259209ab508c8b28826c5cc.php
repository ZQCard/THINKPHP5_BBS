<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\wamp64\www\bbs\public/../application/index\view\index\index.html";i:1506080572;s:62:"D:\wamp64\www\bbs\public/../application/index\view\layout.html";i:1506080339;}*/ ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>爱编程论坛</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_common_1.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_portal_index_1.css" />
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
<div id="main" class="main clearfix">
    <!--轮播图开始-->
    <div class="container-sm container-banner">
        <div id="um_portal_diy1" class="area">
            <div id="frameSLfBFf" class="frame move-span cl frame-1">
                <div id="frameSLfBFf_left" class="column frame-1-c">
                    <div id="frameSLfBFf_left_temp" class="move-span temp"></div>
                    <div id="portal_block_6" class="block move-span">
                        <div id="portal_block_6_content" class="dxb_bc">
                            <div class="banner clearfix">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <a href="forum.php?mod=viewthread&tid=3">
                                                <img src="__STATIC__/index/picture/104137nwlwbl5flmerczw5_1.png" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="forum.php?mod=viewthread&tid=2">
                                                <img src="__STATIC__/index/picture/104054k2wbowobgurvgiav_1.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="forum.php?mod=viewthread&tid=1">
                                                <img src="__STATIC__/index/picture/104007la8mx1mwo6lpb8vm_1.jpg" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--轮播图结束-->
    <div class="container-sm clearfix">
        <div id="newsbox" class="section">
            <!--[新闻资讯区域开始]-->
            <div id="um_portal_diy2" class="area">
                <div id="framepPi39N" class="frame move-span cl frame-1">
                    <div id="framepPi39N_left" class="column frame-1-c">
                        <div id="framepPi39N_left_temp" class="move-span temp"></div>
                        <div id="portal_block_7" class="block move-span">
                            <div id="portal_block_7_content" class="dxb_bc">
                                <div class="foldableBox content ">
                                    <h4>精品资讯<span class="btn-fold"></span></h4>
                                    <div class="section-content">
                                        <!--主要新闻资讯开始-->
                                        <?php if(is_array($information) || $information instanceof \think\Collection || $information instanceof \think\Paginator): if( count($information)==0 ) : echo "" ;else: foreach($information as $key=>$information): ?>
                                        <div class="content-box">
                                            <h2>
                                                <a href="/information/<?php echo $information['id']; ?>">
                                                    <?php echo $information['title']; ?>
                                                </a>
                                            </h2>
                                            <ul class="post-info">
                                                <li class="author"><?php echo $information['author']; ?></li>
                                                <li class="time"><?php echo date("Y-m-d",$information['create_time']); ?></li>
                                                <li class="review"><?php echo $information['look']; ?></li>
                                                <li class="browse"><?php echo $information['comment']; ?></li>
                                            </ul>
                                            <div class="content-picture">
                                                <a href="/information/<?php echo $information['id']; ?>">
                                                    <img src="<?php echo $information['pic']; ?>" alt="">
                                                </a>
                                            </div>
                                            <p>
                                         <span>
                                            <a href="/information/<?php echo $information['id']; ?>">查看全文</a>
                                         </span>
                                            </p>
                                        </div>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        <!--主要新闻资讯结束-->
                                        <div id="newsMore" class="more">
                                            <a href="/information">查看更多资讯</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--[/新闻资讯区域结束]-->
        </div>
        <!--侧边栏开始-->
        <div class="sidebar">
            <!--[推荐栏目开始]-->
            <div id="um_portal_diy3" class="area">
                <div id="frameM53DzE" class="frame move-span cl frame-1">
                    <div id="frameM53DzE_left" class="column frame-1-c">
                        <div id="frameM53DzE_left_temp" class="move-span temp"></div>
                        <div id="portal_block_9" class="block move-span">
                            <div id="portal_block_9_content" class="dxb_bc">
                                <div class="right-module plate-recommend">
                                    <h4>版块推荐</h4>
                                    <ul class="plate-list clearfix">
                                        <!--推荐位开始-->
                                        <?php if(is_array($module) || $module instanceof \think\Collection || $module instanceof \think\Paginator): if( count($module)==0 ) : echo "" ;else: foreach($module as $key=>$module): ?>
                                        <li style="background: url(__STATIC__/index/images/common_50_icon_1.png) no-repeat 20px center;background-size: 26px 26px;-webkit-background-size: 26px 26px;">
                                            <a href="/forum/<?php echo $module['id']; ?>"><?php echo $module['name']; ?></a>
                                        </li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        <!--推荐位结束-->
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--[推荐栏目结束]-->
            <!--[二级推荐位开始]-->
            <div id="um_portal_diy5" class="area">
                <div id="frameYoLW02" class="frame move-span cl frame-1">
                    <div id="frameYoLW02_left" class="column frame-1-c">
                        <div id="frameYoLW02_left_temp" class="move-span temp"></div>
                        <div id="portal_block_10" class="block move-span">
                            <div id="portal_block_10_content" class="dxb_bc">
                                <div class="right-module application">
                                    <h4>新闻推荐</h4>
                                    <br/>
                                    <ul>
                                        <li>
                                            <?php if(is_array($newsInfo) || $newsInfo instanceof \think\Collection || $newsInfo instanceof \think\Paginator): if( count($newsInfo)==0 ) : echo "" ;else: foreach($newsInfo as $key=>$news): ?>
                                                <?php echo $news; ?><br/><br/>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--[二级推荐位结束]-->
        </div>
        <!--侧边栏结束-->
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
                    <a href="forum.php?mobile=yes" >手机版</a>
                    <span class="pipe">|</span>
                </p>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/layer/3.0/layer.min.js"></script>
<!--页面折合代码-->
<script src="__STATIC__/index/js/index_1.js" type="text/javascript"></script>
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
</script>
<!--顶部内容结束-->

<!--页面折合代码-->
<script src="__STATIC__/index/js/index_1.js" type="text/javascript"></script>
<!--轮播图代码-->
<script src="__STATIC__/index/js/jquery.flexslider_1.js" type="text/javascript"></script>
<!--分页代码
<script src="__STATIC__/index/js/jquery.pagination_1.js" type="text/javascript"></script>-->
<script type="text/javascript">
    (function($){
        function pageselectCallback(page_index, jq){
            var new_content = "";
            if(page_index == 0){
                new_content = $('#hiddenresult div.discuss-box:lt('+(page_index+1)*10+') ').clone();

            }else{
                new_content = $('#hiddenresult div.discuss-box:gt('+(page_index*10-1)+'):lt(10) ').clone();
                $('#Pagination a:eq(1)').on('click',function(){
                    $('html,body').animate({scrollTop:$('#discussBox').offset().top}, 300);
                });
                $('html,body').animate({scrollTop:$('#discussBox').offset().top}, 300);
            }
            $('#Searchresult').empty().append(new_content);
            return false;
        }

        function initPagination() {
            // count entries inside the hidden content
            var num_entries = $('#hiddenresult div.discuss-box').length;
            // Create content inside pagination element
            $("#Pagination").pagination(num_entries, {
                num_edge_entries: 2,
                num_display_entries: 6,
                callback: pageselectCallback,
                items_per_page:10,
                prev_show_always:false,
                next_show_always:false,
                link_to:"javascript:;",
            });
        }
        $(document).ready(function(){
            $('.flexslider').flexslider({
                animation: "slide"
            });
            initPagination();

        });
    })(jQuery);
</script>

</body>
</html>

