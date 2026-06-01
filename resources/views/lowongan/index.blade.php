@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Lowongan Magang</h2>
    <a href="{{ route('lowongan.create') }}" class="btn btn-primary mb-3">+ Tambah Lowongan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Mitra</th>
                <th>Durasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lowongans as $i => $lowongan)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $lowongan->judul_lowongan }}</td>
                <td>{{ $lowongan->mitra->nama_perusahaan ?? '-' }}</td>
                <td>{{ $lowongan->durasi }}</td>
                <td>{{ $lowongan->status }}</td>
                <td>
                    <a href="{{ route('lowongan.show', $lowongan) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('lowongan.edit', $lowongan) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('lowongan.destroy', $lowongan) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection