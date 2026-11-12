
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Frame - SnapStudio</title>

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

        button, input, textarea, select {
            font-family: inherit;
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
            cursor: pointer;
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

        /* FORM PANEL */
        .form-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 25px;
            max-width: 950px;
        }

        .form-heading {
            margin-bottom: 23px;
            padding-bottom: 18px;
            border-bottom: 1px solid var(--border);
        }

        .form-heading h3 {
            font-size: 14px;
            font-weight: 700;
        }

        .form-heading p {
            color: var(--muted);
            font-size: 10px;
            margin-top: 6px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .required {
            color: #E45B5B;
        }

        .form-control {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            background: white;
            color: var(--text);
            font-size: 11px;
            transition: .2s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(115,87,246,.08);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 110px;
            line-height: 1.6;
        }

        .help-text {
            color: var(--muted);
            font-size: 9px;
            margin-top: 7px;
            line-height: 1.5;
        }

        /* UPLOAD */
        .upload-area {
            min-height: 280px;
            border: 2px dashed #DCD5F5;
            border-radius: 12px;
            background: #FBFAFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: .2s;
            overflow: hidden;
        }

        .upload-area:hover {
            border-color: var(--primary);
            background: #F7F4FF;
        }

        .upload-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 14px;
        }

        .upload-area h4 {
            font-size: 12px;
            margin-bottom: 7px;
        }

        .upload-area p {
            font-size: 10px;
            color: var(--muted);
            line-height: 1.6;
        }

        .upload-area img {
            display: none;
            max-width: 100%;
            max-height: 230px;
            object-fit: contain;
            margin-bottom: 12px;
        }

        .upload-area.has-image .upload-icon,
        .upload-area.has-image h4,
        .upload-area.has-image .upload-help {
            display: none;
        }

        .upload-area.has-image img {
            display: block;
        }

        .upload-area.has-image p {
            color: var(--primary);
            font-weight: 600;
        }

        .file-input {
            display: none;
        }

        .upload-error {
            color: #D34C4C;
            font-size: 10px;
            margin-top: 8px;
        }

        /* BUTTONS */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 22px;
            margin-top: 8px;
            border-top: 1px solid var(--border);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #6245E8;
        }

        .btn-secondary {
            background: #F2F2F6;
            color: #686A7A;
        }

        .btn-secondary:hover {
            background: #E9E9EF;
        }

        .error-message {
            display: block;
            color: #D34C4C;
            font-size: 10px;
            margin-top: 6px;
        }

        .mobile-menu {
            display: none;
        }

        /* RESPONSIVE */
        @media(max-width: 950px) {
            .form-grid {
                grid-template-columns: 1fr;
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
            .top-profile div:not(.avatar) {
                display: none;
            }

            .form-panel {
                padding: 17px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions .btn {
                width: 100%;
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
                Pages / Manajemen Frame / <strong>Tambah Frame</strong>
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

        </div>

    </header>

    <section class="page-heading">
        <h1>Tambah Frame Baru</h1>
        <p>Upload desain frame milikmu untuk ditampilkan di photobooth.</p>
    </section>

    @if($errors->any())
        <div style="padding:13px 16px;background:#FFF0F0;color:#D34C4C;border-radius:9px;margin-bottom:18px;font-size:11px;">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <section class="form-panel">

        <div class="form-heading">
            <h3>Informasi Frame</h3>
            <p>Lengkapi informasi dan upload gambar frame yang ingin ditambahkan.</p>
        </div>

        <form action="{{ route('admin.frames.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-grid">

                <!-- KOLOM KIRI -->
                <div>

                    <div class="form-group">

                        <label>
                            Nama Frame <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Contoh: Pastel Vintage"
                            value="{{ old('name') }}"
                            required
                        >

                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label>Deskripsi Frame</label>

                        <textarea
                            name="description"
                            class="form-control"
                            placeholder="Tuliskan deskripsi singkat tentang frame..."
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label>
                            Status Frame <span class="required">*</span>
                        </label>

                        <select name="status" class="form-control" required>

                            <option value="active"
                                {{ old('status', 'active') == 'active' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="inactive"
                                {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                Nonaktif
                            </option>

                        </select>

                        <p class="help-text">
                            Frame aktif dapat digunakan pada halaman photobooth.
                        </p>

                        @error('status')
                            <span class="error-message">{{ $message }}</span>
                        @enderror

                    </div>

                </div>

                <!-- KOLOM KANAN -->
                <div>

                    <div class="form-group">

                        <label>
                            Upload Gambar Frame <span class="required">*</span>
                        </label>

                        <label for="image" class="upload-area" id="uploadArea">

                            <div class="upload-icon">
                                <i class="bi bi-cloud-arrow-up"></i>
                            </div>

                            <img id="imagePreview" src="" alt="Preview Frame">

                            <h4>Pilih gambar frame</h4>

                            <p class="upload-help">
                                Klik untuk memilih gambar atau gunakan drag and drop.
                            </p>

                            <p>
                                Format JPG, JPEG, PNG, WEBP.
                                Maksimal 5 MB.
                            </p>

                        </label>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="file-input"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            required
                        >

                        <p class="upload-error" id="uploadError"></p>

                        @error('image')
                            <span class="error-message">{{ $message }}</span>
                        @enderror

                    </div>

                </div>

            </div>

            <div class="form-actions">

                <a href="{{ route('admin.frames.index') }}"
                   class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i>
                    Simpan Frame
                </button>

            </div>

        </form>

    </section>

</main>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }

    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    const uploadError = document.getElementById('uploadError');

    function previewImage(file) {
        uploadError.textContent = '';

        if (!file) return;

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            uploadError.textContent = 'Format gambar harus JPG, PNG, atau WEBP.';
            imageInput.value = '';
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            uploadError.textContent = 'Ukuran gambar maksimal 5 MB.';
            imageInput.value = '';
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            uploadArea.classList.add('has-image');
        };

        reader.readAsDataURL(file);
    }

    imageInput.addEventListener('change', function() {
        previewImage(this.files[0]);
    });

    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = '#7357F6';
    });

    uploadArea.addEventListener('dragleave', function() {
        uploadArea.style.borderColor = '#DCD5F5';
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();

        const file = e.dataTransfer.files[0];

        if (!file) return;

        const transfer = new DataTransfer();
        transfer.items.add(file);
        imageInput.files = transfer.files;

        previewImage(file);
    });
</script>

</body>
</html>
