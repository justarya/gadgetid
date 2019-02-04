<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Models\Transaction;
use App\Models\Product;

class AdminController extends Controller
{
    public function checkAdmin($role){
        if($role == 0){
            return true;
        }else if($role == 1){
            return false;
        }
    }
    public function loadHome(){
        if($this->checkAdmin(Session::get('role'))){
            return redirect('/');
        }
        // return View('admin.home');
        return redirect('/admin/order');
    }
    public function loadProduct(){
        if($this->checkAdmin(Session::get('role'))){
            return redirect('/');
        }

        $data['products'] = Product::all();
        
        return View('admin.product', $data);
    }
    public function addProduct(Request $request){
        if($this->checkAdmin(Session::get('role'))){
            return redirect('/');
        }
        $this->validate($request, [
            'nama' => 'required|min:4',
            'harga' => 'required|numeric|min:4',
            'stok' => 'required|numeric',
            'tag' => 'required',
            'deskripsi' => 'required|min:4',
            'image' => 'required',
        ]);
        // img upload
        $file = Input::file('image');
        $file->move('uploads/image/', $file->getClientOriginalName());
        $product = new Product;
        $product->nama_product = $request->nama;
        $product->harga_product = $request->harga;
        $product->stok_product = $request->stok;
        $product->tag_product = $request->tag;
        $product->deskripsi_product = $request->deskripsi;
        $product->image_product = '/uploads/image/'.$file->getClientOriginalName();
        $product->save();
        
        return redirect('/admin/product')->with('alert','Success upload product!');
        
    }

    public function loadItem($id){
        $products = Product::where('id_product',$id)->first();
        
        if(!$products){
            abort(404);
        }
        
        $data = ['products'=>$products];
        
        return View('admin.editproduct',$data);
    }
    
    public function editProduct(Request $request){
        if($this->checkAdmin(Session::get('role'))){
            return redirect('/');
        }
        // dd('test');
        $this->validate($request, [
            'nama' => 'required|min:4',
            'harga' => 'required|numeric|min:4',
            'stok' => 'required|numeric',
            'tag' => 'required',
            'deskripsi' => 'required|min:4',
            'image' => 'required',
        ]);
        // img upload
        $file = Input::file('image');
        $file->move('uploads/image/', $file->getClientOriginalName());
        $product = Product::where('id_product',$request->id)->first();
        // dd($product);
        $product->nama_product = $request->nama;
        $product->harga_product = $request->harga;
        $product->stok_product = $request->stok;
        $product->tag_product = $request->tag;
        $product->deskripsi_product = $request->deskripsi;
        $product->image_product = '/uploads/image/'.$file->getClientOriginalName();
        $product->save();
        
        return redirect('/admin/product')->with('alert','Success upload product!');
        
    }

    public function loadTransaction(){
        if($this->checkAdmin(Session::get('role'))){
            return redirect('/');
        }
        $data['transactions'] = Transaction::all();

        return View('admin.transaction', $data);
    }
    public function loadOrder(){
        if($this->checkAdmin(Session::get('role'))){
            return redirect('/');
        }
        
        $data['orders'] = Transaction::where('status','!=','0')->where('status','!=','4')->get();

        return View('admin.order',$data);
    }
}
