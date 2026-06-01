@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Lowongan</h2>
    <form action="{{ route('lowongan.update', $lowongan) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Mitra</label>
            <select name="mitra_id" class="form-control">
                @foreach($mitras as $mitra)
                    <option value="{{ $mitra->id }}" {{ $lowongan->mitra_id == $mitra->id ? 'selected' : '' }}>
                        {{ $mitra->nama_perusahaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Judul Lowongan</label>
            <input type="text" name="judul_lowongan" class="form-control" value="{{ $lowongan->judul_lowongan }}">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ $lowongan->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Durasi</label>
            <input type="text" name="durasi" class="form-control" value="{{ $lowongan->durasi }}">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif" {{ $lowongan->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $lowongan->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('lowongan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection