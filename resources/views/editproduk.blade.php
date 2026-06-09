<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - OMOUNT ADVENTURE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f9; }
        .edit-container { max-width: 600px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .preview-img { width: 100%; max-height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 15px; }
    </style>
</head>
<body>
<div class="container">
    <div class="edit-container">
        <h2 class="mb-4 text-center">Edit Produk - OMOUNT ADVENTURE</h2>
        <form action="/produk/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="name" class="form-control" value="{{ $product->namaproduct }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select">
                    <option value="Survival" {{ $product->kategori == 'Survival' ? 'selected' : '' }}>Survival</option>
                    <option value="Hiking" {{ $product->kategori == 'Hiking' ? 'selected' : '' }}>Hiking</option>
                    <option value="Tents" {{ $product->kategori == 'Tents' ? 'selected' : '' }}>Tents</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" name="price" class="form-control" value="{{ $product->harga }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3" required>{{ $product->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar Produk (Opsional)</label>
                @if($product->gambar)
                    <br><img src="{{ asset('storage/images/'.$product->gambar) }}" class="preview-img">
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="/adminproduct" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>