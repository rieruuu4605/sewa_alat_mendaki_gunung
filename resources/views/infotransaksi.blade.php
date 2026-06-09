<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
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
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h4 class="text-white mb-4">Admin Panel</h4>
            <a href="/admin" ><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/adminproduct"><i class="fas fa-box"></i> Produk</a>
            <a href="/infotransaksi" class="active"><i class="fas fa-receipt"></i> Transaksi</a>
        </div>

        <!-- Content -->
        <div class="col-md-10">
            <div class="py-4 px-4">
                <h2 class="mb-4">Informasi Transaksi User</h2>

                <!-- Statistic Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Produk</h5>
                                <p class="card-text fs-4">{{ $totalProduct }} Produk</p>
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

                <!-- Transaction Form -->
                <h3 class="mt-4">Form Transaksi</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Kode Pos</th>
                            <th>Status Transaksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=0;
                            @endphp
                            @foreach ($orders as $item)  <!-- Memulai perulangan foreach untuk setiap item dalam koleksi $orders -->
                            <tr>
                                <td>{{ $no+=1; }}</td>
                                <td>{{ $item->user->firstname }}</td>  <!-- Menampilkan nomor urut order. $no akan ditambah 1 di setiap iterasi -->
                                <td>{{ $item->user->customer->alamat }}</td>  <!-- Menampilkan nama depan pengguna yang melakukan order -->
                                <td>{{ $item->user->customer->telepon }}</td><!-- Menampilkan nomor telepon pengguna yang melakukan order -->
                                <td>{{ $item->user->customer->kodepos }}</td>  <!-- Menampilkan kode pos pengguna yang melakukan order -->
                                <td>Selesai</td>
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
