<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 接受参数
        $node = DB::table('node')->paginate(5);
        return view('admin.node.index',['node'=>$node]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.node.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->except(['_token']);
       $name = $request->input('name');

        // 从数据库中查询数据
        $node = DB::table('node')->where('name',$name)->first();
        if($node){
            echo '权限名称相同';die;
        }

        //传入数据库
        $res = DB::table('node')->insert($data);
        if(!$res){
            return back()->with('error','添加失败');
        }

        return redirect('/admin/node/index')->with('success','添加成功');
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
        //先查出数据
        $data = DB::table('node')->where('id',$id)->first();

        //显示修改页面
        return view('admin.node.edit',['data'=>$data]);
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
        //接收参数
        $data = $request->except(['_token']);

        //先查出数据
        $node = DB::table('node')->where('id',$id)->first();

        //修改
        $res = DB::table('node')->where('id',$id)->update($data);
        if(!$res){
            return back()->with('error','修改失败');
        }

        return redirect('/admin/node/index')->with('success','添加成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 查出数据
        $node = DB::table('node')->where('id',$id)->first();

        // 删除
        $res = DB::table('node')->where('id',$id)->delete();
        if($res === false){
            return back()->with('error','删除失败');
        }

        return redirect('/admin/node/index')->with('success','删除成功');
    }
}
