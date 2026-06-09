<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - OMOUNT ADVENTURE</title>
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/gif" height="30px">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f9f9f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; font-family: 'Arial', sans-serif; }
        .card { width: 100%; max-width: 450px; border: none; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 40px 30px; }
        .btn-custom { background-color: #1e88e5; color: white; width: 100%; padding: 12px; border-radius: 5px; border:none; font-weight: bold;}
        .btn-custom:hover { background-color: #1565c0; color: white; }
    </style>
</head>
<body>
    <div class="card">
        <div class="text-center mb-4">
            <img src="{{asset('images/logo.png')}}" alt="Logo" style="width: 60px;">
            <h3 class="mt-3 fw-bold">Lupa Password</h3>
            <p class="text-muted" style="font-size: 14px;">Masukkan Email dan Nomor Telepon yang terdaftar untuk membuat password baru.</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger" style="font-size: 14px;">{{ session('error') }}</div>
        @endif

        <form action="/forgot-password" method="POST">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control p-3" placeholder="Alamat Email" required>
            </div>
            <div class="mb-3">
                <input type="text" name="phonenumber" class="form-control p-3" placeholder="Nomor Telepon" required>
            </div>
            <div class="mb-4">
                <input type="password" name="new_password" class="form-control p-3" placeholder="Password Baru" required minlength="6">
            </div>
            <button type="submit" class="btn-custom">Reset Password</button>
        </form>

        <div class="text-center mt-4">
            <a href="/login" class="text-decoration-none" style="color: #1e88e5; font-weight: bold; font-size: 14px;">Kembali ke Halaman Login</a>
        </div>
    </div>
</body>
</html>