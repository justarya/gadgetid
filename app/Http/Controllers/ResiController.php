<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;

class ResiController extends Controller
{
    public function sendResi(Request $request){
        $transaction = Transaction::where('id_transaction',$request->id_transaction)->first();
        $transaction->resi = $request->resi;
        $transaction->status = 3;
        $transaction->save();

        return Redirect('/admin/order');
    }
}
