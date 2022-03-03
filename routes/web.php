<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware'=>'isUserLog'], function (){
    Route::get('/', 'Usercontroller@index');
    Route::get('/index', 'Usercontroller@index');
    Route::get('user/logout', 'Usercontroller@logout');
});

//Route::get('/', 'Usercontroller@index');

Route::group(['prefix'=>'user'], function (){
    // 用户添加注册路由
    Route::get("add", 'Usercontroller@add');

// 用户执行添加路由
    Route::post('store', 'Usercontroller@store');

    // 用户登录路由
    Route::get('login', 'Usercontroller@login');

    // 登录判断
    Route::post('douserlog','Usercontroller@douserlog');
});

// 用户列表页路由
//Route::get('user/index', 'Usercontroller@index');

// admin
//Route::get('admin', 'Usercontroller@admin');


Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function (){
    // 后台登录

    Route::get('login', 'LoginController@login');
// 后台登录验证
    Route::post('dologin', 'LoginController@doLogin');
    // 删除文章
    Route::get('del', 'LoginController@doDel');

    Route::get('info', 'LoginController@info');
});


// 必须登录 才能操作  admin session 验证
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'isLogin'], function (){
    // 后台首页
    Route::get('index', 'LoginController@index');
    // 退出登录
    Route::get('logout', 'LoginController@logout');
});


// article 操作
//Route::get('article/add', 'Article\ArticleController@add');
Route::group(['prefix'=>'article', 'namespace'=>'Article', 'middleware'=>'isUserLog'], function (){
    Route::get('add', 'ArticleController@add');
    Route::post('doadd', 'ArticleController@doAdd');
    Route::get('info', 'ArticleController@info');
    // add comment
    Route::post('addc', 'ArticleController@addC');
});