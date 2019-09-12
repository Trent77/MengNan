<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CateController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$cate = DB::table('cates')->get();
        //$cate = DB::select('SELECT *,concat(path,",",id)as paths FROM `cates` order by paths');
       $cate =  DB::table("cates")->select(DB::raw('*,concat(path,",",id)as paths'))->orderBy('paths')->paginate(5);
       foreach ($cate as $key => $value) {
           $path=$value->path;
           $arr=explode(",", $path);
           $len=count($arr)-1;
           $cate[$key]->name=str_repeat("--|", $len).$value->name;
       }
        return view('admin/cate/index',['cate'=>$cate]);

    }
    public static function getCates(){
        $cate =  DB::table("cates")->select(DB::raw('*,concat(path,",",id)as paths'))->orderBy('paths')->get();
       foreach ($cate as $key => $value) {
           $path=$value->path;
           $arr=explode(",", $path);
           $len=count($arr)-1;
           $cate[$key]->name=str_repeat("--|", $len).$value->name;
    }
    return $cate;
}
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = self::getCates();
        return view('admin/cate/add',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only(['name','pid']);
        $pid=$request->input("pid");
        if($pid==0){
            $data['path']='0';
            
        }else{
            $info = DB::table('cates')->where('id','=',$pid)->first();
            //dd($info);
            $data['path']=$info->path.",".$info->id;
            
        }
        if(DB::table("cates")->insert($data)){
            return redirect('/admin/cate/index')->with('success','分类添加成功');
        }else{
            return redirect('/admin/cate/create')->with('error','分类添加失败');
        }
        
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('cates')->where('id',$id)->first();

        return view('admin/cate/create',['data'=>$data,'cates'=>self::getCates()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token']);

        $data['path'] .= ','.$id;
        //修改数据
        $res = DB::table('cates')->where('id',$id)->update($data);

        if($res === false){
            return back()->with('error','修改失败');
        }

        return redirect('/admin/cate/index')->with('success','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $num=DB::table("cates")->where('pid','=',$id)->count();
        if($num>0){
            return back()->withErrors(['请先删除子类信息!']);
        }
        if(DB::table("cates")->where("id",'=',$id)->delete()){
            return redirect("/admin/cate/index")->with('success','删除成功');
        }else{
            return redirect("/admin/cate/index")->with('error','删除失败');
        }
    }
}
