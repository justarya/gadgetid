<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionProduct extends Model
{
    protected $table = 'transaction_product';
    
    //timestamp
    public $timestamps = false;

    //primarykey
    protected $primaryKey = 'id';

    public function product(){
        return $this->hasOne('App\Models\Product','id_product','id_product');
    }
    public function Transaction(){
        return $this->belongsTo('App\Models\Transaction','id_transaction','id_transaction');
    }
}
