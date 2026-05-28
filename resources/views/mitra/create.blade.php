<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Mitra - SIGMA</title>
</head>
<body>
    <h1>Tambah Mitra Baru</h1>
    <form action="{{ route('mitra.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Perusahaan:</label><br>
            <input type="text" name="nama_perusahaan" required>
        </div><br>
        <div>
            <label>Alamat:</label><br>
            <textarea name="alamat" required></textarea>
        </div><br>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" required>
        </div><br>
        <button type="submit">Simpan Mitra</button>
        <a href="{{ route('mitra.index') }}">Batal</a>
    </form>
</body>
</html>