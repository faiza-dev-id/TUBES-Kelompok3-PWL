<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lamaran – Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    @include('admin.components.sidebar')

    <main class="flex-1 p-8">

        <div class="mb-6">
            <a href="{{ route('admin.lamaran.index') }}"
               class="text-sm text-blue-600 hover:underline inline-flex items-center gap-1 mb-3">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Monitor Lamaran
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Detail Lamaran</h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Info Mahasiswa --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Mahasiswa
                </h2>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center font-bold text-blue-700">
                        {{ strtoupper(substr($lamaran->mahasiswa->name ?? 'M', 0, 2)) }}
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">{{ $lamaran->mahasiswa->name ?? '-' }}</p>
                        <p class="text-xs text-gray-400">{{ $lamaran->mahasiswa->email ?? '-' }}</p>
                    </div>
                </div>
                @if($lamaran->mahasiswa?->mahasiswa)
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">NIM</span>
                        <span class="text-gray-700 font-medium">{{ $lamaran->mahasiswa->mahasiswa->nim ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Jurusan</span>
                        <span class="text-gray-700 font-medium text-right">{{ $lamaran->mahasiswa->mahasiswa->jurusan ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Semester</span>
                        <span class="text-gray-700 font-medium">{{ $lamaran->mahasiswa->mahasiswa->semester ?? '-' }}</span>
                    </div>
                </div>
                @endif
            </div>

            {{-- Info Lowongan & Mitra --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1"/>
                    </svg>
                    Lowongan
                </h2>
                <p class="font-semibold text-gray-800 mb-1">{{ $lamaran->lowongan->judul ?? '-' }}</p>
                <p class="text-sm text-purple-600 font-medium mb-4">{{ $lamaran->lowongan->mitra->nama_perusahaan ?? '-' }}</p>

                @if($lamaran->lowongan)
                <div class="space-y-2 text-sm">
                    @if($lamaran->lowongan->bidang ?? false)
                    <div class="flex justify-between">
                        <span class="text-gray-400">Bidang</span>
                        <span class="text-gray-700">{{ $lamaran->lowongan->bidang }}</span>
                    </div>
                    @endif
                    @if($lamaran->lowongan->lokasi ?? false)
                    <div class="flex justify-between">
                        <span class="text-gray-400">Lokasi</span>
                        <span class="text-gray-700">{{ $lamaran->lowongan->lokasi }}</span>
                    </div>
                    @endif
                    @if($lamaran->lowongan->durasi ?? false)
                    <div class="flex justify-between">
                        <span class="text-gray-400">Durasi</span>
                        <span class="text-gray-700">{{ $lamaran->lowongan->durasi }} bulan</span>
                    </div>
                    @endif
                </div>
                @endif
            </div>

            {{-- Status Lamaran --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Status Lamaran
                </h2>

                @php
                    $sc = match($lamaran->status) {
                        'diterima' => ['bg-green-100 text-green-700', '✓ Diterima'],
                        'ditolak'  => ['bg-red-100 text-red-700',   '✗ Ditolak'],
                        default    => ['bg-yellow-100 text-yellow-700', '⏳ Pending'],
                    };
                @endphp
                <div class="inline-flex items-center px-3 py-1.5 {{ $sc[0] }} rounded-full text-sm font-semibold mb-4">
                    {{ $sc[1] }}
                </div>

                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Tanggal Melamar</span>
                        <span class="text-gray-700">{{ $lamaran->created_at->format('d M Y') }}</span>
                    </div>
                    @if($lamaran->diproses_pada)
                    <div class="flex justify-between">
                        <span class="text-gray-400">Diproses</span>
                        <span class="text-gray-700">{{ \Carbon\Carbon::parse($lamaran->diproses_pada)->format('d M Y') }}</span>
                    </div>
                    @endif
                    @if($lamaran->catatan_mitra)
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-gray-400 mb-1 text-xs">Catatan Mitra:</p>
                        <p class="text-gray-700 text-xs italic">{{ $lamaran->catatan_mitra }}</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>

        {{-- Berkas Lamaran --}}
        @if($lamaran->cv_path || $lamaran->surat_path)
        <div class="mt-6 bg-white rounded-xl shadow-sm p-6">
            <h2 class="font-semibold text-gray-700 mb-4">Berkas Lamaran</h2>
            <div class="flex gap-3">
                @if($lamaran->cv_path)
                <a href="{{ Storage::url($lamaran->cv_path) }}" target="_blank"
                   class="flex items-center gap-2 px-4 py-2.5 bg-blue-50 text-blue-700 rounded-lg text-sm hover:bg-blue-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Download CV
                </a>
                @endif
                @if($lamaran->surat_path)
                <a href="{{ Storage::url($lamaran->surat_path) }}" target="_blank"
                   class="flex items-center gap-2 px-4 py-2.5 bg-purple-50 text-purple-700 rounded-lg text-sm hover:bg-purple-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Download Surat
                </a>
                @endif
            </div>
        </div>
        @endif

    </main>
</div>
</body>
</html>