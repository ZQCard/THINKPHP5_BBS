<?php
use think\Route;
//后台
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
    Route::resource('level','admin/level');
    Route::resource('points_type','admin/points_type');
});

Route::pattern([
    'id'    =>  '\d+',
]);

//miss路由  上线开启
if (!config('app_debug')){
    Route::miss('index/common/miss');
}


//前台路由
//资讯
Route::get('information/:id','index/information/information');
Route::get('information','index/information/index');
//论坛
Route::get('forum/:id','index/forum/forum');
Route::get('forum','index/forum/index');
//帖子
Route::get('posts/:id','index/posts/index');

//登陆注册验证退出
Route::rule('register','index/login/register','GET|POST');
Route::rule('login','index/login/index','GET|POST');
//个人设置
Route::rule('setting','index/users/setting','GET|POST');

//验证hash
Route::get('check','index/users/check');
Route::get('logout','index/common/logout');

//用户相关
Route::get('user/:id','index/users/index');

//用户收藏
Route::get('favorite','index/users/favorite');
//用户积分
Route::get('points','index/users/points');
Route::get('points/log','index/users/pointslog');

//测试控制器
Route::get('test','index/test/index');