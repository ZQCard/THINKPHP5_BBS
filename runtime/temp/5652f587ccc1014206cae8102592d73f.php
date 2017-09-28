<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wamp64\www\bbs\public/../application/admin\view\login\check.html";i:1506039767;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>后台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico"> <link href="__STATIC__/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__STATIC__/admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name" style="color: #0a6aa1;">bbs</h1>

        </div>
        <form class="m-t" role="form" action="">
            <?php echo token(); ?>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="用户名" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="密码" required="">
            </div>
            <div class="form-group">
                <input type="text" name="captcha" class="form-control" placeholder="验证码" required="">
                <img id="captcha" src="<?php echo captcha_src(); ?>" alt="captcha" />
            </div>
            <a id="formSubmit" class="btn btn-primary block full-width m-b">登 录</a>
        </form>
    </div>
</div>
<!-- 全局js -->
<script src="__STATIC__/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="__STATIC__/admin/js/plugins/layer/layer.min.js"></script>
</body>
<script>
    $("#captcha").click(function () {
        $(this).attr('src',"<?php echo captcha_src(); ?>");
    });
    $("#formSubmit").click(function () {
        var form = $("form");
        $.post(form.attr('action'),form.serialize(),success);
    });
    function success(res) {
        layer.msg(res.msg,{time:2000}, function () {
            if (res.code == 1) {
                window.location.href = "<?php echo url('admin/index/index'); ?>";
            }else{
                //window.location.reload();
            }
        });
    }
</script>
</html>
</body>

</html>
