<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
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
        .form-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #2b6cb0;
            border: none;
        }
        .btn-primary:hover {
            background-color: #1e4e8c;
        }
        .form-label {
            font-weight: bold;
        }
        .input-file {
            font-size: 14px;
            color: #6c757d;
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

        <div class="form-container">
            <h4 class="mb-4">User Information Form</h4>
            <form action="/submit-profile" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->firstname . auth()->user()->lastname }}" id="name" name="name" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="address" value="{{ auth()->user()->customer->alamat }}" name="address" placeholder="Masukkan alamat Anda" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telepon</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ auth()->user()->customer->telepon }}" placeholder="Masukkan nomor telepon Anda" required>
                </div>
                <div class="mb-3">
                    <label for="postal-code" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->customer->kodepos }}" id="postal-code" name="postal_code" placeholder="Masukkan kode pos Anda" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div>
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Laki-laki</label>
                        <input type="radio" id="female" name="gender" value="female" class="ms-3" required>
                        <label for="female">Perempuan</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="image-upload" class="form-label">Image Upload</label>
                    <input type="file" class="form-control" id="image-upload" name="image" accept=".jpg, .jpeg, .png" required>
                    <small class="input-file">Maksimal 300KB, Minimal 100px x 100px, Tipe file: JPG, JPEG, PNG.</small>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
