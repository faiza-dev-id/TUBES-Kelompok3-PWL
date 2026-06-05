<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Lamaran – Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>

<style>
:root{--primary:#8b1a3a;--primary-dim:rgba(139,26,58,.10);--border:rgba(100,30,50,.1);--text-1:#1a0a0f;--text-3:#a07080;--sidebar-w:230px;}
.sidebar{width:var(--sidebar-w);background:var(--primary);display:flex;flex-direction:column;padding:24px 0;position:fixed;height:100vh;top:0;left:0;z-index:10;}
.sidebar-logo{display:flex;align-items:center;gap:10px;padding:0 20px 28px;border-bottom:1px solid rgba(255,255,255,.15);}
.logo-mark{width:34px;height:34px;background:rgba(255,255,255,.2);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;color:#fff;}
.logo-text{font-weight:700;font-size:15px;color:#fff;}.logo-sub{font-size:10px;color:rgba(255,255,255,.55);}
.nav-group{padding:20px 12px 8px;flex:1;}
.nav-label{font-size:9.5px;letter-spacing:.12em;color:rgba(255,255,255,.45);text-transform:uppercase;font-weight:600;padding:0 8px;margin-bottom:6px;}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:9px;color:rgba(255,255,255,.7);font-size:13px;font-weight:500;margin-bottom:2px;transition:.15s;text-decoration:none;}
.nav-item:hover{background:rgba(255,255,255,.12);color:#fff;}.nav-item.active{background:rgba(255,255,255,.18);color:#fff;}
.nav-icon{width:16px;height:16px;flex-shrink:0;}
.sidebar-foot{padding:16px 12px;border-top:1px solid rgba(255,255,255,.15);}
.user-chip{display:flex;align-items:center;gap:10px;padding:10px;border-radius:10px;background:rgba(255,255,255,.12);}
.ava{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;}
.user-name{font-size:12px;font-weight:600;color:#fff;}.user-role{font-size:10px;color:rgba(255,255,255,.55);}
.user-info{overflow:hidden;}
.btn-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;width:100%;margin-top:8px;}
</style>
</head>
<body class="bg-gray-100 font-sans">
<div style="display:flex;min-height:100vh;">
    @include('admin.components.sidebar')

    <main style="margin-left:230px;flex:1;padding:32px;min-height:100vh;">
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
