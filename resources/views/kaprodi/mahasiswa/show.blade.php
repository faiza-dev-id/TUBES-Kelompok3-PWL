<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa – Kaprodi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    @include('kaprodi.components.sidebar')

    <main class="flex-1 p-8">
        <div class="mb-6">
            <a href="{{ route('kaprodi.mahasiswa.index') }}" class="text-sm text-indigo-600 hover:underline mb-3 inline-flex items-center gap-1">
                ← Kembali ke daftar mahasiswa
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Detail Mahasiswa</h1>
        </div>

        {{-- ── PROFIL ── --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xl">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <div>
                        <h2 class="font-bold text-gray-800 text-lg leading-tight">{{ $user->name }}</h2>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm border-t pt-4">
                    <div class="flex justify-between">
                        <span class="text-gray-500">NIM</span>
                        <span class="font-mono font-medium">{{ $user->mahasiswa->nim ?? '—' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Prodi / Jurusan</span>
                        <span class="font-medium text-right max-w-[60%]">{{ $user->mahasiswa->jurusan ?? '—' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Semester</span>
                        <span class="font-medium">{{ $user->mahasiswa->semester ? 'Semester '.$user->mahasiswa->semester : '—' }}</span>
                    </div>
                </div>
            </div>

            {{-- ── STATUS MAGANG ── --}}
            @php
                $lamaranAktif = $lamaran->whereIn('status', ['diterima','dihapus_mitra'])->first();
                $statusMagang = $lamaranAktif->status ?? null;
            @endphp
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-semibold text-gray-700 mb-4">Status Magang</h3>
                @if($lamaranAktif)
                    @if($statusMagang === 'dihapus_mitra')
                        {{-- ⚠ DIKELUARKAN OLEH MITRA — tampilkan alasan --}}
                        <div class="bg-red-50 border border-red-200 rounded-xl p-5 mb-4">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-red-800 text-sm">Mahasiswa Dikeluarkan dari Magang</p>
                                    <p class="text-xs text-red-600 mt-0.5">
                                        Dikeluarkan pada:
                                        {{ $lamaranAktif->dihapus_pada ? $lamaranAktif->dihapus_pada->format('d M Y, H:i') : '—' }}
                                        oleh {{ $lamaranAktif->lowongan->mitra->nama_perusahaan ?? 'Mitra' }}
                                    </p>
                                </div>
                            </div>

                            {{-- Alasan penghapusan --}}
                            <div class="mt-4 space-y-3">
                                <div>
                                    <p class="text-xs font-semibold text-red-700 uppercase tracking-wide mb-1">Kategori Alasan</p>
                                    <span class="inline-block px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">
                                        {{ $lamaranAktif->alasan_hapus_kategori ?? 'Tidak disebutkan' }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-red-700 uppercase tracking-wide mb-1">Keterangan Detail dari Mitra</p>
                                    <div class="bg-white border border-red-200 rounded-lg p-3 text-sm text-gray-700 leading-relaxed">
                                        {{ $lamaranAktif->alasan_hapus_detail ?? 'Tidak ada keterangan detail.' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-green-800 text-sm">Sedang Aktif Magang</p>
                                    <p class="text-xs text-green-600">
                                        di {{ $lamaranAktif->lowongan->mitra->nama_perusahaan ?? 'Mitra' }}
                                        — {{ $lamaranAktif->lowongan->judul_lowongan ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <div>
                            <p class="text-gray-500 text-xs">Perusahaan</p>
                            <p class="font-medium">{{ $lamaranAktif->lowongan->mitra->nama_perusahaan ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs">Posisi</p>
                            <p class="font-medium">{{ $lamaranAktif->lowongan->judul_lowongan ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs">Mulai Magang</p>
                            <p class="font-medium">{{ $lamaranAktif->diproses_pada ? $lamaranAktif->diproses_pada->format('d M Y') : '—' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-xs">Durasi</p>
                            <p class="font-medium">{{ $lamaranAktif->lowongan->durasi ?? '—' }}</p>
                        </div>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-8 text-gray-400">
                        <svg class="w-10 h-10 mb-3 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01"/>
                        </svg>
                        <p class="text-sm font-medium">Belum pernah magang</p>
                        <p class="text-xs text-gray-400 mt-1">Mahasiswa belum memiliki riwayat magang</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- ── RIWAYAT SEMUA LAMARAN ── --}}
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="font-semibold text-gray-700">Riwayat Semua Lamaran</h3>
            </div>
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
                        <th class="px-6 py-3 text-left">Perusahaan / Posisi</th>
                        <th class="px-6 py-3 text-left">Tanggal Lamar</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Catatan Mitra</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($lamaran as $lam)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <p class="font-medium text-gray-800">{{ $lam->lowongan->mitra->nama_perusahaan ?? '—' }}</p>
                            <p class="text-xs text-gray-400">{{ $lam->lowongan->judul_lowongan ?? '—' }}</p>
                        </td>
                        <td class="px-6 py-4 text-gray-400 text-xs font-mono">{{ $lam->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @if($lam->status === 'diterima')
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">Diterima / Aktif</span>
                            @elseif($lam->status === 'dihapus_mitra')
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-700">Dikeluarkan Mitra</span>
                            @elseif($lam->status === 'ditolak')
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">Ditolak</span>
                            @elseif($lam->status === 'selesai')
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Selesai</span>
                            @else
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs max-w-xs">
                            @if($lam->status === 'dihapus_mitra' && $lam->alasan_hapus_detail)
                                <span class="text-red-600 font-medium">{{ Str::limit($lam->alasan_hapus_detail, 80) }}</span>
                            @else
                                {{ $lam->catatan_mitra ?? '—' }}
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="px-6 py-10 text-center text-gray-400">Tidak ada riwayat lamaran.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ── LOG KEGIATAN ── --}}
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-semibold text-gray-700">Log Kegiatan Terbaru</h3>
                <span class="text-xs text-gray-400">{{ $logKegiatan->count() }} entri</span>
            </div>
            @if($logKegiatan->isEmpty())
                <div class="px-6 py-10 text-center text-gray-400 text-sm">Belum ada log kegiatan.</div>
            @else
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
                            <th class="px-6 py-3 text-left">Tanggal</th>
                            <th class="px-6 py-3 text-left">Judul Kegiatan</th>
                            <th class="px-6 py-3 text-left">Waktu</th>
                            <th class="px-6 py-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($logKegiatan as $log)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 text-gray-500 text-xs font-mono">{{ $log->tanggal->format('d M Y') }}</td>
                            <td class="px-6 py-3 text-gray-800 font-medium">{{ $log->judul_kegiatan }}</td>
                            <td class="px-6 py-3 text-gray-500 text-xs font-mono">
                                {{ substr($log->jam_mulai,0,5) }} – {{ substr($log->jam_selesai,0,5) }}
                            </td>
                            <td class="px-6 py-3">
                                @if($log->status === 'disetujui')
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-green-100 text-green-700">Disetujui</span>
                                @elseif($log->status === 'ditolak')
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-red-100 text-red-700">Ditolak</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-yellow-100 text-yellow-700">Menunggu</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        {{-- ── PENILAIAN ── --}}
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="font-semibold text-gray-700">Penilaian</h3>
            </div>
            @if($penilaian->isEmpty())
                <div class="px-6 py-10 text-center text-gray-400 text-sm">Belum ada penilaian.</div>
            @else
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
                            <th class="px-6 py-3 text-left">Jenis</th>
                            <th class="px-6 py-3 text-left">Penilai</th>
                            <th class="px-6 py-3 text-left">Nilai Akhir</th>
                            <th class="px-6 py-3 text-left">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($penilaian as $p)
                        <tr>
                            <td class="px-6 py-3">{{ ucfirst($p->jenis_penilaian ?? '—') }}</td>
                            <td class="px-6 py-3 text-gray-500">{{ $p->penilai->name ?? '—' }}</td>
                            <td class="px-6 py-3">
                                <span class="font-bold text-indigo-700 text-lg font-mono">{{ $p->nilai_akhir ?? '—' }}</span>
                            </td>
                            <td class="px-6 py-3 text-gray-500 text-xs max-w-xs">{{ $p->catatan ?? '—' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </main>
</div>
</body>
</html>
