<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"D:\wamp64\www\bbs\public/../application/admin\view\administrator\index.html";i:1504798280;s:62:"D:\wamp64\www\bbs\public/../application/admin\view\layout.html";i:1505041200;}*/ ?>
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
                                        <strong class="font-bold">TP5SHOP</strong>
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
                            <a class="J_menuItem" href="<?php echo url('admin/category/index'); ?>">导航管理</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" id="linkOrder" href="#">
                        <i class="fa fa-bell"></i> <span class="label label-primary"></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row J_mainContent" id="content-main">
        <div class="col-sm-12">
            <!-- Example Toolbar -->
            <div class="example-wrap">
                <h4 class="example-title">管理员管理</h4>
                <div class="example">

                    <div class="bootstrap-table">
                        <div class="fixed-table-toolbar"><div class="bars pull-left"><div class="btn-group hidden-xs" id="exampleToolbar" role="group">
                            <a type="button"  href="<?php echo url('create'); ?>" class="btn btn-outline btn-default"  title="添加管理员">
                                <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                            </a>
                            <button class="btn btn-default btn-outline" type="button" onclick="window.location.reload();" title="刷新">
                                <i class="glyphicon glyphicon-repeat"></i>
                            </button>
                        </div>
                        </div>

                        </div>
                        <div class="fixed-table-container" style="padding-bottom: 0px;">
                            <div class="fixed-table-header" style="display: none;">
                                <table></table>
                            </div>
                            <div class="fixed-table-body">
                                <table id="exampleTableToolbar" data-mobile-responsive="true" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th data-field="name" tabindex="0">
                                            <div class="th-inner ">序号</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th data-field="name" tabindex="0">
                                            <div class="th-inner ">用户名</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="name" tabindex="0">
                                            <div class="th-inner ">手机号码</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="name" tabindex="0">
                                            <div class="th-inner ">身份</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="name" tabindex="0">
                                            <div class="th-inner ">上次登陆ip</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="name" tabindex="0">
                                            <div class="th-inner ">状态</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="name" tabindex="0">
                                            <div class="th-inner ">是否删除</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th data-field="name" tabindex="0">
                                            <div class="th-inner ">登陆次数</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="name" tabindex="0">
                                            <div class="th-inner ">更新时间</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="" data-field="name" tabindex="0">
                                            <div class="th-inner ">创建时间</div>
                                            <div class="fht-cell"></div>
                                        </th>

                                        <th style="" data-field="name" tabindex="0">
                                            <div class="th-inner">操作</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$admin): ?>
                                    <tr class="no-records-found">
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $admin->username; ?></td>
                                        <td><?php echo $admin->phone; ?></td>
                                        <td><?php echo $admin->auth_id; ?></td>
                                        <td><?php echo $admin->last_login_ip; ?></td>
                                        <td>
                                            <div class="switch">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" <?php if($admin->status == '正常'): ?>checked=""<?php endif; ?> class="onoffswitch-checkbox statusChange" id="status-<?php echo $admin->status; ?>-<?php echo $admin->id; ?>">
                                                    <label class="onoffswitch-label" for="status-<?php echo $admin->status; ?>-<?php echo $admin->id; ?>">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $admin->is_del; ?></td>
                                        <td><?php echo $admin->login_times; ?></td>
                                        <td><?php echo $admin->update_time; ?></td>
                                        <td><?php echo $admin->create_time; ?></td>
                                        <td>
                                            <a href="<?php echo url('admin/administrator/edit',['id'=>$admin->id]); ?>" type="button" class="btn btn-outline btn-default"  title="修改">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a type="button" class="btn btn-outline btn-default delete" data-id="<?php echo $admin->id; ?>" data-type="2" data-name="<?php echo $admin->username; ?>"  title="删除">
                                                <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="float: right"><?php echo $data->render(); ?></div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- End Example Toolbar -->
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
    $(".statusChange").change(function () {
        var info = $(this).attr('id').split('-');
        var name = info[0];
        var status = (info[1]=='正常')?2:1;
        var id = info[2];
        sendChange(id,name,status);
    });
</script>

</body>
</html>