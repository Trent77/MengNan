<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Good;
use App\Spec;
use DB;

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
  public function add($id){
    $res = DB::table('goods')->where('id',$id)->select('spec_status')->get();
    $res = $res[0]->spec_status;
    if($res){
      return back();
    }
    //拿到对应商品的类id
    $soft_id = DB::table('goods')->where('id',$id)->value('soft_id');
    // 拿到对应类的属性数据
    $spec = DB::table('specs')->where('soft_id',$soft_id)->get();

    return view('admin.spec.add',['spec'=>$spec,'good_id'=>$id,'soft_id'=>$soft_id]);
  }

  //处理商品对应的属性添加
  public function store(Request $request){
    $data = array();
    $name = $request->input('spec_name');
    $soft_id = $request->input('soft_id');
    $arr = ['name'=>$name,'soft_id'=>$soft_id];
    if(empty($name)){
      $data['status']='0';
      $data['msg']='属性为空';
      $data['data']=array();
      echo json_encode($data);die;
    }
    $spec = new Spec;
    $spec->name = $name;
    $spec->soft_id = $soft_id;
    // $res = $spec->save();
    $id = DB::table('specs')->insertGetId($arr);

    if($id){
      $data['status']='1';
      $data['msg']='添加成功';
      $data['data']=['id'=>$id,'name'=>$name];
    }else{
      $data['status']='2';
      $data['msg']='添加失败';
      $data['data']=array();
    }
    echo json_encode($data);
  }


  public function del(Request $request){
      $id = $request->input('id');
      Spec::destroy($id);
  }
}
