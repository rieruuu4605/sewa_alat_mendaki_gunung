<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #2b6cb0;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 10px 20px;
            font-size: 16px;
        }
        .sidebar a:hover {
            background-color: #1e4e8c;
        }
        .sidebar .active {
            background-color: #1e4e8c;
            font-weight: bold;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .card-summary {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            background-color: #ffffff;
        }
        .table-responsive {
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #2b6cb0;
            border: none;
        }
        .btn-primary:hover {
            background-color: #1e4e8c;
        }
        .btn-danger {
            border: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="userdashboard" class="active"><i class="bi bi-grid"></i> Dashboard</a>
        <a href="/profile"><i class="bi bi-person"></i> Profile</a>
        <a href="/homepage"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>EXVENTURE</h2>
            <button class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </div>
        
        <h4>Hi {{auth()->user()->firstname}}!</h4>
        <div class="card-summary mb-4">
            <h6>Total Pesanan</h6>
            <h2>{{ $totalTransaction }}</h2>
        </div>
        
        <div class="table-responsive">
            <h5>Histori Transaksi</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nomor Order</th>
                        <th>Nama</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user->firstname }}</td>
                        <td>{{ $item->product->namaproduct }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>Paid</td>
                        <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-printer"></i> Cetak</button>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mt-3">
                <button class="btn btn-primary">Show more</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('.btn-primary').addEventListener('click', () => {
            alert('Navigasi ke data tambahan.');
        });
    </script>
</body>
</html>
