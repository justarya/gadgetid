<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Models\Product;
use App\Models\Troli;
use App\Models\Transaction;
use App\Models\User;
use App\Models\TransactionProduct;

class PaymentController extends Controller
{
    public function loadPayment(){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu sebelum Membeli');
        }

        $data = [];
        //add user info
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);

        return View('pages.payment',$data);
    }
    public function loadPaymentBalance(){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu sebelum Membeli');
        }

        $products = Troli::where('id_user',Session::get('id_user'))->join('product','troli.id_product','=','product.id_product')->get();
        $data = ['products'=>$products];
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);
    
        return View('pages.payment_balance',$data);
    }
    public function payWithBalance(Request $requst){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu sebelum Membeli');
        }

        $time = time();

        $products = Troli::where('id_user',Session::get('id_user'))->join('product','troli.id_product','=','product.id_product')->get();
        $data = [];
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);

        //checkTotal
        $totalAwal = 0;
        foreach($products as $product){
            $totalAwal += $product->total_product * $product->harga_product;
        }

        if($data['user']->saldo < $totalAwal){
            return redirect('/transaction/failed')->with('alert','Saldo anda tidak cukup');
        }

        $total = 0;
        foreach($products as $product){
            if($product->stok_product >= $product->total_product){
                // decrease the original stok amount
                $stok_product = $product->stok_product - $product->total_product;
                
                $productTable = Product::where('id_product',$product->id_product)->first();
                $productTable->stok_product = $stok_product;
                $productTable->save();

                //update transaction product
                $transactionProduct = new TransactionProduct;
                $transactionProduct->id_transaction = $time;
                $transactionProduct->id_product = $product->id_product;
                $transactionProduct->total_product = $product->total_product;
                $transactionProduct->temp_harga = $product->harga_product;
                $transactionProduct->save();
                $total += $product->harga_product;

            }else{
                $data['msg'] = $product->nama_product.' sedang Kosong!';
            }
        }

        //dcrease the original stok amount
        $userTable = User::where('id',Session::get('id_user'))->first();
        $userTable->saldo -= $total;
        $userTable->save();
        
        //create new transaction
        $transaction = new Transaction;
        $transaction->id_transaction = $time;
        $transaction->id_user = Session::get('id_user');
        $transaction->status = 1;
        $transaction->resi = null;
        $transaction->save();

        app('App\Http\Controllers\TroliController')->deleteAllProduct();

        return Redirect('/order'.'/'.$time);
    }
}
