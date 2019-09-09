<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 接受参数
        $role = DB::table('role')->paginate(5);
        return view('admin.role.index',['role'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收参数
        $data = $request->except(['_token']);
        $name = $request->input('name'); 

        // 从数据库中查询数据
        $role = DB::table('role')->where('name',$name)->first();

        if($role){
            echo '角色名称相同';die;
        }

        //传入数据库
        $res = DB::table('role')->insert($data);
        if(!$res){
            return back()->with('error','添加失败');
        }

        return redirect('/admin/role/index')->with('success','添加成功');

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
        $data = DB::table('role')->where('id',$id)->first();

        //显示修改页面
        return view('admin.role.edit',['data'=>$data]);
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
        $role = DB::table('role')->where('id',$id)->first();

        //修改
        $res = DB::table('role')->where('id',$id)->update($data);
        if(!$res){
            return back()->with('error','修改失败');
        }

        return redirect('/admin/role/index')->with('success','添加成功');
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
        $role = DB::table('role')->where('id',$id)->first();

        // 删除
        $res = DB::table('role')->where('id',$id)->delete();
        if($res === false){
            return back()->with('error','删除失败');
        }

        return redirect('/admin/role/index')->with('success','删除成功');
    }

    /*
        权限分配
     */
    public function auth($id)
    {
        // 获取角色信息
        $role = DB::table('role')->where('id',$id)->first();
        // 获取所有的权限信息
        $node = DB::table('node')->get();
        // 获取当前角色具有的权限信息
        $data=DB::table("role_node")->where("rid",$id)->get();
        if(count($data)){
            //遍历
            foreach($data as $v){
                $nids[]=$v->nid;
            }
            //加载模板
            return view("admin.role.auth",['role'=>$role,'node'=>$node,'nids'=>$nids]);
        }else{
            //加载模板
            return view("admin.role.auth",['role'=>$role,'node'=>$node,'nids'=>array()]);
        }
    }

    /*
        保存权限
     */
    public function saveauth(Request $request)
    {
        //获取分配的权限id
        $nids=$_POST['nids'];
        //获取对应得角色id
        $rid=$request->input('rid');
        //把原有权限删除
        DB::table("role_node")->where("rid",$rid)->delete();
        //遍历
        foreach($nids as $v){
            //封装添加的数据
            $data['rid']=$rid;
            $data['nid']=$v;
            DB::table("role_node")->insert($data);
        }

        return redirect("/admin/role/index")->with("success","权限分配成功");
    }
}
