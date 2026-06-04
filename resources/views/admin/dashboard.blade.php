<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard – Sistem Magang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('admin.components.sidebar')

    {{-- Main Content --}}
    <main class="flex-1 p-8">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
            <p class="text-gray-500 text-sm mt-1">Selamat datang, {{ auth()->user()->name }}</p>
        </div>

        {{-- Flash --}}
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['total_mahasiswa'] }}</p>
                    <p class="text-sm text-gray-500">Total Mahasiswa</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['total_mitra'] }}</p>
                    <p class="text-sm text-gray-500">Total Mitra</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['sedang_magang'] }}</p>
                    <p class="text-sm text-gray-500">Sedang Magang</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 flex items-center gap-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['lamaran_pending'] }}</p>
                    <p class="text-sm text-gray-500">Lamaran Pending</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- User Terbaru --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-semibold text-gray-700">User Terbaru</h2>
                    <a href="{{ route('admin.users.index') }}" class="text-sm text-blue-600 hover:underline">Lihat semua</a>
                </div>
                <div class="space-y-3">
                    @forelse($usersRecent as $u)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-xs font-bold text-gray-600">
                                {{ strtoupper(substr($u->name, 0, 2)) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ $u->name }}</p>
                                <p class="text-xs text-gray-400">{{ $u->email }}</p>
                            </div>
                        </div>
                        @php
                            $roleColor = match($u->role) {
                                'admin'    => 'bg-red-100 text-red-700',
                                'mitra'    => 'bg-purple-100 text-purple-700',
                                'kaprodi'  => 'bg-indigo-100 text-indigo-700',
                                'sekprodi' => 'bg-cyan-100 text-cyan-700',
                                default    => 'bg-blue-100 text-blue-700',
                            };
                        @endphp
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $roleColor }}">
                            {{ $u->role }}
                        </span>
                    </div>
                    @empty
                    <p class="text-sm text-gray-400">Belum ada user.</p>
                    @endforelse
                </div>
            </div>

            {{-- Lamaran Pending --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-semibold text-gray-700">Lamaran Pending</h2>
                    <a href="{{ route('admin.lamaran.index', ['status' => 'pending']) }}"
                       class="text-sm text-blue-600 hover:underline">Lihat semua</a>
                </div>
                <div class="space-y-3">
                    @forelse($lamaranPending as $lmr)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ $lmr->mahasiswa->name ?? '-' }}</p>
                            <p class="text-xs text-gray-400">{{ $lmr->lowongan->mitra->nama_perusahaan ?? '-' }} · {{ $lmr->lowongan->judul ?? '-' }}</p>
                        </div>
                        <span class="px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">
                            Pending
                        </span>
                    </div>
                    @empty
                    <p class="text-sm text-gray-400">Tidak ada lamaran pending.</p>
                    @endforelse
                </div>
            </div>

        </div>

    </main>
</div>
</body>
</html>
