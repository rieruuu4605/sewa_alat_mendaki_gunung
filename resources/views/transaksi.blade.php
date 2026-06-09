<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            text-align: center;
            font-size: 1.5em;
        }
        .checkout-container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            margin: 0 0 15px;
            font-size: 1.3em;
            color: #555;
        }
        .shipping-info,
        .voucher,
        .payment-summary,
        .payment-method {
            grid-column: span 1;
        }
        .product-info {
            grid-column: span 2;
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .product-image {
            width: 120px;
            height: 120px;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .product-details {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .product-details p {
            margin: 5px 0;
        }
        .shipping-options {
            grid-column: span 2;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 1em;
            display: inline-block;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-disabled {
            background-color: #ccc;
            color: #777;
            cursor: not-allowed;
        }
        .price {
            font-weight: bold;
            color: #007bff;
        }
        input[type="text"], select {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 1em;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
        }

        @media screen and (max-width: 768px) {
            .checkout-container {
                grid-template-columns: 1fr;
            }
            .product-info {
                grid-column: span 1;
                flex-direction: column;
                text-align: center;
            }
            .product-image {
                margin: 0 auto;
            }
            .btn {
                display: block;
                width: 100%;
            }
        }

        @media screen and (max-width: 480px) {
            .card {
                padding: 15px;
            }
            .btn {
                padding: 10px 15px;
                font-size: 0.9em;
            }
            .summary-item {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <header>
        Halaman Checkout
    </header>
    @if ($cart !== null)
    <form action="/buat-pesanan/{{ $cart->product->id }}" method="post">
    <div class="checkout-container">
            

        <!-- Alamat Pengiriman -->
        <div class="card shipping-info">
            <h3>Alamat Pengiriman</h3>
            <p><span class="label">Nama Penerima:</span> {{ auth()->user()->firstname }}</p>  <!-- Menampilkan nama depan pengguna yang diambil dari session pengguna yang sedang login melalui `auth()` -->
            <p><span class="label">Telepon:</span> {{ auth()->user()->customer->telepon }}</p> <!-- Menampilkan nomor telepon pengguna melalui relasi `customer` dari pengguna login -->
            <p><span class="label">Alamat:</span> {{ auth()->user()->customer->alamat }}</p>  <!-- Menampilkan alamat pengguna dari relasi `customer` pada pengguna login -->
            <p><span class="label">Kode Pos:</span> {{ auth()->user()->customer->kodepos }}</p><!-- Menampilkan kode pos pengguna dari relasi `customer` -->
            <a href="/profile" class="btn">Edit Alamat</a>
        </div>

        <!-- Informasi Produk -->
        <div class="card product-info">
            <div class="product-image">
                <img src="storage/images/{{ $cart->product->gambar }}" width="100" height="100" alt="">
            </div>
            <div class="product-details">
                <p><strong>Warto Official Shop</strong></p>
                <p>Nama Produk: {{ $cart->product->namaproduct }}</p> <!-- Menampilkan nama produk dari relasi `product` dalam data keranjang ($cart) -->   
                <p>Varian: -</p>
                <p class="price">Harga: Rp. {{ number_format($cart->product->harga, 0) }}</p> <!-- Menampilkan harga produk dengan format angka yang dipisahkan oleh koma menggunakan `number_format` -->
                <a href="/homepage" class="btn">Lihat Detail</a>
            </div>
        </div>

        <!-- Opsi Pengiriman -->
        <div class="card shipping-options">
            <h3>Opsi Pengiriman</h3>
            <p>Reguler: <span class="price">Rp. 9.000</span></p>
            <p>Estimasi waktu pengiriman: 2-3 hari kerja</p>
            <p><strong>Total Pesanan (1 Produk): Rp 100.000</strong></p>
            <select>
                <option value="reguler">Reguler - Rp. 9.000</option>
                <option value="express">Express - Rp. 15.000</option>
            </select>
        </div>

        <!-- Voucher & Diskon -->
        <div class="card voucher">
            <h3>Voucher & Diskon</h3>
            <input type="text" placeholder="Masukkan kode voucher">
            <a href="#" class="btn">Gunakan Voucher</a>
        </div>

        <!-- Metode Pembayaran -->
        <div class="card payment-method">
            <h3>Metode Pembayaran</h3>
            <label for="payment-method">Pilih Metode Pembayaran:</label>
            <select id="payment-method" name="metode_pembayaran">
                <option value="cod">Bayar di Tempat (COD)</option>
                <option value="bank">Transfer Bank</option>
                <option value="ewallet">E-Wallet</option>
            </select>
        </div>

        <!-- Rincian Pembayaran -->
        <div class="card payment-summary">
            <h3>Rincian Pembayaran</h3>
            <div class="summary-item">
                <span>Subtotal Produk:</span> <span class="price">Rp. {{ $cart->product->harga }}</span>  <!-- Menampilkan subtotal produk dengan format mata uang rupiah -->
            </div>
            <div class="summary-item">
                @php
                    $subTotalPengiriman = 9000;
                    $biayaLayanan = 5000;
                @endphp
                <!-- Mendefinisikan variabel `$subTotalPengiriman` dengan nilai 9000 dan `$biayaLayanan` dengan nilai 5000 menggunakan sintaks PHP -->
                <span>Subtotal Pengiriman:</span> <span class="price">Rp. {{ number_format($subTotalPengiriman,0) }}</span>  <!-- Menampilkan subtotal pengiriman dalam format angka dengan koma sebagai pemisah ribuan -->
            </div>
            <div class="summary-item">

                <span>Biaya Layanan:</span> <span class="price">Rp. {{ number_format($biayaLayanan,0) }}</span>  <!-- Menampilkan biaya layanan dalam format angka dengan koma sebagai pemisah ribuan -->
            </div>
            <hr>
            <div class="summary-item">
                <strong>Total Pembayaran:</strong> <strong class="price">Rp. {{ $cart->product->harga + $subTotalPengiriman + $biayaLayanan }}</strong>  <!-- Menghitung dan menampilkan total pembayaran dengan menjumlahkan harga produk, biaya pengiriman, dan biaya layanan -->
            </div>
        </div>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        
            @csrf <!-- Menambahkan token CSRF untuk melindungi form dari serangan CSRF (Cross-Site Request Forgery) -->
            
            <input type="hidden" name="total_pembayaran" value="{{ $cart->product->harga + $subTotalPengiriman + $biayaLayanan }}">  <!-- Menambahkan input tersembunyi dengan nama `total_pembayaran` yang berisi total pembayaran hasil perhitungan -->
            <button type="submit" class="btn">Buat Pesanan</button><!-- Menambahkan tombol submit dengan teks "Buat Pesanan" dan styling menggunakan kelas `btn` -->
        
    </div>
    @else
    <div class="container">
        <div class="card shadow">
            <div class="card-body text-center">
                Anda Belum memesan

                <a href="/homepage" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</form>
    @endif
    
</body>
</html>
