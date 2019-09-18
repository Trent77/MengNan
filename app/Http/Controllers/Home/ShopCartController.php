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
        $num = $request->input('num');
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
		        	'member_id'=>$member_id,
                    'num'=>$num
		        	]);

		if($result){
            return redirect()->action('Home\ShopCartController@index');
		} 	
        
    }

    //购物车展示页
    public function index(){
        $member_id = session('member')->id;
        $shopcart = DB::table('shop_cart')->where(['member_id'=>$member_id])->get();
    	return view('home.shopcart.index',['shopcart'=>$shopcart]);
    }

    //处理购物车删除
    public function del(Request $request){
        $id = $request->input('id');
        //删除操作
        $res = DB::table('shop_cart')->delete($id);
        if($res){
            $data['error'] = 0;
            $data['msg'] = '添加成功';
        }else{
            $data['error'] = 1;
            $data['msg'] = '添加失败';
        }

        return json_encode($data);
    }

    //处理购物车添加
    public function store(Request $request){
        $data = $request->input('data');
        $zongji = 0;
        $arr=[];
        for($i=0;$i<count($data);$i++){
            //通过skuid 获取对应的数据
           $res = DB::table('shop_cart')->where('id',$data[$i]['sku_id'])->first();
           //合计
           $heji = $res->price;
           $time = date('Y-m-d H:i:s');
           $member = $request->session()->get('member');
           $res =  DB::table('order')->insert([
                'sku_id'=>$data[$i]['sku_id'],
                'heji'=>$heji,
                'created_at'=>$time,
                'num' =>$data[$i]['num'],
                'member_id' =>$member->id,
                ]);
        }
        
        if($res){
            echo json_encode('ok');die;
        }else{
            echo json_encode('false');die;
        }
    }

    //结算完成
    public function end(){
        return view('/home/shopcart/end');
    }
		
    
}
