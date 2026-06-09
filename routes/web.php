<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/homepage', [App\Http\Controllers\ProductController::class,'index']);

Route::get('/transaksi', [App\Http\Controllers\CartController::class,'checkout_page']);

Route::post('/buat-pesanan/{id}', [App\Http\Controllers\OrderController::class,'buat_pesanan']);

Route::get('/validasi', function () {
    return view('validasipage');
});

Route::get('/userdashboard',[App\Http\Controllers\OrderController::class,'transaksi_user']);

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/user', function () {
    return view('infouser');
});

Route::post('/beli/{id}',[App\Http\Controllers\CartController::class,'beli']);

Route::post('/checkout/{id}',[App\Http\Controllers\CartController::class,'beli_sekarang']);


//Route untuk ke halaman dashboard admin
Route::get('/admin', [App\Http\Controllers\userController::class, 'dashboard_admin']);

Route::get('/infotransaksi', [App\Http\Controllers\userController::class,'info_transaksi']);

Route::get('/produkbaru', function () {
    return view('produkbaru');
});

//Route untuk menambahkan produk baru
Route::post('/submit-produkbaru',[App\Http\Controllers\ProductController::class,'store']);

Route::post('/logout',[App\Http\Controllers\userController::class,'logout']);

Route::post('/login',[App\Http\Controllers\userController::class,'login']);

Route::post('/register',[App\Http\Controllers\userController::class,'register']);

//Route untuk memasukkan data user
Route::post('/submit-profile', [App\Http\Controllers\userController::class,'create'])->name('user.create');

//Route untuk ke halaman admin product
Route::get('/adminproduct', [App\Http\Controllers\userController::class, 'dashboard_product']);

//Route untuk menghapus user
Route::delete('/delete-user/{id}', [App\Http\Controllers\userController::class, 'delete_user']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});