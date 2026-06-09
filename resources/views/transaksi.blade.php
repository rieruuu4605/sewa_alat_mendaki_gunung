<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page - OMOUNT ADVENTURE</title>
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/gif" height="30px">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f7fa; color: #333; }
        header { background-color: #28a745; color: white; padding: 15px 20px; text-align: center; font-size: 1.5em; font-weight: bold; position: relative; }
        .back-btn { position: absolute; left: 20px; top: 15px; color: white; text-decoration: none; border: 1px solid white; padding: 5px 15px; border-radius: 5px; font-size: 0.8em; }
        .back-btn:hover { background: rgba(255,255,255,0.2); color: white; }
        .checkout-container { width: 90%; max-width: 1200px; margin: 20px auto; display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .card { background: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .card h3 { margin: 0 0 15px; font-size: 1.3em; color: #555; }
        .shipping-info, .voucher, .payment-summary, .payment-method, .transaction-type { grid-column: span 1; }
        .product-list { grid-column: span 2; }
        .product-info { display: flex; gap: 20px; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 15px; }
        .product-info:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        .product-image { width: 100px; height: 100px; background-color: #eee; display: flex; align-items: center; justify-content: center; border-radius: 8px; overflow: hidden;}
        .product-image img { width: 100%; height: 100%; object-fit: cover; }
        .product-details p { margin: 5px 0; }
        .shipping-options { grid-column: span 2; }
        .btn { background-color: #fd7e14; color: #fff; border: none; padding: 12px 24px; border-radius: 5px; cursor: pointer; text-align: center; font-size: 1em; display: inline-block; text-decoration: none; font-weight: bold; }
        .btn:hover { background-color: #e36d10; }
        .price { font-weight: bold; color: #28a745; }
        input[type="text"], input[type="number"], select { width: 80%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px; font-size: 1em; }
        .label { font-weight: bold; color: #555; }
        .summary-item { display: flex; justify-content: space-between; margin: 5px 0; }
        @media screen and (max-width: 768px) { .checkout-container { grid-template-columns: 1fr; } .product-list, .shipping-options { grid-column: span 1; } }
    </style>
</head>
<body>
    <header>
        <a href="/homepage" class="back-btn"><i class="bi bi-arrow-left"></i> Kembali</a>
        Halaman Checkout - OMOUNT ADVENTURE
    </header>

    @if ($carts->count() > 0)
    
    <form action="/buat-pesanan" method="post">
        @csrf
        <div class="checkout-container">
            <div class="card shipping-info">
                <h3>Alamat Pengiriman</h3>
                <p><span class="label">Nama Penerima:</span> {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                <p><span class="label">Telepon:</span> {{ auth()->user()->customer?->telepon ?? '-' }}</p>
                <p><span class="label">Alamat:</span> {{ auth()->user()->customer?->alamat ?? '-' }}</p>
                <p><span class="label">Kode Pos:</span> {{ auth()->user()->customer?->kodepos ?? '-' }}</p>
                <a href="/user" class="btn" style="background-color: #6c757d; padding: 8px 15px; font-size: 0.9em;">Edit Alamat</a>
            </div>

            <div class="card product-list">
                <h3>Produk Dipesan</h3>
                @php $totalHargaProduk = 0; @endphp
                @foreach($carts as $c)
                    @php $totalHargaProduk += $c->product->harga; @endphp
                    <div class="product-info">
                        <div class="product-image">
                            <img src="{{ asset('storage/images/' . $c->product->gambar) }}" alt="Produk">
                        </div>
                        <div class="product-details">
                            <p><strong>{{ $c->product->namaproduct }}</strong></p>
                            <p class="price">Rp. {{ number_format($c->product->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card shipping-options">
                <h3>Opsi Pengiriman</h3>
                <p>Reguler: <span class="price">Rp. 9.000</span></p>
                <select>
                    <option value="reguler">Reguler - Rp. 9.000</option>
                </select>
            </div>

            <div class="card voucher">
                <h3>Voucher &amp; Diskon</h3>
                <input type="text" placeholder="Masukkan kode voucher">
                <a href="#" class="btn" style="background-color: #17a2b8;">Gunakan</a>
            </div>
            
            <div class="card transaction-type">
                <h3>Jenis Transaksi</h3>
                <label for="jenisTransaksi" class="label">Pilih Transaksi:</label>
                <select name="jenis_transaksi" id="jenisTransaksi" class="form-select" required>
                    <option value="Beli">Beli Sekaligus</option>
                    <option value="Sewa">Sewa Barang</option>
                </select>

                <div id="inputLamaSewa" style="display: none; margin-top: 15px;">
                    <label for="lamaSewa" class="label">Lama Sewa (Hari):</label>
                    <input type="number" name="lama_sewa" id="lamaSewa" value="0" min="0">
                </div>
            </div>

            <div class="card payment-method">
                <h3>Metode Pembayaran</h3>
                <label for="payment-method" class="label">Pilih Pembayaran:</label>
                <select name="metode_pembayaran" class="form-select" required>
                    <option value="Bayar di Tempat (COD)">Bayar di Tempat (COD)</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                </select>
            </div>

            <div class="card payment-summary">
                <h3>Rincian Pembayaran</h3>
                @php
                    $subTotalPengiriman = 9000;
                    $biayaLayanan = 5000;
                    $totalAwal = $totalHargaProduk + $subTotalPengiriman + $biayaLayanan;
                @endphp
                <div class="summary-item">
                    <span>Subtotal Produk:</span>
                    <span class="price" id="subtotalProduk">Rp. {{ number_format($totalHargaProduk, 0, ',', '.') }}</span>
                </div>
                <div class="summary-item">
                    <span>Subtotal Pengiriman:</span>
                    <span class="price">Rp. {{ number_format($subTotalPengiriman, 0, ',', '.') }}</span>
                </div>
                <div class="summary-item">
                    <span>Biaya Layanan:</span>
                    <span class="price">Rp. {{ number_format($biayaLayanan, 0, ',', '.') }}</span>
                </div>
                <hr>
                <div class="summary-item">
                    <strong>Total Akhir:</strong>
                    <strong class="price" id="totalKeseluruhan">Rp. {{ number_format($totalAwal, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>

        <input type="hidden" id="inputTotalPembayaran" name="total_pembayaran" value="{{ $totalAwal }}">
        
        <div style="text-align: center; margin-top: 20px; margin-bottom: 40px;">
            <button type="submit" class="btn" style="padding: 15px 40px; font-size: 1.2em;">Proses Semua Pesanan</button>
        </div>
    </form>

    <script>
        const totalHargaBawaan = {{ $totalHargaProduk }};
        const biayaLainnya = {{ $subTotalPengiriman + $biayaLayanan }};
        function hitungTotal() {
            let jenis = document.getElementById('jenisTransaksi').value;
            let hari = parseInt(document.getElementById('lamaSewa').value) || 0;
            let subtotal = (jenis === 'Sewa') ? (totalHargaBawaan * hari) : totalHargaBawaan;
            let totalAkhir = subtotal + biayaLainnya;
            document.getElementById('subtotalProduk').innerText = 'Rp. ' + subtotal.toLocaleString('id-ID');
            document.getElementById('totalKeseluruhan').innerText = 'Rp. ' + totalAkhir.toLocaleString('id-ID');
            document.getElementById('inputTotalPembayaran').value = totalAkhir;
        }
        document.getElementById('jenisTransaksi').addEventListener('change', function() {
            let formSewa = document.getElementById('inputLamaSewa');
            let inputHari = document.getElementById('lamaSewa');
            if (this.value === 'Sewa') {
                formSewa.style.display = 'block';
                if(inputHari.value == 0) inputHari.value = 1;
            } else {
                formSewa.style.display = 'none';
                inputHari.value = 0;
            }
            hitungTotal();
        });
        document.getElementById('lamaSewa').addEventListener('input', hitungTotal);
    </script>

    @else
    <div class="container mt-4" style="text-align: center; margin-top: 50px;">
        <div class="card shadow" style="display: inline-block; padding: 40px;">
            <p style="font-size: 1.2em; color: #555;">Keranjang Anda masih kosong.</p>
            <div style="display: flex; gap: 10px; justify-content: center;">
                <a href="/homepage" class="btn btn-secondary">Kembali</a>
                <a href="/homepage" class="btn">Belanja Sekarang</a>
            </div>
        </div>
    </div>
    @endif
</body>
</html>