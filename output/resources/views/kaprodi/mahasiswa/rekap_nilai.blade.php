<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Nilai – Kaprodi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    @include('kaprodi.components.sidebar')

    <main class="flex-1 p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Rekap Nilai Magang</h1>
            <p class="text-gray-500 text-sm mt-1">Rekapitulasi penilaian seluruh mahasiswa</p>
        </div>

        <form method="GET" class="bg-white rounded-xl shadow-sm p-4 mb-6 flex gap-3 items-end">
            <div class="flex-1">
                <label class="block text-xs text-gray-500 mb-1">Cari Mahasiswa</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Nama mahasiswa..."
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-800 text-white text-sm rounded-lg">Filter</button>
            <a href="{{ route('kaprodi.mahasiswa.rekap') }}" class="px-4 py-2 border border-gray-300 text-sm rounded-lg text-gray-600 hover:bg-gray-50">Reset</a>
        </form>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-left">
                        <th class="px-6 py-3 font-medium">#</th>
                        <th class="px-6 py-3 font-medium">Mahasiswa</th>
                        <th class="px-6 py-3 font-medium">Mitra</th>
                        <th class="px-6 py-3 font-medium">Jenis</th>
                        <th class="px-6 py-3 font-medium text-center">Kedisiplinan</th>
                        <th class="px-6 py-3 font-medium text-center">Teknis</th>
                        <th class="px-6 py-3 font-medium text-center">Komunikasi</th>
                        <th class="px-6 py-3 font-medium text-center">Nilai Akhir</th>
                        <th class="px-6 py-3 font-medium text-center">Grade</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($penilaians as $p)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-800">
                            <a href="{{ route('kaprodi.mahasiswa.show', $p->mahasiswa_id) }}"
                               class="hover:text-indigo-600 hover:underline">
                                {{ $p->mahasiswa->name ?? '-' }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $p->lamaran->lowongan->mitra->nama_perusahaan ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-500 capitalize">{{ $p->jenis_penilaian }}</td>
                        <td class="px-6 py-4 text-center">{{ $p->nilai_kedisiplinan ?? '-' }}</td>
                        <td class="px-6 py-4 text-center">{{ $p->nilai_teknis ?? '-' }}</td>
                        <td class="px-6 py-4 text-center">{{ $p->nilai_komunikasi ?? '-' }}</td>
                        <td class="px-6 py-4 text-center font-semibold text-gray-800">
                            {{ $p->nilai_akhir ?? $p->nilai_rata_rata ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @php
                                $n = $p->nilai_akhir ?? $p->nilai_rata_rata ?? 0;
                                $grade = match(true) {
                                    $n >= 85 => ['A', 'bg-green-100 text-green-700'],
                                    $n >= 75 => ['B', 'bg-blue-100 text-blue-700'],
                                    $n >= 65 => ['C', 'bg-yellow-100 text-yellow-700'],
                                    $n >= 55 => ['D', 'bg-orange-100 text-orange-700'],
                                    default  => ['E', 'bg-red-100 text-red-700'],
                                };
                            @endphp
                            <span class="px-2 py-0.5 rounded text-xs font-bold {{ $grade[1] }}">{{ $grade[0] }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-10 text-center text-gray-400">Belum ada data penilaian.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-gray-100">{{ $penilaians->links() }}</div>
        </div>
    </main>
</div>
</body>
</html>
