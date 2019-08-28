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
	Route::get('/index','IndexController@index');

	//用户管理
	//用户显示页面
	Route::get('user/index','UserController@index');
	//用户添加页面
	Route::get('user/create','UserController@create');
});