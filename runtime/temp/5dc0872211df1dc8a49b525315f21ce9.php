<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\wamp64\www\bbs\public/../application/index\view\forum\forum.html";i:1506005284;s:62:"D:\wamp64\www\bbs\public/../application/index\view\layout.html";i:1506004893;}*/ ?>
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
    
<link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_forum_forumdisplay.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/index/css/style_2_widthauto_1.css" />

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
                                    <tr>


                                        <td colspan="5">
                                            <div class="forum-list-content">
                                                <ul class="js-threadList">
                                                    <li>

                                                        <a class="forum-list-item-avatar" target="_blank" href="home.php?mod=space&amp;uid=1">
                                                            <img src="picture/avatar_1.php">
                                                        </a>
                                                        <dl class="forum-list-item-summary">
                                                            <dt>
                                                            <h3 class="common">
                                                                <a href="javascript:;" id="content_29" title="更多操作" onclick="CONTENT_TID='29';CONTENT_ID='stickthread_29';showMenu({'ctrlid':this.id,'menuid':'content_menu'})"></a>

                                                                <a href="forum.php?mod=viewthread&amp;tid=29&amp;extra=page%3D1" onclick="atarget(this)">坚果 Pro 全款预订细则</a>
                                                                <span title="" class="icon icon-arrow-3"></span>
                                                                <a href="javascript:void(0);" onclick="hideStickThread('29')" class="showhide y" title="隐藏置顶帖">隐藏置顶帖</a>
                                                                <span title="精华 1" class="icon icon-finepick"></span>




                                                            </h3>
                                                            </dt>
                                                            <dd><a href="home.php?mod=space&amp;uid=1" c="1" mid="card_4872">admin</a><span>发表于 2017-6-10</span>
                                                            </dd>
                                                        </dl>
                                                        <div class="forum-list-item-info">
                                                            <span><i class="icon-forum-view"></i>49</span>
                                                            <span><i class="icon-forum-comment"></i>0</span>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </td>


                                    </tr>
                                    </tbody>
                                    <!--帖子记录结束-->
                                </table><!-- end of table "forum_G[fid]" branch 1/3 -->
                            </form>
                        </div>
                    </div>

                    <!--分页开始-->
                    <a style="display: none;" class="bm_h" href="javascript:;" rel="forum.php?mod=forumdisplay&amp;fid=41&amp;page=2" curpage="1" id="autopbn" totalpage="2" picstyle="0" forumdefstyle="">下一页 »</a>
                    <script src="js/autoloadpage.js" type="text/javascript"></script>
                    <div class="forum-list-pager clearfix">
                        <div class="pager-wrapper clearfix">
                            <div class="pg"><strong>1</strong><a href="forum.php?mod=forumdisplay&amp;fid=41&amp;page=2">2</a><label><input type="text" name="custompage" class="px" size="2" title="输入页码，按回车快速跳转" value="1" onkeydown="if(event.keyCode==13) {window.location='forum.php?mod=forumdisplay&amp;fid=41&amp;page='+this.value;; doane(event);}"><span title="共 2 页"> / 2 页</span></label><a href="forum.php?mod=forumdisplay&amp;fid=41&amp;page=2" class="nxt">下一页</a></div>             </div>
                    </div>
                    <!--分页结束-->
                </div>


                <div id="fastpost" class="content forum-list-fastpost">
                    <h4><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=rule&amp;fid=41" class="forum-fastpost-rule" target="_blank">本版积分规则</a>快速发帖</h4>
                    <div id="f_pst" class="bm">

                        <div class="fastpost">
                            <form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&amp;action=newthread&amp;fid=41&amp;topicsubmit=yes&amp;infloat=yes&amp;handlekey=fastnewpost" onsubmit="return fastpostvalidate(this)">
                                <div id="fastpostreturn" style="margin:-5px 0 5px"></div>
                                <p class="fastpost-content-bottom ptm pnpost">
                                    <button class="btn-post btn-post-B" type="submit" name="topicsubmit" id="fastpostsubmit" value="topicsubmit" tabindex="13"><strong>发表帖子</strong></button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sidebar">
                <div class="profile">
                    <a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=forum&amp;id=41&amp;handlekey=favoriteforum&amp;formhash=ba9699b0" class="collect"><i class="icon-fav-star"></i>收藏本版</a>
                    <div class="profile-card">
               <span class="avatar">
                                                   <img src="picture/common_41_icon_1.png" alt="">
                                       </span>
                        <p><span class="name">官方动态</span></p>
                    </div>
                    <ul class="profile-col-3 clearfix">
                        <li><span>今日</span><em>0</em></li>
                        <li><span>主题</span><em>28</em></li>
                        <li><span>排名</span><em>15</em></li>
                    </ul>
                </div>
                <!--[diy=um_forumdisplay_diy1]--><div id="um_forumdisplay_diy1" class="area"><div id="frameQ90vU9" class=" frame move-span cl frame-1"><div id="frameQ90vU9_left" class="column frame-1-c"><div id="frameQ90vU9_left_temp" class="move-span temp"></div><div id="portal_block_13" class="block move-span"><div id="portal_block_13_content" class="dxb_bc"><div class="right-module plate-recommend">
                <h4>版块推荐</h4>

                <ul class="plate-list clearfix">
                    <li style="background: url(images/common_50_icon_1.png) no-repeat 20px center;background-size: 26px 26px;-webkit-background-size: 26px 26px;">
                        <a href="forum.php?mod=forumdisplay&amp;fid=50" target="_blank">安卓应用</a>
                    </li>
                </ul>
            </div> </div></div></div></div></div><!--[/diy]-->
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



</body>
</html>

