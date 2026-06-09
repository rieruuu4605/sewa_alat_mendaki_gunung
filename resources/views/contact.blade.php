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

        main {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            text-align: left;
        }

        main h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        main p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        form textarea {
            resize: none;
            height: 150px;
        }

        form button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
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
            background-color: #289c30;
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

    <!-- Contact -->
    <main>
        <h1>Let’s Talk</h1>
        <p>Have some big idea or brand to develop and need help? Then reach out we’d love to hear about your project and provide help.</p>
        <form>
            <input type="text" placeholder="Name" required>
            <input type="email" placeholder="Email" required>
            <textarea placeholder="Message" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </main>

    
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
            formBeli.action = /beli/${id}
            formCheckout.action = /checkout/${id}
        }
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>