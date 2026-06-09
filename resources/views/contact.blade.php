<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omount Adventure Shop</title>
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

        main { max-width: 1200px; margin: 50px auto; padding: 20px; text-align: left; }
        main h1 { font-size: 36px; font-weight: bold; margin-bottom: 10px; }
        main p { font-size: 18px; margin-bottom: 30px; }
        form { display: flex; flex-direction: column; gap: 15px; }
        form input, form textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; }
        form textarea { resize: none; height: 150px; }
        form button { background-color: black; color: white; border: none; padding: 10px; font-size: 16px; cursor: pointer; border-radius: 5px; }
        
        .footer { background-color: #2e7d32; color: white; padding: 20px 0; }
        .footer a { color: white; text-decoration: none; }
        .footer a:hover { text-decoration: underline; }
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

<main class="flex-grow-1 w-100">
    <h1>Let's Talk</h1>
    <p>Have some big idea or brand to develop and need help? Then reach out we'd love to hear about your project and provide help.</p>
    
    <form action="/kirim-pesan" method="POST">
        @csrf
        <div class="mb-3">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark w-100">Submit</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</main>

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
        <p class="text-center mt-3">Copyright &copy; 2026 Omount Adventure</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>