<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - OMOUNT ADVENTURE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }
        .fixed-header { position: fixed; top: 0; left: 0; width: 100%; background-color: #28a745; color: #fff; text-align: center; padding: 15px 0; z-index: 1000; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-weight: bold; }
        .main-content { display: flex; justify-content: center; align-items: center; min-height: 100vh; padding-top: 80px; }
        .card { border: none; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden; width: 450px; }
        .card-header { background-color: #28a745; color: #fff; text-align: center; font-weight: bold; padding: 20px; }
        .card-body { padding: 30px; }
        .btn-orange { background-color: #fd7e14; color: #fff; border: none; }
        .btn-orange:hover { background-color: #e36d10; }
        .btn-green { background-color: #28a745; color: #fff; border: none; }
        .btn-green:hover { background-color: #218838; }
        .product-image { max-width: 100%; height: auto; border-radius: 8px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <div class="fixed-header">
        <span>Pesanan Berhasil di OMOUNT ADVENTURE!</span>
    </div>

    <div class="main-content">
        <div class="card">
            <div class="card-header">
                {{ $pesan ?? 'Pesanan berhasil diproses!' }}
            </div>
            <div class="card-body">
                <img src="{{ asset('storage/images/'.$order->product->gambar) }}" alt="Produk" class="product-image">
                
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item">
                        <strong>Nomor Pesanan:</strong> #{{ $order->id }}
                    </li>
                    <li class="list-group-item">
                        <strong>Nama Pemesan:</strong> {{ $order->user->firstname }} {{ $order->user->lastname }}
                    </li>
                    
                    <li class="list-group-item">
                        <strong>Tipe Transaksi:</strong> {{ $order->jenis_transaksi }}
                        @if($order->jenis_transaksi == 'Sewa')
                            <span class="badge bg-info text-dark ms-1">{{ $order->lama_sewa }} Hari</span>
                        @endif
                    </li>
                    
                    <li class="list-group-item">
                        <strong>Metode Pembayaran:</strong> {{ ucfirst($order->metode_pembayaran) }}
                    </li>
                    <li class="list-group-item">
                        <strong>Total:</strong> Rp {{ number_format($order->total_pembayaran, 0, ',', '.') }}
                    </li>
                    <li class="list-group-item">
                        <strong>Alamat:</strong> {{ $order->user->customer?->alamat ?? 'Alamat belum diatur' }}
                    </li>
                </ul>
                
                <div class="d-flex justify-content-between">
                    <a href="/userdashboard" class="btn btn-orange">Lihat Pesanan</a>
                    <a href="/homepage" class="btn btn-green">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>