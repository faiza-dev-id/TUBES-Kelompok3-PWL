@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Lowongan</h2>
    <form action="{{ route('lowongan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Mitra</label>
            <select name="mitra_id" class="form-control">
                @foreach($mitras as $mitra)
                    <option value="{{ $mitra->id }}">{{ $mitra->nama_perusahaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Judul Lowongan</label>
            <input type="text" name="judul_lowongan" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label>Durasi</label>
            <input type="text" name="durasi" class="form-control" placeholder="contoh: 3 bulan">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('lowongan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection