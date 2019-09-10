<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class StoreController extends Controller
{	
    //显示库存管理首页
    public function index(){
    	// $data = DB::table('sku')->get();
    	$data = DB::select('SELECT goods.name,sku.* from  sku INNER JOIN goods ON sku.good_id = goods.id');
    	return view('admin.store.index',['data'=>$data]);
    }

    //修改库存显示页
    public function edit(){
    	
    }
}
