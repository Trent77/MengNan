<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('articles')->get();
        $specs = DB::table('specs')->get();
        $specs = array_combine( array_column($specs->toArray(),'id'),$specs->toArray() );
        return view('admin.article.index',['data'=>$data,'specs'=>$specs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $specs = DB::table('specs')->get();
       return view('admin.article.create',['specs'=>$specs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = ($request->except(['_token','thumb']));
        if($request->hasFile('thumb')){
            $data['thumb'] = $request->file('thumb')->store(date('Ymd'));
        }else{
            $data['thumb'] = '';
        }
        $data['ctime'] = date('Y-m-d H:i:s');
        $res = DB::table('articles')->insert($data);
        if($res === false){
            return back()->with('error','添加失败');
        }

        return redirect('admin/article/index')->with('success','添加成功');
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
        $specs = DB::table('specs')->get();
        $data = DB::table('articles')->where('id',$id)->first();
        return view('admin.article.edit',['data'=>$data,'specs'=>$specs]);
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
 
        //修改
        $res = DB::table('articles')->where('id',$id)->update($data);

        if($res === false){
            return back()->with('error','修改失败');
        }
        return redirect('admin/article/index')->with('success','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('articles')->where('id',$id)->delete();
        if($res === false){
            return back()->with('error','删除失败');
        }

        return redirect('admin/article/index')->with('success','删除成功');
    }
}
