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

  //分类管理
  //分类显示页面
  Route::get('soft/index','SoftController@index');
  //添加分类页面
  Route::get('soft/create','SoftController@create');
  //处理添加
  Route::post('soft/store','SoftController@store');

  //品牌管理
  //品牌显示页面
  Route::get('brand/index','BrandController@index');

  //商品管理
  //商品显示页面
  Route::get('good/index','GoodController@index');




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
