<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra – Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    @include('admin.components.sidebar')

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Mitra / Perusahaan</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola data mitra dan akun loginnya</p>
            </div>
            <a href="{{ route('admin.mitra.create') }}"
               class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Mitra
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search --}}
        <form method="GET" class="bg-white rounded-xl shadow-sm p-4 mb-6 flex gap-3 items-end">
            <div class="flex-1">
                <label class="block text-xs text-gray-500 mb-1">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Nama perusahaan atau email..."
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="px-4 py-2 bg-gray-800 text-white text-sm rounded-lg hover:bg-gray-700">Filter</button>
            <a href="{{ route('admin.mitra.index') }}" class="px-4 py-2 border border-gray-300 text-sm rounded-lg text-gray-600 hover:bg-gray-50">Reset</a>
        </form>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-left">
                        <th class="px-6 py-3 font-medium">#</th>
                        <th class="px-6 py-3 font-medium">Perusahaan</th>
                        <th class="px-6 py-3 font-medium">Email Login</th>
                        <th class="px-6 py-3 font-medium">Alamat</th>
                        <th class="px-6 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($mitras as $m)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center text-xs font-bold text-purple-700">
                                    {{ $m->inisials }}
                                </div>
                                <span class="font-medium text-gray-800">{{ $m->nama_perusahaan }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $m->email }}</td>
                        <td class="px-6 py-4 text-gray-500 max-w-xs truncate">{{ $m->alamat }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.mitra.edit', $m) }}"
                                   class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-xs hover:bg-gray-200">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.mitra.destroy', $m) }}"
                                      onsubmit="return confirm('Hapus mitra {{ $m->nama_perusahaan }}? Akun login-nya juga akan dihapus.')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-50 text-red-600 rounded-lg text-xs hover:bg-red-100">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-400">Belum ada data mitra.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-gray-100">{{ $mitras->links() }}</div>
        </div>
    </main>
</div>
</body>
</html>
