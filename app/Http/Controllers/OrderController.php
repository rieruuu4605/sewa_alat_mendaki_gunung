<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function buat_pesanan(Request $request, $id)
    {
        $order = Order::create([
            'idproduct' => $id,
            'iduser'=> auth()->user()->id,
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_pembayaran' => $request->total_pembayaran
        ]);

        return view('validasipage',['order'=>$order]);
    }

    public function transaksi_user()
    {
        $order = Order::where('iduser','=',auth()->user()->id)->get();
        
        $orderCount = Order::where('iduser','=',auth()->user()->id)->count();
        return view('userdashboard',['data'=>$order,'totalTransaction'=>$orderCount]);
    }
}
