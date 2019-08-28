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

Route::get('/', function () {
    return view('welcome');
});

//后台路由
Route::namespace('Admin')->prefix('admin')->group(function(){
	//后台首页
	Route::get('/index','IndexController@index');

	//用户管理
	//用户显示页面
	Route::get('user/index','UserController@index');
});

//=================================================================

//前台首页
Route::get('/','Home\IndexController@index');

//前台路由
Route::namespace('Home')->prefix('home')->group(function(){
	//注册页面
	Route::get('register/index','RegisterController@index');
	//登录页面
	Route::get('index/login','IndexController@login');
});