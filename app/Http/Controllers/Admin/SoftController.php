<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soft;

class SoftController extends Controller
{
    //分类展示页面
    public function index(){
      return view('admin.soft.index');
    }

    //分类添加页面
    public function create(){
      return view('admin.soft.create');
    }

    //处理添加
    public function store(Request $request){
      $this->validate($request, [
         'name' => 'required|unique:posts|max:255',
      ]);
      // echo 'ok';
    }
}
