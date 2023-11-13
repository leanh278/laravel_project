<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Product;

class FrontendController extends Controller
{
    //
    public function getHome(){
        $data['new'] = Product::orderBy('prod_id','desc')->take(5)->get();
        return view('frontend.home',$data);
    }
}
