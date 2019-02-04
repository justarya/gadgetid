<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Models\Product;
use App\Models\Troli;
use App\Models\User;

class TroliController extends Controller
{
    public function loadTroli(){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu');
        }

        $id_user = Session::get('id_user');
        $products = Troli::where('id_user',$id_user)->join('product','troli.id_product','=','product.id_product')->get();

        $data = ['products'=>$products];

        //add user info
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);

        return View('pages.troli', $data);
    }
    public function storeProduct(Request $request){
        //checklogin
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu sebelum Membeli');
        }
        
        if(Troli::where('id_product',$request->id_product)->where('id_user',Session::get('id_user'))->exists()){
            
        }else{
            $troli = new Troli;
            $troli->id_product = $request->id_product;
            $troli->id_user = Session::get('id_user');
            $troli->total_product = 1;
            $troli->save();
        }
        //$count = Troli::where(['id_product',$request->id_product],['id_user',$request->id_user])->count();
        //dd($count);
        return redirect('/troli');
    }
    public function deleteProduct(Request $request){
        //checklogin
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu sebelum Membeli');
        }
        
        $troli = Troli::where('id',$request->id_troli);
        $troli->delete();

        return redirect('/troli');
    }
    public function deleteAllProduct(){        
        $troli = Troli::where('id_user',Session::get('id_user'));
        $troli->delete();

        return redirect('/troli');
    }
}
