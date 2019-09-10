<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.index.index');
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
     * 登录
    */
    public function login(Request $request){
        
        return view('admin.index.login');
    }

    public function dologin(Request $request){

        //接收数据
        $data = $request->except(['_token']);

        //查询用户信息
        $user = DB::table('admin_user')->where('name',$data['name'])->first();

        //判断用户是否存在
        if(empty($user)){
            return back()->with('error','用户不存在');
        }

        //判断密码是否正确
        if( !Hash::check($data['password'],$user->password) ){
            return back()->with('error','密码错误');
        }

        //登录成功
        //保存登录信息到session
        session(['user'=>$user]);

        //1.获取当前登录用户所有的权限信息 node表信息 控制器名字 方法名字
        $list=DB::select("select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$user->id}");
 
        //2.权限初始化 让所有管理员具有后台首页访问权限
        $nodelist['IndexController'][]="index";
        $nodelist['IndexController'][]="wellcome";

        //遍历
        foreach($list as $v){
            //把$list 权限列表写入到$nodelist
            $nodelist[$v->mname][]=$v->aname;
            //如果权限列表里有create 方法 添加store
            if($v->aname=="create"){
                $nodelist[$v->mname][]="store";
            }
            //如果权限列表里有edit方法 添加update
            if($v->aname=="edit"){
                $nodelist[$v->mname][]="update";
            }
        }

        //3.把初始化的权限信息 放置在session里
        session(['nodelist'=>$nodelist]);
            return redirect('/admin/index');
    } 

    /*
     * 退出登录
    */
    public function logout(){
        session(['user'=>NULL]);
        session(['nodelist'=>NULL]);

        return redirect('/admin/login');
    }
    public function wellcome(){
        echo '欢迎来到猛男商城后台';
    }
} 
