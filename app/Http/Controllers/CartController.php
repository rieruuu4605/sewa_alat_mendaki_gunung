<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function beli(Request $request,$id)
    {
        $cart = Cart::where('idproduct','=',$id)->first();

        if($cart){
            $cart->delete();
        }

        Cart::create([
            'iduser'=> auth()->user()->id,
            'idproduct'=>$id
        ]);
        echo "<script>alert('Berhasil ditambahkan ke keranjang')</script>";
        return redirect('/homepage');
    }

    public function beli_sekarang(Request $request,$id)
    {
        $cart = Cart::where('idproduct','=',$id)->first();

        if($cart){
            $cart->delete();
        }

        Cart::create([
            'iduser'=> auth()->user()->id,
            'idproduct'=>$id
        ]);
        
        return redirect('/checkout');
    }

    public function checkout_page(Request $request)
    {
        $cart = Cart::where('iduser','=',auth()->user()->id)->first();

        if($cart){

            return view('transaksi',['cart'=>$cart]);
        }else{
            return view('transaksi',['cart'=>null]);
        }

    }
}
