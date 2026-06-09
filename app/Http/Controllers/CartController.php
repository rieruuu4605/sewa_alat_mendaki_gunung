<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
   
    public function beli(Request $request, $id)
    {
   
        $cekCart = Cart::where('iduser', auth()->user()->id)
                       ->where('idproduct', $id)
                       ->first();

        if (!$cekCart) {
            Cart::create([
                'iduser'    => auth()->user()->id,
                'idproduct' => $id
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil ditambahkan ke keranjang!');
    }

    public function beli_sekarang(Request $request, $id)
    {

        Cart::where('iduser', auth()->user()->id)->delete();

        Cart::create([
            'iduser'    => auth()->user()->id,
            'idproduct' => $id
        ]);

        return redirect('/transaksi');
    }

    public function checkout_page(Request $request)
    {
        $carts = Cart::where('iduser', auth()->user()->id)->get();

        return view('transaksi', ['carts' => $carts]);
    }
}