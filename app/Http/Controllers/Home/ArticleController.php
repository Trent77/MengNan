<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ArticleController extends Controller
{
    private  function Prev($id)
    {
      $data = DB::table('articles')->where('id','<',$id)->orderBy('id','desc')->first();
      if ($data) {
         return $data;
       }else{
          return false;
       }

    }

    /**
     * [ 下一篇 ]
     * @param [type] $id [ 头条ID ]
     */
    private  function Next($id)
    {
      $data = DB::table('articles')->where('id','>',$id)->orderBy('id','asc')->first();
      if($data){
         return $data;
       }else{
          return false;
       }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id',0);

        // 上一条
       $article_prev = self::prev($id,$request->input('id',0));
 
       // 下一条
       $article_next = self::next($id,$request->input('id',0));

       // 获取公告里的头条
        $headlines_data = DB::table('articles')->where('id',$id)->first();

        $weds = weds::find(1);
        // 只显示五条
        $datas = DB::select("select  * from articles order By id desc limit 5");

        return view('home.headlines_data.index',[
        'weds'=>$weds,
        'headlines_data'=>$headlines_data,
        'datas'=>$datas,'article_prev'=>$article_prev,
        'article_next'=>$article_next,
        ]);
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
    public function list(){

        return view('home/article/list');
    }
}
