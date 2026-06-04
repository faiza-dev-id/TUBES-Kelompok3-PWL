{{-- resources/views/kaprodi/components/sidebar.blade.php --}}
<aside class="w-64 min-h-screen bg-indigo-900 text-white flex flex-col">
    {{-- Logo --}}
    <div class="px-6 py-5 border-b border-indigo-700">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-indigo-500 rounded-lg flex items-center justify-center font-bold text-sm">
                KP
            </div>
            <div>
                <p class="font-semibold text-sm leading-tight">Portal Kaprodi</p>
                <p class="text-indigo-300 text-xs">Monitoring Magang</p>
            </div>
        </div>
    </div>

    {{-- User Info --}}
    <div class="px-6 py-4 border-b border-indigo-700">
        <p class="text-xs text-indigo-300 mb-1">Login sebagai</p>
        <p class="text-sm font-medium truncate">{{ auth()->user()->name }}</p>
        <span class="inline-block mt-1 px-2 py-0.5 bg-indigo-600 rounded text-xs uppercase tracking-wide">
            {{ auth()->user()->role }}
        </span>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-4 space-y-1">
        <a href="{{ route('kaprodi.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('kaprodi.dashboard') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:bg-indigo-700 hover:text-white' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('kaprodi.mahasiswa.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('kaprodi.mahasiswa.index') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:bg-indigo-700 hover:text-white' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/>
            </svg>
            Daftar Mahasiswa
        </a>

        <a href="{{ route('kaprodi.mahasiswa.rekap') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('kaprodi.mahasiswa.rekap') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:bg-indigo-700 hover:text-white' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            Rekap Nilai
        </a>
    </nav>

    {{-- Logout --}}
    <div class="px-4 py-4 border-t border-indigo-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-indigo-200 hover:bg-indigo-700 hover:text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
