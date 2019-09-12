<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class StoreController extends Controller
{	
    //显示库存管理首页
    public function index(){
    	// $keywords = $request->input('keywords','');
    	$data = DB::select('SELECT goods.name,sku.* from  sku INNER JOIN goods ON sku.good_id = goods.id ');
    	return view('admin.store.index',['data'=>$data]);
    }

    //修改库存显示页
    public function edit($id){
        $data = DB::table('sku')->where('id',$id)->first();
    	return view('admin.store.edit',['data'=>$data,'id'=>$id]);
    }

    //处理修改
    public function add(Request $request){
        $data = $request->all();
    $res =  DB::table('sku')
            ->where('id', $data['sku_id'])
            ->update( [ 'store_s' => $data['store_s'],'store_x'=>$data['store_s'],'price'=>$data['price'] ] );

    if($res){
        return redirect('/admin/store/index');
    }

    }
}
