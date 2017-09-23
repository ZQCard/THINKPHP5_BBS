<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\wamp64\www\bbs\public/../application/admin\view\module\create.html";i:1506001113;s:62:"D:\wamp64\www\bbs\public/../application/admin\view\layout.html";i:1505748834;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>测试管理后台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link href="__STATIC__/admin/css/style.css?v=4.1.0" rel="stylesheet">
    
    
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">BBS</strong>
                                    </span>
                                </span>
                        </a>
                    </div>
                    <div class="logo-element">
                    </div>
                </li>
                <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                    <span class="ng-scope">分类</span>
                </li>
                <li>
                    <a class="J_menuItem" href="<?php echo url('admin/index/index'); ?>">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">主页</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span class="nav-label">管理员管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="<?php echo url('admin/administrator/index'); ?>">查看管理员</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span class="nav-label">前台页面管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="<?php echo url('admin/banner/index'); ?>">轮播图管理</a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="<?php echo url('admin/category/index'); ?>">导航分类管理</a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="<?php echo url('admin/link/index'); ?>">友情链接管理</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span class="nav-label">论坛管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="<?php echo url('admin/module/index'); ?>">论坛模块管理</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span class="nav-label">资讯管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="<?php echo url('admin/information/index'); ?>">资讯列表</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    
<div id="page-wrapper" class="gray-bg dashbard-1">

    <div class="row J_mainContent" id="content-main">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加模块</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" method="post" action="" id="commentForm" novalidate="novalidate">
                        <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">名称：</label>
                            <div class="col-sm-8">
                                <input name="name" value="" minlength="2" type="text" class="form-control" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">图片：</label>
                            <div class="col-sm-8">
                                <label>
                                    <img style="max-height:100%;max-width:100%;width:300px;height:200px;vertical-align:middle;" class="fileimg" src="__STATIC__/admin/img/up.jpg" />
                                    <input type="file" style="display: none;" id="file" class="files" />
                                    <input type="hidden" name="pic" id="nowPic" value="">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">排序值：</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sort" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">父级分类：</label>
                            <div class="col-sm-8">
                                <select name="pid" id="" style="height: 30px;">
                                    <option value="0">顶级分类</option>
                                    <?php if(is_array($firstModel) || $firstModel instanceof \think\Collection || $firstModel instanceof \think\Paginator): if( count($firstModel)==0 ) : echo "" ;else: foreach($firstModel as $key=>$fmodule): ?>
                                        <option value="<?php echo $fmodule['id']; ?>"><?php echo $fmodule['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">状态：</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox"  checked="" class="onoffswitch-checkbox" name="status" id="example2">
                                        <label class="onoffswitch-label" for="example2">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <a class="btn btn-primary" id="formSubmitAdd">提交</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--右侧部分结束-->
</div>
<!--<audio id="tips">
    <source  src="__PUBLIC__/tips/tips.mp3" type="audio/mp3">
</audio>-->
<!-- 全局js -->
<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/metisMenu/2.7.0/metisMenu.min.js"></script>
<script src="//cdn.bootcss.com/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src="//cdn.bootcss.com/layer/3.0/layer.min.js"></script>

<!-- 自定义js -->
<script src="__STATIC__/admin/js/hAdmin.js?v=4.1.0"></script>
<!-- 第三方插件 -->
<script src="//cdn.bootcss.com/pace/1.0.2/pace.min.js"></script>
<script>
    //添加表单提交
    $("#formSubmitAdd").click(function () {
        var form = $("form");
        var url = "/admin/<?php echo $controller; ?>";
        $.post(url,form.serialize(),success);
    });

    //修改表单提交
    $("#formSubmitEdit").click(function () {
        var form = $("form");
        var id = $(this).data('id');
        $.ajax({
            type    : "PUT",
            url     : "/admin/<?php echo $controller; ?>/"+id,
            data    : form.serialize(),
            success : success
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
    //删除记录
    $(".delete").click(function () {
        that = $(this);
        var id   = that.data('id');
        var name = that.data('name');
        var type = that.data('type');
        var url = "<?php echo $controller; ?>"+"/"+id;

        //type为2逻辑删除   为1物理删除
        if (type !=2) type = 1
        layer.confirm('是否要删除 '+name+' ?', {
            btn: ['确定','取消']
        },function () {
            $.ajax({
                type    : "DELETE",
                url     : url,
                data    : {type:type},
                success : successDel
            });
        });
    });
    //删除数据请求回调函数或者修改数据重新刷新页面
    function successDel(res) {
        layer.msg(res.msg,{time:2000}, function () {
            if (res.code == 1) {
                window.location.reload();
            }else{
                window.location.reload();
            }
        });
    }

    /**
     *
     * @param id  主键id
     * @param name 字段名称
     * @param value 字段值
     */
    function sendChange(id,name,value) {
        $.ajax({
            type : "PATCH",
            url  : "/admin/<?php echo $controller; ?>/changeInfo",
            data : {id:id,name:name,value:value},
            success : successDel
        });
    }
</script>

<script>
    $(document).ready(function() {
        var url = "<?php echo url('admin/common/upload',['type' => 'module']); ?>";
        $("#file").change(function() {
            //普通上传
            var upload = function(f) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', url, true);
                var formData;
                formData = new FormData();
                formData.append('file', f);
                xhr.onreadystatechange = function(response) {
                    if (xhr.readyState == 4 && xhr.status == 200 && xhr.responseText != "") {
                        var text = JSON.parse(xhr.responseText);
                        $(".fileimg").attr("src",text);
                        $("#file").remove();
                        $("#nowPic").val(text);
                    } else if (xhr.status != 200 && xhr.responseText) {
                    }
                };
                xhr.send(formData);
            };
            if ($("#file")[0].files.length > 0) {
                upload($("#file")[0].files[0]);
            } else {
                console && console.log("form input error");
            }
        })
    });
</script>

</body>
</html>