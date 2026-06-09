<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - OMOUNT ADVENTURE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; }
        .sidebar { width: 250px; height: 100vh; position: fixed; background-color: #2b6cb0; color: white; padding-top: 20px; }
        .sidebar a { text-decoration: none; color: white; display: block; padding: 10px 20px; }
        .sidebar a:hover, .sidebar .active { background-color: #1e4e8c; font-weight: bold; }
        .content { margin-left: 250px; padding: 20px; }
        .profile-container { background: white; border-radius: 10px; padding: 30px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); text-align: center; margin-top: 20px; }
        .profile-img img { width: 150px; height: 150px; object-fit: cover; border-radius: 50%; margin-bottom: 20px; border: 3px solid #2b6cb0; }
        .profile-info { text-align: left; margin-top: 20px; }
        .profile-info div { margin-bottom: 15px; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="/userdashboard"><i class="bi bi-grid"></i> Dashboard</a>
        <a href="/user" class="active"><i class="bi bi-person"></i> Profil Saya</a> 
        <a href="/homepage"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>

    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>OMOUNT ADVENTURE</h2>
        </div>

        <div class="profile-container">
            <div class="profile-img">
                @if(auth()->user()->customer?->image)
                    <img src="{{ asset('storage/images/'.auth()->user()->customer->image) }}" alt="Profil">
                @else
                    <div class="bg-secondary rounded-circle d-inline-block" style="width: 150px; height: 150px;"></div>
                @endif
            </div>
            
            <h4>Profil Pengguna</h4>
            
            <div class="profile-info">
                <div><strong>Nama:</strong> {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</div>
                <div><strong>Alamat:</strong> {{ auth()->user()->customer?->alamat ?? 'Belum diisi' }}</div>
                <div><strong>Telepon:</strong> {{ auth()->user()->customer?->telepon ?? '-' }}</div>
                <div><strong>Kode Pos:</strong> {{ auth()->user()->customer?->kodepos ?? '-' }}</div>
                <div><strong>Jenis Kelamin:</strong> 
                    {{ auth()->user()->customer?->jeniskelamin == 'L' ? 'Laki-laki' : (auth()->user()->customer?->jeniskelamin == 'P' ? 'Perempuan' : '-') }}
                </div>
            </div>
            
            <a href="/profile" class="btn btn-primary mt-4">Edit Profil</a>
        </div>

        <div class="profile-container text-start mt-4">
            <h4>Ubah Password Keamanan</h4>
            <hr>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="/update-password" method="POST" class="mt-3">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold">Password Lama</label>
                        <input type="password" name="current_password" class="form-control" placeholder="Masukkan password lama" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Password Baru</label>
                        <input type="password" name="new_password" class="form-control" placeholder="Minimal 6 karakter" minlength="6" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Konfirmasi Password Baru</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Ketik ulang password baru" minlength="6" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning text-dark fw-bold px-4 py-2 mt-2">
                    <i class="bi bi-key"></i> Simpan Password Baru
                </button>
            </form>
        </div>
        
    </div>
</body>
</html>