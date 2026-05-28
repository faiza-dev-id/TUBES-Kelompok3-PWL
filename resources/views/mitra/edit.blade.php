<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Mitra - SIGMA</title>
</head>
<body>
    <h1>Edit Data Mitra</h1>
    
    <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div>
            <label>Nama Perusahaan:</label><br>
            <input type="text" name="nama_perusahaan" value="{{ $mitra->nama_perusahaan }}" required>
        </div><br>
        
        <div>
            <label>Alamat:</label><br>
            <textarea name="alamat" required>{{ $mitra->alamat }}</textarea>
        </div><br>
        
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ $mitra->email }}" required>
        </div><br>
        
        <button type="submit">Update Data</button>
        <a href="{{ route('mitra.index') }}">Batal</a>
    </form>
</body>
</html>