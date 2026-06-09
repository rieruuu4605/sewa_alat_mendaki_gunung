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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
        }
        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
            padding: 15px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .card i {
            font-size: 24px;
        }
        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-action {
            margin-right: 5px;
        }
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }
        .status-available {
            color: green;
            font-weight: bold;
        }
        .status-soldout {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h4 class="text-white mb-4">Admin Panel</h4>
            <a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/adminproduct" class="active" ><i class="fas fa-box"></i> Produk</a>
            <a href="/infotransaksi"><i class="fas fa-receipt"></i> Transaksi</a>
        </div>

        <!-- Content -->
        <div class="col-md-10">
            <div class="py-4 px-4">
                <h2 class="mb-4">Informasi Product</h2>

                <!-- Statistic Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Produk</h5>
                                <p class="card-text fs-4">{{ $totalProduct }}</p>
                                <i class="fas fa-box"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total User</h5>
                                <p class="card-text fs-4">{{ $totalCustomer }} User</p>
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Transaksi</h5>
                                <p class="card-text fs-4">{{ $totalTransaction }} Transaksi</p>
                                <i class="fas fa-receipt"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Management Section -->
                <h3 class="mt-4">Manajemen Produk</h3>
                <div class="table-container">
                    <div class="d-flex justify-content-between mb-3">
                        <input type="text" class="form-control w-25" placeholder="Cari produk...">
                        <a href="/produkbaru" class="btn btn-primary">Produk Baru</a>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no=0;
                        @endphp
                        @foreach ($products as $item)
                        <tr>
                            <td>{{ $no+=1; }}</td> <!-- Menampilkan nomor urut produk, dengan menambah 1 pada variabel $no setiap kali baris ini dijalankan. -->
                            <td><img src="storage/images/{{ $item->gambar }}" alt="Produk A" class="product-image"></td> <!-- Menampilkan gambar produk yang diambil dari direktori 'storage/images/' menggunakan nama file yang disimpan di database (item->gambar). -->
                            <!-- Gambar ini diberikan class 'product-image' untuk styling. -->
                            <td>{{ $item->namaproduct }}</td>  <!-- Menampilkan nama produk yang diambil dari database dengan variabel $item->namaproduct. -->
                            <td>Kategori 1</td>
                            <td>Rp{{ number_format($item->harga,0) }}</td> <!-- Menampilkan harga produk dengan format angka yang dipisahkan oleh koma dan ditambahkan 'Rp' di depannya. Format ini membuat harga lebih mudah dibaca. -->
                            <td>{{ $item->stok }}</td> <!-- Menampilkan stok produk yang ada, yang diambil dari database dengan variabel $item->stok. -->
                            <td><span class="status-available">Tersedia</span></td>
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
</body>
</html>
