
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SnapStudio - Your Moment, Your Style</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #7357F6;
            --primary-dark: #5E43DE;
            --primary-light: #F1EDFF;
            --dark: #191827;
            --text: #25243A;
            --muted: #89889A;
            --background: #FAF9FF;
            --white: #FFFFFF;
            --border: #EEEAF7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: var(--white);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
            cursor: pointer;
        }

        /* NAVBAR */

        .navbar {
            width: 100%;
            height: 82px;
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8%;
            background: rgba(255,255,255,.94);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid #F0EDF6;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .logo-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            color: white;
            background: linear-gradient(135deg, #927BFF, #6848EA);
            font-size: 21px;
        }

        .logo h2 {
            font-size: 19px;
            font-weight: 900;
            letter-spacing: -.7px;
        }

        .logo span {
            color: var(--primary);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .nav-menu a {
            color: #777587;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--primary);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: var(--primary);
            background: var(--primary-light);
            font-size: 12px;
            font-weight: 800;
        }

        .user-info span {
            font-size: 11px;
            font-weight: 700;
        }

        .logout-button {
            padding: 10px 14px;
            border: 1px solid #EEEAF7;
            border-radius: 9px;
            color: #777587;
            background: white;
            font-size: 11px;
            font-weight: 600;
        }

        .logout-button:hover {
            color: #E45B5B;
            border-color: #FFDADA;
            background: #FFF7F7;
        }

        .mobile-toggle {
            display: none;
            border: none;
            background: none;
            font-size: 24px;
            color: var(--text);
        }

        /* HERO */

        .hero {
            min-height: 610px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            align-items: center;
            gap: 50px;
            padding: 75px 9%;
            overflow: hidden;
            background:
                radial-gradient(circle at 80% 35%, #EAE3FF 0, transparent 32%),
                linear-gradient(120deg, #FBFAFF, #F5F1FF);
        }

        .hero-content {
            max-width: 570px;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 13px;
            border: 1px solid #E6DEFF;
            border-radius: 30px;
            color: var(--primary);
            background: white;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .hero-label i {
            font-size: 13px;
        }

        .hero h1 {
            margin-top: 25px;
            font-size: clamp(38px, 5vw, 62px);
            line-height: 1.13;
            font-weight: 900;
            letter-spacing: -2.7px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero-description {
            max-width: 460px;
            margin-top: 21px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.9;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 15px 22px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-primary {
            color: white;
            background: var(--primary);
            box-shadow: 0 8px 20px rgba(115,87,246,.2);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-outline {
            color: var(--text);
            border: 1px solid #E7E2F1;
            background: white;
        }

        .btn-outline:hover {
            color: var(--primary);
            border-color: var(--primary);
        }

        .hero-note {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 26px;
            color: #9693A4;
            font-size: 10px;
        }

        .hero-note i {
            color: #30B982;
        }

        /* HERO VISUAL */

        .hero-visual {
            position: relative;
            min-height: 440px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-back {
            width: 245px;
            height: 330px;
            position: absolute;
            transform: rotate(-12deg) translateX(-80px);
            border: 9px solid white;
            border-radius: 12px;
            background: linear-gradient(145deg, #D7C8FF, #F8D6E7);
            box-shadow: 0 20px 45px rgba(40,25,90,.12);
        }

        .photo-back::before {
            content: '';
            position: absolute;
            inset: 12px;
            border: 2px dashed rgba(255,255,255,.8);
        }

        .photo-front {
            width: 255px;
            height: 345px;
            position: relative;
            z-index: 2;
            transform: rotate(8deg) translateX(30px);
            padding: 11px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 25px 55px rgba(40,25,90,.18);
        }

        .photo-image {
            width: 100%;
            height: 265px;
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            background:
                radial-gradient(ellipse at 50% 40%, #F4C7B1 0 16%, transparent 16.5%),
                radial-gradient(ellipse at 50% 105%, #927BFF 0 43%, transparent 43.5%),
                linear-gradient(135deg, #F7D3C5, #D9C8FF);
        }

        .photo-image::before {
            content: '';
            position: absolute;
            top: 42px;
            left: calc(50% - 52px);
            width: 104px;
            height: 130px;
            border-radius: 48% 48% 43% 43%;
            background: linear-gradient(145deg, #F3C6A8, #D99C83);
        }

        .photo-image::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: calc(50% - 85px);
            width: 170px;
            height: 120px;
            border-radius: 50% 50% 0 0;
            background: #FFFFFF;
            opacity: .9;
        }

        .photo-caption {
            padding-top: 12px;
            text-align: center;
        }

        .photo-caption h4 {
            color: var(--primary);
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .photo-caption p {
            margin-top: 4px;
            color: #A5A1B3;
            font-size: 8px;
            letter-spacing: 1.5px;
        }

        .floating-icon {
            position: absolute;
            z-index: 3;
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            color: var(--primary);
            background: white;
            box-shadow: 0 10px 25px rgba(50,30,100,.12);
            font-size: 22px;
        }

        .floating-one {
            top: 35px;
            right: 50px;
            transform: rotate(12deg);
        }

        .floating-two {
            bottom: 45px;
            left: 30px;
            transform: rotate(-12deg);
        }

        /* FEATURES */

        .features {
            padding: 75px 9%;
            background: white;
        }

        .section-heading {
            margin-bottom: 35px;
            text-align: center;
        }

        .section-heading span {
            color: var(--primary);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.7px;
        }

        .section-heading h2 {
            margin-top: 12px;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .section-heading p {
            margin-top: 10px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .feature-card {
            padding: 27px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            transition: .2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(50,30,100,.06);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            color: var(--primary);
            background: var(--primary-light);
            font-size: 21px;
        }

        .feature-card h3 {
            margin-top: 19px;
            font-size: 14px;
            font-weight: 800;
        }

        .feature-card p {
            margin-top: 9px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        /* FRAMES */

        .frames-section {
            padding: 80px 9%;
            background: var(--background);
        }

        .frames-top {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .frames-top .section-heading {
            margin: 0;
            text-align: left;
        }

        .frame-count {
            padding: 9px 13px;
            border-radius: 20px;
            color: var(--primary);
            background: var(--primary-light);
            font-size: 10px;
            font-weight: 700;
        }

        .frame-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .frame-card {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: white;
            transition: .2s;
        }

        .frame-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(50,30,100,.08);
        }

        .frame-preview {
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            background: #F4F1FC;
        }

        .frame-preview img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .frame-info {
            padding: 15px;
        }

        .frame-info h3 {
            font-size: 12px;
            font-weight: 800;
        }

        .frame-info p {
            margin-top: 7px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
        }

        .frame-tag {
            display: inline-block;
            margin-top: 12px;
            padding: 6px 9px;
            border-radius: 20px;
            color: #16865E;
            background: #E8F8F1;
            font-size: 9px;
            font-weight: 700;
        }

        .empty-frames {
            grid-column: 1 / -1;
            padding: 55px 20px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            text-align: center;
        }

        .empty-frames i {
            color: #C5B9FF;
            font-size: 40px;
        }

        .empty-frames h3 {
            margin-top: 12px;
            font-size: 15px;
        }

        .empty-frames p {
            margin-top: 8px;
            color: var(--muted);
            font-size: 11px;
        }

        /* HOW IT WORKS */

        .how-section {
            padding: 80px 9%;
            background: white;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-top: 40px;
        }

        .step-card {
            position: relative;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 13px;
        }

        .step-number {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            color: white;
            background: var(--primary);
            font-size: 14px;
            font-weight: 800;
        }

        .step-card h3 {
            margin-top: 17px;
            font-size: 14px;
        }

        .step-card p {
            margin-top: 8px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        /* CTA */

        .cta-section {
            padding: 60px 9%;
            background: var(--background);
        }

        .cta-box {
            position: relative;
            overflow: hidden;
            padding: 55px 30px;
            border-radius: 20px;
            color: white;
            background: linear-gradient(120deg, #7357F6, #927BFF);
            text-align: center;
        }

        .cta-box::before,
        .cta-box::after {
            content: '';
            position: absolute;
            width: 180px;
            height: 180px;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 50%;
        }

        .cta-box::before {
            top: -90px;
            left: -50px;
        }

        .cta-box::after {
            right: -50px;
            bottom: -100px;
        }

        .cta-box h2 {
            position: relative;
            z-index: 1;
            font-size: 28px;
            font-weight: 900;
        }

        .cta-box p {
            position: relative;
            z-index: 1;
            margin-top: 12px;
            color: rgba(255,255,255,.8);
            font-size: 12px;
            line-height: 1.8;
        }

        .cta-box a {
            position: relative;
            z-index: 1;
            display: inline-flex;
            margin-top: 24px;
            padding: 14px 22px;
            border-radius: 9px;
            color: var(--primary);
            background: white;
            font-size: 11px;
            font-weight: 800;
        }

        .cta-box a:hover {
            transform: translateY(-2px);
        }

        /* FOOTER */

        footer {
            padding: 30px 9%;
            background: var(--dark);
            color: white;
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .footer-brand h3 {
            font-size: 17px;
            font-weight: 900;
        }

        .footer-brand h3 span {
            color: #A99AFF;
        }

        .footer-brand p {
            margin-top: 7px;
            color: #A5A4B5;
            font-size: 10px;
        }

        .footer-copy {
            color: #A5A4B5;
            font-size: 10px;
        }

        /* RESPONSIVE */

        @media(max-width: 1100px) {
            .frame-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .hero {
                padding-left: 6%;
                padding-right: 6%;
            }
        }

        @media(max-width: 850px) {
            .navbar {
                padding: 0 5%;
            }

            .nav-menu {
                position: absolute;
                top: 81px;
                left: 0;
                right: 0;
                display: none;
                flex-direction: column;
                align-items: flex-start;
                gap: 0;
                padding: 15px 6%;
                background: white;
                border-bottom: 1px solid var(--border);
            }

            .nav-menu.show {
                display: flex;
            }

            .nav-menu a {
                width: 100%;
                padding: 13px 0;
            }

            .mobile-toggle {
                display: block;
            }

            .user-info {
                display: none;
            }

            .hero {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-content {
                margin: auto;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons,
            .hero-note {
                justify-content: center;
            }

            .hero-visual {
                min-height: 380px;
            }

            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .frame-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 550px) {
            .hero {
                padding: 60px 6%;
            }

            .hero h1 {
                letter-spacing: -1.5px;
            }

            .features,
            .frames-section,
            .how-section {
                padding: 60px 6%;
            }

            .feature-grid,
            .steps-grid,
            .frame-grid {
                grid-template-columns: 1fr;
            }

            .frames-top {
                align-items: flex-start;
                flex-direction: column;
            }

            .section-heading h2 {
                font-size: 24px;
            }

            .footer-content {
                align-items: flex-start;
                flex-direction: column;
            }

            .photo-front {
                transform: rotate(6deg) translateX(15px) scale(.9);
            }

            .photo-back {
                transform: rotate(-12deg) translateX(-55px) scale(.9);
            }

            .logout-button {
                padding: 9px 11px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->

<header class="navbar">

    <a href="{{ route('user.dashboard') }}" class="logo">

        <div class="logo-icon">
            <i class="bi bi-camera-fill"></i>
        </div>

        <h2>Snap<span>Studio.</span></h2>

    </a>

    <nav class="nav-menu" id="navMenu">
        <a href="#home" class="active">Beranda</a>
        <a href="#features">Keunggulan</a>
        <a href="#frames">Frame</a>
        <a href="#how">Cara Menggunakan</a>
    </nav>

    <div class="nav-right">

        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'US', 0, 2)) }}
            </div>

            <span>
                {{ auth()->user()->name ?? 'Pengguna' }}
            </span>
        </div>

        <form action="{{ route('logout') }}"
              method="POST"
              onsubmit="return confirm('Yakin ingin keluar dari SnapStudio?')">

            @csrf

            <button type="submit" class="logout-button">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>

        </form>

        <button class="mobile-toggle"
                type="button"
                onclick="toggleMenu()">
            <i class="bi bi-list"></i>
        </button>

    </div>

</header>


<!-- HERO SECTION -->

<section class="hero" id="home">

    <div class="hero-content">

        <div class="hero-label">
            <i class="bi bi-stars"></i>
            WELCOME TO SNAPSTUDIO
        </div>

        <h1>
            Capture Your
            <span>Moment,</span>
            Create Your Story.
        </h1>

        <p class="hero-description">
            Abadikan setiap momen spesial dengan pengalaman photobooth
            yang menyenangkan. Pilih frame favoritmu dan ciptakan
            hasil foto dengan gaya yang kamu suka.
        </p>

        <div class="hero-buttons">

            <!-- TOMBOL SUDAH DIHUBUNGKAN KE STUDIO PHOTOBOOTH -->
            <a href="{{ route('user.photobooth') }}" class="btn btn-primary">
                <i class="bi bi-camera-fill"></i>
                Mulai Photobooth
            </a>

            <a href="#features" class="btn btn-outline">
                Kenali SnapStudio
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

        <div class="hero-note">
            <i class="bi bi-check-circle-fill"></i>
            Pilih desain frame favoritmu dan ekspresikan gayamu.
        </div>

    </div>


    <!-- VISUAL HERO -->

    <div class="hero-visual">

        <div class="photo-back"></div>

        <div class="photo-front">

            <div class="photo-image"></div>

            <div class="photo-caption">
                <h4>YOUR MOMENT</h4>
                <p>CAPTURE THE MEMORY</p>
            </div>

        </div>

        <div class="floating-icon floating-one">
            <i class="bi bi-stars"></i>
        </div>

        <div class="floating-icon floating-two">
            <i class="bi bi-heart-fill"></i>
        </div>

    </div>

</section>


<!-- FEATURES -->

<section class="features" id="features">

    <div class="section-heading">

        <span>WHY SNAPSTUDIO?</span>

        <h2>Abadikan Momen dengan Cara Berbeda</h2>

        <p>
            Pengalaman photobooth yang dirancang agar setiap momen
            menjadi lebih berkesan.
        </p>

    </div>


    <div class="feature-grid">

        <div class="feature-card">

            <div class="feature-icon">
                <i class="bi bi-images"></i>
            </div>

            <h3>Beragam Frame</h3>

            <p>
                Pilih berbagai desain frame yang tersedia
                untuk memberikan tampilan unik pada fotomu.
            </p>

        </div>


        <div class="feature-card">

            <div class="feature-icon">
                <i class="bi bi-magic"></i>
            </div>

            <h3>Efek Visual</h3>

            <p>
                Berikan sentuhan menarik pada foto dengan
                efek visual yang membuat hasil lebih istimewa.
            </p>

        </div>


        <div class="feature-card">

            <div class="feature-icon">
                <i class="bi bi-download"></i>
            </div>

            <h3>Simpan Kenangan</h3>

            <p>
                Hasil foto dapat menjadi kenangan yang
                bisa kamu simpan dan bagikan.
            </p>

        </div>

    </div>

</section>


<!-- FRAME GALLERY -->

<section class="frames-section" id="frames">

    <div class="frames-top">

        <div class="section-heading">

            <span>OUR COLLECTION</span>

            <h2>Temukan Frame Favoritmu</h2>

            <p>
                Jelajahi koleksi frame yang tersedia di SnapStudio.
            </p>

        </div>

        <div class="frame-count">
            <i class="bi bi-images"></i>
            {{ $frames->count() }} Frame Tersedia
        </div>

    </div>


    <div class="frame-grid">

        @forelse($frames as $frame)

            <article class="frame-card">

                <div class="frame-preview">

                    @if($frame->image)

                        <img
                            src="{{ asset('storage/' . $frame->image) }}"
                            alt="{{ $frame->name }}"
                            loading="lazy"
                        >

                    @else

                        <i class="bi bi-image"
                           style="font-size:40px;color:#B5ADC9">
                        </i>

                    @endif

                </div>


                <div class="frame-info">

                    <h3>{{ $frame->name }}</h3>

                    <p>
                        {{ $frame->description ?: 'Frame pilihan dari SnapStudio.' }}
                    </p>

                    <span class="frame-tag">
                        <i class="bi bi-check-circle-fill"></i>
                        Tersedia
                    </span>

                </div>

            </article>

        @empty

            <div class="empty-frames">

                <i class="bi bi-images"></i>

                <h3>Frame Belum Tersedia</h3>

                <p>
                    Saat ini belum ada frame yang tersedia.
                    Silakan kunjungi kembali nanti.
                </p>

            </div>

        @endforelse

    </div>

</section>


<!-- HOW TO USE -->

<section class="how-section" id="how">

    <div class="section-heading">

        <span>HOW IT WORKS</span>

        <h2>Tiga Langkah Mengabadikan Momen</h2>

        <p>
            Mulai pengalaman photobooth dengan langkah yang sederhana.
        </p>

    </div>


    <div class="steps-grid">

        <div class="step-card">

            <div class="step-number">01</div>

            <h3>Pilih Frame</h3>

            <p>
                Temukan desain frame yang sesuai dengan
                suasana dan gaya fotomu.
            </p>

        </div>


        <div class="step-card">

            <div class="step-number">02</div>

            <h3>Ambil Foto</h3>

            <p>
                Persiapkan pose terbaikmu dan abadikan
                momen melalui photobooth.
            </p>

        </div>


        <div class="step-card">

            <div class="step-number">03</div>

            <h3>Simpan Hasil</h3>

            <p>
                Nikmati hasil fotomu dan simpan
                sebagai kenangan yang berharga.
            </p>

        </div>

    </div>

</section>


<!-- CALL TO ACTION -->

<section class="cta-section">

    <div class="cta-box">

        <h2>Every Picture Tells a Story.</h2>

        <p>
            Setiap momen punya cerita. Saatnya membuat
            ceritamu bersama SnapStudio.
        </p>

        <!-- TOMBOL SUDAH DIHUBUNGKAN KE STUDIO PHOTOBOOTH -->
        <a href="{{ route('user.photobooth') }}">
            Jelajahi Frame
            <i class="bi bi-arrow-right"></i>
        </a>

    </div>

</section>


<!-- FOOTER -->

<footer>

    <div class="footer-content">

        <div class="footer-brand">

            <h3>Snap<span>Studio.</span></h3>

            <p>
                Capture your moment, create your story.
            </p>

        </div>

        <div class="footer-copy">
            © {{ date('Y') }} SnapStudio. All rights reserved.
        </div>

    </div>

</footer>


<script>
    function toggleMenu() {
        document.getElementById('navMenu').classList.toggle('show');
    }

    document.querySelectorAll('.nav-menu a').forEach(link => {
        link.addEventListener('click', function() {
            document.getElementById('navMenu').classList.remove('show');
        });
    });
</script>

</body>
</html>
