=<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - EXVENTURE</title>
    <link rel="icon" href="{{asset ('images/logo.png')}}" type="image/gif" height="30px">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .left-section {
            width: 50%;
            background-color: #f3f3f3;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 50px; /* Ganti ukuran sesuai kebutuhan */
            margin-left: -200px;
            margin-bottom : 220px
        }

        .logo h1 {
            font-size: 28px;
            color: #333333;
            font-weight: bold;
            margin-bottom : 220px;
            margin-left: -15px;
        }

        .green-circle {
            position: absolute;
            top: -120px;
            right: -90px;
            width: 200px;
            height: 200px;
            background-color: #9ccc65;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: rotate(-15deg);
        }

        .green-circle h1 {
            font-size: 20px;
            color: #1b1b1b;
            font-weight: bold;
            transform: rotate(15deg);
            margin-top : 100px;
            margin-left: -20px;
        }

        .left-section img {
            width: 80%;
            max-width: 300px;
            margin-top: 20px;
            border-radius: 10px;
        }   

        .right-section {
            width: 50%;
            padding: 40px 50px;
        }

        .right-section h2 {
            font-size: 26px;
            color: #1b1b1b;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .right-section p {
            font-size: 14px;
            color: #666666;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
            width: calc(50% - 10px);
            padding: 12px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            font-size: 14px;
        }

        form input[type="checkbox"] {
            margin-right: 10px;
        }

        .terms {
            font-size: 12px;
            color: #666666;
            margin: 10px 0;
        }

        .terms a {
            color: #e53935;
            text-decoration: none;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .right-section button {
            width: 100%;
            padding: 12px;
            background-color: #1e88e5;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .right-section button:hover {
            background-color: #1565c0;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        .login-link a {
            color: #1e88e5;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <div class="logo">
                <img src="{{asset ('images/logo.png')}}" alt="Logo"> <!-- Ganti path dengan logo Anda -->
                <h1>EXVENTURE</h1>
            </div>
            <div class="green-circle">
                <h1>STAY AHEAD!</h1>
            </div>
            <img class = "imgregister" src="{{asset ('images/maincontent.png')}}" alt="Mountain"> <!-- Ganti path dengan gambar Anda -->
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <h2>Sign up</h2>
            <p>Let's get you all set up so you can access your personal account.</p>
            <form action="/register" method= "POST">
                @csrf
                @method('POST')
                <input type="text"  name= "firstname"  placeholder="First Name" required>
                <input type="text" name= "lastname" placeholder="Last Name" required>
                <input type="email" name="email"  placeholder="Email" required>
                <input type="text" name= "phonenumber"  placeholder="Phone Number" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confrim" placeholder="Confirm Password" required>
                <div class="terms">
                    <label>
                        <input type="checkbox" required>
                        I agree to all the <a href="#">Terms</a> and <a href="#">Privacy Policies</a>.
                    </label>
                </div>
                <button type="submit">Daftar Sekarang</button>
            </form>
            <div class="login-link">
                Already on Engager? <a href="#">Log In</a>
            </div>
        </div>
    </div>
</body>
</html>
