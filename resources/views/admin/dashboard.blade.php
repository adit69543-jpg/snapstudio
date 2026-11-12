```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SnapStudio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #7357F6;
            --primary-light: #F0EDFF;
            --dark: #171827;
            --text: #242538;
            --muted: #9294A5;
            --background: #F7F7FB;
            --border: #EEEEF3;
            --sidebar-width: 260px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
            cursor: pointer;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 27px 19px;
            color: white;
            background: var(--dark);
            scrollbar-width: thin;
            scrollbar-color: #49406F #171827;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #49406F;
            border-radius: 10px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 42px;
            flex-shrink: 0;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 21px;
            background: linear-gradient(135deg, #927BFF, #6848EA);
        }

        .brand h2 {
            font-size: 17px;
            font-weight: 800;
        }

        .brand p {
            margin-top: 4px;
            color: #A5A5B8;
            font-size: 10px;
        }

        .menu-label {
            padding: 0 12px;
            margin-bottom: 13px;
            color: #77798D;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.3px;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px;
            border-radius: 10px;
            color: #A6A7B8;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-link i {
            width: 20px;
            flex-shrink: 0;
            text-align: center;
            font-size: 17px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: #302A50;
        }

        .nav-link.active {
            border-left: 3px solid #927BFF;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 35px;
            flex-shrink: 0;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 19px 5px 0;
            border-top: 1px solid #303142;
        }

        .avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6848EA;
            background: #E7DDFF;
            font-size: 13px;
            font-weight: 700;
        }

        .admin-profile h4,
        .top-profile h4 {
            font-size: 11px;
        }

        .admin-profile p,
        .top-profile p {
            margin-top: 4px;
            color: #999AAC;
            font-size: 10px;
        }

        .logout-form {
            margin-top: 14px;
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border: 1px solid rgba(255,85,85,.15);
            border-radius: 10px;
            color: #FF8585;
            background: rgba(255,85,85,.08);
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .logout-button:hover {
            color: #FFAAAA;
            background: rgba(255,85,85,.17);
        }

        .logout-button i {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .main {
            min-height: 100vh;
            margin-left: var(--sidebar-width);
            padding: 0 34px 40px;
        }

        .topbar {
            height: 85px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 42px;
            border-bottom: 1px solid var(--border);
        }

        .breadcrumb {
            color: var(--muted);
            font-size: 12px;
        }

        .breadcrumb strong {
            color: var(--text);
        }

        .top-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mobile-menu {
            display: none;
            border: none;
            background: transparent;
            color: var(--text);
            font-size: 23px;
        }

        .page-heading {
            margin-bottom: 28px;
        }

        .page-heading h1 {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.6px;
        }

        .page-heading p {
            margin-top: 9px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .management-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .management-card {
            min-height: 205px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 23px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            transition: .2s;
        }

        .management-card:hover {
            transform: translateY(-4px);
            border-color: #DCD4FF;
            box-shadow: 0 10px 28px rgba(40,30,90,.06);
        }

        .card-icon {
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

        .management-card h3 {
            margin-top: 20px;
            font-size: 14px;
            font-weight: 700;
        }

        .management-card p {
            margin-top: 7px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .card-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: auto;
            padding-top: 17px;
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
        }

        @media (max-width: 1050px) {
            .management-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform .25s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 0 20px 30px;
            }

            .mobile-menu {
                display: block;
            }
        }

        @media (max-width: 560px) {
            .management-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                height: 72px;
                margin-bottom: 30px;
            }

            .top-profile > div:not(.avatar) {
                display: none;
            }

            .page-heading h1 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar" id="sidebar">

    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-camera-fill"></i>
        </div>

        <div>
            <h2>SnapStudio.</h2>
            <p>PHOTOBOOTH MANAGEMENT</p>
        </div>
    </div>

    <p class="menu-label">MAIN MENU</p>

    <nav class="nav-menu">

        <a href="{{ route('admin.admins.index') }}" class="nav-link">
            <i class="bi bi-shield-lock"></i>
            <span>Manajemen Admin</span>
        </a>

        <a href="{{ route('admin.frames.index') }}" class="nav-link">
            <i class="bi bi-images"></i>
            <span>Manajemen Frame</span>
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-magic"></i>
            <span>Manajemen Filter</span>
        </a>

    </nav>

    <div class="sidebar-bottom">

        <div class="admin-profile">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}
            </div>

            <div style="flex:1; min-width:0">
                <h4>{{ auth()->user()->name ?? 'Administrator' }}</h4>
                <p>Super Admin</p>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="logout-form"
              onsubmit="return confirm('Apakah kamu yakin ingin logout?')">
            @csrf

            <button type="submit" class="logout-button">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>

    </div>

</aside>

<main class="main">

    <header class="topbar">

        <div style="display:flex; align-items:center; gap:15px">
            <button class="mobile-menu" type="button" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>

            <div class="breadcrumb">
                Pages / <strong>Panel Admin</strong>
            </div>
        </div>

        <div class="top-profile">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}
            </div>

            <div>
                <h4>{{ auth()->user()->name ?? 'Administrator' }}</h4>
                <p>Super Admin</p>
            </div>

            <i class="bi bi-chevron-down" style="font-size:11px"></i>
        </div>

    </header>

    <section class="page-heading">
        <h1>Panel Manajemen SnapStudio</h1>

        <p>
            Pilih salah satu menu untuk mengelola fitur dan konten
            Photobooth SnapStudio.
        </p>
    </section>

    <section class="management-grid">

        <a href="{{ route('admin.admins.index') }}" class="management-card">
            <div class="card-icon">
                <i class="bi bi-shield-lock"></i>
            </div>

            <h3>Manajemen Admin</h3>

            <p>
                Kelola akun administrator yang memiliki akses
                untuk mengatur website SnapStudio.
            </p>

            <span class="card-link">
                Kelola Admin
                <i class="bi bi-arrow-right"></i>
            </span>
        </a>

        <a href="{{ route('admin.frames.index') }}" class="management-card">
            <div class="card-icon">
                <i class="bi bi-images"></i>
            </div>

            <h3>Manajemen Frame</h3>

            <p>
                Tambahkan, ubah, aktifkan, dan hapus gambar
                frame photobooth milikmu.
            </p>

            <span class="card-link">
                Kelola Frame
                <i class="bi bi-arrow-right"></i>
            </span>
        </a>

        <a href="#" class="management-card">
            <div class="card-icon">
                <i class="bi bi-magic"></i>
            </div>

            <h3>Manajemen Filter</h3>

            <p>
                Kelola pilihan filter dan efek visual yang
                nantinya tersedia di photobooth.
            </p>

            <span class="card-link">
                Segera tersedia
                <i class="bi bi-arrow-right"></i>
            </span>
        </a>

    </section>

</main>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }
</script>

</body>
</html>
```
