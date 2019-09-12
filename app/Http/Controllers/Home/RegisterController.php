<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.register.index');
    }

    public function sms(Request $request){

        //生成一个随机数
        $data = mt_rand('100000','999999');

        //把数据储存到session，名字叫做code
        $request->session()->put('code', $data);
        
        return sendTemplateSMS("13527033856",[$data],"1");
        
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
    //邮箱注册
    public function store(Request $request)
    {
        $data = $request->except('_token');

        if(empty($data['email'])){
            // echo "邮箱不能为空";
            return back()->with('error','邮箱不能为空');
            
        }

        if($data['pwd'] != $data['pwd2']){
            return back()->with('error','两次密码输入不一致');
        }
        
        unset($data['pwd2']);

        $data['created_at'] = date('Y-m-d H:i:s');
        $res = DB::table('members')->insert($data);
        if($res === false){
           return back()->with('error','添加失败');
        }

        return redirect('/')->with('success','添加成功');


    }

//手机注册
    public function phone(Request $request)
    {       
        $code = session('code');
        $data = $request->except('_token');
        // dump($code);  
        if(empty($data['yzm'])){
            // echo '验证码不能为空';die;
            return back()->with('error','验证码不能为空');
        }

        if($data['yzm'] != $code){
            // echo '验证码错误，请从新输入';
            return back()->with('error','验证码错误，请从新输入');
        }

        if(empty($data['pwd'])){
            // echo "密码不能为空";die;
            return back()->with('error','密码不能为空');
        }

        if($data['pwd'] != $data['pwd4']){
            // echo "两次密码输入不一致";die;
            return back()->with('error','两次密码输入不一致');
        }


        unset($data['pwd4']);
        unset($data['yzm']);
        // dump($data);
        $data['created_at'] = date('Y-m-d H:i:s');
        

        $res = DB::table('members')->insert($data);
        if($res === false){
           return back()->with('error','添加失败');
        }
        // echo '注册成功，恭喜成为猛男商城的一员';die;

        // return redirect('/')->with('success','注册成功，恭喜成为猛男商城的一员');
        return redirect('/')->with('success','添加成功');
        
         // $data = $request->all();
         
         // dump($data['yzm']);
         // dump($date);die;

    }

    //用户登录
    public function login(Request $request){

        $data = $request->except('_token');

        //验证是否有对应数据
        $name = DB::table('members')->where('name',$data['name'])->where('pwd',$data['pwd'])->first();
        $email = DB::table('members')->where('email',$data['name'])->where('pwd',$data['pwd'])->first();
        $phone = DB::table('members')->where('phone',$data['name'])->where('pwd',$data['pwd'])->first();
    
        //判断用户名
        if($name){
            $res['error'] = 0;
            $res['msg'] = '登录成功';
            //把数据保存到session
            $request->session()->put('user',$name);
        }else{
            $res['error'] = 1;
            $res['msg'] = '用户名或密码有误';
        }

        if($email){
            $res['error'] = 0;
            $res['msg'] = '登录成功';
            //把数据保存到session
            $request->session()->put('user',$email);
        }else{
            $res['error'] = 1;
            $res['msg'] = '用户名或密码有误';
        }

        if($phone){
            $res['error'] = 0;
            $res['msg'] = '登录成功';
            //把数据保存到session
            $request->session()->put('user',$phone);
        }else{
            $res['error'] = 1;
            $res['msg'] = '用户名或密码有误';
        }

            //session返回一个user值
            $user = session('user');

        // dump($user);die;

        return json_encode($res);
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
}
