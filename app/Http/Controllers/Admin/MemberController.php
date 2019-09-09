<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接受参数
        $data = DB::table('members')->paginate(5);
        return view('admin.member.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取请求参数 
        $data = $request->except(['_token','profile','pwd2']);

        //验证数据
        if(empty($data['name'])){
            echo '用户名必填';die;
        }

        if(empty($data['pwd'])){
            echo '密码必填';die;
        }

        if($data['pwd'] != $request->input('pwd2','')){
            echo '两次密码不一致';die;
        }

        // 文件上传
        if( $request->hasFile('profile') ){
            //有就上传
            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = '';
        }
        $data['profile'] = $path;

        $time = date('Y-m-d H:i:s');
        $data['created_at'] = $time;
        $data['updated_at'] = $time;

        //密码加密
        $data['pwd'] = Hash::make($data['pwd']);

        //传入数据库
        $res = DB::table('members')->insert($data);
        if(!$res){
            return back()->with('error','添加失败');
        }

        return redirect('/admin/member/index')->with('success','添加成功');
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
        $data = DB::table('members')->where('id',$id)->first();

        //显示修改页面
        return view('admin.member.edit',['data'=>$data]);
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
        $member = DB::table('members')->where('id',$id)->first();

        //检查文件上传
        if($request->hasFile('profile')){
            $data['profile'] = $request->file('profile')->store(date('Ymd'));
        }

        //修改
        $res = DB::table('members')->where('id',$id)->update($data);
        if(!$res){
            return back()->with('error','修改失败');
        }

        return redirect('/admin/member/index')->with('success','添加成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        // 查出数据
        $member = DB::table('members')->where('id',$id)->first();

        // 删除
        $res = DB::table('members')->where('id',$id)->delete();
        if($res === false){
            return back()->with('error','删除失败');
        }

        return redirect('/admin/member/index')->with('success','删除成功');
    }
}
