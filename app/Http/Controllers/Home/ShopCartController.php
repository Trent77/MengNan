<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ShopCartController extends Controller
{
    //
    

    //添加到购物车
    public function add(Request $request){
    	//获取选中规格
    	$key_name = $request->input('key_name','');
    	//如果没有选中规格则返回 并带回错误参数
        if(!$key_name){
            return back()->withErrors(['必须选择规格']);
        }
        //获取规格名字
        $key_name = $request->only('key_name');
        //获取选中数量
        $num = $request->only('num');
    	
    	//三表查询 通过用户选中的sku_id 来进行三表查询 拿到购物车所需要的字段
        $res = DB::table('sku')
            ->leftJoin('goods', 'sku.good_id', '=', 'goods.id')
            ->leftjoin('good_photo_mini','goods.id','=','good_photo_mini.good_id')
            ->select('sku.*','goods.title','good_photo_mini.photo_mini')
            ->where('sku.key_name','=',$key_name)
            ->first();
        // 拿到当前用户的ID
        $member_id = session('member')->id;
        //数据传库
        $result = DB::table('shop_cart')
		        ->insert([
		        	'photo'=>$res->photo_mini,
		        	'title'=> $res->title,
		        	'key_name'=> $res->key_name,
		        	'price'=> $res->price,
		        	'good_id'=> $res->good_id,
		        	'sku_id'=> $res->id,
		        	'member_id'=>$member_id
		        	]);

		if($result){
            return redirect()->action('Home\ShopCartController@index');
		} 	
        
    }

    public function index(){
    	return view('home.shopcart.index');
    }
		
    
}
