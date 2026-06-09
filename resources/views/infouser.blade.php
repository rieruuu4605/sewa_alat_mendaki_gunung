<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
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
        .header {
            background-color: #2b6cb0;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 5px;
        }
        .profile-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
        }
        .profile-container h4 {
            color: #6a1b9a;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .profile-container .profile-img {
            width: 150px;
            height: 150px;
            background-color: #e0e0e0;
            border-radius: 50%;
            margin: 0 auto 20px;
        }
        .profile-container .profile-info {
            text-align: left;
            margin-top: 20px;
        }
        .profile-container .profile-info div {
            margin-bottom: 10px;
            font-size: 16px;
        }
        .profile-container .btn {
            background-color: #2b6cb0;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
        }
        .profile-container .btn:hover {
            background-color: #1e4e8c;
        }
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .content {
                margin-left: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="/userdashboard"><i class="bi bi-grid"></i> Dashboard</a>
        <a href="/profile" class="active"><i class="bi bi-person"></i> Profile</a>
        <a href="/homepage"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Exventure</h2>
            <div>
                <i class="bi bi-gear" style="font-size: 1.5rem; cursor: pointer;"></i>
                <i class="bi bi-person-circle ms-3" style="font-size: 1.5rem; cursor: pointer;"></i>
            </div>
        </div>

        <div class="profile-container">
            <div class="profile-img">
                
                <span style="line-height: 150px; color: #6c757d;">
                    <img src="storage/images/{{ auth()->user()->customer->image }}" class="rounded-circle" width="150" height="150" alt=""></span>
            </div>
            <h4>Profil Pengguna</h4>
            <div class="profile-info">
                <div><strong>Nama:</strong> {{ auth()->user()->firstname }}{{ auth()->user()->lastname }}</div> <!-- Menampilkan nama pengguna dengan label `Nama:`.
                    - Mengambil data `firstname` dan `lastname` dari user yang sedang login menggunakan `auth()->user()` -->    
                <div><strong>Alamat:</strong> {{ auth()->user()->customer->alamat }}</div> <!-- Menampilkan alamat pengguna dengan label `Alamat:`.
                    - Mengambil data `alamat` dari relasi `customer` user yang sedang login -->
                <div><strong>Telepon:</strong> {{ auth()->user()->customer->telepon }}</div> <!-- Menampilkan nomor telepon pengguna dengan label `Telepon:`.
                    - Mengambil data `telepon` dari relasi `customer` user yang sedang login -->           
                <div><strong>Kode Pos:</strong> {{ auth()->user()->customer->kodepos }}</div><!-- Menampilkan kode pos pengguna dengan label `Kode Pos:`.
                    - Mengambil data `kodepos` dari relasi `customer` user yang sedang login -->           
                <div><strong>Jenis Kelamin:</strong> {{ auth()->user()->customer->jeniskelamin }}</div> <!-- Menampilkan jenis kelamin pengguna dengan label `Jenis Kelamin:`.
                    - Mengambil data `jeniskelamin` dari relasi `customer` user yang sedang login -->
            </div>
            <a href="/profile" class="btn btn-primary mt-3">Edit</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
