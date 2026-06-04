<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User – Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    @include('admin.components.sidebar')

    <main class="flex-1 p-8">
        <div class="mb-6">
            <a href="{{ route('admin.users.index') }}" class="text-sm text-blue-600 hover:underline mb-3 inline-block">
                ← Kembali ke daftar user
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Edit User: {{ $user->name }}</h1>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 max-w-lg">
            @if($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 rounded-lg p-3">
                    <ul class="text-sm text-red-600 space-y-1">
                        @foreach($errors->all() as $e)
                            <li>• {{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
                @csrf @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <select name="role" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach(['mahasiswa','mitra','admin','kaprodi','sekprodi'] as $r)
                        <option value="{{ $r }}" {{ old('role', $user->role) === $r ? 'selected' : '' }}>
                            {{ ucfirst($r) }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Password Baru <span class="text-gray-400 font-normal">(kosongkan jika tidak ingin ganti)</span>
                    </label>
                    <input type="password" name="password" minlength="8"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" minlength="8"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.users.index') }}"
                        class="px-5 py-2 border border-gray-300 text-sm rounded-lg text-gray-600 hover:bg-gray-50">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>
