<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    protected $table = 'users';

    //primarykey
    protected $primaryKey = 'id';

    public function Transaction(){
        return $this->belongsTo('App\Models\Transaction','id','id_user');
    }
}
