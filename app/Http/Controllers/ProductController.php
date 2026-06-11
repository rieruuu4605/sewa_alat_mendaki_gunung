<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = product::query();

        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->whereIn('kategori', $request->kategori);
        }

        // Filter berdasarkan harga maksimal
        if ($request->has('harga_max') && !empty($request->harga_max)) {
            $query->where('harga', '<=', $request->harga_max);
        }

        if ($request->sort == 'harga_asc') {
            $query->orderBy('harga', 'asc');
        } elseif ($request->sort == 'harga_desc') {
            $query->orderBy('harga', 'desc');
        }

        $product = $query->get();

        return view('index', ['products' => $product]);
    }

   public function store(Request $request)
    {
        // Mengamankan gambar
        $file = $request->file('image');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->storeAs('public/images', $nama_file);

        // Menyimpan data ke database
        Product::create([
            'namaproduct' => $request->name,
            'kategori'    => $request->kategori, // Tambahan baru
            'gambar'      => $nama_file,
            'deskripsi'   => $request->description,
            'harga'       => $request->price,
            'stok'        => $request->stok      // Tambahan baru
        ]);

        return redirect('/adminproduct');
    }

    public function edit($id)
    {
        $product = product::findOrFail($id);
        return view('editproduk', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = product::findOrFail($id);

        if ($request->hasFile('image')) {
            $gambar = $request->file('image');
            $gambar->storeAs('public/images', $gambar->hashName());
            $product->gambar = $gambar->hashName();
        }

        $product->update([
            'namaproduct' => $request->name,
            'deskripsi'   => $request->description ?? $product->deskripsi, // Menggunakan deskripsi lama jika input kosong
            'harga'       => $request->price,
            'kategori'    => $request->kategori,
        ]);

        return redirect('/adminproduct')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();

        return redirect('/adminproduct')->with('success', 'Produk berhasil dihapus!');
    }
}