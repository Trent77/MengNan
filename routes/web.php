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
    // return redirect('home/index/index');
});

	//登录
	Route::get('/admin/login','Admin\IndexController@login');
	Route::get('/admin/error',function(){
		echo '你没有权限，请联系超级管理员';
	});
	Route::post('/admin/login','Admin\IndexController@dologin');
	// 退出
	Route::get('/admin/logout','Admin\IndexController@logout');

//后台路由
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'login'],function(){       
	//后台首页
	Route::get('/index','IndexController@index');
	Route::get('/wellcome','IndexController@wellcome');

	// 管理员管理
	ROute::get('user/index','UserController@index');
	// 增
	Route::get('user/create','UserController@create');
	Route::post('user/store','UserController@store');
	// 改
	Route::get('user/edit/{id}','UserController@edit');
	Route::post('user/update/{id}','UserController@update');
	// 删
	Route::get('user/destroy/{id}','UserController@destroy');
	// 角色分配
	Route::get('user/rolelist/{id}','UserController@rolelist'); 
	// 保存角色
	Route::post("user/saverole","UserController@saverole");

	// 角色管理
	ROute::get('role/index','RoleController@index');
	// 增
	Route::get('role/create','RoleController@create');
	Route::post('role/store','RoleController@store'); 
	// 改
	Route::get('role/edit/{id}','RoleController@edit');
	Route::post('role/update/{id}','RoleController@update');
	// 删
	Route::get('role/destroy/{id}','RoleController@destroy');
	// 权限分配
	Route::get('role/auth/{id}','RoleController@auth'); 
	// 保存权限
	Route::post("role/saveauth","RoleController@saveauth");

	// 权限管理
	ROute::get('node/index','NodeController@index');
	// 增
	Route::get('node/create','NodeController@create');
	Route::post('node/store','NodeController@store'); 
	// 改
	Route::get('node/edit/{id}','NodeController@edit');
	Route::post('node/update/{id}','NodeController@update');
	// 删
	Route::get('node/destroy/{id}','NodeController@destroy');

	//会员显示页面
	Route::get('member/index','MemberController@index');
	// 增
	Route::get('member/create','MemberController@create');
	Route::post('member/store','MemberController@store');
	// 改
	Route::get('member/edit/{id}','MemberController@edit');
	Route::post('member/update/{id}','MemberController@update');
	// 删
	Route::get('member/destroy/{id}','MemberController@destroy');

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
Route::group(['namespace'=>'Home','prefix'=>'home'],function(){
	//注册页面
	Route::get('register/index','RegisterController@index');
	Route::post('register/store','RegisterController@store');
	//登录页面
	Route::get('index/login','IndexController@login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
