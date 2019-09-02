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
	//轮播图显示
	Route::get('banner/index','BannerController@index'); 
	//轮播图添加页面
	Route::get('banner/create','BannerController@create');
	//轮播图修改页面
	Route::get('banner/edit','BannerController@edit');
	Route::post('/banner/store','BannerController@store');
	Route::get('/banner/edit/{id}','BannerController@edit');

	Route::post('/banner/update/{id}','BannerController@update');

	Route::get('/banner/destroy/{id}','BannerController@destroy');

	
});