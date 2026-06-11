<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{

    public function buat_pesanan(Request $request)
    {
    
        $request->validate([
            'metode_pembayaran' => 'required',
            'jenis_transaksi'   => 'required',
            'total_pembayaran'  => 'required'
        ]);


        $carts = Cart::where('iduser', auth()->user()->id)->get();
        
    
        if ($carts->count() == 0) {
            return redirect('/homepage');
        }

   
        $orderTerakhir = null;

        foreach ($carts as $c) {
            $orderTerakhir = Order::create([
                'idproduct'         => $c->idproduct,
                'iduser'            => auth()->user()->id,
                'metode_pembayaran' => $request->metode_pembayaran,
                'jenis_transaksi'   => $request->jenis_transaksi,
                'lama_sewa'         => $request->lama_sewa ?? 0,
                // Kita simpan total pembayaran akhir form ke setiap row agar tidak hilang
                'total_pembayaran'  => $request->total_pembayaran 
            ]);
        }

        Cart::where('iduser', auth()->user()->id)->delete();

  
        $pesan = "";
        if ($request->metode_pembayaran == 'Transfer Bank') {
            $pesan = 'Mohon lakukan transfer ke Rekening OMOUNT ADVENTURE: 123-456-789';
        } elseif ($request->metode_pembayaran == 'E-Wallet') {
            $pesan = 'Silakan scan QRIS OMOUNT ADVENTURE untuk pembayaran.';
        } else {
            if ($request->jenis_transaksi == 'Sewa') {
                $pesan = 'Sewa dikonfirmasi. Siapkan uang tunai saat pengambilan alat pendakian.';
            } else {
                $pesan = 'Pesanan dikonfirmasi. Siapkan uang tunai saat barang diterima.';
            }
        }

 
        return view('validasipage', [
            'order' => $orderTerakhir, 
            'pesan' => $pesan
        ]);
    }

    
    public function transaksi_user()
    {
        $user_id = auth()->user()->id;
        
        $order = Order::where('iduser', $user_id)->get();
        $orderCount = Order::where('iduser', $user_id)->count();

        return view('userdashboard', [
            'data' => $order, 
            'totalTransaction' => $orderCount
        ]);
    }
}