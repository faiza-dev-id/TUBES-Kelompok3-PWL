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
            <a href="{{ route('kaprodi.mahasiswa.index') }}"
               class="text-sm text-indigo-600 hover:underline mb-3 inline-block">← Kembali</a>
            <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>
            <p class="text-gray-500 text-sm">{{ $user->email }}
                @if($user->mahasiswa)
                    · NIM: {{ $user->mahasiswa->nim }}
                    · {{ $user->mahasiswa->jurusan }}
                    · Semester {{ $user->mahasiswa->semester }}
                @endif
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Lamaran --}}
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">
                <h2 class="font-semibold text-gray-700 mb-4">Riwayat Lamaran</h2>
                @forelse($lamaran as $lmr)
                <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $lmr->lowongan->judul ?? '-' }}</p>
                        <p class="text-xs text-gray-400">{{ $lmr->lowongan->mitra->nama_perusahaan ?? '-' }}</p>
                    </div>
                    @php
                        $sc = match($lmr->status) {
                            'diterima' => 'bg-green-100 text-green-700',
                            'ditolak'  => 'bg-red-100 text-red-700',
                            default    => 'bg-yellow-100 text-yellow-700',
                        };
                    @endphp
                    <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $sc }}">{{ ucfirst($lmr->status) }}</span>
                </div>
                @empty
                <p class="text-sm text-gray-400">Belum ada lamaran.</p>
                @endforelse
            </div>

            {{-- Penilaian --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="font-semibold text-gray-700 mb-4">Penilaian</h2>
                @forelse($penilaian as $p)
                <div class="py-3 border-b border-gray-100 last:border-0">
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-gray-500">{{ $p->jenis_penilaian }}</p>
                        @php
                            $n = $p->nilai_akhir ?? $p->nilai_rata_rata ?? 0;
                            $grade = match(true) {
                                $n >= 85 => ['A', 'bg-green-100 text-green-700'],
                                $n >= 75 => ['B', 'bg-blue-100 text-blue-700'],
                                $n >= 65 => ['C', 'bg-yellow-100 text-yellow-700'],
                                default  => ['D+', 'bg-red-100 text-red-700'],
                            };
                        @endphp
                        <span class="px-2 py-0.5 rounded text-xs font-bold {{ $grade[1] }}">{{ $grade[0] }} ({{ $n }})</span>
                    </div>
                    @if($p->catatan)
                    <p class="text-xs text-gray-400 mt-1 italic">{{ $p->catatan }}</p>
                    @endif
                </div>
                @empty
                <p class="text-sm text-gray-400">Belum ada penilaian.</p>
                @endforelse
            </div>

        </div>

        {{-- Log Kegiatan --}}
        <div class="mt-6 bg-white rounded-xl shadow-sm p-6">
            <h2 class="font-semibold text-gray-700 mb-4">Log Kegiatan Terbaru (20 terakhir)</h2>
            @forelse($logKegiatan as $log)
            <div class="flex gap-4 py-3 border-b border-gray-100 last:border-0">
                <div class="text-xs text-gray-400 w-24 shrink-0 pt-0.5">
                    {{ \Carbon\Carbon::parse($log->tanggal)->format('d M Y') }}
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800">{{ $log->deskripsi }}</p>
                    @php
                        $logSc = match($log->status ?? 'pending') {
                            'disetujui' => 'bg-green-100 text-green-700',
                            'ditolak'   => 'bg-red-100 text-red-700',
                            default     => 'bg-yellow-100 text-yellow-700',
                        };
                    @endphp
                    <span class="mt-1 inline-block px-2 py-0.5 rounded text-xs {{ $logSc }}">
                        {{ ucfirst($log->status ?? 'pending') }}
                    </span>
                </div>
            </div>
            @empty
            <p class="text-sm text-gray-400">Belum ada log kegiatan.</p>
            @endforelse
        </div>

        {{-- Laporan --}}
        <div class="mt-6 bg-white rounded-xl shadow-sm p-6">
            <h2 class="font-semibold text-gray-700 mb-4">Laporan Kegiatan</h2>
            @forelse($laporan as $lap)
            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                <div>
                    <p class="text-sm font-medium text-gray-800">{{ ucfirst(str_replace('_', ' ', $lap->jenis_laporan)) }}</p>
                    <p class="text-xs text-gray-400">{{ $lap->created_at->format('d M Y') }}</p>
                </div>
                <a href="{{ route('laporan-kegiatan.download', $lap->id) }}"
                   class="text-xs text-indigo-600 hover:underline">Download</a>
            </div>
            @empty
            <p class="text-sm text-gray-400">Belum ada laporan.</p>
            @endforelse
        </div>

    </main>
</div>
</body>
</html>
