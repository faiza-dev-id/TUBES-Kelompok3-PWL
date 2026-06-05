{{-- resources/views/admin/components/sidebar.blade.php --}}
<aside class="w-64 min-h-screen bg-gray-900 text-white flex flex-col">
    {{-- Logo --}}
    <div class="px-6 py-5 border-b border-gray-700">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-red-600 rounded-lg flex items-center justify-center font-bold text-sm">
                ADM
            </div>
            <div>
                <p class="font-semibold text-sm leading-tight">Portal Admin</p>
                <p class="text-gray-400 text-xs">Sistem Magang SIGMA</p>
            </div>
        </div>
    </div>

    {{-- User Info --}}
    <div class="px-6 py-4 border-b border-gray-700">
        <p class="text-xs text-gray-400 mb-1">Login sebagai</p>
        <p class="text-sm font-medium truncate">{{ auth()->user()->name }}</p>
        <span class="inline-block mt-1 px-2 py-0.5 bg-red-700 rounded text-xs uppercase tracking-wide">
            {{ auth()->user()->role }}
        </span>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-4 space-y-0.5">
        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

        {{-- Manajemen User --}}
        <a href="{{ route('admin.users.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('admin.users.*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            Manajemen User
        </a>

        {{-- Mitra --}}
        <a href="{{ route('admin.mitra.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('admin.mitra.*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            Mitra / Perusahaan
        </a>

        {{-- Monitor Lamaran --}}
        <a href="{{ route('admin.lamaran.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm
                  {{ request()->routeIs('admin.lamaran.*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Monitor Lamaran
        </a>
    </nav>

    {{-- Logout --}}
    <div class="px-4 py-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>