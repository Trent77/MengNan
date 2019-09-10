<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Good;
use App\Goodspec;
use App\Soft;
use DB;

class GoodController extends Controller
{
    //商品显示页
    public function index(Request $request){
      $keywords = $request->input('keywords','');
      $good = new good;
      $data = $good->where('name', 'like', '%'.$keywords.'%')->orderBy('id','desc')->orderBy('spec_status','asc')->paginate(5);
      //获取所有的商品
      return view('admin.good.index',['good'=>$data,'keywords'=>$keywords]);
    }
    //商品添加页面
    public function create(){
      $soft = new Soft;
      //获取所有分类
      $data = $soft::all();
      return view('admin.good.create',['soft'=>$data]);
    }
    //处理添加商品
    public function store(Request $request){
      $name = $request->input('name');
      $soft_id = $request->input('soft_id');
      if(empty($name)){
        echo '商品名不能为空';die;
      }
      $res = DB::table('goods')->insert(['name'=>$name,'soft_id'=>$soft_id]);
      if($res){
        echo '添加成功';die;
      }else{
        echo '添加失败';die;
      }
   }
   //处理商品添加规格
   public function edit(){
     $arr = $_POST['checkbox'];
     //获取的商品id
     $good_id = $_POST['good_id'];
     $num = count($arr);

     for ($i=0; $i < $num; $i++) {
     }
        //处理完后得到的规格id
        $spec_id = rtrim($str, ',');

        $goodspecs = new Goodspec;
        $goodspecs->good_id = $good_id;
        $goodspecs->spec_id = $spec_id;
        $goodspecs->save();
        return redirect('/admin/spec/index');
   }

   //删除商品
    public function del(Request $request){
      $id = $request->input('id');
      //删除商品
      Good::destroy($id);
      //删除商品所对应的sku
      DB::table('sku')->where('good_id', '=', $id)->delete();
      echo 'ok';
    }
}
