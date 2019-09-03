<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据
        $data = DB::table('banners')->get();
        return view('admin.banner.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
        
        //检查上传文件
        if( $request->hasFile('profile') ){
            $path = $request->file('profile')->store(date('Y-m-d'));
        }else{
            $path = '';
        }
        $data['url'] = $path;

        //数据入库
        $res = DB::table('banners')->insert($data);

        if($res === false){
            return back()->with('error','添加失败');
        }

        return redirect('/admin/banner/index')->with('success','添加成功');
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
        //获取数据
        $data = DB::table('banners')->where('id',$id)->first();
        return view('admin.banner.edit',['data'=>$data]);
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
        //获取参数
        $data = $request->except(['_token']);

        //检查文件上传
        if($request->hasFile('profile')){
            $data['url'] = $request->file('profile')->store(date('Y-m-d'));
        }

        //修改
        $res = DB::table('banners')->where('id',$id)->update($data);

        if($res === false){
            return back()->with('error','修改失败');
        }

        return redirect('admin/banner/index')->with('success','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('banners')->where('id',$id)->delete();
        if($res === false){
            return back()->with('error','删除失败');
        }

        return redirect('admin/banner/index')->with('success','删除成功');
    }

    
}
