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
    return redirect('home.index.index');
});

//后台路由
Route::namespace('Admin')->prefix('admin')->group(function(){
	//后台首页
	Route::get('/index','IndexController@index');

	//用户管理
	//用户显示页面
	Route::get('user/index','UserController@index');
	//用户添加页面
	Route::get('user/create','UserController@create');
	Route::post('/user/store','UserController@store');

	//轮播图管理
	//轮播图显示
	Route::get('banner/index','BannerController@index'); 
	//轮播图添加页面
	Route::get('banner/create','BannerController@create');
	//处理修改
	Route::get('banner/edit','BannerController@edit');
	//处理添加
	Route::post('/banner/store','BannerController@store');

	Route::get('/banner/edit/{id}','BannerController@edit');

	Route::post('/banner/update/{id}','BannerController@update');

	Route::get('/banner/destroy/{id}','BannerController@destroy');

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


    //文章管理
    //文章显示页面
    Route::get('article/index','ArticleController@index');
    Route::get('article/create','ArticleController@create');
    Route::post('article/store','ArticleController@store');
	Route::get('article/edit/{id}','ArticleController@edit');
	Route::post('article/update/{id}','ArticleController@update');
	Route::get('/article/destroy/{id}','ArticleController@destroy');

	//无限极分类
	Route::get('cate/index','CateController@index');
	Route::get('cate/create','CateController@create');
	Route::post('cate/store','CateController@store');
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
	Route::get('index/index','IndexController@index');
	Route::get('article/index','ArticleController@index');
	Route::get('article/list','ArticleController@list');
});
