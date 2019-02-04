<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Transaction;

class UserController extends Controller
{
    //
    public function index(){
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Kamu harus login dulu');
        }
        else{
            return redirect('/admin/home');
        }
    }
    public function login(){
        return view('pages.login');
    }
    public function loginForm(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = User::where('username',$username)->first();
        if(!empty($data)){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('username',$data->username);
                Session::put('id_user',$data->id);
                Session::put('role',$data->role);
                Session::put('login',TRUE);
                if($data->role == 0){
                    return redirect('/');
                }else if($data->role == 1){
                    return redirect('/admin');
                }
            }
            else{
                return redirect('/login')->with('alert','Password atau Username, Salah !'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('/login')->with('alert','Password atau Username, Salah!');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/login')->with('alert','Kamu sudah logout');
    }
    public function register(Request $request){
        return view('pages.register');
    }
    public function registerForm(Request $request){
        $this->validate($request, [
            'email' => 'required|min:4|email|unique:users',
            'username' => 'required|min:4|unique:users',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'nama' => 'required|min:4',
            'alamat' => '',
            'no_telp' => 'required|numeric',
        ]);
        $data =  new User();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->role = 0;
        $data->saldo = 0;
        $data->save();
        return redirect('/login')->with('alert-success','Kamu berhasil Register, Silahkan Login!');
    }

    public function loadUserInfo($data){
        $orders = Transaction::where('id_user',Session::get('id_user'))->where('status','!=','4')->get();
        $user = User::where('username',Session::get('username'))->first();
        $data['user'] = $user;
        $data['orders'] = $orders;
        return $data;
    }
}
