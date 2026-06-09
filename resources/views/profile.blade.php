<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - OMOUNT ADVENTURE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f9; }
        .profile-container { max-width: 600px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<div class="container">
    <div class="profile-container">
        <h2 class="mb-4 text-center">Profil OMOUNT ADVENTURE</h2>
        <form action="/submit-profile" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Depan</label>
                    <input type="text" name="firstname" class="form-control" value="{{ auth()->user()->firstname }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Belakang</label>
                    <input type="text" name="lastname" class="form-control" value="{{ auth()->user()->lastname }}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control" value="{{ auth()->user()->customer?->alamat ?? '' }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ auth()->user()->customer?->telepon ?? '' }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kode Pos</label>
                <input type="text" name="postal_code" class="form-control" value="{{ auth()->user()->customer?->kodepos ?? '' }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-select">
                    <option value="L" {{ auth()->user()->customer?->jeniskelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ auth()->user()->customer?->jeniskelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Profil</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
        </form>
    </div>
</div>
</body>
</html>