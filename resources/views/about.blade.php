<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omount Adventure Shop</title>
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Arial', sans-serif; }
        
      
        .navbar { background-color: #2e7d32; }
        .navbar-brand { font-weight: bold; font-size: 20px; }
        .nav-link.logout-btn {
            background-color: #f44336; color: white; font-size: 14px;
            padding: 6px 15px; border-radius: 5px; border: none; cursor: pointer;
            transition: 0.3s;
        }
        .nav-link.logout-btn:hover { background-color: #d32f2f; transform: translateY(-2px); }
        
        @media (max-width: 600px) {
            .nav-link.logout-btn { width: 100%; font-size: 18px; padding: 12px 0; }
        }

        .header-image {
            height: 450px;
            background-image: url('{{asset ('images/bghpg.png')}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .about-section { text-align: center; padding: 40px 20px; }
        .about-section h1 { font-size: 2.5rem; margin-bottom: 20px; }
        .about-section p { max-width: 600px; margin: 0 auto 30px; line-height: 1.6; }
        .about-icons { display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; }
        .about-icons .icon-item {
            background: white; border-radius: 8px; padding: 20px;
            width: 200px; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .about-icons .icon-item img { height: 50px; margin-bottom: 10px; }
        .mountain-info { padding: 40px 20px; }
        .mountain-info h2 { text-align: center; font-size: 2rem; margin-bottom: 20px; }
        .mountain-card {
            display: flex; align-items: center; background: white; border-radius: 8px;
            margin-bottom: 20px; padding: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .mountain-card img {
            height: 150px; width: 200px; object-fit: cover; border-radius: 8px; margin-right: 20px;
        }
        .mountain-card .card-content { flex: 1; }
        .mountain-card .card-content h3 { margin: 0 0 10px; font-size: 1.5rem; }
        .mountain-card .card-content p { margin: 0; line-height: 1.6; }

        .footer { background-color: #2e7d32; color: white; padding: 20px 0; }
        .footer a { color: white; text-decoration: none; }
        .footer a:hover { text-decoration: underline; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">


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

<div class="flex-grow-1">
    <section class="about-section">
        <h1>About</h1>
        <p>Setiap perjalanan dalam OMOUNT ADVENTURE dirancang tidak hanya untuk memuaskan dahaga petualangan, tetapi juga untuk memperkaya pengalaman hidup.</p>
        <img src="{{asset ('images/hiking.png')}}" alt="Hiking" class="img-fluid rounded shadow mb-4" style="max-height: 400px; width: 100%; object-fit: cover;">
        
        <div class="about-icons mt-4">
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

    <section class="container mountain-info mb-5">
        <h2>Informasi Gunung</h2>
        <div class="mountain-card">
            <img src="{{asset ('images/gununggede.png')}}" alt="Gunung Gede">
            <div class="card-content">
                <h3>Gunung Gede</h3>
                <p>Gunung Gede adalah salah satu destinasi pendakian populer di Jawa Barat, Indonesia...</p>
            </div>
        </div>
        <div class="mountain-card">
            <img src="{{asset ('images/gunungciremai.png')}}" alt="Gunung Ciremai">
            <div class="card-content">
                <h3>Gunung Ciremai</h3>
                <p>Gunung Ciremai merupakan gunung tertinggi di Jawa Barat dengan ketinggian 3.078 meter...</p>
            </div>
        </div>
        <div class="mountain-card">
            <img src="{{asset ('images/gunungprau.png')}}" alt="Gunung Prau">
            <div class="card-content">
                <h3>Gunung Prau</h3>
                <p>Gunung Prau merupakan salah satu gunung di dataran tinggi Dieng...</p>
            </div>
        </div>
    </section>
</div>

<footer class="footer mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Contact us: omount@gmail.com</p>
                <p>Follow us on:</p>
                <p>
                    <a href="#">Facebook</a> | 
                    <a href="#">Twitter</a> | 
                    <a href="#">Instagram</a>
                </p>
            </div>
        </div>
        <p class="text-center mt-3">Copyright © 2026 Omount Adventure</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>