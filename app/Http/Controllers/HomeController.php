<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function search(Request $request){
        // dd($request->search);
        return redirect("/cari"."/".$request->search);
    }
    public function searchProduct($search){
        $products = Product::where('nama_product','like','%'.$search.'%')->get();
        
        $data = ['products'=>$products,'search'=>$search];
        
        //add user info
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);        
        
        return View('pages.search',$data);
    }
    public function loadHome(){
        $products = Product::all();
        
        $data = ['products'=>$products];
        
        //add user info
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);        
        
        return View('pages.index',$data);
    }
    public function loadCategory($category){
        $products = Product::where('tag_product',$category)->get();
        $user = User::where('username',Session::get('username'))->first();

        $data = ['products'=>$products,'title'=>$category,'user'=>$user];
        
        //add user info
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);
        
        return View('pages.category',$data);
    }
}
