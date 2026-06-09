<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    //function untuk menampilkan semua data di halaman index
    public function index()
    {
        $product = product::all();

        return view('index',['products'=>$product]);
    }

    //function untuk menambahkan product baru
    public function store(Request $request)
    {
        $gambar = $request->file('image');
        if($gambar)
        {
            $gambar->storeAs('public/images',$gambar->hashName());
        }

        $product = product::create([
            'namaproduct' => $request->name,
            'gambar' => $gambar ? $gambar->hashName() : null,
            'deskripsi' => $request->description,
            'harga' => $request->price,
            'stok' =>50,
        ]);

        return redirect('/adminproduct');
    }
}
