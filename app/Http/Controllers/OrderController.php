<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Transaction;
use App\Models\TransactionProduct;


class OrderController extends Controller
{
    public function loadOrder($id){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu sebelum Membeli');
        }

        $transaction = Transaction::join('users','transaction.id_user','users.id')->where('id_user',Session::get('id_user'))->where('id_transaction',$id)->first();
        $transactionProducts = TransactionProduct::join('product','transaction_product.id_product','product.id_product')->where('id_transaction',$id)->get();
        
        $data['transaction'] = $transaction;
        $data['transactionProducts'] = $transactionProducts;
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);

        return View('pages.order', $data);  
    }

    public function sellerConfirmation(Request $request){
        $transaction = Transaction::where('id_transaction',$request->id_transaction)->first();
        if($request->submit === 'Terima Pesanan'){
            $transaction->status = 2;
        }else if($request->submit == 'Batalkan Pesanan'){
            $transaction->status = 0;
        }
        $transaction->save();

        return Redirect('/admin/order');
    }
    public function finishOrder($id){
        $transaction = Transaction::where('id_transaction',$id)->first();
        $transaction->status = 4;
        $transaction->save();

        return Redirect('/order'.'/'.$id);
    }
}
