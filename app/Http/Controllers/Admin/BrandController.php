<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soft;

class BrandController extends Controller
{
    //品牌显示页面
    public function index(){
      return view('admin.brand.index');
    }

    //品牌添加页面
    public function create(){
      $soft = Soft::all();
      return view('admin.brand.create',['soft'=>$soft]);
    }

    //处理添加品牌
    public function store(Request $request){
      $name = $request->input('name');
      $softs_id = $request->input('softs_id');
      // echo json_encode($data);die;
      if(empty($name)){
        echo '品牌名不能为空';die;
      }
      $brand = new Brand;
      $brand->name = $name;
      $brand->softs_id = $softs_id;
      $res = $brand->save();
      if($res){
        echo '添加成功';
      }else{
        echo '添加失败';
      }
    }
}
