<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\userController;
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
    Route::get('/login', function () { return view('login'); })->name('login'); // name('login') wajib ada
    Route::get('/register', function () { return view('register'); });
    Route::post('/login', [userController::class, 'login']);
    Route::post('/register', [userController::class, 'register']);

    // 2. Route Private (Wajib Login)
    Route::middleware(['auth'])->group(function () {
        
        // Transaksi & Keranjang
        Route::get('/transaksi', [CartController::class, 'checkout_page']);
        Route::post('/buat-pesanan', [OrderController::class, 'buat_pesanan']);
        Route::post('/beli/{id}', [CartController::class, 'beli']);
        Route::post('/checkout/{id}', [CartController::class, 'beli_sekarang']);
        
        // User Panel
        Route::get('/userdashboard', [OrderController::class, 'transaksi_user']);
        Route::get('/profile', function () { return view('profile'); });
        Route::get('/user', function () { return view('infouser'); });
        Route::post('/submit-profile', [userController::class, 'create'])->name('user.create');
        
        // Admin Panel
        Route::get('/admin', [userController::class, 'dashboard_admin']);
        Route::get('/infotransaksi', [userController::class, 'info_transaksi']);
        Route::get('/produkbaru', function () { return view('produkbaru'); });
        Route::post('/submit-produkbaru', [ProductController::class, 'store']);
        Route::get('/adminproduct', [userController::class, 'dashboard_product']);
        Route::delete('/delete-user/{id}', [userController::class, 'delete_user']);
        
        // Logout (Wajib di dalam auth)
        Route::post('/logout', [userController::class, 'logout']);

        // Validasi
        Route::get('/validasi', function () { return view('validasipage'); });
// Route untuk Edit
    // Route untuk Edit (Menampilkan halaman form)
    Route::get('/produk/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);

    // Route untuk Update (Proses simpan perubahan)
    Route::put('/produk/update/{id}', [App\Http\Controllers\ProductController::class, 'update']);

    // Route untuk Hapus
    Route::delete('/produk/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);
    });
    
   Route::get('/adminpesan', function () {
    // Mengambil semua data dari tabel contacts, diurutkan dari yang paling baru (descending)
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

    // Tambahkan ini di luar middleware auth
    Route::get('/perlu-login', function () {
        return view('please-login'); // Buat file please-login.blade.php
    });

    Route::post('/kirim-pesan', [\App\Http\Controllers\userController::class, 'kirim_pesan']);

    // Route untuk Ganti Password di Profil
    Route::post('/update-password', [\App\Http\Controllers\userController::class, 'update_password']);

    // Route untuk fitur Lupa Password
    Route::get('/forgot-password', [\App\Http\Controllers\userController::class, 'lupa_password_page']);
    Route::post('/forgot-password', [\App\Http\Controllers\userController::class, 'proses_lupa_password']);