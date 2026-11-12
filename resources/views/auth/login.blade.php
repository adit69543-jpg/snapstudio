
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SnapStudio</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #F6F5FB;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
        }

        .container {
            width: 100%;
            max-width: 950px;
            min-height: 570px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 60px rgba(40,30,80,.08);
        }

        .left {
            background: linear-gradient(145deg, #7357F6, #4832B7);
            color: white;
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            background: rgba(255,255,255,.2);
            width: 43px;
            height: 43px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 21px;
        }

        .brand h2 {
            font-size: 19px;
        }

        .brand p {
            font-size: 10px;
            opacity: .7;
            margin-top: 4px;
        }

        .welcome-text {
            position: relative;
            z-index: 1;
        }

        .welcome-text h1 {
            font-size: 35px;
            line-height: 1.3;
            margin-bottom: 15px;
        }

        .welcome-text p {
            font-size: 13px;
            line-height: 1.9;
            opacity: .8;
        }

        .decoration {
            position: absolute;
            right: -75px;
            bottom: 30px;
            font-size: 240px;
            opacity: .12;
            transform: rotate(-20deg);
        }

        .left-footer {
            font-size: 10px;
            opacity: .7;
        }

        .right {
            padding: 65px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h2 {
            font-size: 26px;
            font-weight: 800;
            color: #202035;
        }

        .subtitle {
            color: #9292A4;
            font-size: 12px;
            margin-top: 10px;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        label {
            font-size: 11px;
            font-weight: 600;
            display: block;
            margin-bottom: 9px;
            color: #45455A;
        }

        .input-box {
            display: flex;
            align-items: center;
            border: 1px solid #E8E7EF;
            border-radius: 9px;
            padding: 0 13px;
            height: 47px;
            gap: 10px;
        }

        .input-box:focus-within {
            border-color: #7357F6;
            box-shadow: 0 0 0 3px #7357F615;
        }

        .input-box i {
            color: #9995AA;
        }

        .input-box input {
            border: none;
            outline: none;
            flex: 1;
            font-family: inherit;
            font-size: 11px;
            min-width: 0;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            color: #77778A;
            margin: 5px 0 23px;
        }

        .remember input {
            accent-color: #7357F6;
        }

        .submit-btn {
            height: 48px;
            width: 100%;
            background: #7357F6;
            border: none;
            color: white;
            font-size: 12px;
            font-weight: 700;
            border-radius: 9px;
            cursor: pointer;
            transition: .2s;
        }

        .submit-btn:hover {
            background: #6043E5;
            transform: translateY(-2px);
        }

        .register-link {
            font-size: 11px;
            text-align: center;
            color: #858598;
            margin-top: 25px;
        }

        .register-link a {
            color: #7357F6;
            text-decoration: none;
            font-weight: 700;
        }

        .error {
            font-size: 10px;
            color: #E74C64;
            margin-top: 7px;
        }

        .success {
            background: #E8F8F1;
            color: #16865E;
            padding: 11px;
            border-radius: 8px;
            font-size: 11px;
            margin-bottom: 17px;
        }

        @media(max-width:700px) {
            .container {
                grid-template-columns: 1fr;
            }

            .left {
                min-height: 220px;
                padding: 30px;
            }

            .welcome-text h1 {
                font-size: 25px;
            }

            .left-footer {
                display: none;
            }

            .right {
                padding: 40px 28px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="left">

        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-camera-fill"></i>
            </div>
            <div>
                <h2>SnapStudio.</h2>
                <p>PHOTOBOOTH EXPERIENCE</p>
            </div>
        </div>

        <div class="welcome-text">
            <h1>Capture Your<br>Beautiful Moments.</h1>
            <p>
                Abadikan setiap momen berharga dengan
                berbagai pilihan frame dan efek menarik
                bersama SnapStudio.
            </p>
        </div>

        <i class="bi bi-camera-reels decoration"></i>

        <div class="left-footer">
            © 2026 SnapStudio. All rights reserved.
        </div>

    </div>


    <div class="right">

        <h2>Welcome Back!</h2>
        <p class="subtitle">Silakan masuk ke akun SnapStudio kamu.</p>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error" style="margin-bottom:15px">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Email Address</label>

                <div class="input-box">
                    <i class="bi bi-envelope"></i>
                    <input type="email"
                           name="email"
                           placeholder="Masukkan email"
                           value="{{ old('email') }}"
                           required>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>

                <div class="input-box">
                    <i class="bi bi-lock"></i>
                    <input type="password"
                           name="password"
                           placeholder="Masukkan password"
                           required>
                </div>
            </div>

            <label class="remember">
                <input type="checkbox" name="remember" value="1">
                Ingat saya
            </label>

            <button type="submit" class="submit-btn">
                Login ke Akun <i class="bi bi-arrow-right"></i>
            </button>

        </form>

        <p class="register-link">
            Belum mempunyai akun?
            <a href="{{ route('register') }}">Daftar Sekarang</a>
        </p>

    </div>

</div>

</body>
</html>
