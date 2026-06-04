<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mitra – Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    @include('admin.components.sidebar')

    <main class="flex-1 p-8">
        <div class="mb-6">
            <a href="{{ route('admin.mitra.index') }}" class="text-sm text-blue-600 hover:underline mb-3 inline-block">← Kembali</a>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Mitra</h1>
            <p class="text-gray-500 text-sm mt-1">Menambah mitra akan otomatis membuat akun login dengan role <strong>mitra</strong>.</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 max-w-lg">
            @if($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 rounded-lg p-3">
                    <ul class="text-sm text-red-600 space-y-1">
                        @foreach($errors->all() as $e)<li>• {{ $e }}</li>@endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.mitra.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" rows="2" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('alamat') }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email (untuk login)</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password Login</label>
                    <input type="password" name="password" required minlength="8"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required minlength="8"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="px-5 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">Simpan</button>
                    <a href="{{ route('admin.mitra.index') }}" class="px-5 py-2 border border-gray-300 text-sm rounded-lg text-gray-600 hover:bg-gray-50">Batal</a>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>
