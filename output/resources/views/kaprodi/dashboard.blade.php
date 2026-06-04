<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard {{ ucfirst($user->role) }} – Sistem Magang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    @include('kaprodi.components.sidebar')

    <main class="flex-1 p-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard {{ ucfirst($user->role) }}</h1>
            <p class="text-gray-500 text-sm mt-1">Selamat datang, {{ $user->name }}</p>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @foreach([
                ['label'=>'Total Mahasiswa','value'=>$stats['total_mahasiswa'],'icon'=>'user-group','color'=>'blue'],
                ['label'=>'Sedang Magang','value'=>$stats['sedang_magang'],'icon'=>'briefcase','color'=>'green'],
                ['label'=>'Total Mitra','value'=>$stats['total_mitra'],'icon'=>'building','color'=>'purple'],
                ['label'=>'Sudah Dinilai','value'=>$stats['selesai_magang'],'icon'=>'star','color'=>'yellow'],
            ] as $s)
            <div class="bg-white rounded-xl shadow-sm p-6">
                <p class="text-2xl font-bold text-gray-800">{{ $s['value'] }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $s['label'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Mahasiswa Magang --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-semibold text-gray-700">Mahasiswa Sedang Magang</h2>
                    <a href="{{ route('kaprodi.mahasiswa.index', ['filter'=>'magang']) }}"
                       class="text-sm text-indigo-600 hover:underline">Lihat semua</a>
                </div>
                <div class="space-y-3">
                    @forelse($mahasiswaMagang as $lmr)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ $lmr->mahasiswa->name ?? '-' }}</p>
                            <p class="text-xs text-gray-400">
                                {{ $lmr->lowongan->mitra->nama_perusahaan ?? '-' }} · {{ $lmr->lowongan->judul ?? '-' }}
                            </p>
                        </div>
                        <a href="{{ route('kaprodi.mahasiswa.show', $lmr->mahasiswa_id) }}"
                           class="text-xs text-indigo-600 hover:underline">Detail</a>
                    </div>
                    @empty
                    <p class="text-sm text-gray-400">Belum ada mahasiswa yang sedang magang.</p>
                    @endforelse
                </div>
            </div>

            {{-- Rekap Nilai Terbaru --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-semibold text-gray-700">Rekap Nilai Terbaru</h2>
                    <a href="{{ route('kaprodi.mahasiswa.rekap') }}" class="text-sm text-indigo-600 hover:underline">Lihat semua</a>
                </div>
                <div class="space-y-3">
                    @forelse($rekapNilai as $p)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ $p->mahasiswa->name ?? '-' }}</p>
                            <p class="text-xs text-gray-400">
                                {{ $p->lamaran->lowongan->mitra->nama_perusahaan ?? '-' }}
                            </p>
                        </div>
                        <div class="text-right">
                            @php
                                $n = $p->nilai_akhir ?? 0;
                                $grade = match(true) {
                                    $n >= 85 => ['A', 'bg-green-100 text-green-700'],
                                    $n >= 75 => ['B', 'bg-blue-100 text-blue-700'],
                                    $n >= 65 => ['C', 'bg-yellow-100 text-yellow-700'],
                                    $n >= 55 => ['D', 'bg-orange-100 text-orange-700'],
                                    default  => ['E', 'bg-red-100 text-red-700'],
                                };
                            @endphp
                            <span class="px-2 py-0.5 rounded text-xs font-bold {{ $grade[1] }}">{{ $grade[0] }}</span>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $n }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-sm text-gray-400">Belum ada data penilaian.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </main>
</div>
</body>
</html>
