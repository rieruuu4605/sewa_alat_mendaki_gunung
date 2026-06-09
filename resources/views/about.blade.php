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

        .about-section {
            text-align: center;
            padding: 40px 20px;
        }
        .about-section h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .about-section p {
            max-width: 600px;
            margin: 0 auto 30px;
            line-height: 1.6;
        }
        .about-icons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .about-icons .icon-item {
            background: white;
            border-radius: 8px;
            padding: 20px;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .about-icons .icon-item img {
            height: 50px;
            margin-bottom: 10px;
        }
        .mountain-info {
            padding: 40px 20px;
        }
        .mountain-info h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .mountain-card {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .mountain-card img {
            height: 150px;
            width: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }
        .mountain-card .card-content {
            flex: 1;
        }
        .mountain-card .card-content h3 {
            margin: 0 0 10px;
            font-size: 1.5rem;
        }
        .mountain-card .card-content p {
            margin: 0;
            line-height: 1.6;
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
                <li class="nav-item">
                   <a href="/userdashboard"><h4 class="mx-5 text-white" >Hi {{auth()->user()->firstname}}!</H4></a>
                </li>
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

    <!-- About -->
   
    <section class="about-section">
        <h1>About</h1>
        <p>
            Setiap perjalanan dalam EXVENTURE dirancang tidak hanya untuk memuaskan dahaga petualangan, tetapi juga untuk memperkaya pengalaman hidup.
        </p>
        <img src="{{asset ('images/Hiking.png')}}" alt="Hiking">
        <p></p>
        <div class="about-icons">
            <div class="icon-item">
                <img src="{{asset ('images/Picture.png')}}" alt="Spot Foto">
                <h3>Spot Foto yang Indah</h3>
                <p>Menikmati spot foto yang indah di alam bebas.</p>
            </div>
            <div class="icon-item">
                <img src="{{asset ('images/RulesBook.png')}}" alt="Rules">
                <h3>Membaca Rules Petualangan</h3>
                <p>Mengikuti petualangan yang aman dan nyaman.</p>
            </div>
            <div class="icon-item">
                <img src="{{asset ('images/WarningShield.png')}}" alt="Keamanan">
                <h3>Perhatikan Rambu Keamanan</h3>
                <p>Memperhatikan rambu cuaca buruk.</p>
            </div>
            <div class="icon-item">
                <img src="{{asset ('images/HealthGraph.png')}}" alt="Kesehatan">
                <h3>Cek Kesehatan</h3>
                <p>Memastikan kesehatan sebelum perjalanan.</p>
            </div>
        </div>
    </section>
    <section class="mountain-info">
        <h2>Informasi Gunung</h2>
        <div class="mountain-card">
            <img src="{{asset ('images/gununggede.png')}}" alt="Gunung Gede">
            <div class="card-content">
                <h3>Gunung Gede</h3>
                <p>
                    Gunung Gede adalah salah satu destinasi pendakian populer di Jawa Barat, Indonesia...
                </p>
            </div>
        </div>
        <div class="mountain-card">
            <img src="{{asset ('images/gunungciremai.png')}}" alt="Gunung Ciremai">
            <div class="card-content">
                <h3>Gunung Ciremai</h3>
                <p>
                    Gunung Ciremai merupakan gunung tertinggi di Jawa Barat dengan ketinggian 3.078 meter...
                </p>
            </div>
        </div>
        <div class="mountain-card">
            <img src="{{asset ('images/gunungprau.png')}}" alt="Gunung Prau">
            <div class="card-content">
                <h3>Gunung Prau</h3>
                <p>
                    Gunung Prau merupakan salah satu gunung di dataran tinggi Dieng...
                </p>
            </div>
        </div>
    </section>
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
