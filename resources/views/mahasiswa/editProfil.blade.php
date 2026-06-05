@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Profil Mahasiswa</h5>
                </div>

                <div class="card-body">

                    {{-- Alert sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Alert error validasi --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('mahasiswa.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Foto Profil --}}
                        <div class="text-center mb-4">
                            <img
                                src="{{ $mahasiswa->foto_profil ? asset('storage/' . $mahasiswa->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($mahasiswa->user->name) . '&background=0d6efd&color=fff&size=120' }}"
                                class="rounded-circle mb-2"
                                width="120" height="120"
                                style="object-fit: cover;"
                                id="previewFoto"
                            >
                            <div>
                                <label for="foto_profil" class="btn btn-sm btn-outline-primary mt-1">
                                    Ganti Foto
                                </label>
                                <input type="file" id="foto_profil" name="foto_profil" class="d-none" accept="image/jpg,image/jpeg,image/png" onchange="previewImage(this)">
                                @error('foto_profil')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Nama Lengkap --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $mahasiswa->user->name) }}" placeholder="Masukkan nama lengkap">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- NIM --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">NIM</label>
                            <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                                value="{{ old('nim', $mahasiswa->nim) }}" placeholder="Masukkan NIM">
                            @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Fakultas --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Fakultas</label>
                            <input type="text" name="fakultas" class="form-control @error('fakultas') is-invalid @enderror"
                                value="{{ old('fakultas', $mahasiswa->fakultas) }}" placeholder="Contoh: Fakultas Ilmu Komputer">
                            @error('fakultas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Program Studi --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Program Studi</label>
                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror"
                                value="{{ old('jurusan', $mahasiswa->jurusan) }}" placeholder="Contoh: Teknik Informatika">
                            @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Semester --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Semester</label>
                            <select name="semester" class="form-select @error('semester') is-invalid @enderror">
                                <option value="">-- Pilih Semester --</option>
                                @for($i = 1; $i <= 14; $i++)
                                    <option value="{{ $i }}" {{ old('semester', $mahasiswa->semester) == $i ? 'selected' : '' }}>
                                        Semester {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('semester') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Nomor HP --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nomor HP</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                                value="{{ old('no_hp', $mahasiswa->no_hp) }}" placeholder="Contoh: 08123456789">
                            @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4">Batal</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => document.getElementById('previewFoto').src = e.target.result;
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
