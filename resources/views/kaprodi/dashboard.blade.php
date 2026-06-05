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

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard {{ ucfirst($user->role) }}</h1>
            <p class="text-gray-500 text-sm mt-1">Selamat datang, {{ $user->name }}</p>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @foreach([
                ['label'=>'Total Mahasiswa', 'value'=>$stats['total_mahasiswa'], 'color'=>'blue',   'icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                ['label'=>'Sedang Magang',   'value'=>$stats['sedang_magang'],   'color'=>'green',  'icon'=>'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ['label'=>'Total Mitra',     'value'=>$stats['total_mitra'],     'color'=>'purple', 'icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                ['label'=>'Sudah Dinilai',   'value'=>$stats['selesai_magang'],  'color'=>'yellow', 'icon'=>'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
            ] as $s)
            @php
                $colors = [
                    'blue'   => ['bg-blue-50',   'text-blue-700',   'bg-blue-100',   'text-blue-500'],
                    'green'  => ['bg-green-50',  'text-green-700',  'bg-green-100',  'text-green-500'],
                    'purple' => ['bg-purple-50', 'text-purple-700', 'bg-purple-100', 'text-purple-500'],
                    'yellow' => ['bg-yellow-50', 'text-yellow-700', 'bg-yellow-100', 'text-yellow-500'],
                ];
                $c = $colors[$s['color']];
            @endphp
            <div class="bg-white rounded-xl shadow-sm p-6 flex items-center gap-4">
                <div class="w-12 h-12 {{ $c[2] }} rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 {{ $c[3] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $s['icon'] }}"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold {{ $c[1] }}">{{ $s['value'] }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $s['label'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Tabel Mahasiswa + Filter --}}
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">

            {{-- Header tabel + filter --}}
            <div class="px-6 py-4 border-b border-gray-100">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <h2 class="font-semibold text-gray-700 text-lg">Daftar Mahasiswa</h2>

                    {{-- Form filter --}}
                    <form method="GET" action="{{ route('kaprodi.dashboard') }}"
                          class="flex flex-wrap items-center gap-2">

                        {{-- Filter Prodi --}}
                        <div class="relative">
                            <select name="prodi"
                                    onchange="this.form.submit()"
                                    class="appearance-none pl-3 pr-8 py-2 text-sm border border-gray-200 rounded-lg
                                           bg-gray-50 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-300
                                           cursor-pointer">
                                <option value="">Semua Prodi</option>
                                @foreach($prodiList as $prodi)
                                    <option value="{{ $prodi }}" {{ $filterProdi === $prodi ? 'selected' : '' }}>
                                        {{ $prodi }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Filter Status --}}
                        <div class="relative">
                            <select name="status"
                                    onchange="this.form.submit()"
                                    class="appearance-none pl-3 pr-8 py-2 text-sm border border-gray-200 rounded-lg
                                           bg-gray-50 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-300
                                           cursor-pointer">
                                <option value="">Semua Status</option>
                                <option value="magang"  {{ $filterStatus === 'magang'  ? 'selected' : '' }}>Sedang Magang</option>
                                <option value="belum"   {{ $filterStatus === 'belum'   ? 'selected' : '' }}>Belum Magang</option>
                                <option value="selesai" {{ $filterStatus === 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Reset --}}
                        @if($filterProdi || $filterStatus)
                        <a href="{{ route('kaprodi.dashboard') }}"
                           class="px-3 py-2 text-sm text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-lg transition">
                            ✕ Reset
                        </a>
                        @endif

                    </form>
                </div>

                {{-- Active filter pills --}}
                @if($filterProdi || $filterStatus)
                <div class="flex flex-wrap gap-2 mt-3">
                    @if($filterProdi)
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-indigo-50 text-indigo-700 text-xs rounded-full font-medium">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16"/>
                        </svg>
                        Prodi: {{ $filterProdi }}
                    </span>
                    @endif
                    @if($filterStatus)
                    @php
                        $statusLabel = ['magang'=>'Sedang Magang','belum'=>'Belum Magang','selesai'=>'Selesai'][$filterStatus] ?? $filterStatus;
                        $statusColor = ['magang'=>'bg-green-50 text-green-700','belum'=>'bg-yellow-50 text-yellow-700','selesai'=>'bg-blue-50 text-blue-700'][$filterStatus] ?? 'bg-gray-100 text-gray-600';
                    @endphp
                    <span class="inline-flex items-center gap-1 px-3 py-1 {{ $statusColor }} text-xs rounded-full font-medium">
                        Status: {{ $statusLabel }}
                    </span>
                    @endif
                    <span class="text-xs text-gray-400 self-center">
                        {{ $mahasiswaList->total() }} mahasiswa ditemukan
                    </span>
                </div>
                @endif
            </div>

            {{-- Tabel --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wide">
                            <th class="px-6 py-3 text-left font-semibold">No</th>
                            <th class="px-6 py-3 text-left font-semibold">Nama</th>
                            <th class="px-6 py-3 text-left font-semibold">NIM</th>
                            <th class="px-6 py-3 text-left font-semibold">Prodi / Jurusan</th>
                            <th class="px-6 py-3 text-left font-semibold">Semester</th>
                            <th class="px-6 py-3 text-left font-semibold">Status Magang</th>
                            <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($mahasiswaList as $i => $mhs)
                        @php
                            $biodata   = $mhs->mahasiswa;
                            $lamaran   = $mhs->lamaran->first();
                            $status    = $lamaran->status ?? null;

                            [$badge, $dot] = match($status) {
                                'diterima' => ['bg-green-100 text-green-700',  'bg-green-500'],
                                'selesai'  => ['bg-blue-100 text-blue-700',    'bg-blue-500'],
                                'pending'  => ['bg-yellow-100 text-yellow-700','bg-yellow-400'],
                                'ditolak'  => ['bg-red-100 text-red-600',      'bg-red-400'],
                                default    => ['bg-gray-100 text-gray-500',    'bg-gray-400'],
                            };
                            $statusText = match($status) {
                                'diterima' => 'Sedang Magang',
                                'selesai'  => 'Selesai',
                                'pending'  => 'Menunggu',
                                'ditolak'  => 'Ditolak',
                                default    => 'Belum Melamar',
                            };
                        @endphp
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400">
                                {{ $mahasiswaList->firstItem() + $loop->index }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-semibold text-xs flex-shrink-0">
                                        {{ strtoupper(substr($mhs->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800 leading-tight">{{ $mhs->name }}</p>
                                        <p class="text-xs text-gray-400">{{ $mhs->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 font-mono text-xs">
                                {{ $biodata->nim ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($biodata?->jurusan)
                                <span class="inline-block px-2.5 py-1 bg-indigo-50 text-indigo-700 rounded-md text-xs font-medium">
                                    {{ $biodata->jurusan }}
                                </span>
                                @else
                                <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $biodata?->semester ? 'Sem. ' . $biodata->semester : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $badge }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $dot }}"></span>
                                    {{ $statusText }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('kaprodi.mahasiswa.show', $mhs->id) }}"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-indigo-600
                                          border border-indigo-200 rounded-lg hover:bg-indigo-50 transition">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-6 7a9 9 0 1112 0H3a9 9 0 0112 0z"/>
                                    </svg>
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center gap-2 text-gray-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-sm font-medium">Tidak ada mahasiswa ditemukan</p>
                                    <p class="text-xs">Coba ubah filter pencarian</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($mahasiswaList->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                <p class="text-xs text-gray-500">
                    Menampilkan {{ $mahasiswaList->firstItem() }}–{{ $mahasiswaList->lastItem() }}
                    dari {{ $mahasiswaList->total() }} mahasiswa
                </p>
                <div class="flex items-center gap-1">
                    @if($mahasiswaList->onFirstPage())
                        <span class="px-3 py-1.5 text-xs text-gray-300 border border-gray-200 rounded-lg">← Prev</span>
                    @else
                        <a href="{{ $mahasiswaList->previousPageUrl() }}"
                           class="px-3 py-1.5 text-xs text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50">← Prev</a>
                    @endif

                    @foreach($mahasiswaList->getUrlRange(max(1,$mahasiswaList->currentPage()-2), min($mahasiswaList->lastPage(),$mahasiswaList->currentPage()+2)) as $page => $url)
                        <a href="{{ $url }}"
                           class="px-3 py-1.5 text-xs rounded-lg border
                                  {{ $page == $mahasiswaList->currentPage()
                                     ? 'bg-indigo-600 text-white border-indigo-600'
                                     : 'text-gray-600 border-gray-200 hover:bg-gray-50' }}">
                            {{ $page }}
                        </a>
                    @endforeach

                    @if($mahasiswaList->hasMorePages())
                        <a href="{{ $mahasiswaList->nextPageUrl() }}"
                           class="px-3 py-1.5 text-xs text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50">Next →</a>
                    @else
                        <span class="px-3 py-1.5 text-xs text-gray-300 border border-gray-200 rounded-lg">Next →</span>
                    @endif
                </div>
            </div>
            @endif

        </div>{{-- /card --}}
    </main>
</div>
</body>
</html>