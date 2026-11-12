```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Frame - SnapStudio</title>

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

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            padding: 27px 19px;
            overflow-y: auto;
            background: var(--dark);
            color: white;
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
            border-radius: 13px;
            background: linear-gradient(135deg, #927BFF, #6848EA);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .brand h2 {
            font-size: 17px;
            font-weight: 800;
        }

        .brand p {
            font-size: 10px;
            color: #A5A5B8;
            margin-top: 4px;
        }

        .menu-label {
            color: #77798D;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.3px;
            padding: 0 12px;
            margin-bottom: 13px;
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
            padding-top: 30px;
            flex-shrink: 0;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            border-top: 1px solid #303142;
            padding: 20px 5px 0;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #E7DDFF;
            color: #6848EA;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .admin-profile h4 {
            font-size: 11px;
        }

        .admin-profile p {
            font-size: 10px;
            color: #999AAC;
            margin-top: 4px;
        }

        .logout-form {
            margin-top: 15px;
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border: 1px solid rgba(255,85,85,.15);
            border-radius: 9px;
            color: #FF8585;
            background: rgba(255,85,85,.08);
            font-size: 12px;
            font-weight: 600;
        }

        .logout-button:hover {
            background: rgba(255,85,85,.17);
        }

        /* MAIN */
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
            border-bottom: 1px solid var(--border);
            margin-bottom: 32px;
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

        .top-profile h4 {
            font-size: 11px;
        }

        .top-profile p {
            color: var(--muted);
            font-size: 10px;
            margin-top: 4px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-size: 23px;
            font-weight: 800;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 12px;
            margin-top: 8px;
        }

        /* BUTTON */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 16px;
            border: none;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 600;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #6245E8;
        }

        /* ALERT */
        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 11px;
        }

        .alert-success {
            background: #E8F8F1;
            color: #16865E;
        }

        .alert-error {
            background: #FFF0F0;
            color: #D34C4C;
        }

        /* STATISTICS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 25px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 19px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            background: var(--primary-light);
            font-size: 19px;
        }

        .stat-card h3 {
            font-size: 22px;
            font-weight: 800;
        }

        .stat-card p {
            color: var(--muted);
            font-size: 10px;
            margin-top: 4px;
        }

        /* FRAME PANEL */
        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 23px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 23px;
        }

        .panel-header h3 {
            font-size: 14px;
            font-weight: 700;
        }

        .panel-header p {
            color: var(--muted);
            font-size: 10px;
            margin-top: 6px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 9px;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 12px;
            width: 230px;
        }

        .search-box i {
            color: var(--muted);
        }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            font-size: 11px;
        }

        /* FRAME GRID */
        .frame-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .frame-card {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            transition: .2s;
        }

        .frame-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(20,20,40,.06);
        }

        .frame-image {
            width: 100%;
            height: 210px;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F7F6FB;
        }

        .frame-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .frame-placeholder {
            text-align: center;
            color: #B5ADC9;
        }

        .frame-placeholder i {
            font-size: 35px;
        }

        .frame-placeholder p {
            font-size: 10px;
            margin-top: 8px;
        }

        .frame-details {
            padding: 15px;
        }

        .frame-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
        }

        .frame-title h4 {
            font-size: 12px;
            font-weight: 700;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .status {
            padding: 5px 8px;
            border-radius: 6px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-active {
            color: #16865E;
            background: #E8F8F1;
        }

        .status-inactive {
            color: #D18A35;
            background: #FFF4E5;
        }

        .frame-description {
            min-height: 32px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
            margin-top: 9px;
            overflow-wrap: anywhere;
        }

        .frame-actions {
            display: flex;
            gap: 8px;
            margin-top: 13px;
        }

        .action-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 9px;
            border: none;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 600;
        }

        .edit-btn {
            color: #4285D4;
            background: #EEF5FF;
        }

        .delete-btn {
            color: #E45B5B;
            background: #FFF0F0;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
        }

        .empty-state i {
            display: block;
            font-size: 45px;
            color: #C5B9FF;
            margin-bottom: 15px;
        }

        .empty-state h4 {
            color: var(--text);
            font-size: 14px;
            margin-bottom: 7px;
        }

        .empty-state p {
            font-size: 11px;
        }

        /* PAGINATION */
        .pagination {
            margin-top: 22px;
            font-size: 11px;
        }

        .pagination nav svg {
            width: 15px;
        }

        .pagination nav a,
        .pagination nav span {
            padding: 7px 10px;
            border: 1px solid var(--border);
            font-size: 10px;
        }

        .pagination nav span[aria-current="page"] {
            background: var(--primary);
            color: white;
        }

        .mobile-menu {
            display: none;
        }

        /* RESPONSIVE */
        @media(max-width: 1100px) {
            .frame-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 850px) {
            .sidebar {
                transform: translateX(-100%);
                transition: .25s;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 0 20px 30px;
            }

            .mobile-menu {
                display: inline-flex;
                border: none;
                background: none;
                font-size: 22px;
            }
        }

        @media(max-width: 600px) {
            .frame-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .page-heading,
            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }

            .top-profile div:not(.avatar) {
                display: none;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
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

        <a href="{{ route('admin.admins.index') }}"
           class="nav-link {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
            <i class="bi bi-shield-lock"></i>
            <span>Manajemen Admin</span>
        </a>

        <a href="{{ route('admin.frames.index') }}"
           class="nav-link {{ request()->routeIs('admin.frames.*') ? 'active' : '' }}">
            <i class="bi bi-images"></i>
            <span>Manajemen Frame</span>
        </a>

        <!-- LINK MANAJEMEN FILTER SUDAH DIPERBAIKI -->
        <a href="{{ route('admin.filters.index') }}"
           class="nav-link {{ request()->routeIs('admin.filters.*') ? 'active' : '' }}">
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

        <form action="{{ route('logout') }}"
              method="POST"
              class="logout-form"
              onsubmit="return confirm('Apakah kamu yakin ingin logout?')">

            @csrf

            <button type="submit" class="logout-button">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>

        </form>

    </div>

</aside>

<!-- MAIN CONTENT -->
<main class="main">

    <!-- TOPBAR -->
    <header class="topbar">

        <div style="display:flex;align-items:center;gap:15px">

            <button class="mobile-menu"
                    type="button"
                    onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>

            <div class="breadcrumb">
                Pages / <strong>Manajemen Frame</strong>
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

    <!-- PAGE HEADING -->
    <section class="page-heading">

        <div>
            <h1>Manajemen Frame</h1>
            <p>Kelola dan tambahkan desain frame photobooth milikmu sendiri.</p>
        </div>

        <a href="{{ route('admin.frames.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Tambah Frame
        </a>

    </section>

    <!-- NOTIFICATION -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <!-- STATISTIK FRAME -->
    <section class="stats-grid">

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-images"></i>
            </div>

            <div>
                <h3>{{ $totalFrames }}</h3>
                <p>Total Frame</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>

            <div>
                <h3>{{ $activeFrames }}</h3>
                <p>Frame Aktif</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-pause-circle"></i>
            </div>

            <div>
                <h3>{{ $inactiveFrames }}</h3>
                <p>Frame Nonaktif</p>
            </div>
        </div>

    </section>

    <!-- DAFTAR FRAME -->
    <section class="panel">

        <div class="panel-header">

            <div>
                <h3>Daftar Frame</h3>
                <p>Semua desain frame yang tersimpan di SnapStudio.</p>
            </div>

            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text"
                       id="searchFrame"
                       placeholder="Cari nama frame...">
            </div>

        </div>

        @if($frames->count() > 0)

            <div class="frame-grid" id="frameGrid">

                @foreach($frames as $frame)

                    <article class="frame-card">

                        <div class="frame-image">

                            @if($frame->image)
                                <img
                                    src="{{ asset('storage/' . $frame->image) }}"
                                    alt="{{ $frame->name }}"
                                >
                            @else
                                <div class="frame-placeholder">
                                    <i class="bi bi-image"></i>
                                    <p>Gambar belum tersedia</p>
                                </div>
                            @endif

                        </div>

                        <div class="frame-details">

                            <div class="frame-title">

                                <h4>{{ $frame->name }}</h4>

                                @if($frame->status === 'active')
                                    <span class="status status-active">
                                        Aktif
                                    </span>
                                @else
                                    <span class="status status-inactive">
                                        Nonaktif
                                    </span>
                                @endif

                            </div>

                            <p class="frame-description">
                                {{ $frame->description ?: 'Tidak ada deskripsi.' }}
                            </p>

                            <div class="frame-actions">

                                <a href="{{ route('admin.frames.edit', $frame->id) }}"
                                   class="action-btn edit-btn">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.frames.destroy', $frame->id) }}"
                                    method="POST"
                                    style="flex:1"
                                    onsubmit="return confirm('Yakin ingin menghapus frame ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-btn delete-btn"
                                            style="width:100%">
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>

            <div class="pagination">
                {{ $frames->links() }}
            </div>

        @else

            <div class="empty-state">
                <i class="bi bi-images"></i>
                <h4>Belum ada frame</h4>
                <p>
                    Kamu belum menambahkan desain frame.
                    Silakan upload gambar frame pertamamu.
                </p>

                <a href="{{ route('admin.frames.create') }}"
                   class="btn btn-primary"
                   style="margin-top:18px">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Frame Pertama
                </a>
            </div>

        @endif

    </section>

</main>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }

    // PENCARIAN FRAME
    document.getElementById('searchFrame').addEventListener('input', function() {
        const keyword = this.value.toLowerCase();

        document.querySelectorAll('.frame-card').forEach(card => {
            const name = card.querySelector('.frame-title h4')
                .textContent.toLowerCase();

            card.style.display = name.includes(keyword) ? '' : 'none';
        });
    });
</script>

</body>
</html>
```
