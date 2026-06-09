<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\customer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
   

    public function register(Request $request)
    {
        $user = User::create([
            'firstname'   => $request->firstname,
            'lastname'    => $request->lastname,
            'email'       => $request->email,
            'phonenumber' => $request->phonenumber,
            'password'    => Hash::make($request->password),
            'role'        => "customer"
        ]);

        customer::create([
            'iduser' => $user->id
        ]);

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin')->with('message', 'Selamat datang Admin!');
            } else {
                return redirect('/homepage')->with('message', 'Selamat datang!');
            }
        }
        return back()->with('message', 'Username atau Password salah, tolong cek kembali....');
    }

   public function logout(Request $request)
    {
       
        auth()->logout();
        
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();

  
        return redirect('/login')->with('success', 'Anda telah berhasil logout!'); 
    }

   
    public function info_user()
    {
        return view('infouser');
    }

    public function create(Request $request)
{
    $profile = $request->file('image');
    if ($profile) {
        $profile->storeAs('public/images', $profile->hashName());
    }

   
    User::where('id', '=', auth()->user()->id)->update([
        'firstname' => $request->firstname,
        'lastname'  => $request->lastname
    ]);


    customer::updateOrCreate(
        ['iduser' => auth()->user()->id],
        [
            'alamat'       => $request->address,
            'telepon'      => $request->phone,
            'kodepos'      => $request->postal_code,
            'jeniskelamin' => $request->gender,
            'image'        => $profile ? $profile->hashName() : auth()->user()->customer->image ?? "",
        ]
    );

    return redirect('/user'); 
}

    public function dashboard_admin()
    {
        $customer         = User::where('role', '!=', 'admin')->get();
        $totalCustomer    = User::where('role', '!=', 'admin')->count();
        $totalTransaction = Order::count();
        $totalProduct     = product::count();

        return view('adminpage', [
            'user'           => $customer,
            'totalCustomer'    => $totalCustomer,
            'totalProduct'     => $totalProduct,
            'totalTransaction' => $totalTransaction
        ]);
    }

    public function dashboard_product()
    {
        $products         = product::all();
        $totalCustomer    = User::where('role', '!=', 'admin')->count();
        $totalProduct     = product::count();
        $totalTransaction = Order::count();

        return view('adminproduct', [
            'products'         => $products,
            'totalCustomer'    => $totalCustomer,
            'totalProduct'     => $totalProduct,
            'totalTransaction' => $totalTransaction
        ]);
    }

    public function delete_user(Request $request, $id)
    {
        User::where('id', '=', $id)->delete();
        return redirect('/admin');
    }

    public function info_transaksi()
    {
        $order            = Order::all();
        $totalCustomer    = User::where('role', '!=', 'admin')->count();
        $totalProduct     = product::count();
        $totalTransaction = Order::count();

        return view('infotransaksi', [
            'orders'           => $order,
            'totalCustomer'    => $totalCustomer,
            'totalProduct'     => $totalProduct,
            'totalTransaction' => $totalTransaction
        ]);
    }
    public function kirim_pesan(Request $request)

        \App\Models\Contact::create([
            // Nama dan email diambil otomatis dari akun yang sedang login
            'name'    => Auth::user()->firstname . ' ' . Auth::user()->lastname, 
            'email'   => Auth::user()->email, 
            'message' => $request->message
        ]);

        return redirect()->back()->with('success', 'Pesan kamu berhasil dikirim ke Admin!');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password'
        ]);

        $user = User::find(Auth::user()->id);


        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Password berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Password lama salah!');
        }
    }

    public function lupa_password_page()
    {
        return view('forgotpassword');
    }

    public function proses_lupa_password(Request $request)
    {
        // Mencari user yang Email DAN Nomor Teleponnya cocok (Sebagai keamanan ganti OTP Email)
        $user = User::where('email', $request->email)
                    ->where('phonenumber', $request->phonenumber)
                    ->first();

        if ($user) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect('/login')->with('message', 'Password berhasil direset! Silakan login dengan password baru.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan! Pastikan Email dan Nomor Telepon cocok.');
        }
    }
}

