<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
    //规格显示页
    public function index(){


      return view('admin.good.index');

    }

}
