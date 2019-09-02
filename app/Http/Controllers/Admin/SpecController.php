<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Good;
use App\Spec;

class SpecController extends Controller
{
  //规格展示页面
  public function index(){
    $good = Good::get();
    // dd($good);
    // return view('admin.spec.index',['spec'=> $spec]);
    return view('admin.spec.index',['good'=>$good]);
  }

  //规格添加页面
  public function create(){
    return view('admin.spec.create');
  }

  //商品添加规格页面
  public function add(){
    $spec = Spec::all();
    return view('admin.spec.add',['spec'=>$spec]);
  }

  //处理商品添加
  public function store(Request $request){
    $name = $request->input('name');
    if(empty($name)){
      echo '规格名不能为空';die;
    }
    $spec = new Spec;
    $spec->name = $name;
    $spec->softs_id = 1;
    $res = $spec->save();
    if($res){
      echo '添加成功';
    }else{
      echo '添加失败';
    }
  }
}
