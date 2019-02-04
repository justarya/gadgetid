<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Troli extends Model
{
    protected $table = 'troli';
    
    //timestamp
    public $timestamps = true;

    //blacklist
    protected $guarded = ['id'];
}
