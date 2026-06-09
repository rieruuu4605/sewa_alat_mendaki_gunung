<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'firstname' => 'Admin',
                'lastname' => 'OMOUNT ADVENTURE',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'),
                'phonenumber' => '081234567890',
                'role' => 'admin', // UBAH INI JADI 'admin'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'User',
                'lastname' => 'Tester',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password123'),
                'phonenumber' => '089876543210',
                'role' => 'customer', // INI SUDAH BENAR
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}