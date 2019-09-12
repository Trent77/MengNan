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
    public static function getcatesbypid($pid){
        $s=DB::table("cates")->where('pid','=',$pid)->get();
        $data=[];
        foreach ($s as $key => $value) {
            $value->sub=self::getcatesbypid($value->id);
            $data[]=$value;
        }
        return $data;
    }
    public function index()
    {
        $cate=self::getcatesbypid(0);
        
        $banners = DB::table('banners')->get(); 
        return view('home.index.index',['banners'=>$banners,'cate'=>$cate]); 
    }
           
    public function myself()
    {   
        $weekarray=array("日","一","二","三","四","五","六");
        //先定义一个数组
        $date['weekday'] = "星期".$weekarray[date("w")];
        $date['time'] = '20'.date('y.m');
        $date['day'] = date('d');
        return view('home.index.myself',['date'=>$date]);
    }
           
    public function information()
    {
        //个人资料显示页
        return view('home.index.information');

    }

      //前台登录 
    public function login(){
        return view('home.index.login');
    }
}
