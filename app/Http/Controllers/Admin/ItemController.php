<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Spec;
use DB;

class ItemController extends Controller
{
    //显示对应商品和商品属性对应的值
    public function create(Request $request){
       //获取商品对应ID
       $good_id = $request->input('good_id');
       $attr = $request->input('attr');
       if(empty($attr)){
        return back()->with('msg','不能为空');
       }
       $ids = join(',',$attr);
       //属性和属性值两表联查获取一组属性对应属性值的数据
       $ret = DB::select("select specs.id as spec_id,specs.name as spec_name,items.id as item_id,items.name as item_name from specs left join items on specs.id=items.spec_id where specs.id in ($ids)");

      //定义一个新数组
          $spec_items = [];
          foreach($ret as $k=>$v){
          $spec_items[$v->spec_name][] = $v;
      }

      return view('admin.item.create',['spec_items'=>$spec_items,'good_id'=>$good_id]);

    }

    public function add(Request $request){
      $spec_id = $request->input('spec_id');
      $item_name = $request->input('item_name');
      $id = DB::table('items')->insertGetId(['spec_id'=>$spec_id,'name'=>$item_name]);
      if($id){
        $data['status'] = 0;
        $data['msg'] = '添加成功';
        $data['id'] = $id;
        $data['spec_id'] = $spec_id;
      }else{
        $data['status'] = 1;
        $data['msg'] = '添加失败';
      }

      return $data;
    }

    public function show(Request $request){
      //获得商品对应的ID
      $good_id = ($request->input('good_id'));
      //获得属性ID对应的属性值ID
      $data = $request->except('good_id');
      //存属性id对应的名字
      $data_arr = [];
      foreach($data as $k=>$v){
        for ($i=0; $i <count($data[$k]) ; $i++) {
          //把商品ID和属性ID和属性值ID存进数据库
          DB::table('good_item')->insert(['good_id'=>$good_id,'spec_id'=>$k,'item_id'=>$v[$i]]);
        }
        $data_arr[] = DB::table('specs')->where('id',$k)->select('name')->first();
      }
      $res = DB::table('good_item')->where('good_id',$good_id)->get();
      $item_arr = [];
      foreach($res as $k=>$v){
        // $item_arr[$v->spec_id][] = $v->item_id;
        $item_arr[] = $v;
      }

      $spec_array = [];
        foreach($data_arr as $k=>$v){
          $spec_array[] = $data_arr[$k]->name;
        }

      foreach($item_arr as $k=>$v){
            //两表联查指定字段并给别名 通过遍历得到的属性值ID做判断得到数据
            $items[$v->spec_id][] = DB::table('items')->join('specs','items.spec_id','=','specs.id')->select('items.id as item_id','items.name as item_name','specs.id as spec_id','specs.name as spec_name')->where(['items.spec_id'=>$v->spec_id,'items.id'=>$v->item_id])->first();
      }

      $item_name_arr = [];

      foreach($items as $k=>$v){
        for ($i=0; $i <count($v) ; $i++) {
          // $item_id_arr[$k][] = $items[$k][$i]->item_id;
          $item_name_arr[$k][$items[$k][$i]->item_id] = $items[$k][$i]->item_name;
        }
      }

      function combineDika($data) {
      $result = array();
      foreach (array_shift($data) as $k=>$item) {
          $result[] = array($k=>$item);
      }
      foreach ($data as $k => $v) {
          $result2 = [];
          foreach ($result as $k1=>$item1) {
              foreach ($v as $k2=>$item2) {
                  $temp        = $item1;//array (6 => string '22x33')
                  $temp[$k2]   = $item2;//
                  $result2[]   = $temp;
              }
          }
          $result = $result2;
      }
      return $result;
      }
      //获取拿到的数据
      $data = combineDika($item_name_arr);

      return view('admin.item.show',['data'=>$data,'spec_array'=>$spec_array,'good_id'=>$good_id]);
}
    
    //添加数据到sku表    
    public function store(Request $request){
      $content = $request->input('content');
      $good_id = $request->input('good_id');
      //计算一维
      $count = count($content);
      //计算二维
      $two_count = count($content[0]);
      $key_name = '';
      

      for ($i=0; $i < $count; $i++) { 
        //库存
        $store = $content[$i][$two_count-2];
        // 价格
        $price = $content[$i][$two_count-1];
        $key = '';
        $key_name = '';
        $res = '';
        $data = ['store'=>$store,'price'=>$price];
        for($j=0;$j<$two_count-2;$j++){
          $key_name .= $content[$i][$j].'_';
          $res = DB::table('items')->where('name',$content[$i][$j])->select('id')->get();
          $key .= $res[0]->id.'_';
        }
        $key_name = rtrim($key_name,'_');
        $key = rtrim($key,'_');
        $res = DB::table('sku')->insert(['key'=>$key,'key_name'=>$key_name,'store_s'=>$store,'price'=>$price,'good_id'=>$good_id,'store_x'=>$store]);
        DB::table("goods")->where('id',$good_id)->update(['spec_status'=>1]);
        }

        if($res){
          $result['error'] = 0;
          $result['msg'] = '添加成功';
        }else{
          $result['error'] = 1;
          $result['msg'] = '添加失败';
        }

      return json_encode($result);

    }

    //删除sku操作
    public function del(Request $request){
        $id = $request->input('id');
        DB::table('sku')->where('id', '=', $id)->delete();
    }




}
