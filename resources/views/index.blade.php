    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adventure Gear Shop</title>
        <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
            body {
                font-family: 'Arial', sans-serif;
            }

            .navbar {
                background-color: #2e7d32;
            }

            .navbar a {
                color: white;
                text-decoration: none;
            }

            /* Styling untuk tombol logout */
    li.nav-item.logout {
        display: inline-block;
    }

    .nav-link.logout-btn {
        background-color: #f44336; /* Warna merah yang mencolok */
        color: white; /* Teks putih */
        font-size: 16px; /* Ukuran font */
        padding: 10px 20px; /* Padding untuk memberi ruang */
        border-radius: 5px; /* Membuat sudut tombol bulat */
        border: none; /* Menghilangkan border default */
        cursor: pointer; /* Kursor berubah menjadi pointer saat hover */
        transition: background-color 0.3s, transform 0.2s; /* Efek transisi */
    }

    /* Efek hover saat kursor berada di atas tombol */
    .nav-link.logout-btn:hover {
        background-color: #d32f2f; /* Warna lebih gelap saat hover */
        transform: translateY(-2px); /* Sedikit mengangkat tombol */
    }

    /* Efek fokus agar lebih user-friendly */
    .nav-link.logout-btn:focus {
        outline: none; /* Menghilangkan outline default */
        box-shadow: 0 0 5px 2px rgba(255, 255, 255, 0.5); /* Menambahkan efek glow */
    }

    /* Responsif pada perangkat mobile */
    @media (max-width: 600px) {
        .nav-link.logout-btn {
            width: 100%; /* Membuat tombol lebar penuh pada layar kecil */
            font-size: 18px; /* Memperbesar ukuran font */
            padding: 12px 0; /* Menambah padding vertikal */
        }
    }

            .navbar-brand img {
                margin-left:-40%;
            }
            

            .header-image {
                height: 450px;
                background-image: url('{{asset ('images/bghpg.jpg')}}'); /* Ganti dengan path gambar header */
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            .filter-section {
                background-color: #f9f9f9;
                padding: 20px;
                border-right: 1px solid #ddd;
            }

            .product-card img {
                height: 150px;
                object-fit: contain;
                border-radius: 20px;
                margin-top : 10px;
            }

            .footer {
                background-color: #2e7d32;
                color: white;
                padding: 20px 0;
            }

            .footer a {
                color: white;
                text-decoration: none;
            }

            .footer a:hover {
                text-decoration: underline;
            }

            .footer .subscribe {
                display: flex;
            }

            .footer .subscribe input {
                flex: 1;
                border-radius: 5px 0 0 5px;
                padding: 8px;
            }

            .footer .subscribe button {
                border-radius: 0 5px 5px 0;
                background-color: #ffcc00;
                color: #333;
                border: none;
                padding: 8px 16px;
            }
        </style>
    </head>
    <body>

        <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
              <!-- Logo dan Nama -->
            <a class="navbar-brand" href="#">
                <img src="{{asset ('images/logo.png')}}" alt="Exventure" style="height: 30px;">
                Exventure
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="/homepage">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                </ul>
                <ul class="navbar-nav">
                    <!-- Menu Login -->
                    @auth
                     <!-- Menampilkan nama pengguna jika login -->
                    <li class="nav-item">
                    <a href="/userdashboard"><h4 class="mx-5 text-white" >Hi {{auth()->user()->firstname}}!</H4></a>
                    </li>
                    <!-- Tombol logout -->
                    <li class="nav-item logout">
                        <form action="logout" method="POST">
                            @csrf
                            @method('POST')
                            <button class="nav-link logout-btn" type="submit">Logout</button>
                        </form>
                    </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    @endauth
                    <!-- Icon Shop -->
                    <li class="nav-item">
                        <a class="nav-link" href="/transaksi">
                            <i class="bi bi-cart4"></i> <!-- Icon Keranjang Belanja -->
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <!-- Header -->
        <div class="header-image"></div>

        <div class="container my-5">
            <div class="row">
                <!-- Filter Section -->
                <div class="col-md-3 filter-section">
                    <h5>Filter</h5>
                    <p><strong>Category</strong></p>
                    <ul class="list-unstyled">
                        <li><input type="checkbox" id="survival"> <label for="survival">Survival</label></li>
                        <li><input type="checkbox" id="hiking"> <label for="hiking">Hiking</label></li>
                        <li><input type="checkbox" id="tents"> <label for="tents">Tents</label></li>
                        <li><input type="checkbox" id="knives"> <label for="knives">Knives</label></li>
                        <li><input type="checkbox" id="water-bottles"> <label for="water-bottles">Water Bottles</label></li>
                    </ul>
                    <p><strong>Price Range</strong></p>
                    <input type="range" class="form-range" min="0" max="1000" step="50" value="50">
                    <p><strong>Sort By</strong></p>
                    <select class="form-select">
                        <option>Best Match</option>
                        <option>Lowest Price</option>
                        <option>Highest Price</option>
                    </select>
                </div>

                <!-- Product Section -->
                <div class="col-md-9">
                    <div class="row g-4">
                        <!-- Product Card -->
                        <div class="col-md-4">
                            @foreach ($products as $item) <!-- Looping produk -->
                            <div class="card product-card">
                                <img src="storage/images/{{ $item->gambar }}" class="card-img-top" alt="Folding Knife">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->namaproduct }}</h5> <!-- Menampilkan nama produk dari database -->
                                    <p class="card-text">{{ $item->deskripsi }}</p>  <!-- Menampilkan deskripsi produk dari database -->
                                    <p class="text-success">Rp. {{ number_format($item->harga,0) }}</p>  <!-- Menampilkan harga produk dengan format angka yang dipisahkan oleh koma (Rp.) -->
                                    @auth
                                    <button type="button" onclick="showModal({{ $item->id }})" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add To card
                                    </button>
                                    @else
                                    
                                    <a href="/login" class="btn btn-success w-100">Add to Cart</a>
                                    @endauth
                                </div>
                            </div>
                                
                            @endforeach
                        </div>
                        
                        <!-- Product Card -->
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="{{asset ('images/product1.png')}}" class="card-img-top" alt="Camping Tent">
                                <div class="card-body">
                                    <h5 class="card-title">Folding Knife</h5>
                                    <p class="card-text">Tajam,Tangguh dan Multifungsi dalam digunakan di penjelajahan</p>
                                    <p class="text-success">Rp 100.000,-</p>
                                    @auth
                                    <a href="#" class="btn btn-success w-100">Add to Cart</a>
                                    @else
                                    
                                    <a href="/login" class="btn btn-success w-100">Add to Cart</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <!-- Product Card -->
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="{{asset ('images/product3.png')}}" class="card-img-top" alt="Camping Tent">
                                <div class="card-body">
                                    <h5 class="card-c:\KULIAH\omount\omount\database\seederstitle">Camping Tent</h5>
                                    <p class="card-text">Pengaturan mudah, tahan air dan luas.</p>
                                    <p class="text-success">Rp. 1.000.000,-</p>
                                    @auth
                                    <a href="#" class="btn btn-success w-100">Add to Cart</a>
                                    @else
                                    
                                    <a href="/login" class="btn btn-success w-100">Add to Cart</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pembelian</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>Apakah Anda yakin akan membeli?</p>
            </div>
            <div class="modal-footer">
                <form action="#" method="post" id="form-confirm-beli">
                    @csrf
                    <button type="submit" class="btn btn-danger">Beli</button>
                </form>
                <form action="#" method="post" id="form-confirm-checkout">
                    @csrf
                    <button type="submit"  class="btn btn-success">Beli Sekarang</button>
                </form>
            </div>
        </div>
        </div>
    </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Contact us: info@adventuregear.com</p>
                        <p>Follow us on:</p>
                        <p>
                            <a href="#">Facebook</a> | 
                            <a href="#">Twitter</a> | 
                            <a href="#">Instagram</a>
                        </p>
                    </div>
                </div>
                <p class="text-center mt-3">Copyright © 2023 Adventure Gear</p>
            </div>
        </footer>
        <script>
            var formBeli = document.getElementById('form-confirm-beli');
            var formCheckout = document.getElementById('form-confirm-checkout');
            function showModal(id) {
                formBeli.action = `/beli/${id}`
                formCheckout.action = `/checkout/${id}`
            }
            
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
