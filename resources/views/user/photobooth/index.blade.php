
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Photobooth - SnapStudio</title>

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
            background: #F8F7FC;
            color: #242338;
        }

        button {
            font-family: inherit;
            cursor: pointer;
        }

        .navbar {
            height: 75px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            border-bottom: 1px solid #EEEAF7;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #242338;
            font-size: 19px;
            font-weight: 800;
            text-decoration: none;
        }

        .logo span {
            color: #7357F6;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #7357F6;
            color: white;
        }

        .back-link {
            color: #777587;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }

        .back-link:hover {
            color: #7357F6;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 35px 25px 60px;
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading span {
            color: #7357F6;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .heading h1 {
            margin-top: 10px;
            font-size: 28px;
            font-weight: 800;
        }

        .heading p {
            margin-top: 9px;
            color: #9290A1;
            font-size: 12px;
        }

        .studio {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 280px;
            gap: 22px;
        }

        .camera-card,
        .control-card {
            background: white;
            border: 1px solid #EEEAF7;
            border-radius: 16px;
            padding: 20px;
        }

        .camera-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .camera-header h3 {
            font-size: 13px;
            font-weight: 700;
        }

        .camera-status {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #9997A7;
            font-size: 10px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #B7B5C1;
        }

        .status-dot.on {
            background: #2DBD84;
            box-shadow: 0 0 0 4px #E5F8F0;
        }

        .camera-area {
            position: relative;
            overflow: hidden;
            width: 100%;
            aspect-ratio: 4 / 3;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #191827;
        }

        #camera {
            width: 100%;
            height: 100%;
            display: none;
            object-fit: cover;
            transform: scaleX(-1);
        }

        #capturedImage {
            width: 100%;
            height: 100%;
            display: none;
            object-fit: contain;
            background: #191827;
        }

        #frameOverlay {
            display: none;
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            z-index: 4;
            pointer-events: none;
        }

        .camera-placeholder {
            padding: 20px;
            text-align: center;
            color: white;
        }

        .camera-placeholder i {
            color: #A99AFF;
            font-size: 55px;
        }

        .camera-placeholder h3 {
            margin-top: 15px;
            font-size: 15px;
        }

        .camera-placeholder p {
            margin-top: 8px;
            color: #B4B1C4;
            font-size: 11px;
            line-height: 1.7;
        }

        #countdown {
            position: absolute;
            z-index: 5;
            display: none;
            color: white;
            font-size: 100px;
            font-weight: 800;
            text-shadow: 0 5px 25px rgba(0,0,0,.4);
        }

        .camera-message {
            display: none;
            position: absolute;
            inset: 0;
            z-index: 8;
            align-items: center;
            justify-content: center;
            padding: 25px;
            background: rgba(20,18,35,.88);
            color: white;
            text-align: center;
        }

        .camera-message i {
            font-size: 35px;
            color: #FF9292;
        }

        .camera-message h3 {
            margin-top: 12px;
            font-size: 15px;
        }

        .camera-message p {
            margin-top: 8px;
            color: #C4C1D1;
            font-size: 11px;
            line-height: 1.7;
        }

        .camera-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 17px;
        }

        .btn {
            min-height: 43px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 16px;
            border: none;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-primary {
            color: white;
            background: #7357F6;
        }

        .btn-primary:hover {
            background: #6044DE;
        }

        .btn-light {
            color: #7357F6;
            background: #F1EDFF;
        }

        .btn:disabled {
            cursor: not-allowed;
            opacity: .45;
        }

        .camera-buttons button {
            flex: 1;
            min-width: 0;
        }

        .control-card h3 {
            font-size: 14px;
            font-weight: 800;
        }

        .control-description {
            margin-top: 8px;
            color: #9290A1;
            font-size: 10px;
            line-height: 1.7;
        }

        .control-divider {
            height: 1px;
            margin: 20px 0;
            background: #EEEAF7;
        }

        .control-label {
            margin-bottom: 12px;
            color: #777587;
            font-size: 10px;
            font-weight: 700;
        }

        .countdown-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }

        .countdown-option {
            padding: 11px 5px;
            border: 1px solid #EEEAF7;
            border-radius: 8px;
            background: white;
            color: #777587;
            font-size: 11px;
            font-weight: 700;
        }

        .countdown-option.active {
            color: #7357F6;
            border-color: #7357F6;
            background: #F3F0FF;
        }

        /* FILTER */
        .filter-options {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 9px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 9px;
            min-width: 0;
            padding: 9px;
            border: 1px solid #EEEAF7;
            border-radius: 9px;
            background: white;
            color: #777587;
            text-align: left;
            font-size: 10px;
            font-weight: 700;
            transition: .2s;
        }

        .filter-option:hover {
            border-color: #B9A9FF;
            background: #FAF8FF;
        }

        .filter-option.active {
            color: #7357F6;
            border-color: #7357F6;
            background: #F3F0FF;
            box-shadow: 0 0 0 2px rgba(115,87,246,.08);
        }

        .filter-preview {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            background: linear-gradient(135deg,#E9D9FF,#F7D9C5 50%,#A8B7D8);
            color: #30264A;
            font-family: Georgia,serif;
            font-size: 15px;
            font-weight: 700;
        }

        .filter-option-name {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .selected-filter-text {
            margin-top: 9px;
            color: #9290A1;
            font-size: 10px;
        }

        .filter-empty {
            grid-column: 1 / -1;
            padding: 12px;
            border: 1px dashed #DCD5F0;
            border-radius: 8px;
            color: #9290A1;
            font-size: 10px;
            line-height: 1.7;
        }

        /* FRAME SELECTION */
        .frame-selection {
            display: none;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid #EEEAF7;
        }

        .frame-selection h3 {
            font-size: 14px;
            margin-bottom: 7px;
        }

        .frame-description {
            color: #9290A1;
            font-size: 10px;
            line-height: 1.7;
            margin-bottom: 14px;
        }

        .frame-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(105px, 1fr));
            gap: 12px;
        }

        .frame-item {
            min-width: 0;
            padding: 7px;
            border: 1px solid #EEEAF7;
            border-radius: 10px;
            background: white;
            text-align: center;
            transition: .2s;
        }

        .frame-item:hover {
            border-color: #B9A9FF;
        }

        .frame-item.active {
            border: 2px solid #7357F6;
            background: #F3F0FF;
        }

        .frame-item img {
            width: 100%;
            aspect-ratio: 3 / 4;
            object-fit: contain;
            border-radius: 6px;
            background: #F5F3F9;
        }

        .frame-item p {
            margin-top: 7px;
            color: #777587;
            font-size: 10px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .frame-actions {
            display: flex;
            gap: 10px;
            margin-top: 17px;
        }

        .frame-actions button {
            flex: 1;
        }

        .frame-empty {
            grid-column: 1 / -1;
            padding: 15px;
            border: 1px dashed #DCD5F0;
            border-radius: 9px;
            color: #9290A1;
            font-size: 11px;
            line-height: 1.7;
        }

        .tip {
            display: flex;
            gap: 10px;
            margin-top: 22px;
            padding: 13px;
            border-radius: 9px;
            background: #F5F2FF;
        }

        .tip i {
            color: #7357F6;
            font-size: 17px;
        }

        .tip p {
            color: #777587;
            font-size: 10px;
            line-height: 1.7;
        }

        .photo-result {
            display: none;
            margin-top: 18px;
            padding: 13px;
            border-radius: 9px;
            color: #16865E;
            background: #E8F8F1;
            font-size: 11px;
        }

        /* PROGRESS 4 FOTO */
        #photoProgress {
            display: none;
            margin-bottom: 14px;
            padding: 12px;
            border-radius: 9px;
            background: #F3F0FF;
            color: #7357F6;
            font-size: 11px;
            font-weight: 700;
            line-height: 1.6;
        }

        .progress-track {
            height: 6px;
            margin-top: 8px;
            overflow: hidden;
            border-radius: 10px;
            background: #DED7FF;
        }

        .progress-fill {
            height: 100%;
            width: 0;
            border-radius: 10px;
            background: #7357F6;
            transition: width .3s;
        }

        /* MODE HASIL PHOTO STRIP */
        .camera-area.result-mode {
            width: 100%;
            max-width: 320px;
            aspect-ratio: 803 / 1959;
            height: auto;
            margin: 0 auto;
            background: #F5F3F9;
        }

        .camera-area.result-mode #capturedImage {
            object-fit: fill;
            background: transparent;
        }

        .camera-area.result-mode #frameOverlay {
            object-fit: fill;
        }

        @media(max-width: 850px) {
            .studio {
                grid-template-columns: 1fr;
            }

            .control-card {
                order: 2;
            }
        }

        @media(max-width: 500px) {
            .navbar {
                padding: 0 5%;
            }

            .container {
                padding: 25px 15px;
            }

            .heading h1 {
                font-size: 23px;
            }

            .camera-card,
            .control-card {
                padding: 13px;
            }

            .camera-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<header class="navbar">
    <a href="{{ route('user.dashboard') }}" class="logo">
        <div class="logo-icon">
            <i class="bi bi-camera-fill"></i>
        </div>
        Snap<span>Studio.</span>
    </a>

    <a href="{{ route('user.dashboard') }}" class="back-link">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Beranda
    </a>
</header>

<main class="container">

    <section class="heading">
        <span>YOUR PERSONAL PHOTO STUDIO</span>
        <h1>Let's Capture Your Moment!</h1>
        <p>Siapkan pose terbaikmu dan abadikan momen spesialmu.</p>
    </section>

    <section class="studio">

        <!-- CAMERA -->
        <div class="camera-card">

            <div class="camera-header">
                <h3>
                    <i class="bi bi-camera-video"></i>
                    Live Camera
                </h3>

                <div class="camera-status">
                    <span class="status-dot" id="statusDot"></span>
                    <span id="statusText">Kamera belum aktif</span>
                </div>
            </div>

            <!-- PROGRESS FOTO -->
            <div id="photoProgress">
                Foto 0 dari 4 berhasil diambil
                <div class="progress-track">
                    <div class="progress-fill" id="progressFill"></div>
                </div>
            </div>

            <div class="camera-area">

                <div class="camera-placeholder" id="placeholder">
                    <i class="bi bi-camera-video-off"></i>
                    <h3>Kamera Belum Aktif</h3>
                    <p>
                        Klik tombol aktifkan kamera untuk mulai
                        menggunakan photobooth.
                    </p>
                </div>

                <video id="camera" autoplay playsinline muted></video>

                <img id="capturedImage" alt="Hasil foto">

                <!-- FRAME OVERLAY -->
                <img id="frameOverlay" alt="Frame pilihan">

                <div id="countdown"></div>

                <div class="camera-message" id="cameraError">
                    <div>
                        <i class="bi bi-exclamation-circle"></i>
                        <h3 id="errorTitle">Kamera Tidak Dapat Dibuka</h3>
                        <p id="errorText">
                            Periksa izin kamera pada browser.
                        </p>
                    </div>
                </div>

            </div>

            <div class="camera-buttons">

                <button class="btn btn-primary"
                        id="startCamera"
                        type="button"
                        onclick="startCamera()">
                    <i class="bi bi-camera-video"></i>
                    Aktifkan Kamera
                </button>

                <button class="btn btn-primary"
                        id="takePhoto"
                        type="button"
                        onclick="startCountdown()"
                        disabled>
                    <i class="bi bi-camera-fill"></i>
                    Ambil Foto 1
                </button>

                <button class="btn btn-light"
                        id="retakePhoto"
                        type="button"
                        onclick="retakePhoto()"
                        style="display:none">
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Foto Ulang
                </button>

            </div>

            <div class="photo-result" id="photoResult">
                <i class="bi bi-check-circle-fill"></i>
                Foto berhasil diambil!
            </div>

            <!-- PEMILIHAN FRAME -->
            <div class="frame-selection" id="frameSelection">

                <h3>
                    <i class="bi bi-images"></i>
                    Pilih Frame Foto
                </h3>

                <p class="frame-description">
                    Pilih frame favoritmu. Preview akan langsung menampilkan
                    frame pada hasil photostrip empat foto.
                </p>

                <div class="frame-list">

                    <!-- TANPA FRAME -->
                    <button type="button"
                            class="frame-item active"
                            data-frame-url=""
                            data-frame-name="Tanpa Frame"
                            onclick="selectFrame(this)">

                        <div style="aspect-ratio:3/4;display:flex;align-items:center;justify-content:center;background:#F5F3F9;border-radius:6px;color:#9290A1;">
                            <i class="bi bi-image" style="font-size:26px"></i>
                        </div>

                        <p>Tanpa Frame</p>

                    </button>

                    <!-- FRAME DARI DATABASE ADMIN -->
                    @forelse($frames ?? [] as $frame)

                        <button type="button"
                                class="frame-item"
                                data-frame-url="{{ asset('storage/' . $frame->image) }}"
                                data-frame-name="{{ $frame->name }}"
                                onclick="selectFrame(this)">

                            <img src="{{ asset('storage/' . $frame->image) }}"
                                 alt="{{ $frame->name }}"
                                 loading="lazy">

                            <p>{{ $frame->name }}</p>

                        </button>

                    @empty

                        <div class="frame-empty">
                            Belum ada frame aktif. Silakan tambahkan frame
                            melalui Dashboard Admin pada menu Manajemen Frame.
                        </div>

                    @endforelse

                </div>

                <div class="frame-actions">

                    <button type="button"
                            class="btn btn-primary"
                            onclick="downloadFinalPhoto()">
                        <i class="bi bi-download"></i>
                        Download Foto
                    </button>

                </div>

            </div>

        </div>

        <!-- CAMERA SETTINGS -->
        <aside class="control-card">

            <h3>Pengaturan Kamera</h3>

            <p class="control-description">
                Atur countdown dan pilih filter sebelum mengambil foto.
            </p>

            <div class="control-divider"></div>

            <p class="control-label">COUNTDOWN FOTO</p>

            <div class="countdown-options">

                <button class="countdown-option"
                        data-time="0"
                        onclick="setCountdown(0, this)">
                    OFF
                </button>

                <button class="countdown-option"
                        data-time="3"
                        onclick="setCountdown(3, this)">
                    3 DETIK
                </button>

                <button class="countdown-option active"
                        data-time="5"
                        onclick="setCountdown(5, this)">
                    5 DETIK
                </button>

            </div>

            <div class="control-divider"></div>

            <p class="control-label">PILIH FILTER</p>

            <div class="filter-options" id="filterOptions">

                <!-- FILTER NORMAL -->
                <button type="button"
                        class="filter-option active"
                        data-filter-name="Normal"
                        data-css-filter="none"
                        onclick="selectFilter(this)">

                    <span class="filter-preview">Aa</span>
                    <span class="filter-option-name">Normal</span>

                </button>

                <!-- FILTER DARI DATABASE ADMIN -->
                @forelse($filters ?? [] as $filter)

                    <button type="button"
                            class="filter-option"
                            data-filter-name="{{ $filter->name }}"
                            data-css-filter="{{ $filter->css_filter }}"
                            onclick="selectFilter(this)">

                        <span class="filter-preview"
                              style="filter: {{ $filter->css_filter }};">
                            Aa
                        </span>

                        <span class="filter-option-name">
                            {{ $filter->name }}
                        </span>

                    </button>

                @empty

                    <div class="filter-empty">
                        Belum ada filter aktif. Tambahkan dan aktifkan
                        filter melalui Dashboard Admin.
                    </div>

                @endforelse

            </div>

            <p class="selected-filter-text">
                Filter dipilih:
                <strong id="selectedFilterName">Normal</strong>
            </p>

            <div class="control-divider"></div>

            <p class="control-label">PETUNJUK PENGGUNAAN</p>

            <div class="tip">
                <i class="bi bi-camera-video"></i>
                <p>
                    Aktifkan kamera dan izinkan browser mengakses webcam kamu.
                </p>
            </div>

            <div class="tip">
                <i class="bi bi-person-bounding-box"></i>
                <p>
                    Posisikan wajah di tengah kamera dan pastikan pencahayaan cukup.
                </p>
            </div>

            <div class="tip">
                <i class="bi bi-stopwatch"></i>
                <p>
                    Pilih countdown agar kamu memiliki waktu untuk mempersiapkan pose.
                </p>
            </div>

            <div class="tip">
                <i class="bi bi-arrow-repeat"></i>
                <p>
                    Ambil empat foto secara berurutan. Kamu bisa mengulang sesi
                    jika hasilnya kurang bagus.
                </p>
            </div>

        </aside>

    </section>

</main>

<canvas id="photoCanvas" style="display:none"></canvas>

<script>
    let cameraStream = null;
    let selectedCountdown = 5;
    let countdownTimer = null;
    let countdownTimeout = null;
    let isCapturing = false;

    // FILTER
    let selectedFilterCss = 'none';
    let selectedFilterName = 'Normal';

    // FRAME
    let selectedFrameUrl = '';
    let selectedFrameName = 'Tanpa Frame';

    // PHOTO STRIP
    const totalPhotos = 4;
    let sessionPhotos = [];

    const video = document.getElementById('camera');
    const capturedImage = document.getElementById('capturedImage');
    const cameraArea = document.querySelector('.camera-area');

    const placeholder = document.getElementById('placeholder');
    const countdownDisplay = document.getElementById('countdown');

    const startButton = document.getElementById('startCamera');
    const takeButton = document.getElementById('takePhoto');
    const retakeButton = document.getElementById('retakePhoto');

    const statusDot = document.getElementById('statusDot');
    const statusText = document.getElementById('statusText');

    const cameraError = document.getElementById('cameraError');
    const photoResult = document.getElementById('photoResult');

    const frameOverlay = document.getElementById('frameOverlay');
    const frameSelection = document.getElementById('frameSelection');

    const photoProgress = document.getElementById('photoProgress');


    // ======================================
    // PROGRESS FOTO
    // ======================================

    function updatePhotoProgress() {
        const count = sessionPhotos.length;
        const percentage = (count / totalPhotos) * 100;

        photoProgress.style.display = 'block';
        photoProgress.innerHTML = `
            Foto ${count} dari ${totalPhotos} berhasil diambil
            <div class="progress-track">
                <div class="progress-fill" style="width:${percentage}%"></div>
            </div>
        `;
    }


    // ======================================
    // PILIH FILTER
    // Filter dikunci setelah foto pertama agar
    // keempat foto memiliki tampilan konsisten.
    // ======================================

    function selectFilter(button) {
        if (isCapturing || sessionPhotos.length > 0) return;

        selectedFilterCss = button.dataset.cssFilter || 'none';
        selectedFilterName = button.dataset.filterName || 'Normal';

        document.querySelectorAll('.filter-option')
            .forEach(item => item.classList.remove('active'));

        button.classList.add('active');
        video.style.filter = selectedFilterCss;

        document.getElementById('selectedFilterName').textContent =
            selectedFilterName;
    }


    // ======================================
    // PILIH COUNTDOWN
    // ======================================

    function setCountdown(seconds, button) {
        if (isCapturing) return;

        selectedCountdown = seconds;

        document.querySelectorAll('.countdown-option')
            .forEach(item => item.classList.remove('active'));

        button.classList.add('active');
    }


    // ======================================
    // AKTIFKAN KAMERA
    // ======================================

    async function startCamera() {
        if (cameraStream) return;

        cameraError.style.display = 'none';
        startButton.disabled = true;

        try {
            if (!navigator.mediaDevices ||
                !navigator.mediaDevices.getUserMedia) {
                throw new Error('unsupported');
            }

            cameraStream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'user',
                    width: { ideal: 1280 },
                    height: { ideal: 960 }
                },
                audio: false
            });

            video.srcObject = cameraStream;
            video.style.filter = selectedFilterCss;

            await video.play();

            video.style.display = 'block';
            placeholder.style.display = 'none';
            capturedImage.style.display = 'none';
            cameraArea.classList.remove('result-mode');

            takeButton.disabled = false;
            takeButton.innerHTML =
                `<i class="bi bi-camera-fill"></i> Ambil Foto ${sessionPhotos.length + 1}`;

            statusDot.classList.add('on');
            statusText.textContent = 'Kamera aktif';

            startButton.innerHTML =
                '<i class="bi bi-check-circle-fill"></i> Kamera Aktif';

        } catch (error) {
            cameraStream = null;
            startButton.disabled = false;
            cameraError.style.display = 'flex';

            if (error.name === 'NotAllowedError') {
                showCameraError(
                    'Izin Kamera Ditolak',
                    'Izinkan akses kamera melalui pengaturan browser, lalu coba lagi.'
                );
            } else if (error.name === 'NotFoundError') {
                showCameraError(
                    'Kamera Tidak Ditemukan',
                    'Pastikan webcam atau kamera perangkat sudah terhubung.'
                );
            } else if (error.name === 'NotReadableError') {
                showCameraError(
                    'Kamera Sedang Digunakan',
                    'Tutup aplikasi lain yang sedang menggunakan kamera.'
                );
            } else if (error.message === 'unsupported') {
                showCameraError(
                    'Browser Tidak Mendukung',
                    'Gunakan browser modern melalui localhost atau HTTPS.'
                );
            } else {
                showCameraError(
                    'Kamera Tidak Dapat Dibuka',
                    error.message || 'Periksa izin kamera dan coba kembali.'
                );
            }

            statusText.textContent = 'Kamera tidak aktif';
        }
    }


    function showCameraError(title, message) {
        document.getElementById('errorTitle').textContent = title;
        document.getElementById('errorText').textContent = message;
    }


    // ======================================
    // COUNTDOWN
    // ======================================

    function startCountdown() {
        if (!cameraStream || isCapturing ||
            sessionPhotos.length >= totalPhotos) return;

        isCapturing = true;
        takeButton.disabled = true;
        startButton.disabled = true;

        let remaining = selectedCountdown;

        if (remaining === 0) {
            capturePhoto();
            return;
        }

        countdownDisplay.style.display = 'block';
        countdownDisplay.textContent = remaining;

        countdownTimer = setInterval(() => {
            remaining--;

            if (remaining > 0) {
                countdownDisplay.textContent = remaining;
            } else {
                clearInterval(countdownTimer);
                countdownDisplay.textContent = '📸';
                countdownTimeout = setTimeout(capturePhoto, 400);
            }
        }, 1000);
    }


    // ======================================
    // AMBIL SATU FOTO
    // ======================================

    function capturePhoto() {
        if (!cameraStream ||
            video.readyState < HTMLMediaElement.HAVE_CURRENT_DATA) {

            isCapturing = false;
            takeButton.disabled = false;
            startButton.disabled = false;
            countdownDisplay.style.display = 'none';
            return;
        }

        const shotCanvas = document.createElement('canvas');
        shotCanvas.width = video.videoWidth;
        shotCanvas.height = video.videoHeight;

        const context = shotCanvas.getContext('2d');

        // Mirror foto agar sesuai tampilan kamera
        context.translate(shotCanvas.width, 0);
        context.scale(-1, 1);

        // Terapkan filter yang dipilih
        context.filter = selectedFilterCss;
        context.drawImage(
            video,
            0,
            0,
            shotCanvas.width,
            shotCanvas.height
        );
        context.filter = 'none';

        // Simpan foto ke sesi
        sessionPhotos.push(shotCanvas.toDataURL('image/png'));

        countdownDisplay.style.display = 'none';
        updatePhotoProgress();

        if (sessionPhotos.length < totalPhotos) {
            isCapturing = false;
            takeButton.disabled = false;
            startButton.disabled = false;

            takeButton.innerHTML =
                `<i class="bi bi-camera-fill"></i> Ambil Foto ${sessionPhotos.length + 1}`;

            statusText.textContent =
                `Foto ${sessionPhotos.length} dari ${totalPhotos} berhasil diambil`;

            return;
        }

        createPhotoStrip();
    }


    // ======================================
    // GABUNGKAN EMPAT FOTO MENJADI STRIP
    // Output: 800 x 2500 px
    // ======================================

    async function createPhotoStrip() {
        const stripCanvas = document.createElement('canvas');

        // Ukuran HARUS sama dengan file frame vintage transparan.
        const STRIP_WIDTH = 803;
        const STRIP_HEIGHT = 1959;

        stripCanvas.width = STRIP_WIDTH;
        stripCanvas.height = STRIP_HEIGHT;

        const context = stripCanvas.getContext('2d');

        // Transparan di luar area foto; frame akan dilapiskan saat download.
        context.clearRect(0, 0, STRIP_WIDTH, STRIP_HEIGHT);

        // Koordinat lubang foto berdasarkan frame PNG 803 x 1959.
        // Format: x, y, lebar, tinggi.
        const photoSlots = [
            { x: 94, y: 132, width: 611, height: 399 },
            { x: 93, y: 565, width: 613, height: 379 },
            { x: 92, y: 981, width: 612, height: 333 },
            { x: 98, y: 1353, width: 607, height: 381 }
        ];

        try {
            for (let i = 0; i < sessionPhotos.length; i++) {
                const photo = new Image();
                photo.src = sessionPhotos[i];

                await new Promise((resolve, reject) => {
                    photo.onload = resolve;
                    photo.onerror = reject;
                });

                const slot = photoSlots[i];

                // Crop tengah agar foto mengisi lubang tanpa distorsi.
                const sourceRatio = photo.naturalWidth / photo.naturalHeight;
                const targetRatio = slot.width / slot.height;

                let sx = 0;
                let sy = 0;
                let sw = photo.naturalWidth;
                let sh = photo.naturalHeight;

                if (sourceRatio > targetRatio) {
                    sw = photo.naturalHeight * targetRatio;
                    sx = (photo.naturalWidth - sw) / 2;
                } else {
                    sh = photo.naturalWidth / targetRatio;
                    sy = (photo.naturalHeight - sh) / 2;
                }

                context.drawImage(
                    photo,
                    sx, sy, sw, sh,
                    slot.x, slot.y, slot.width, slot.height
                );
            }

            capturedImage.src = stripCanvas.toDataURL('image/png');
            capturedImage.style.display = 'block';
            video.style.display = 'none';

            cameraArea.classList.add('result-mode');

            takeButton.style.display = 'none';
            retakeButton.style.display = 'inline-flex';

            photoResult.style.display = 'block';
            photoResult.innerHTML =
                '<i class="bi bi-check-circle-fill"></i> 4 foto berhasil digabungkan menjadi photostrip!';

            frameSelection.style.display = 'block';

            // Reset pilihan frame
            selectedFrameUrl = '';
            selectedFrameName = 'Tanpa Frame';

            frameOverlay.style.display = 'none';
            frameOverlay.removeAttribute('src');

            document.querySelectorAll('.frame-item')
                .forEach(item => item.classList.remove('active'));

            const noFrameButton = document.querySelector(
                '.frame-item[data-frame-url=""]'
            );

            if (noFrameButton) {
                noFrameButton.classList.add('active');
            }

            isCapturing = false;
            stopCamera();

            statusText.textContent = '4 foto berhasil diambil';
            updatePhotoProgress();

        } catch (error) {
            isCapturing = false;
            takeButton.disabled = false;
            startButton.disabled = false;
            alert('Gagal menyusun photostrip. Silakan coba Foto Ulang.');
        }
    }


    // ======================================
    // PILIH FRAME DARI DATABASE ADMIN
    // ======================================

    function selectFrame(button) {
        selectedFrameUrl = button.dataset.frameUrl || '';
        selectedFrameName = button.dataset.frameName || 'Tanpa Frame';

        document.querySelectorAll('.frame-item')
            .forEach(item => item.classList.remove('active'));

        button.classList.add('active');

        if (selectedFrameUrl) {
            frameOverlay.onload = function () {
                frameOverlay.style.display = 'block';
            };

            frameOverlay.onerror = function () {
                frameOverlay.style.display = 'none';
                alert('Frame gagal dimuat. Periksa file gambar frame.');
            };

            frameOverlay.src = selectedFrameUrl;
        } else {
            frameOverlay.style.display = 'none';
            frameOverlay.removeAttribute('src');
        }
    }


    // ======================================
    // DOWNLOAD PHOTOSTRIP + FRAME
    // ======================================

    async function downloadFinalPhoto() {
        if (!capturedImage.src || !capturedImage.complete) {
            alert('Foto belum siap untuk diunduh.');
            return;
        }

        const downloadCanvas = document.createElement('canvas');
        // Samakan ukuran output dengan frame vintage transparan.
        downloadCanvas.width = 803;
        downloadCanvas.height = 1959;

        const context = downloadCanvas.getContext('2d');
        const stripImage = new Image();

        try {
            stripImage.src = capturedImage.src;

            await new Promise((resolve, reject) => {
                stripImage.onload = resolve;
                stripImage.onerror = reject;
            });

            context.drawImage(
                stripImage,
                0,
                0,
                downloadCanvas.width,
                downloadCanvas.height
            );

            // Lapiskan frame transparan di atas seluruh strip
            if (selectedFrameUrl) {
                const frameImage = new Image();
                frameImage.src = selectedFrameUrl;

                await new Promise((resolve, reject) => {
                    frameImage.onload = resolve;
                    frameImage.onerror = reject;
                });

                context.drawImage(
                    frameImage,
                    0,
                    0,
                    downloadCanvas.width,
                    downloadCanvas.height
                );
            }

            const link = document.createElement('a');
            link.download = 'SnapStudio-Photostrip-' + Date.now() + '.png';
            link.href = downloadCanvas.toDataURL('image/png');
            link.click();

        } catch (error) {
            alert('Gagal membuat hasil foto. Periksa file frame dan coba kembali.');
        }
    }


    // ======================================
    // FOTO ULANG - RESET 4 FOTO
    // ======================================

    async function retakePhoto() {
        if (countdownTimer) clearInterval(countdownTimer);
        if (countdownTimeout) clearTimeout(countdownTimeout);

        sessionPhotos = [];
        isCapturing = false;

        selectedFrameUrl = '';
        selectedFrameName = 'Tanpa Frame';

        frameSelection.style.display = 'none';

        frameOverlay.style.display = 'none';
        frameOverlay.removeAttribute('src');

        capturedImage.style.display = 'none';
        cameraArea.classList.remove('result-mode');

        video.style.display = 'block';

        retakeButton.style.display = 'none';
        takeButton.style.display = 'inline-flex';
        takeButton.innerHTML =
            '<i class="bi bi-camera-fill"></i> Ambil Foto 1';

        takeButton.disabled = true;
        startButton.disabled = false;

        photoResult.style.display = 'none';
        photoProgress.style.display = 'none';
        countdownDisplay.style.display = 'none';

        document.querySelectorAll('.frame-item')
            .forEach(item => item.classList.remove('active'));

        const noFrameButton = document.querySelector(
            '.frame-item[data-frame-url=""]'
        );

        if (noFrameButton) {
            noFrameButton.classList.add('active');
        }

        await startCamera();
    }


    // ======================================
    // MATIKAN KAMERA
    // ======================================

    function stopCamera() {
        if (cameraStream) {
            cameraStream.getTracks().forEach(track => track.stop());
            cameraStream = null;
        }

        video.srcObject = null;
        statusDot.classList.remove('on');
    }


    // Bersihkan kamera ketika meninggalkan halaman
    window.addEventListener('pagehide', stopCamera);

</script>

</body>
</html>
