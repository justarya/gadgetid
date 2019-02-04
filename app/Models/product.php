<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //table name
    protected $table = 'product';
    
    //timestamp
    public $timestamps = true;

    //primarykey
    protected $primaryKey = 'id_product';

    //blacklist
    protected $guarded = ['id_product'];

    public function TransactionProduct(){
        return $this->belongsTo('App\Models\TransactionProduct','id_product','id_product');
    }
}
