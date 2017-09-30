<?php
use think\Route;
//后台路由
Route::group('admin',function (){
    Route::rule('login','admin/login/index','get');
    Route::rule('login','admin/login/login','post');
    Route::rule('index','admin/index/index','get');
    Route::resource('administrator','admin/administrator');
    Route::resource('category','admin/category');
    Route::resource('banner','admin/banner');
    Route::resource('link','admin/link');
    Route::resource('module','admin/module');
    Route::resource('information','admin/information');
    Route::resource('config','admin/config');
    Route::resource('posts','admin/posts');
    Route::get('test','admin/test/index');
});


//前台路由
//资讯路由
Route::get('information/:id','index/information/information');
Route::get('information','index/information/index');
//论坛
Route::get('forum/:id','index/forum/forum');
Route::get('forum','index/forum/index');
//登陆注册验证退出
Route::rule('register','index/login/register','GET|POST');
Route::rule('login','index/login/index','GET|POST');
Route::get('check','index/users/check');
Route::get('logout','index/common/logout');
Route::get('sendMail','app\index\controller\Common::sendEmail');


//测试控制器
Route::get('test','index/test/index');