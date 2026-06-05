<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
        }

        :root {
            --bg:           #faf7f4;
            --bg2:          #ffffff;
            --bg3:          #f3ede6;
            --border:       rgba(100,30,50,.1);
            --text-1:       #1a0a0f;
            --text-2:       #6b4050;
            --text-3:       #a07080;
            --primary:      #8b1a3a;
            --primary-dim:  rgba(139,26,58,.10);
            --primary-hover:#6e1530;
            --green:        #2e7d4f;
            --green-dim:    rgba(46,125,79,.10);
            --red:          #c0453f;
            --red-dim:      rgba(192,69,63,.10);
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--bg);
            padding: 30px 15px;
        }

        .container {
            width: 460px;
            background: var(--bg2);
            padding: 35px;
            border-radius: 15px;
            border: 1px solid var(--border);
            box-shadow: 0 10px 30px rgba(100,30,50,.08);
        }

        h1 {
            text-align: center;
            margin-bottom: 6px;
            color: var(--text-1);
            font-size: 22px;
            font-weight: 700;
        }

        .subtitle {
            text-align: center;
            color: var(--text-3);
            font-size: 13px;
            margin-bottom: 24px;
        }

        .section-label {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: var(--text-3);
            margin: 20px 0 12px;
            padding-bottom: 6px;
            border-bottom: 1px solid var(--border);
        }

        .input-group {
            margin-bottom: 14px;
        }

        .input-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 13px;
            color: var(--text-2);
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            font-size: 13.5px;
            color: var(--text-1);
            background: var(--bg3);
            font-family: inherit;
            transition: border-color .2s, background .2s;
            appearance: none;
            -webkit-appearance: none;
        }

        .input-group input::placeholder {
            color: var(--text-3);
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: var(--primary);
            background: var(--bg2);
        }

        .input-group input.is-error,
        .input-group select.is-error {
            border-color: var(--red);
        }

        .field-error {
            font-size: 12px;
            color: var(--red);
            margin-top: 4px;
            display: block;
        }

        /* custom select arrow */
        .select-wrap {
            position: relative;
        }

        .select-wrap::after {
            content: '▾';
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 11px;
            color: var(--text-3);
            pointer-events: none;
        }

        .row {
            display: flex;
            gap: 12px;
        }

        .row .input-group {
            flex: 1;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 24px;
        }

        .btn {
            flex: 1;
            padding: 11px;
            border: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-family: inherit;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .btn-outline {
            background: var(--bg3);
            color: var(--text-1);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .alert-error {
            background: var(--red-dim);
            color: var(--red);
            padding: 10px 12px;
            border-radius: 9px;
            margin-bottom: 16px;
            font-size: 13px;
            border: 1px solid rgba(192,69,63,.2);
        }

        .alert-error ul { list-style: none; }
        .alert-error ul li::before { content: '• '; }

        .alert-success {
            background: var(--green-dim);
            color: var(--green);
            padding: 10px 12px;
            border-radius: 9px;
            margin-bottom: 16px;
            font-size: 13px;
            border: 1px solid rgba(46,125,79,.2);
        }

        .footer {
            text-align: center;
            margin-top: 16px;
            font-size: 13px;
            color: var(--text-3);
        }

        .footer a {
            text-decoration: none;
            color: var(--primary);
            font-weight: 600;
        }

        .footer a:hover {
            color: var(--primary-hover);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Biodata Mahasiswa</h1>
    <p class="subtitle">Lengkapi data diri Anda</p>

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Flash sukses --}}
    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        {{-- Informasi Akun --}}
        <div class="section-label">Informasi Akun</div>

        <div class="input-group">
            <label>Nama Lengkap</label>
            <input
                type="text"
                name="name"
                placeholder="Masukkan nama lengkap"
                value="{{ old('name', auth()->user()->name ?? '') }}"
                class="{{ $errors->has('name') ? 'is-error' : '' }}"
            >
            @error('name') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <div class="input-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                placeholder="nama@email.com"
                value="{{ old('email', auth()->user()->email ?? '') }}"
                class="{{ $errors->has('email') ? 'is-error' : '' }}"
            >
            @error('email') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        {{-- Data Akademik --}}
        <div class="section-label">Data Akademik</div>

        <div class="row">
            <div class="input-group">
                <label>NIM</label>
                <input
                    type="text"
                    name="nim"
                    placeholder="Contoh: 18220001"
                    value="{{ old('nim', $mahasiswa->nim ?? '') }}"
                    class="{{ $errors->has('nim') ? 'is-error' : '' }}"
                >
                @error('nim') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="input-group">
                <label>Semester</label>
                <div class="select-wrap">
                    <select name="semester" class="{{ $errors->has('semester') ? 'is-error' : '' }}">
                        <option value="" disabled {{ old('semester', $mahasiswa->semester ?? '') == '' ? 'selected' : '' }}>Pilih</option>
                        @for ($i = 1; $i <= 14; $i++)
                            <option value="{{ $i }}" {{ old('semester', $mahasiswa->semester ?? '') == $i ? 'selected' : '' }}>
                                Semester {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
                @error('semester') <span class="field-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="input-group">
            <label>Jurusan / Program Studi</label>
            <input
                type="text"
                name="jurusan"
                placeholder="Contoh: Teknik Informatika"
                value="{{ old('jurusan', $mahasiswa->jurusan ?? '') }}"
                class="{{ $errors->has('jurusan') ? 'is-error' : '' }}"
                maxlength="100"
            >
            @error('jurusan') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <div class="btn-group">
            <a href="{{ route('login') }}" class="btn btn-outline">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>

    <div class="footer">
        <p>Sudah punya akun? <a href="/login">Login</a></p>
    </div>
</div>

</body>
</html>
