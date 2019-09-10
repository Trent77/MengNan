<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 接受参数
        // $keyword = $request->input('keyword','');

        $data = DB::table('admin_user')->paginate(5);
        return view('admin.user.index',['data'=>$data]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
        $data = $request->except(['_token','password2']);

        //验证数据
        if(empty($data['name'])){
            echo '用户名必填';die;
        }

        if(empty($data['password'])){
            echo '密码必填';die;
        }

        if($data['password'] != $request->input('password2','')){
            echo '两次密码不一致';die;
        }

        //密码加密
        $data['password'] = Hash::make($data['password']);

        //传入数据库
        $res = DB::table('admin_user')->insert($data);
        if(!$res){
            return back()->with('error','添加失败');
        }

        return redirect('/admin/user/index')->with('success','添加成功');
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
        $data = DB::table('admin_user')->where('id',$id)->first();

        //显示修改页面
        return view('admin.user.edit',['data'=>$data]);
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
        $user = DB::table('admin_user')->where('id',$id)->first();

        //修改
        $res = DB::table('admin_user')->where('id',$id)->update($data);
        if(!$res){
            return back()->with('error','修改失败');
        }

        return redirect('/admin/user/index')->with('success','添加成功');
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
        $user = DB::table('admin_user')->where('id',$id)->first();

        // 删除
        $res = DB::table('admin_user')->where('id',$id)->delete();
        if($res === false){
            return back()->with('error','删除失败');
        }

        return redirect('/admin/user/index')->with('success','删除成功');
    }

    /*
        角色分配
     */
    public function rolelist($id)
    {
        // 获取管理员数据
        $user = DB::table('admin_user')->where('id',$id)->first();

        //获取所有的角色信息
        $role=DB::table("role")->get();

        //获取当前管理员所具有的角色信息
        $data=DB::table("user_role")->where("uid",$id)->get();
        if(count($data)){
            //遍历
            foreach($data as $v){
                $rids[]=$v->rid;
            }
        // 角色分配页面
        return view('/admin/user/rolelist',['user'=>$user,'role'=>$role,'rids'=>$rids]);
    }else{
        //加载角色分配模板
        return view('/admin/user/rolelist',['user'=>$user,'role'=>$role,'rids'=>array()]);
    }
}

    /*
        保存角色
     */
    public function saverole(Request $request){
        // var_dump($request->all());
        //获取新角色id
        $role=$_POST['rids'];
        //获取管理员id
        $uid=$request->input('uid');
        //把用户已有角色信息删除
        DB::table("user_role")->where("uid",$uid)->delete();
        //遍历
        foreach($role as $v){
            //封装需要插入user_role 数据表数据
            $data['uid']=$uid;//管理员id
            $data['rid']=$v;
            DB::table("user_role")->insert($data);
        }
        return redirect("/admin/user/index")->with("success","角色分配成功");
    }
}
