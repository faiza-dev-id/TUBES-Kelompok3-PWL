<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg:        #0f172a;
            --surface:   #1e293b;
            --surface2:  #334155;
            --accent:    #3b82f6;
            --accent-h:  #2563eb;
            --success:   #22c55e;
            --danger:    #ef4444;
            --text:      #f1f5f9;
            --muted:     #94a3b8;
            --border:    #334155;
            --radius:    12px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        /* subtle grid background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(59,130,246,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59,130,246,.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        .card {
            position: relative;
            width: 100%;
            max-width: 520px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 25px 60px rgba(0,0,0,.5);
            animation: slideUp .45s cubic-bezier(.22,1,.36,1) both;
        }

        /* top accent stripe */
        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 2rem; right: 2rem;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), #818cf8);
            border-radius: 0 0 4px 4px;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Header ── */
        .header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .header-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--accent), #818cf8);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .header-icon svg {
            width: 24px;
            height: 24px;
            stroke: white;
            fill: none;
        }

        .header h1 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text);
            line-height: 1.2;
        }

        .header p {
            font-size: .82rem;
            color: var(--muted);
            margin-top: 2px;
        }

        /* ── Alert ── */
        .alert {
            padding: .85rem 1rem;
            border-radius: var(--radius);
            margin-bottom: 1.5rem;
            font-size: .875rem;
            display: flex;
            gap: .6rem;
            align-items: flex-start;
        }

        .alert-error {
            background: rgba(239,68,68,.12);
            border: 1px solid rgba(239,68,68,.3);
            color: #fca5a5;
        }

        .alert-success {
            background: rgba(34,197,94,.12);
            border: 1px solid rgba(34,197,94,.3);
            color: #86efac;
        }

        .alert ul { list-style: none; }
        .alert ul li::before { content: '• '; }

        /* ── Form ── */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: .45rem;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: .8rem;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .06em;
        }

        label .required {
            color: var(--accent);
            margin-left: 2px;
        }

        input, select {
            width: 100%;
            padding: .75rem 1rem;
            background: var(--bg);
            border: 1.5px solid var(--border);
            border-radius: var(--radius);
            color: var(--text);
            font-family: inherit;
            font-size: .9rem;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            appearance: none;
            -webkit-appearance: none;
        }

        input::placeholder {
            color: var(--surface2);
        }

        input:focus, select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(59,130,246,.15);
        }

        /* custom select arrow */
        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: '';
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid var(--muted);
            pointer-events: none;
        }

        select option {
            background: var(--surface);
        }

        /* input error state */
        input.is-error, select.is-error {
            border-color: var(--danger);
        }

        .field-error {
            font-size: .775rem;
            color: #fca5a5;
        }

        /* ── Divider ── */
        .divider {
            grid-column: 1 / -1;
            display: flex;
            align-items: center;
            gap: .75rem;
            color: var(--muted);
            font-size: .75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .08em;
            margin: .25rem 0;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* ── Buttons ── */
        .btn-row {
            display: flex;
            gap: .75rem;
            margin-top: 2rem;
        }

        .btn {
            flex: 1;
            padding: .85rem 1.5rem;
            border: none;
            border-radius: var(--radius);
            font-family: inherit;
            font-size: .9rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform .15s, background .2s, box-shadow .2s;
        }

        .btn:active { transform: scale(.97); }

        .btn-primary {
            background: var(--accent);
            color: white;
            box-shadow: 0 4px 14px rgba(59,130,246,.35);
        }

        .btn-primary:hover {
            background: var(--accent-h);
            box-shadow: 0 6px 20px rgba(59,130,246,.45);
        }

        .btn-ghost {
            background: transparent;
            color: var(--muted);
            border: 1.5px solid var(--border);
        }

        .btn-ghost:hover {
            color: var(--text);
            border-color: var(--surface2);
            background: var(--bg);
        }

        /* ── Responsive ── */
        @media (max-width: 480px) {
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full { grid-column: 1; }
            .btn-row { flex-direction: column; }
        }
    </style>
</head>
<body>

<div class="card">

    {{-- Top icon + title --}}
    <div class="header">
        <div class="header-icon">
            <svg viewBox="0 0 24 24" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        </div>
        <div>
            <h1>Biodata Mahasiswa</h1>
            <p>Lengkapi data diri Anda untuk mendaftar</p>
        </div>
    </div>

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert alert-error">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:2px">
                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Success flash --}}
    @if (session('success'))
        <div class="alert alert-success">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:2px">
                <polyline points="20 6 9 17 4 12"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            {{-- ── Akun ── --}}
            <div class="divider">Informasi Akun</div>

            <div class="form-group full">
                <label for="name">Nama Lengkap <span class="required">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('name') }}"
                    class="{{ $errors->has('name') ? 'is-error' : '' }}"
                    required
                >
                @error('name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="nama@email.com"
                    value="{{ old('email') }}"
                    class="{{ $errors->has('email') ? 'is-error' : '' }}"
                    required
                >
                @error('email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password <span class="required">*</span></label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Min. 8 karakter"
                    class="{{ $errors->has('password') ? 'is-error' : '' }}"
                    required
                >
                @error('password')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group full">
                <label for="password_confirmation">Konfirmasi Password <span class="required">*</span></label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password Anda"
                    required
                >
            </div>

            {{-- ── Akademik ── --}}
            <div class="divider">Data Akademik</div>

            <div class="form-group">
                <label for="nim">NIM <span class="required">*</span></label>
                <input
                    type="text"
                    id="nim"
                    name="nim"
                    placeholder="Contoh: 18220001"
                    value="{{ old('nim') }}"
                    class="{{ $errors->has('nim') ? 'is-error' : '' }}"
                    required
                >
                @error('nim')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="semester">Semester <span class="required">*</span></label>
                <div class="select-wrapper">
                    <select
                        id="semester"
                        name="semester"
                        class="{{ $errors->has('semester') ? 'is-error' : '' }}"
                        required
                    >
                        <option value="" disabled {{ old('semester') ? '' : 'selected' }}>Pilih semester</option>
                        @for ($i = 1; $i <= 14; $i++)
                            <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                                Semester {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
                @error('semester')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group full">
                <label for="jurusan">Jurusan / Program Studi <span class="required">*</span></label>
                <input
                    type="text"
                    id="jurusan"
                    name="jurusan"
                    placeholder="Contoh: Teknik Informatika"
                    value="{{ old('jurusan') }}"
                    class="{{ $errors->has('jurusan') ? 'is-error' : '' }}"
                    maxlength="100"
                    required
                >
                @error('jurusan')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

        </div>{{-- /.form-grid --}}

        <div class="btn-row">
            <a href="{{ route('login') }}" class="btn btn-ghost" style="text-decoration:none;text-align:center;">
                Batal
            </a>
            <button type="submit" class="btn btn-primary">
                Daftar Sekarang
            </button>
        </div>

    </form>

</div>

</body>
</html>
