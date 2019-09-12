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
      $cate = DB::table('cates')->where('pid',2)->get();
      return view('admin.good.create',['cate'=>$cate]);
    }
    //处理添加商品
    public function store(Request $request){
      $name = $request->input('name');
      $title = $request->input('title');
      $soft_id = $request->input('soft_id');
      if(empty($name)){
        echo '商品名不能为空';die;
      }
      if(empty($title)){
        echo '标题不能为空';die;
      }
      $res = DB::table('goods')->insert(['name'=>$name,'soft_id'=>$soft_id,'title'=>$title]);
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

    //商品详情添加
    public function write($id){
      $res = DB::table('goods')->where('id',$id)->select('show_status')->get();
      $res = $res[0]->show_status;
      if($res){
        return back();
      }
      $good = DB::table('goods')->where('id',$id)->first();
      return view('admin.good.write',['good'=>$good]);
    }
    
    //处理商品属性添加
    public function chuli(Request $request){
      $photo_pro = $request->file('photo_pro');
      $photo_mini = $request->file('photo_mini');
      $good_id = $request->input('good_id');
      

      for($i=0;$i<count($photo_pro);$i++){
        $path = $photo_pro[$i]->store(date('Y-m-d'));
        DB::table('good_photo_pro')->insert(['good_id'=>$good_id,'photo_pro'=>'/uploads/'.$path]);
      }

      for($i=0;$i<count($photo_mini);$i++){
        $path = $photo_mini[$i]->store(date('Y-m-d'));
        DB::table('good_photo_mini')->insert(['good_id'=>$good_id,'photo_mini'=>'/uploads/'.$path]);
      }

      DB::table('goods')->where('id',$good_id)->update(['show_status'=>1]);

      return redirect('/admin/good/index');
      
    }
}
