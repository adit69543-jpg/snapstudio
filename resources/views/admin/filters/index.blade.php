```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Filter - SnapStudio</title>

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
            overflow-y: auto;
            padding: 27px 19px;
            color: white;
            background: var(--dark);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 42px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #927BFF, #6848EA);
            font-size: 21px;
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

        /* PROFILE */
        .sidebar-bottom {
            margin-top: auto;
            padding-top: 35px;
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

        .admin-profile p {
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
            margin-bottom: 35px;
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

        .top-profile p {
            margin-top: 4px;
            color: var(--muted);
            font-size: 10px;
        }

        .mobile-menu {
            display: none;
            border: none;
            background: transparent;
            font-size: 23px;
        }

        /* HEADING */
        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 27px;
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
            transition: .2s;
        }

        .btn-primary {
            color: white;
            background: var(--primary);
            box-shadow: 0 5px 12px rgba(115,87,246,.18);
        }

        .btn-primary:hover {
            background: #6245E8;
            transform: translateY(-1px);
        }

        /* ALERT */
        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 11px;
        }

        .alert-success {
            color: #16865E;
            background: #E8F8F1;
        }

        .alert-error {
            color: #D34C4C;
            background: #FFF0F0;
        }

        /* STATISTICS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px;
            margin-bottom: 25px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: white;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 12px;
            color: var(--primary);
            background: var(--primary-light);
            font-size: 20px;
        }

        .stat-card h3 {
            font-size: 22px;
            font-weight: 800;
        }

        .stat-card p {
            margin-top: 5px;
            color: var(--muted);
            font-size: 10px;
        }

        /* FILTER HEADER */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 17px;
        }

        .section-header h3 {
            font-size: 14px;
            font-weight: 700;
        }

        .section-header p {
            margin-top: 5px;
            color: var(--muted);
            font-size: 10px;
        }

        /* FILTER GRID */
        .filter-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 19px;
        }

        .filter-card {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: white;
            transition: .2s;
        }

        .filter-card:hover {
            transform: translateY(-3px);
            border-color: #DCD4FF;
            box-shadow: 0 10px 25px rgba(40,30,90,.06);
        }

        /* PREVIEW */
        .filter-preview {
            height: 155px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #EDE9FF;
        }

        .preview-image {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background:
                radial-gradient(ellipse at 50% 35%, #F8D5C4 0 13%, transparent 13.5%),
                radial-gradient(ellipse at 50% 95%, #7357F6 0 35%, transparent 35.5%),
                linear-gradient(135deg, #F8C9BB, #F2B8C9 45%, #A6A4F5);
        }

        .preview-image::before {
            content: '';
            position: absolute;
            width: 85px;
            height: 105px;
            top: 12px;
            left: calc(50% - 42px);
            border-radius: 48% 48% 42% 42%;
            background: linear-gradient(145deg, #F3C6A8, #D99C83);
            box-shadow: 0 0 0 8px rgba(255,255,255,.12);
        }

        .preview-image::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 100px;
            bottom: -55px;
            left: calc(50% - 75px);
            border-radius: 50% 50% 0 0;
            background: #FFFFFF;
            opacity: .8;
        }

        .preview-label {
            position: absolute;
            z-index: 2;
            bottom: 12px;
            left: 12px;
            padding: 6px 10px;
            border-radius: 6px;
            color: white;
            background: rgba(23,24,39,.65);
            font-size: 9px;
            font-weight: 700;
        }

        .filter-content {
            padding: 17px;
        }

        .filter-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .filter-info h4 {
            font-size: 13px;
            font-weight: 700;
        }

        .status {
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
        }

        .status-active {
            color: #16865E;
            background: #E8F8F1;
        }

        .status-inactive {
            color: #999AAC;
            background: #F0F0F3;
        }

        .filter-description {
            min-height: 34px;
            margin-top: 9px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
        }

        .filter-css {
            overflow: hidden;
            margin-top: 11px;
            padding: 8px 10px;
            border-radius: 7px;
            color: #7357F6;
            background: #F7F5FF;
            font-size: 9px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .filter-actions {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-top: 15px;
            padding-top: 13px;
            border-top: 1px solid var(--border);
        }

        .action-button {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 9px 7px;
            border: none;
            border-radius: 7px;
            font-size: 9px;
            font-weight: 600;
            text-decoration: none;
        }

        .edit-button {
            color: #4285D4;
            background: #EEF5FF;
        }

        .toggle-button {
            color: #7357F6;
            background: #F0EDFF;
        }

        .delete-button {
            flex: 0 0 35px;
            color: #E45B5B;
            background: #FFF0F0;
        }

        .action-button:hover {
            opacity: .8;
        }

        /* EMPTY */
        .empty-state {
            grid-column: 1 / -1;
            padding: 55px 20px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: white;
            text-align: center;
        }

        .empty-state i {
            color: #C5B9FF;
            font-size: 38px;
        }

        .empty-state h4 {
            margin-top: 12px;
            font-size: 14px;
        }

        .empty-state p {
            margin-top: 7px;
            color: var(--muted);
            font-size: 11px;
        }

        /* PAGINATION */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 22px;
            color: var(--muted);
            font-size: 10px;
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
            color: white;
            background: var(--primary);
        }

        /* RESPONSIVE */
        @media(max-width: 1100px) {
            .filter-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

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
            }
        }

        @media(max-width: 600px) {
            .filter-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .top-profile > div:not(.avatar) {
                display: none;
            }

            .pagination {
                align-items: flex-start;
                flex-direction: column;
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

    <header class="topbar">

        <div style="display:flex;align-items:center;gap:15px">

            <button class="mobile-menu"
                    type="button"
                    onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>

            <div class="breadcrumb">
                Pages / <strong>Manajemen Filter</strong>
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
            <h1>Manajemen Filter</h1>

            <p>
                Kelola efek visual yang tersedia untuk pengunjung
                photobooth SnapStudio.
            </p>
        </div>

        <a href="{{ route('admin.filters.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Tambah Filter
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

    <!-- STATISTICS -->
    <section class="stats-grid">

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-magic"></i>
            </div>

            <div>
                <h3>{{ $totalFilters }}</h3>
                <p>Total Filter</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>

            <div>
                <h3>{{ $activeFilters }}</h3>
                <p>Filter Aktif</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-pause-circle-fill"></i>
            </div>

            <div>
                <h3>{{ $inactiveFilters }}</h3>
                <p>Filter Nonaktif</p>
            </div>
        </div>

    </section>

    <!-- FILTER LIST -->
    <section>

        <div class="section-header">
            <div>
                <h3>Daftar Filter</h3>
                <p>Preview dan kelola efek visual photobooth.</p>
            </div>
        </div>

        <div class="filter-grid">

            @forelse($filters as $filter)

                <article class="filter-card">

                    <!-- FILTER PREVIEW -->
                    <div class="filter-preview">

                        <div class="preview-image"
                             style="filter: {{ $filter->css_filter }};">
                        </div>

                        <span class="preview-label">
                            <i class="bi bi-camera-fill"></i>
                            SNAPSTUDIO
                        </span>

                    </div>

                    <!-- FILTER CONTENT -->
                    <div class="filter-content">

                        <div class="filter-info">

                            <h4>{{ $filter->name }}</h4>

                            @if($filter->status === 'active')
                                <span class="status status-active">
                                    <i class="bi bi-circle-fill"></i>
                                    Aktif
                                </span>
                            @else
                                <span class="status status-inactive">
                                    <i class="bi bi-circle-fill"></i>
                                    Nonaktif
                                </span>
                            @endif

                        </div>

                        <p class="filter-description">
                            {{ $filter->description ?? 'Tidak ada deskripsi filter.' }}
                        </p>

                        <div class="filter-css">
                            {{ $filter->css_filter }}
                        </div>

                        <!-- ACTIONS -->
                        <div class="filter-actions">

                            <a href="{{ route('admin.filters.edit', $filter->id) }}"
                               class="action-button edit-button">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>

                            <form action="{{ route('admin.filters.toggleStatus', $filter->id) }}"
                                  method="POST"
                                  style="flex:1">

                                @csrf
                                @method('PATCH')

                                <button type="submit"
                                        class="action-button toggle-button"
                                        style="width:100%">

                                    @if($filter->status === 'active')
                                        <i class="bi bi-toggle-on"></i>
                                        Nonaktifkan
                                    @else
                                        <i class="bi bi-toggle-off"></i>
                                        Aktifkan
                                    @endif

                                </button>

                            </form>

                            <form action="{{ route('admin.filters.destroy', $filter->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus filter {{ $filter->name }}?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="action-button delete-button"
                                        title="Hapus Filter">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>

                        </div>

                    </div>

                </article>

            @empty

                <div class="empty-state">
                    <i class="bi bi-magic"></i>

                    <h4>Belum Ada Filter</h4>

                    <p>
                        Tambahkan filter pertama untuk photobooth SnapStudio.
                    </p>
                </div>

            @endforelse

        </div>

        <!-- PAGINATION -->
        <div class="pagination">

            <span>
                Menampilkan {{ $filters->firstItem() ?? 0 }}
                - {{ $filters->lastItem() ?? 0 }}
                dari {{ $filters->total() }} filter
            </span>

            {{ $filters->links() }}

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
