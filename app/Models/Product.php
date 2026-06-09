<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaproduct',
        'gambar',
        'deskripsi',
        'harga',
        'stok',
        'kategori' // tambah kolom kategori
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class, 'idproduct', 'id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'idproduct', 'id');
    }
}
