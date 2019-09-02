<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soft;

class SoftController extends Controller
{
    //分类展示页面
    public function index(){
      $soft = Soft::get();
      return view('admin.soft.index',['soft'=> $soft]);
    }

    //分类添加页面
    public function create(){
      return view('admin.soft.create');
    }

    //处理添加分类
    public function store(Request $request){
      $name = $request->input('name');
      // echo json_encode($data);die;
      if(empty($name)){
        echo '分类名不能为空';die;
      }
      $soft = new Soft;
      $soft->name = $name;
      $res = $soft->save();
      if($res){
        echo '添加成功';
      }else{
        echo '添加失败';
      }
    }

    //分类修改页面
    public function add($id){
      $data = Soft::where('id',$id)->get();
        return view('admin.soft.add',['data'=>$data]);
    }

    //处理修改分类
    public function edit(Request $request){
        $name = $request->input('name');
        $id = $request->input('id');
        if(empty($name)){
          echo '分类名不能为空';die;
        }

        //更新数据
        $res = Soft::where('id', '=', $id) ->update(array('name' => $name));

        if($res){
          echo 'ok';die;
        }else{
          echo '添加失败';die;
        };
    }

    //处理删除
    Public function del($id){
      Soft::destroy($id);
      return redirect("/admin/soft/index");
    }
}
