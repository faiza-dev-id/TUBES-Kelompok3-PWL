<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Lamaran – Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    @include('admin.components.sidebar')

    <main class="flex-1 p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Monitor Lamaran</h1>
            <p class="text-gray-500 text-sm mt-1">Pantau seluruh lamaran magang mahasiswa</p>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            @foreach([
                ['label'=>'Total','value'=>$stats['total'],'color'=>'gray'],
                ['label'=>'Pending','value'=>$stats['pending'],'color'=>'yellow'],
                ['label'=>'Diterima','value'=>$stats['diterima'],'color'=>'green'],
                ['label'=>'Ditolak','value'=>$stats['ditolak'],'color'=>'red'],
            ] as $s)
            <a href="{{ route('admin.lamaran.index', ['status' => strtolower($s['label'])]) }}"
               class="bg-white rounded-xl shadow-sm p-4 flex items-center gap-3 hover:shadow-md transition">
                <div class="text-2xl font-bold text-gray-800">{{ $s['value'] }}</div>
                <div class="text-sm text-gray-500">{{ $s['label'] }}</div>
            </a>
            @endforeach
        </div>

        {{-- Filter --}}
        <form method="GET" class="bg-white rounded-xl shadow-sm p-4 mb-6 flex flex-wrap gap-3 items-end">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Status</label>
                <select name="status" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Status</option>
                    @foreach(['pending','diterima','ditolak'] as $s)
                    <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-gray-800 text-white text-sm rounded-lg">Filter</button>
            <a href="{{ route('admin.lamaran.index') }}" class="px-4 py-2 border border-gray-300 text-sm rounded-lg text-gray-600 hover:bg-gray-50">Reset</a>
        </form>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-left">
                        <th class="px-6 py-3 font-medium">#</th>
                        <th class="px-6 py-3 font-medium">Mahasiswa</th>
                        <th class="px-6 py-3 font-medium">Lowongan</th>
                        <th class="px-6 py-3 font-medium">Mitra</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                        <th class="px-6 py-3 font-medium">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($lamarans as $lmr)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $lmr->mahasiswa->name ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $lmr->lowongan->judul ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $lmr->lowongan->mitra->nama_perusahaan ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @php
                                $sc = match($lmr->status) {
                                    'diterima' => 'bg-green-100 text-green-700',
                                    'ditolak'  => 'bg-red-100 text-red-700',
                                    default    => 'bg-yellow-100 text-yellow-700',
                                };
                            @endphp
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $sc }}">{{ ucfirst($lmr->status) }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-400 text-xs">{{ $lmr->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="px-6 py-10 text-center text-gray-400">Tidak ada data lamaran.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-gray-100">{{ $lamarans->links() }}</div>
        </div>
    </main>
</div>
</body>
</html>
