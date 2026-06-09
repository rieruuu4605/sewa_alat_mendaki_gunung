<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OMOUNT ADVENTURE</title>
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 900px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-section {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-section h1 {
            font-size: 26px;
            color: #1b5e20;
            margin-bottom: 8px;
        }

        .form-section p {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .form-section input[type="email"],
        .form-section input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box; /* Memastikan padding tidak membuat input melebihi wadah */
        }

        .form-section .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .form-section .options label {
            display: flex;
            align-items: center;
        }

        .form-section .options input {
            margin-right: 5px;
        }

        .form-section button {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            color: white;
            background-color: #1b5e20;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-section button:hover {
            background-color: #145a1f;
        }

        .form-section .sign-up-btn {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            padding: 12px;
            margin-top: 10px;
            background-color: #eeeeee;
            color: #555;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-section .sign-up-btn:hover {
            background-color: #ddd;
        }

        .image-section {
            background-color: #f3f4f6;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-section .circle {
            width: 200px;
            height: 200px;
            background-color: #1b5e20;
            border-radius: 50%;
            position: absolute;
            right: -50px;
            top: -50px;
        }

        .image-section img {
            max-width: 100%;
            z-index: 1; /* Agar gambar berada di atas lingkaran hijau */
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 80px;
            margin-right: -10px;
        }

        .logo h2 {
            font-size: 22px;
            color: #1b1b1b;
        }

        /* Notifikasi Alert Sederhana */
        .alert {
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 13px;
            text-align: center;
        }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <div class="logo">
                <img src="{{asset ('images/logo.png')}}" alt="Logo">
                <h2>OMOUNT ADVENTURE</h2>
            </div>
            <h1>Welcome Back!</h1>
            <p>Stay Ahead! Login to your account.</p>

            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf
                @method('POST')
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="options">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                    <a href="/forgot-password" style="color: #007bff; text-decoration: none;">Forgot Password?</a>
                </div>
                <button type="submit">Login</button>
                <a href="/register" class="sign-up-btn">Sign Up</a>
            </form>
        </div>

        <div class="image-section">
            <div class="circle"></div>
            <img src="{{asset ('images/maincontent.png')}}" alt="Mountain Sunset">
        </div>
    </div>
</body>
</html>