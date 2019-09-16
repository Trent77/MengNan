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
	Route::post('/user/store','UserController@store');
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
	//处理修改
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

	//商品管理
	//商品显示页面
	Route::get('good/index','GoodController@index');
    //商品添加页
    Route::get('good/create','GoodController@create');
    //处理添加
    Route::post('good/store','GoodController@store');

    //商品添加详情页
    Route::get('good/write/{id}','GoodController@write');
    //添加商品属性
    Route::post('good/chuli','GoodController@chuli');
    //处理商品添加规格
    Route::post('good/edit','GoodController@edit');
    //商品删除
    Route::post('good/del','GoodController@del');

    //规格管理
    //规格显示页面
    Route::get('spec/index','SpecController@index');
    //编辑规格页面
    Route::get('spec/add/{id}','SpecController@add');
    //规格添加页面
    Route::get('spec/create','SpecController@create');
    //处理规格添加
    Route::post('spec/store','SpecController@store');

    //处理规格删除
    Route::post('spec/del','SpecController@del');

    //商品和规格的关系
    Route::post('goodspec/store','GoodspecController@store');

    // 商品和对应属性id得到的属性值
    Route::post('item/create','ItemController@create');
    //添加所属属性的属性值
    Route::get('item/add','ItemController@add');
    //展示sku
    Route::get('item/show','ItemController@show');
    //处理sku
    Route::get('item/store','ItemController@store');
    //删除sku
    Route::post('item/del','ItemController@del');

    //库存管理
    Route::get('store/index','StoreController@index');
    //库存修改
	Route::get('store/edit/{id}','StoreController@edit');
	//处理修改
	Route::get('store/add','StoreController@add');

    // 评论管理
    Route::get('review/index','ReviewController@index');
    // 删
	Route::get('review/destroy/{id}','ReviewController@destroy');

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
	Route::get('cate/destroy/{id}','CateController@destroy');
	Route::get('cate/edit/{id}','CateController@edit');
	Route::post('cate/update/{id}','CateController@update');
});

//=================================================================

//前台首页
Route::get('/','Home\IndexController@index');
Route::get('/sms','Home\RegisterController@sms');

//前台路由
Route::group(['namespace'=>'Home','prefix'=>'home'],function(){
	//注册页面
	Route::get('register/index','RegisterController@index');
	Route::post('register/store','RegisterController@store');
	//登录页面
	Route::get('index/login','IndexController@login');

	//商品详情页
	Route::get('good/show/{id}','GoodController@show');
	//通过规格查找价格
	Route::post('good/store','GoodController@store');


	//购物车
	Route::post('shopcart/add','ShopCartController@add');
	
	//个人资料
	Route::get('information/index','InformationController@index');

	// 收货地址
	Route::get('address/index','AddressController@index');

	// 订单管理
	Route::get('order/index','OrderController@index');

	//轮播图
	Route::get('index/index','IndexController@index');
	//邮箱注册
	Route::post('register/index','RegisterController@store');
	//手机注册
	Route::post('register/phone','RegisterController@phone');
	//登录
	Route::post('register/login','RegisterController@login');
    //	退出登录
    Route::get('register/logout','RegisterController@logout');

});

Route::group(['namespace'=>'Home','prefix'=>'home','middleware'=>'homelogin'],function(){

    // 个人中心展示
    Route::get('myself/index','MyselfController@index');

});
