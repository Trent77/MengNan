<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodController extends Controller
{
    //商品详情页
    public function show($id){
    	$good = DB::table('goods')->where('id',$id)->first();
    	$sku = DB::table('sku')->where('good_id',$id)->get();
    	$photo_pro = DB::table('good_photo_pro')->where('good_id',$id)->get();
    	$photo_mini = DB::table('good_photo_mini')->where('good_id',$id)->get();

    	return view('home.good.show',['good'=>$good,'sku'=>$sku,'photo_pro'=>$photo_pro,'photo_mini'=>$photo_mini]);
    }

    public function store(Request $request){
    	$id = $request->input('id');
    	$data = DB::table('sku')->where('id',$id)->first();
    	echo json_encode($data);
    }

   
}
