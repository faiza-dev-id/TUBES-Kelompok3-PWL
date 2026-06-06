<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lamaran – Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans" style="padding-left:230px;">
@include('admin.components.sidebar')

<main style="padding:32px;min-height:100vh;">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a href="{{ route('admin.lamaran.index') }}" class="hover:text-gray-800">Monitor Lamaran</a>
        <span>/</span>
        <span class="text-gray-800 font-medium">Detail Lamaran #{{ $lamaran->id }}</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom Kiri: Info Utama --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Card: Info Pelamar --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-base font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Data Pelamar
                </h2>
                <dl class="grid grid-cols-2 gap-x-8 gap-y-3 text-sm">
                    <div>
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">Nama</dt>
                        <dd class="font-medium text-gray-800">{{ $lamaran->mahasiswa->name ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">Email</dt>
                        <dd class="text-gray-600">{{ $lamaran->mahasiswa->email ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">NIM</dt>
                        <dd class="text-gray-600">{{ $lamaran->mahasiswa->mahasiswa->nim ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">Jurusan</dt>
                        <dd class="text-gray-600">{{ $lamaran->mahasiswa->mahasiswa->jurusan ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">Semester</dt>
                        <dd class="text-gray-600">{{ $lamaran->mahasiswa->mahasiswa->semester ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">No. HP</dt>
                        <dd class="text-gray-600">{{ $lamaran->mahasiswa->mahasiswa->no_hp ?? '-' }}</dd>
                    </div>
                </dl>
            </div>

            {{-- Card: Info Lowongan & Mitra --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-base font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/>
                    </svg>
                    Lowongan & Mitra
                </h2>
                <dl class="grid grid-cols-2 gap-x-8 gap-y-3 text-sm">
                    <div class="col-span-2">
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">Judul Lowongan</dt>
                        <dd class="font-medium text-gray-800">{{ $lamaran->lowongan->judul_lowongan ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">Perusahaan Mitra</dt>
                        <dd class="text-gray-600">{{ $lamaran->lowongan->mitra->nama_perusahaan ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">Durasi Magang</dt>
                        <dd class="text-gray-600">{{ $lamaran->lowongan->durasi ?? '-' }}</dd>
                    </div>
                    <div class="col-span-2">
                        <dt class="text-gray-400 text-xs uppercase tracking-wide mb-1">Alamat Mitra</dt>
                        <dd class="text-gray-600">{{ $lamaran->lowongan->mitra->alamat ?? '-' }}</dd>
                    </div>
                </dl>
            </div>

            {{-- Card: Catatan Mitra --}}
            @if($lamaran->catatan_mitra)
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-base font-semibold text-gray-800 mb-3">Catatan dari Mitra</h2>
                <p class="text-sm text-gray-600 bg-gray-50 rounded-lg p-3">{{ $lamaran->catatan_mitra }}</p>
            </div>
            @endif

            {{-- Card: Info Dihapus Mitra (jika status dihapus_mitra) --}}
            @if($lamaran->status === 'dihapus_mitra')
            <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                <h2 class="text-base font-semibold text-red-700 mb-3 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>
                    Mahasiswa Dikeluarkan oleh Mitra
                </h2>
                <dl class="space-y-2 text-sm">
                    <div>
                        <dt class="text-red-500 text-xs uppercase tracking-wide mb-1">Kategori Alasan</dt>
                        <dd class="font-medium text-red-800">{{ $lamaran->alasan_hapus_kategori ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-red-500 text-xs uppercase tracking-wide mb-1">Detail Alasan</dt>
                        <dd class="text-red-700 bg-red-100 rounded-lg p-3 mt-1">{{ $lamaran->alasan_hapus_detail ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-red-500 text-xs uppercase tracking-wide mb-1">Tanggal Dikeluarkan</dt>
                        <dd class="text-red-700">{{ $lamaran->dihapus_pada ? \Carbon\Carbon::parse($lamaran->dihapus_pada)->format('d M Y, H:i') : '-' }}</dd>
                    </div>
                </dl>
            </div>
            @endif

        </div>

        {{-- Kolom Kanan: Status & Dokumen --}}
        <div class="space-y-6">

            {{-- Card: Status Lamaran --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-base font-semibold text-gray-800 mb-4">Status Lamaran</h2>

                @php
                    $statusConfig = match($lamaran->status) {
                        'diterima'      => ['bg-green-100 text-green-700',  'Diterima'],
                        'ditolak'       => ['bg-red-100 text-red-700',      'Ditolak'],
                        'dihapus_mitra' => ['bg-orange-100 text-orange-700','Dihapus Mitra'],
                        default         => ['bg-yellow-100 text-yellow-700','Pending'],
                    };
                @endphp

                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $statusConfig[0] }}">
                    {{ $statusConfig[1] }}
                </span>

                <div class="mt-4 space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Tanggal Lamar</span>
                        <span class="text-gray-700">{{ $lamaran->created_at->format('d M Y') }}</span>
                    </div>
                    @if($lamaran->diproses_pada)
                    <div class="flex justify-between">
                        <span class="text-gray-400">Diproses Pada</span>
                        <span class="text-gray-700">{{ \Carbon\Carbon::parse($lamaran->diproses_pada)->format('d M Y') }}</span>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Card: Dokumen Lamaran --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-base font-semibold text-gray-800 mb-4">Dokumen Lamaran</h2>

                <div class="space-y-3">
                    {{-- CV --}}
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="text-sm text-gray-700 font-medium">CV / Resume</span>
                        </div>
                        @if($lamaran->cv_path)
                            <a href="{{ Storage::url($lamaran->cv_path) }}" target="_blank"
                               class="text-xs font-medium text-blue-600 hover:underline">Lihat</a>
                        @else
                            <span class="text-xs text-gray-400">Tidak ada</span>
                        @endif
                    </div>

                    {{-- Surat Lamaran --}}
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="text-sm text-gray-700 font-medium">Surat Lamaran</span>
                        </div>
                        @if($lamaran->surat_lamaran_path)
                            <a href="{{ Storage::url($lamaran->surat_lamaran_path) }}" target="_blank"
                               class="text-xs font-medium text-blue-600 hover:underline">Lihat</a>
                        @else
                            <span class="text-xs text-gray-400">Tidak ada</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Tombol Kembali --}}
            <a href="{{ route('admin.lamaran.index') }}"
               class="flex items-center justify-center gap-2 w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 12H5m7-7l-7 7 7 7"/>
                </svg>
                Kembali ke Daftar
            </a>
        </div>

    </div>
</main>
</body>
</html>