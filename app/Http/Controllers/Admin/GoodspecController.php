<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goodspec;
use DB;

class GoodspecController extends Controller
{
    //添加相对应商品的规格
    public function store(Request $request){

          $good_id = $request->input('good_id');
          $spec_id = $request->input('spec_id');
          for($i=0;$i<count($spec_id);$i++){
            $goodspec = new Goodspec();
            $goodspec->good_id = $good_id;
            $goodspec->spec_id = $spec_id[$i];
            $res = $goodspec->save();
            if($res){
              echo 'ok';
            }
          }
    }
}
