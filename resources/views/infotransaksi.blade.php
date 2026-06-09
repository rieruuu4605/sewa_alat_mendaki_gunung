<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f4f9; }
        .sidebar { background-color: #343a40; min-height: 100vh; padding: 15px; }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px; margin-bottom: 5px; border-radius: 5px; }
        .sidebar a:hover, .sidebar a.active { background-color: #495057; }
        .card { border: none; border-radius: 10px; }
        .card i { font-size: 24px; }
        
        @media print {
            body { background-color: white !important; }
            .sidebar { display: none !important; }
            .col-md-10 { width: 100% !important; max-width: 100% !important; flex: 0 0 100% !important; padding: 0 !important; }
            .btn-print { display: none !important; }
            .card { border: 1px solid #ddd !important; }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <h4 class="text-white mb-4">Admin Panel</h4>
            <a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/adminproduct"><i class="fas fa-box"></i> Produk</a>
            <a href="/infotransaksi" class="active"><i class="fas fa-receipt"></i> Transaksi</a>
            <a href="/adminpesan"><i class="fas fa-envelope"></i> Pesan Masuk</a>
            
            <div style="margin-top: 20px;">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; width: 100%; text-align: left;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="col-md-10">
            <div class="py-4 px-4">
                <h2 class="mb-4">Informasi Transaksi User</h2>

                <div class="row">
                    <div class="col-md-3"><div class="card text-white bg-warning mb-3"><div class="card-body"><h5 class="card-title">Jumlah Produk</h5><p class="card-text fs-4">{{ $totalProduct }} Produk</p><i class="fas fa-box"></i></div></div></div>
                    <div class="col-md-3"><div class="card text-white bg-success mb-3"><div class="card-body"><h5 class="card-title">Total User</h5><p class="card-text fs-4">{{ $totalCustomer }} User</p><i class="fas fa-users"></i></div></div></div>
                    <div class="col-md-3"><div class="card text-white bg-danger mb-3"><div class="card-body"><h5 class="card-title">Total Transaksi</h5><p class="card-text fs-4">{{ $totalTransaction }} Transaksi</p><i class="fas fa-receipt"></i></div></div></div>
                    <div class="col-md-3"><div class="card text-white bg-primary mb-3"><div class="card-body"><h5 class="card-title">Total Pendapatan</h5><p class="card-text fs-5">Rp{{ number_format(\App\Models\Order::sum('total_pembayaran'), 0, ',', '.') }}</p><i class="fas fa-wallet"></i></div></div></div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                    <h3 class="m-0">Daftar Transaksi - Pembelian</h3>
                    <button onclick="window.print()" class="btn btn-secondary btn-print"><i class="fas fa-print"></i> Cetak Laporan</button>
                </div>
                
                <div class="table-responsive mb-5">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-dark">
                        <tr>
                            <th>ID Transaksi</th>
                            <th>ID User</th>
                            <th>Nama Barang</th> <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Jenis Pembayaran</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $jumlahBeli = 0; @endphp
                            @foreach ($orders as $item)
                                @if($item->jenis_transaksi == 'Beli' || $item->jenis_transaksi == null)
                                @php $jumlahBeli++; @endphp
                                <tr>
                                    <td><strong>TRX-{{ $item->id }}</strong></td>
                                    <td><strong>{{ $item->user->id }}</strong></td>
                                    <td>{{ $item->product->namaproduct ?? 'Produk Dihapus' }}</td> <td>{{ $item->user->firstname }}</td>
                                    <td>{{ $item->user->customer?->alamat ?? 'Belum diisi' }}</td>
                                    <td>{{ $item->user->customer?->telepon ?? '-' }}</td>
                                    <td>{{ $item->metode_pembayaran }}</td>
                                    <td><strong>Rp{{ number_format($item->total_pembayaran, 0, ',', '.') }}</strong></td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                @endif
                            @endforeach
                            @if($jumlahBeli == 0)
                                <tr><td colspan="9" class="text-center">Belum ada transaksi pembelian</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <h3 class="mt-4">Daftar Transaksi - Penyewaan</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-dark">
                        <tr>
                            <th>ID Transaksi</th>
                            <th>ID User</th>
                            <th>Nama Barang</th> <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Durasi Sewa</th>
                            <th>Jenis Pembayaran</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $jumlahSewa = 0; @endphp
                            @foreach ($orders as $item)
                                @if($item->jenis_transaksi == 'Sewa')
                                @php $jumlahSewa++; @endphp
                                <tr>
                                    <td><strong>TRX-{{ $item->id }}</strong></td>
                                    <td><strong>{{ $item->user->id }}</strong></td>
                                    <td>{{ $item->product->namaproduct ?? 'Produk Dihapus' }}</td> <td>{{ $item->user->firstname }}</td>
                                    <td>{{ $item->user->customer?->alamat ?? 'Belum diisi' }}</td>
                                    <td>{{ $item->user->customer?->telepon ?? '-' }}</td>
                                    <td><strong>{{ $item->lama_sewa }} Hari</strong></td>
                                    <td>{{ $item->metode_pembayaran }}</td>
                                    <td><strong>Rp{{ number_format($item->total_pembayaran, 0, ',', '.') }}</strong></td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                @endif
                            @endforeach
                            @if($jumlahSewa == 0)
                                <tr><td colspan="10" class="text-center">Belum ada transaksi penyewaan</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>