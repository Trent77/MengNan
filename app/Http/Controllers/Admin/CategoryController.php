<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('cates')->paginate(5);
        // dump($data);die;
        return view('admin.category.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 接收数据
        $data = $request->except('');
        // dump($data);die;

        //创建时间
        $data['created_at'] = date('Y-m-d H:i:s');

        // 数据入库
        $res = DB::table('cates')->insert($data);
        if($res === false){
            return back()->with('error','添加失败');
        }

        return redirect('admin/category/index')->with('success','添加成功');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        // dump($data);die;


        //显示页面
        return view('admin.category.edit',['data'=>$data]);
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
        // dump($request->all());exit;
        // 接收数据
        $data = $request->except(['_token']);
        
        $cate = DB::table('cates')->where('id',$id)->update($data);

        if(!$cate){
            //返回  后退  ->输出显示（）
            return back()->with('修改失败');
        }
        //返回  以前的方式（保存路径）->输出显示（）
        return redirect('/admin/category/index')->with('修改成功');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = DB::table('cates')->where('id',$id)->first();

        $res = DB::table('cates')->where('id',$id)->delete();

        if($res === false){
            return back()->with('error','删除失败');
        }

        return redirect('/admin/category/index')->with('success','删除成功');

        
        
    }
}
