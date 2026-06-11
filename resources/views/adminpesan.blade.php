<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Masuk - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f4f9; }
        .sidebar { background-color: #343a40; min-height: 100vh; padding: 15px; }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px; margin-bottom: 5px; border-radius: 5px; }
        .sidebar a:hover, .sidebar a.active { background-color: #495057; }
        .card { border: none; border-radius: 10px; }
        .card i { font-size: 24px; }
        .message-box { max-width: 400px; white-space: pre-wrap; } 
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <h4 class="text-white mb-4">Admin Panel</h4>
            <a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/adminproduct"><i class="fas fa-box"></i> Produk</a>
            <a href="/infotransaksi"><i class="fas fa-receipt"></i> Transaksi</a>
            
            <a href="/adminpesan" class="active"><i class="fas fa-envelope"></i> Pesan Masuk</a>

            <div style="margin-top: 20px;">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; width: 100%; text-align: left;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="col-md-10">
            <div class="py-4 px-4">
                <h2 class="mb-4">Pesan dari Pengguna</h2>

                <div class="table-responsive bg-white p-4 rounded shadow-sm border">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-dark">
                        <tr>
                            <th>ID Pesan</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Isi Pesan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($messages as $msg)
                            <tr>
                                <td><strong>MSG-{{ $msg->id }}</strong></td>
                                <td><strong>{{ $msg->name }}</strong></td>
                                <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                                <td class="message-box">{{ $msg->message }}</td>
                                <td>
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-clock"></i> 
                                        {{ \Carbon\Carbon::parse($msg->created_at)->locale('id')->diffForHumans() }}
                                    </span>
                                </td>
                                <td>
                                    <form action="/pesan/delete/{{ $msg->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">Belum ada pesan masuk.</td>
                            </tr>
                            @endforelse
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