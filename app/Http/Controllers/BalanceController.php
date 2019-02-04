<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function loadBalance(){
        $data = [];
        $data = app('App\Http\Controllers\UserController')->loadUserInfo($data);

        return View('pages.balance', $data);
    }
}
