<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Mitra - SIGMA</title>
</head>
<body>
    <h1>Daftar Mitra Magang</h1>
    @if(session('success'))
    <div style="background: #d4edda; padding: 10px; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('mitra.create') }}">[+] Tambah Mitra Baru</a>

    <table border="1" cellpadding="10" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Nama Perusahaan</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mitras as $m)
            <tr>
                <td>{{ $m->nama_perusahaan }}</td>
                <td>{{ $m->alamat }}</td>
                <td>{{ $m->email }}</td>
                <td>
                    <a href="{{ route('mitra.edit', $m->id) }}">Edit</a>
                    
                    <form action="{{ route('mitra.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>