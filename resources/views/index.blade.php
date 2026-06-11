<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMOUNT ADVENTURE</title>
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/gif" height="30px">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Arial', sans-serif; }
        
        /* CSS STANDAR NAVBAR */
        .navbar { background-color: #2e7d32; }
        .navbar-brand { font-weight: bold; font-size: 20px; }
        .nav-link.logout-btn {
            background-color: #f44336; color: white; font-size: 14px;
            padding: 6px 15px; border-radius: 5px; border: none; cursor: pointer;
            transition: 0.3s;
        }
        .nav-link.logout-btn:hover { background-color: #d32f2f; transform: translateY(-2px); }
        
        .header-image {
            height: 450px;
            background-image: url('{{asset("images/bghpg.png")}}');
            background-size: cover; background-repeat: no-repeat; background-position: center;
        }
        .filter-section { background-color: #f9f9f9; padding: 20px; border-right: 1px solid #ddd; }
        .product-card img { height: 150px; object-fit: contain; border-radius: 20px; margin-top: 10px; }
        .product-card .card-title { min-height: 48px; }
        .footer { background-color: #2e7d32; color: white; padding: 20px 0; }
        .footer a { color: white; text-decoration: none; }
        .footer a:hover { text-decoration: underline; }
        .btn-filter { width: 100%; margin-top: 10px; background-color: #2e7d32; color: white; border: none; padding: 8px; border-radius: 5px; cursor: pointer; }
        .btn-filter:hover { background-color: #1b5e20; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR STANDAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <img src="{{asset('images/logo.png')}}" alt="OMOUNT ADVENTURE" style="height: 30px;">
            OMOUNT ADVENTURE
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link {{ Request::is('homepage') ? 'active' : '' }}" href="/homepage">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact</a></li>
            </ul>
            <ul class="navbar-nav align-items-center gap-3">
                @auth
                <li class="nav-item">
                    <a href="/userdashboard" class="nav-link text-white fw-bold fs-5">Hi {{auth()->user()->firstname}}!</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST" class="m-0 p-0">
                        @csrf
                        <button class="nav-link logout-btn" type="submit">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link fs-4" href="/transaksi"><i class="bi bi-cart4"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="header-image"></div>

<div class="container my-5 flex-grow-1">
    <div class="row">

        <div class="col-md-3 filter-section">
            <form method="GET" action="/homepage">
                <h5>Filter</h5>
                <p><strong>Category</strong></p>
                <ul class="list-unstyled">
                    <li>
                        <input type="checkbox" name="kategori[]" value="Survival" id="survival"
                            {{ in_array('Survival', request('kategori', [])) ? 'checked' : '' }}>
                        <label for="survival">Survival</label>
                    </li>
                    <li>
                        <input type="checkbox" name="kategori[]" value="Hiking" id="hiking"
                            {{ in_array('Hiking', request('kategori', [])) ? 'checked' : '' }}>
                        <label for="hiking">Hiking</label>
                    </li>
                    <li>
                        <input type="checkbox" name="kategori[]" value="Tents" id="tents"
                            {{ in_array('Tents', request('kategori', [])) ? 'checked' : '' }}>
                        <label for="tents">Tents</label>
                    </li>
                    <li>
                        <input type="checkbox" name="kategori[]" value="Knives" id="knives"
                            {{ in_array('Knives', request('kategori', [])) ? 'checked' : '' }}>
                        <label for="knives">Knives</label>
                    </li>
                    <li>
                        <input type="checkbox" name="kategori[]" value="Water Bottles" id="water-bottles"
                            {{ in_array('Water Bottles', request('kategori', [])) ? 'checked' : '' }}>
                        <label for="water-bottles">Water Bottles</label>
                    </li>
                </ul>
                <button type="submit" class="btn-filter">Terapkan Filter</button>
            </form>
        </div>

        <div class="col-md-9">
            <div class="row g-4">
                @forelse ($products as $item)
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="{{ asset('storage/images/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->namaproduct }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->namaproduct }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p class="text-success fw-bold">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                            @if($item->kategori)
                            <span class="badge bg-success mb-3">{{ $item->kategori }}</span>
                            @endif
                            @auth
                            <button type="button" onclick="showModal({{ $item->id }})" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Pilih Produk <i class="bi bi-cart-check"></i>
                            </button>
                            @else
                            <a href="/login" class="btn btn-success w-100">Login untuk Membeli</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Tidak ada produk yang sesuai filter.</p>
                    <a href="/homepage" class="btn btn-success">Lihat Semua Produk</a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5">Opsi Pembelian</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-question-circle text-success" style="font-size: 3rem;"></i>
                <p class="mt-3 mb-0">Apa yang ingin Anda lakukan dengan produk ini?</p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <div class="d-flex gap-2">
                    <form action="#" method="post" id="form-confirm-beli">
                        @csrf
                        <button type="submit" class="btn btn-outline-success">
                            <i class="bi bi-cart-plus"></i> Masukkan Keranjang
                        </button>
                    </form>
                    <form action="#" method="post" id="form-confirm-checkout">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-bag-check"></i> Checkout Langsung
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Contact us: omount@gmail.com</p>
                <p>Follow us on: <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">Instagram</a></p>
            </div>
        </div>
        <p class="text-center mt-3">Copyright &copy; 2026 OMOUNT ADVENTURE</p>
    </div>
</footer>

<script>
    var formBeli = document.getElementById('form-confirm-beli');
    var formCheckout = document.getElementById('form-confirm-checkout');
    function showModal(id) {
        formBeli.action = `/beli/${id}`;
        formCheckout.action = `/checkout/${id}`;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('load', function() {
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) backdrop.remove();
    });
</script>
</body>
</html>