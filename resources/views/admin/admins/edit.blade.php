
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Admin - SnapStudio</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Inter, sans-serif;
            background: #F7F7FC;
            color: #24243A;
            padding: 45px 20px;
        }

        .container { max-width: 650px; margin: auto; }

        .back {
            color: #7657F6;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .card {
            background: white;
            padding: 35px;
            border: 1px solid #EEEEF4;
            border-radius: 16px;
            margin-top: 22px;
        }

        h1 { font-size: 24px; }

        .subtitle {
            font-size: 12px;
            color: #9998AA;
            margin: 9px 0 28px;
        }

        .notice {
            background: #F2EEFF;
            color: #7657F6;
            padding: 14px;
            border-radius: 9px;
            font-size: 11px;
            margin-bottom: 24px;
        }

        .form-group { margin-bottom: 21px; }

        label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        input {
            width: 100%;
            height: 47px;
            border: 1px solid #E8E7EF;
            border-radius: 9px;
            padding: 0 14px;
            outline: none;
            font-family: inherit;
            font-size: 12px;
        }

        input:focus { border-color: #7657F6; }

        .error {
            color: #E45B6B;
            font-size: 10px;
            margin-top: 7px;
        }

        .hint {
            color: #9998AA;
            font-size: 10px;
            margin-top: 7px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 28px;
        }

        button, .cancel {
            padding: 14px 20px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            border: none;
        }

        button {
            background: #7657F6;
            color: white;
        }

        .cancel {
            background: #F1F0F6;
            color: #666;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('admin.admins.index') }}" class="back">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Manajemen Admin
    </a>

    <div class="card">

        <h1>Edit Administrator</h1>

        <p class="subtitle">
            Perbarui informasi akun administrator.
        </p>

        <div class="notice">
            <i class="bi bi-shield-check"></i>
            Role akun ini akan tetap menjadi Admin.
        </div>

        <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $admin->name) }}"
                    required
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $admin->email) }}"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">

                <label>Password Baru</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Kosongkan jika tidak ingin mengganti"
                >

                <p class="hint">
                    Minimal 8 karakter. Kosongkan jika password tidak diubah.
                </p>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="actions">

                <button type="submit">
                    <i class="bi bi-check-lg"></i>
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.admins.index') }}" class="cancel">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
