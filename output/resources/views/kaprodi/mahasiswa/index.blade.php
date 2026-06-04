<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa – Kaprodi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    @include('kaprodi.components.sidebar')

    <main class="flex-1 p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Mahasiswa</h1>
            <p class="text-gray-500 text-sm mt-1">Monitoring seluruh mahasiswa terdaftar</p>
        </div>

        {{-- Filter --}}
        <form method="GET" class="bg-white rounded-xl shadow-sm p-4 mb-6 flex flex-wrap gap-3 items-end">
            <div class="flex-1">
                <label class="block text-xs text-gray-500 mb-1">Cari</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Nama atau email..."
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Status Magang</label>
                <select name="filter" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Semua</option>
                    <option value="magang" {{ request('filter') === 'magang' ? 'selected' : '' }}>Sedang Magang</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-800 text-white text-sm rounded-lg hover:bg-indigo-700">Filter</button>
            <a href="{{ route('kaprodi.mahasiswa.index') }}" class="px-4 py-2 border border-gray-300 text-sm rounded-lg text-gray-600 hover:bg-gray-50">Reset</a>
        </form>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-left">
                        <th class="px-6 py-3 font-medium">#</th>
                        <th class="px-6 py-3 font-medium">Nama</th>
                        <th class="px-6 py-3 font-medium">Email</th>
                        <th class="px-6 py-3 font-medium">NIM</th>
                        <th class="px-6 py-3 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($mahasiswas as $mhs)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $mhs->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $mhs->email }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $mhs->mahasiswa->nim ?? '-' }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('kaprodi.mahasiswa.show', $mhs) }}"
                               class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-xs hover:bg-indigo-100">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-400">Tidak ada mahasiswa ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-gray-100">{{ $mahasiswas->links() }}</div>
        </div>
    </main>
</div>
</body>
</html>
