<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = DB::table('articles')->get();
        $banners = DB::table('banners')->get();
        return view('home.index.index',['banners'=>$banners,'articles'=>$articles]); 
    }

    /**
     *个人中心
     *
     * @return \Illuminate\Http\Response
     */
    public function myself()
    {   
        $weekarray=array("日","一","二","三","四","五","六");
        //先定义一个数组
        $date['weekday'] = "星期".$weekarray[date("w")];
        $date['time'] = '20'.date('y.m');
        $date['day'] = date('d');
        return view('home.index.myself',['date'=>$date]);
    }

    /**
     * 个人资料
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function information()
    {
        //个人资料显示页
        return view('home.index.information');
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

    //前台登录 
    public function login(){
        return view('home.index.login');
    }
}
