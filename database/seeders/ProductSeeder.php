<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'namaproduct' => 'Tenda Dome Kapasitas 4P',
                'gambar' => 'product3.png', // Sesuai file yang kamu punya
                'deskripsi' => 'Tenda double layer kapasitas 4 orang.',
                'harga' => 45000,
                'stok' => 10,
                'kategori' => 'Tents',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaproduct' => 'Tas Carrier Eiger 60L',
                'gambar' => 'product5.jpg', 
                'deskripsi' => 'Tas gunung kapasitas 60 liter.',
                'harga' => 30000,
                'stok' => 12,
                'kategori' => 'Hiking',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaproduct' => 'Sleeping Bag Polar',
                'gambar' => 'product6.jpg',
                'deskripsi' => 'Kantung tidur berbahan polar hangat.',
                'harga' => 15000,
                'stok' => 25,
                'kategori' => 'Survival',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaproduct' => 'Kompor Gas Mini Outdoor',
                'gambar' => 'product1.jpg',
                'deskripsi' => 'Kompor portable praktis.',
                'harga' => 15000,
                'stok' => 15,
                'kategori' => 'Survival',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaproduct' => 'Nesting / Cooking Set',
                'gambar' => 'product7.jpg',
                'deskripsi' => 'Satu set panci dan penggorengan ringan.',
                'harga' => 12000,
                'stok' => 15,
                'kategori' => 'Survival',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}