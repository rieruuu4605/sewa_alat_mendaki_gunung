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
                                <p class="card-text fs-4">1 Produk</p>
                                <i class="fas fa-box"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total User</h5>
                                <p class="card-text fs-4">1 User</p>
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Transaksi</h5>
                                <p class="card-text fs-4">0 Transaksi</p>
                                <i class="fas fa-receipt"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Management Section -->
                <h3 class="mt-4">Input Produk Baru</h3>
                <div class="table-container">
                <form action="/submit-produkbaru" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nama Product</label>
                        <input type="text" class="form-control" id="productName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Image Upload</label>
                        <input type="file" class="form-control" id="productImage" name="image" accept=".jpg,.jpeg,.png" required>
                        <small class="form-text">Maksimal 300KB, Minimal 100px x 100px, Tipe file: JPG, JPEG, PNG.</small>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="productDescription" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="productPrice" name="price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
