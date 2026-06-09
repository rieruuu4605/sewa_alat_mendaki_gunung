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
    public function register (Request $request)
    {
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => $request->password,
            'role' => "customer"
        ]);

        customer::create([
            'iduser' => $user->id
        ]);

        return redirect ('/login');
    }
    public function login (Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Query untuk mendapatkan user berdasarkan username
        $user = DB::table('users')
            ->where('email', $credentials['email'])
            ->first();

        // Jika user ditemukan dan password sesuai
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Set session untuk username, status, dan nama lengkap
            $request->session()->put([
                'email' => $user->email,
            ]);

            Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);
            //Auth::login($user);

            // Menampilkan alert login berhasil dengan nama lengkap diambil dari session
            echo "<script>alert('Login Berhasil, Selamat datang, " . $user->email."')</script>";
            if(auth()->user()->role === 'admin'){
                echo "<script>window.location = 'admin';</script>";
            }
            // Redirect ke halaman selamat datang setelah alert ditampilkan
            echo "<script>window.location = 'homepage';</script>";
        } else {
            // Jika login gagal, kembalikan ke halaman login dengan pesan error
            session()->flash('message', 'Username atau Password salah, tolong cek kembali....');
            return redirect('/login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/homepage');
    }
    public function create(Request $request){

        $profile = $request->file('image');
        if($profile){
            $profile->storeAs('public/images', $profile->hashName());
        }
        User::where('id','=',auth()->user()->id)->update([
            'firstname' => $request->name
        ]);

        customer::create([
            "iduser" =>auth()->user()->id,
            "alamat" =>$request->address,
            "telepon"=>$request->phone,
            "kodepos" =>$request->postal_code,
            "jeniskelamin" => $request->gender,
            'image' => $profile ? $profile->hashName() : "",
        ]);


        return redirect('/user');
    }

    //function untuk ke halaman dashboard admin
    public function dashboard_admin()
    {
        //mengambil data user selain admin
        $customer = User::where('role','!=','admin')->get();
        
        $totalCustomer = User::where('role','!=','admin')->count();
        
        $totalTransaction = Order::count();
        $totalProduct = product::count();

        return view('adminpage',['user'=>$customer,'totalCustomer'=>$totalCustomer,'totalProduct'=>$totalProduct,'totalTransaction'=>$totalTransaction]);
    }

    //Route untuk ke halaman dashboard product
    public function dashboard_product()
    {
        //mengambil data product 
        $products = product::all();
        
        $totalCustomer = User::where('role','!=','admin')->count();
        
        $totalProduct = product::count();

        $totalTransaction = Order::count();

        return view('adminproduct',['products'=>$products,'totalCustomer'=>$totalCustomer,'totalProduct'=>$totalProduct,'totalTransaction'=>$totalTransaction]);
    }

    //function untuk menghapus user
    public function delete_user(Request $request,$id)
    {
        $user = User::where('id','=',$id)->delete();

        return redirect('/admin');
    }

    //function untuk ke halaman admin info transaksi
    public function info_transaksi()
    {
        //mengambil data product 
        $order = Order::all();
        
        $totalCustomer = User::where('role','!=','admin')->count();
        
        $totalProduct = product::count();

        $totalTransaction = Order::count();

        return view('infotransaksi',['orders'=>$order,'totalCustomer'=>$totalCustomer,'totalProduct'=>$totalProduct,'totalTransaction'=>$totalTransaction]);
    }
}

