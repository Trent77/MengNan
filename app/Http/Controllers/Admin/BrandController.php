<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    //品牌显示页面
    public function index(){
      return view('admin.brand.index');
    }
}
