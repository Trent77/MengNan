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
	//用户注册页面
	Route::get('user/create','UserController@create');
//---------------------------------------------------------------------------------------------------
	//分类管理
	//分类列表
	Route::get('category/index','CategoryController@index');
	//添加分类
	Route::post('/category/store','CategoryController@store');
	// 修改分类
	Route::get('category/edit/{id}','CategoryController@edit');

	Route::post('category/update/{id}','CategoryController@update');
	//删除
	Route::get('category/destroy/{id}','CategoryController@destroy');
//----------------------------------------------------------------------------------------------------
	//订单管理,订单列表
	Route::get('order/index','OrderController@index');

});