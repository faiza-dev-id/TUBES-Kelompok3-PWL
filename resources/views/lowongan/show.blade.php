@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Lowongan</h2>
    <table class="table table-bordered">
        <tr><th>Judul</th><td>{{ $lowongan->judul_lowongan }}</td></tr>
        <tr><th>Mitra</th><td>{{ $lowongan->mitra->nama_perusahaan ?? '-' }}</td></tr>
        <tr><th>Deskripsi</th><td>{{ $lowongan->deskripsi }}</td></tr>
        <tr><th>Durasi</th><td>{{ $lowongan->durasi }}</td></tr>
        <tr><th>Status</th><td>{{ $lowongan->status }}</td></tr>
    </table>
    <a href="{{ route('lowongan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection