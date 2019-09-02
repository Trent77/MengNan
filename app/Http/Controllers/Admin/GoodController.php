<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Good;

class GoodController extends Controller
{
    //商品显示页
    public function index(){
      $good = new good;
      $data = $good->all();
      return view('admin.good.index',['good'=>$data]);
    }
    //商品添加页面
    public function create(){
      return view('admin.good.create');
    }
    //处理添加商品
    public function store(Request $request){
      $name = $request->input('name');
      if(empty($name)){
        echo '商品名不能为空';die;
      }
      $good = new Good;
      $good->name = $name;
      $good->softs_id = 1;
      $good->brands_id = 1;
      $res = $good->save();
      if($res){
        echo '添加成功';
      }else{
        echo '添加失败';
      }
   }
}
