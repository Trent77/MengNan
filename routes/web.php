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
	//用户注册页面
	Route::get('user/create','UserController@create');
	Route::post('user/store','UserController@store');
	//分类管理
	//分类列表
	Route::get('category/index','CategoryController@index');
	//添加分类
	Route::post('category/store','CategoryController@store');
	// 修改分类
	Route::get('category/edit/{id}','CategoryController@edit');
	Route::post('category/update/{id}','CategoryController@update');
	//删除
	Route::get('category/destroy/{id}','CategoryController@destroy');

	//订单管理,订单列表
	Route::get('order/index','OrderController@index');

	//轮播图显示
	Route::get('banner/index','BannerController@index'); 
	//轮播图添加页面
	Route::get('banner/create','BannerController@create');
	//轮播图修改页面
	Route::get('banner/edit','BannerController@edit');
	Route::post('banner/store','BannerController@store');
	Route::get('banner/edit/{id}','BannerController@edit');
	Route::post('banner/update/{id}','BannerController@update');
	Route::get('banner/destroy/{id}','BannerController@destroy');

	  //分类管理
	  //分类显示页面
	  Route::get('soft/index','SoftController@index');
	  //添加分类页面
	  Route::get('soft/create','SoftController@create');
	  //处理添加
	  Route::post('soft/store','SoftController@store');
    //修改显示页面
    Route::get('soft/add/{id}','SoftController@add');
    //处理修改
    Route::post('soft/edit','SoftController@edit');
    //处理删除
    Route::get('soft/del/{id}','SoftController@del');

	  //品牌管理
	  //品牌显示页面
	  Route::get('brand/index','BrandController@index');
    //添加页面
    Route::get('brand/create','BrandController@create');


	  //商品管理
	  //商品显示页面
	  Route::get('good/index','GoodController@index');
    //商品添加页
    Route::get('good/create','GoodController@create');
    //处理添加
    Route::post('good/store','GoodController@store');

    //规格管理
    //规格显示页面
    Route::get('spec/index','SpecController@index');
    //编辑规格页面
    Route::get('spec/add','SpecController@add');
    //规格添加页面
    Route::get('spec/create','SpecController@create');
    //处理规格添加
    Route::post('spec/store','SpecController@store');
});

//=================================================================

//前台首页
Route::get('/','Home\IndexController@index');

//前台路由
Route::namespace('Home')->prefix('home')->group(function(){
	//注册页面
	Route::get('register/index','RegisterController@index');
	Route::post('register/store','RegisterController@store');
	//登录页面
	Route::get('index/login','IndexController@login');

});
