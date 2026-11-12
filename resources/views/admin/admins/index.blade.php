```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Admin - SnapStudio</title>

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

        button, input {
            font-family: inherit;
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--dark);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 27px 19px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            z-index: 100;
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
            flex-shrink: 0;
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
            font-size: 17px;
            width: 20px;
            text-align: center;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: #302A50;
        }

        .nav-link.active {
            border-left: 3px solid #927BFF;
        }

        /* PROFILE DAN LOGOUT */
        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
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
            font-weight: 700;
            font-size: 13px;
            flex-shrink: 0;
        }

        .admin-profile h4,
        .top-profile h4 {
            font-size: 11px;
        }

        .admin-profile p {
            color: #999AAC;
            font-size: 10px;
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
            border: 1px solid rgba(255, 85, 85, .15);
            border-radius: 9px;
            color: #FF8585;
            background: rgba(255, 85, 85, .08);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .logout-button:hover {
            background: rgba(255, 85, 85, .17);
            color: #FFAAAA;
        }

        .logout-button i {
            font-size: 16px;
        }

        /* MAIN CONTENT */
        .main {
            margin-left: var(--sidebar-width);
            padding: 0 34px 40px;
            min-height: 100vh;
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
            font-size: 12px;
            color: var(--muted);
        }

        .breadcrumb strong {
            color: var(--text);
        }

        .top-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-profile p {
            font-size: 10px;
            color: var(--muted);
            margin-top: 4px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 27px;
        }

        .page-heading h1 {
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -.6px;
        }

        .page-heading p {
            font-size: 12px;
            color: var(--muted);
            margin-top: 8px;
        }

        /* BUTTON */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 17px;
            border: none;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 5px 12px rgba(115,87,246,.18);
        }

        .btn-primary:hover {
            background: #6245E8;
            transform: translateY(-1px);
        }

        /* STATISTIK */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 17px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            padding: 21px;
            border: 1px solid var(--border);
            border-radius: 13px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .stat-card h3 {
            font-size: 23px;
            font-weight: 800;
        }

        .stat-card p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 5px;
        }

        /* PANEL */
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
            margin-bottom: 21px;
        }

        .panel-header h3 {
            font-size: 14px;
            font-weight: 700;
        }

        .panel-header p {
            font-size: 10px;
            color: var(--muted);
            margin-top: 6px;
        }

        /* SEARCH */
        .search-form {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 9px;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 12px;
            width: 250px;
        }

        .search-box i {
            color: var(--muted);
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 11px;
        }

        .btn-search {
            background: var(--primary-light);
            color: var(--primary);
            padding: 11px 14px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        th {
            color: #999AAA;
            font-size: 10px;
            font-weight: 600;
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid var(--border);
        }

        td {
            font-size: 11px;
            padding: 15px 12px;
            border-bottom: 1px solid #F4F4F7;
        }

        tbody tr:hover {
            background: #FAF9FF;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .small-avatar {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 11px;
        }

        .user-name {
            font-weight: 600;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 9px;
            border-radius: 6px;
            background: #F0EDFF;
            color: #7357F6;
            font-size: 9px;
            font-weight: 700;
        }

        /* AKSI */
        .action-buttons {
            display: flex;
            gap: 7px;
        }

        .action-btn {
            width: 31px;
            height: 31px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
        }

        .edit-btn {
            background: #EEF5FF;
            color: #4285D4;
        }

        .delete-btn {
            background: #FFF0F0;
            color: #E45B5B;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 45px 15px;
            color: var(--muted);
        }

        .empty-state i {
            font-size: 35px;
            color: #C5B9FF;
            display: block;
            margin-bottom: 12px;
        }

        .empty-state h4 {
            color: var(--text);
            font-size: 13px;
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: 11px;
        }

        /* PAGINATION */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
            font-size: 10px;
            color: var(--muted);
        }

        .pagination nav {
            display: flex;
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

        .mobile-menu {
            display: none;
        }

        /* RESPONSIVE */
        @media(max-width: 900px) {
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
                cursor: pointer;
            }
        }

        @media(max-width: 600px) {
            .page-heading,
            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-form,
            .search-box {
                width: 100%;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .top-profile div:not(.avatar) {
                display: none;
            }

            .pagination {
                flex-direction: column;
                align-items: flex-start;
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

        <a href="#"
           class="nav-link">
            <i class="bi bi-magic"></i>
            <span>Manajemen Filter</span>
        </a>

    </nav>

    <!-- PROFIL DAN LOGOUT -->
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

    <header class="topbar">

        <div style="display:flex;align-items:center;gap:15px">

            <button class="mobile-menu"
                    type="button"
                    onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>

            <div class="breadcrumb">
                Pages / <strong>Manajemen Admin</strong>
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

    <!-- JUDUL HALAMAN -->
    <section class="page-heading">

        <div>
            <h1>Manajemen Admin</h1>
            <p>Kelola akun administrator yang memiliki akses ke SnapStudio.</p>
        </div>

        <a href="{{ route('admin.admins.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Tambah Admin
        </a>

    </section>

    <!-- NOTIFIKASI -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="bi bi-exclamation-circle"></i>
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

    <!-- STATISTIK ADMIN -->
    <section class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>

            <div>
                <h3>{{ $totalAdmins ?? $admins->total() }}</h3>
                <p>Total Administrator</p>
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-person-plus-fill"></i>
            </div>

            <div>
                <h3>{{ $todayAdmins ?? 0 }}</h3>
                <p>Admin Ditambahkan Hari Ini</p>
            </div>

        </div>

    </section>

    <!-- DAFTAR ADMIN -->
    <section class="panel">

        <div class="panel-header">

            <div>
                <h3>Daftar Administrator</h3>
                <p>Informasi seluruh akun administrator SnapStudio.</p>
            </div>

            <form action="{{ route('admin.admins.index') }}"
                  method="GET"
                  class="search-form">

                <div class="search-box">
                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        name="search"
                        placeholder="Cari nama atau email..."
                        value="{{ request('search') }}">
                </div>

                <button type="submit" class="btn-search">
                    Cari
                </button>

            </form>

        </div>

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>ADMINISTRATOR</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                        <th>TANGGAL DIBUAT</th>
                        <th style="text-align:center">AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($admins as $admin)

                        <tr>

                            <td>
                                <div class="user-cell">

                                    <div class="small-avatar">
                                        {{ strtoupper(substr($admin->name, 0, 2)) }}
                                    </div>

                                    <div class="user-name">
                                        {{ $admin->name }}
                                    </div>

                                </div>
                            </td>

                            <td>{{ $admin->email }}</td>

                            <td>
                                <span class="role-badge">
                                    <i class="bi bi-shield-check"></i>
                                    Administrator
                                </span>
                            </td>

                            <td>
                                {{ $admin->created_at?->format('d M Y') ?? '-' }}
                            </td>

                            <td>
                                <div class="action-buttons"
                                     style="justify-content:center">

                                    <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                       class="action-btn edit-btn"
                                       title="Edit Admin">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    @if(auth()->id() !== $admin->id)

                                        <form action="{{ route('admin.admins.destroy', $admin->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus admin ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="action-btn delete-btn"
                                                    title="Hapus Admin">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    @endif

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5">

                                <div class="empty-state">
                                    <i class="bi bi-people"></i>
                                    <h4>Admin belum ditemukan</h4>
                                    <p>
                                        Belum ada akun administrator yang sesuai dengan pencarian.
                                    </p>
                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="pagination">

            <span>
                Menampilkan {{ $admins->firstItem() ?? 0 }}
                - {{ $admins->lastItem() ?? 0 }}
                dari {{ $admins->total() }} administrator
            </span>

            {{ $admins->withQueryString()->links() }}

        </div>

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
