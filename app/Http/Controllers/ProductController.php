<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{

    public function loadItem($id){
        $products = Product::where('id_product',$id)->first();
        
        if(!$products){
            abort(404);
        }
        $relatedProducts = Product::where('tag_product',$products->tag_product)->get();
        
        $data = ['products'=>$products,'relatedProducts'=>$relatedProducts];
        
        //add user info
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);
        
        return View('pages.item',$data);
    }
}
