<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    
    // foreign key
    protected $primaryKey = 'id_transaction';

    protected $guarded = 'id';
    //timestamp
    public $timestamps = true;

    public function TransactionProducts(){
        return $this->hasMany('App\Models\TransactionProduct','id_transaction','id_transaction');
    }
    public function User(){
        return $this->hasOne('App\Models\User','id','id_user');
    }
}
