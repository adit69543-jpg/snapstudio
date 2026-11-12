
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SnapStudio</title>

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
            padding: 50px 45px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            background: #FFFFFF25;
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

        .welcome-text h1 {
            font-size: 34px;
            line-height: 1.35;
            margin-bottom: 15px;
        }

        .welcome-text p {
            font-size: 13px;
            line-height: 1.9;
            opacity: .8;
        }

        .left-footer {
            font-size: 10px;
            opacity: .7;
        }

        .right {
            padding: 45px 48px;
        }

        .right h2 {
            font-size: 25px;
            font-weight: 800;
            color: #202035;
        }

        .subtitle {
            color: #9292A4;
            font-size: 11px;
            margin: 9px 0 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 11px;
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #45455A;
        }

        .input-box {
            height: 45px;
            border: 1px solid #E8E7EF;
            border-radius: 9px;
            display: flex;
            align-items: center;
            padding: 0 13px;
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
            flex: 1;
            min-width: 0;
            border: none;
            outline: none;
            font-family: inherit;
            font-size: 11px;
        }

        .submit-btn {
            width: 100%;
            height: 47px;
            border: none;
            background: #7357F6;
            color: white;
            font-weight: 700;
            font-size: 12px;
            border-radius: 9px;
            margin-top: 10px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #6043E5;
        }

        .login-link {
            text-align: center;
            font-size: 11px;
            color: #858598;
            margin-top: 22px;
        }

        .login-link a {
            color: #7357F6;
            font-weight: 700;
            text-decoration: none;
        }

        .error {
            color: #E74C64;
            font-size: 10px;
            margin-top: 6px;
        }

        @media(max-width:700px) {
            .container {
                grid-template-columns: 1fr;
            }

            .left {
                min-height: 210px;
                padding: 28px;
            }

            .welcome-text h1 {
                font-size: 25px;
            }

            .left-footer {
                display: none;
            }

            .right {
                padding: 35px 27px;
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
            <h1>Start Your<br>Creative Journey.</h1>
            <p>
                Buat akun SnapStudio dan mulai
                mengabadikan momen terbaikmu
                dengan berbagai pilihan photobooth.
            </p>
        </div>

        <div class="left-footer">
            © 2026 SnapStudio. All rights reserved.
        </div>

    </div>


    <div class="right">

        <h2>Create Account</h2>
        <p class="subtitle">Daftar sekarang untuk menggunakan SnapStudio.</p>

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-box">
                    <i class="bi bi-person"></i>
                    <input type="text"
                           name="name"
                           placeholder="Nama lengkap"
                           value="{{ old('name') }}"
                           required>
                </div>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <div class="input-box">
                    <i class="bi bi-envelope"></i>
                    <input type="email"
                           name="email"
                           placeholder="Email kamu"
                           value="{{ old('email') }}"
                           required>
                </div>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-box">
                    <i class="bi bi-lock"></i>
                    <input type="password"
                           name="password"
                           placeholder="Minimal 8 karakter"
                           required>
                </div>
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <div class="input-box">
                    <i class="bi bi-shield-lock"></i>
                    <input type="password"
                           name="password_confirmation"
                           placeholder="Ulangi password"
                           required>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                Buat Akun <i class="bi bi-arrow-right"></i>
            </button>

        </form>

        <p class="login-link">
            Sudah mempunyai akun?
            <a href="{{ route('login') }}">Login Sekarang</a>
        </p>

    </div>

</div>

</body>
</html>
