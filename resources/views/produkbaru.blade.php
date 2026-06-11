<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product - Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/gif" height="30px">
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f4f9; }
        .sidebar { background-color: #343a40; min-height: 100vh; padding: 15px; }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px; margin-bottom: 5px; border-radius: 5px; }
        .sidebar a:hover, .sidebar a.active { background-color: #495057; }
        .table-container { background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
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
        </div>

        <div class="col-md-10">
            <div class="py-4 px-4">
                <h2 class="mb-4">Input Produk Baru</h2>
                <div class="table-container">
                    <form action="/submit-produkbaru" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Product</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" name="kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Survival">Survival</option>
                                <option value="Hiking">Hiking</option>
                                <option value="Tents">Tents</option>
                                <option value="Knives">Knives</option>
                                <option value="Water Bottles">Water Bottles</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image Upload</label>
                            <input type="file" class="form-control" name="image" accept=".jpg,.jpeg,.png" required>
                            <small class="form-text">Maksimal 300KB, Minimal 100px x 100px, Tipe file: JPG, JPEG, PNG.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="mb-3 mt-3"> 
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok barang" required>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/adminproduct" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>