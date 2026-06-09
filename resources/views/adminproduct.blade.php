<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product</title>
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
        .table-container { background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .btn-action { margin-right: 5px; }
        .product-image { width: 80px; height: 80px; object-fit: cover; border-radius: 8px; }
        .status-available { color: green; font-weight: bold; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <h4 class="text-white mb-4">Admin Panel</h4>
            <a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/adminproduct" class="active"><i class="fas fa-box"></i> Produk</a>
            <a href="/infotransaksi"><i class="fas fa-receipt"></i> Transaksi</a>
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
                <h2 class="mb-4">Informasi Product</h2>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Produk</h5>
                                <p class="card-text fs-4">{{ $totalProduct ?? 0 }} Produk</p>
                                <i class="fas fa-box"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total User</h5>
                                <p class="card-text fs-4">{{ $totalCustomer ?? 0 }} User</p>
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Transaksi</h5>
                                <p class="card-text fs-4">{{ $totalTransaction ?? 0 }} Transaksi</p>
                                <i class="fas fa-receipt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Pendapatan</h5>
                                <p class="card-text fs-5">Rp{{ number_format(\App\Models\Order::sum('total_pembayaran'), 0, ',', '.') }}</p>
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="mt-4">Manajemen Produk</h3>
                <div class="table-container">
                    <div class="d-flex justify-content-between mb-3">
                        <input type="text" id="searchInput" class="form-control w-25" placeholder="Cari produk...">
                        <a href="/produkbaru" class="btn btn-primary">Produk Baru</a>
                    </div>
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-dark">
                        <tr>
                            <th>ID Produk</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td><strong>PRD-{{ $item->id }}</strong></td>
                            <td><img src="{{ asset('storage/images/'.$item->gambar) }}" alt="Produk" class="product-image"></td>
                            <td>{{ $item->namaproduct }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->stok }}</td>
                            <td><span class="status-available">Tersedia</span></td>
                            <td>
                                <a href="/produk/edit/{{ $item->id }}" class="btn btn-warning btn-sm btn-action">Edit</a>
                                
                                <form action="/produk/delete/{{ $item->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            if(text.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>