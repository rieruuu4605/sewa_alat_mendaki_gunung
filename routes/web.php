<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes (Sudah Terproteksi)
|--------------------------------------------------------------------------
*/

// 1. Route Publik (Bisa diakses tanpa login)
Route::get('/', function () { return view('welcome'); });
Route::get('/homepage', [ProductController::class, 'index']);
Route::get('/about', function () { return view('about'); });
Route::get('/contact', function () { return view('contact'); });

// Route Login & Register
Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/register', function () { return view('register'); });
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

// Route untuk fitur Lupa Password
Route::get('/forgot-password', [UserController::class, 'lupa_password_page']);
Route::post('/forgot-password', [UserController::class, 'proses_lupa_password']);

// Route Pesan (Bisa dikirim tanpa login/opsional tergantung desain)
Route::post('/kirim-pesan', [UserController::class, 'kirim_pesan']);

// Route Info Login
Route::get('/perlu-login', function () {
    return view('please-login');
});

// 2. Route Private (Wajib Login)
Route::middleware(['auth'])->group(function () {
    
    // Transaksi & Keranjang
    Route::get('/transaksi', [CartController::class, 'checkout_page']);
    Route::post('/buat-pesanan', [OrderController::class, 'buat_pesanan']);
    Route::post('/beli/{id}', [CartController::class, 'beli']);
    Route::post('/checkout/{id}', [CartController::class, 'beli_sekarang']);
    Route::get('/userdashboard', [OrderController::class, 'transaksi_user']);

    // Logout
    Route::post('/logout', [UserController::class, 'logout']);
    
    // User Info & Update Profile
    Route::get('/user', [UserController::class, 'info_user']);
    
    // Tambahkan dua baris ini untuk halaman Edit Profile
    Route::get('/profile', function () { return view('profile'); });
    Route::post('/submit-profile', [UserController::class, 'create']);
    
    Route::post('/update-password', [UserController::class, 'update_password']);

    // Admin Dashboard (Sebaiknya ditambahkan middleware khusus admin nanti)
    Route::get('/admin', [UserController::class, 'dashboard_admin']);
    Route::get('/adminproduct', [UserController::class, 'dashboard_product']);
    Route::get('/infotransaksi', [UserController::class, 'info_transaksi']);
    Route::post('/delete-user/{id}', [UserController::class, 'delete_user']);
    
   // CRUD Produk
    Route::get('/produkbaru', function () { return view('produkbaru'); });
    Route::post('/produk/store', [ProductController::class, 'store']);
    
    Route::get('/produk/edit/{id}', [ProductController::class, 'edit']);
    Route::put('/produk/update/{id}', [ProductController::class, 'update']);
    Route::delete('/produk/delete/{id}', [ProductController::class, 'destroy']);
    
    // Pesan Contact Admin
    Route::get('/adminpesan', function () {
        $messages = \App\Models\Contact::orderBy('created_at', 'desc')->get();
        return view('adminpesan', compact('messages'));
    });

    Route::delete('/pesan/delete/{id}', function ($id) {
        $pesan = \App\Models\Contact::find($id);
        if($pesan){
            $pesan->delete();
        }
        return back();
    });
});