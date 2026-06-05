<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lamaran;
use App\Models\Penilaian;
use App\Models\LogKegiatan;
use App\Models\LaporanKegiatan;

class KaprodiMahasiswaController extends Controller
{
    /** Daftar semua mahasiswa, bisa filter sedang magang */
    public function index(Request $request)
    {
        $query = User::where('role', 'mahasiswa')->with('mahasiswa');

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(fn($q2) => $q2
                ->where('name',  'like', "%$q%")
                ->orWhere('email', 'like', "%$q%")
            );
        }

        if ($request->filter === 'magang') {
            $query->whereHas('lamaran', fn($q) => $q->where('status', 'diterima'));
        }

        $mahasiswas = $query->paginate(20)->withQueryString();

        return view('kaprodi.mahasiswa.index', compact('mahasiswas'));
    }

    /** Detail progress satu mahasiswa */
    public function show(User $user)
    {
        abort_if($user->role !== 'mahasiswa', 404);

        $lamaran = Lamaran::where('mahasiswa_id', $user->id)
            ->with('lowongan.mitra')
            ->latest()
            ->get();

        $lamaranAktif = $lamaran->firstWhere('status', 'diterima');

        // Kolom yang benar: tanggal, judul_kegiatan, status, catatan_pembimbing
        $logKegiatan = LogKegiatan::where('mahasiswa_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->take(20)
            ->get();

        // Kolom yang benar: judul_laporan, jenis_laporan, status, file_path
        $laporan = LaporanKegiatan::where('mahasiswa_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Kolom yang benar: nilai_akhir (bukan nilai_rata_rata)
        $penilaian = Penilaian::where('mahasiswa_id', $user->id)
            ->with('penilai')
            ->get();

        return view('kaprodi.mahasiswa.show', compact(
            'user', 'lamaran', 'lamaranAktif', 'logKegiatan', 'laporan', 'penilaian'
        ));
    }

    /** Rekap nilai semua mahasiswa */
    public function rekapNilai(Request $request)
    {
        $query = Penilaian::with([
            'mahasiswa.mahasiswa',         // user → mahasiswa (untuk jurusan)
            'lamaran.lowongan.mitra',
            'penilai',
        ]);

        if ($request->filled('search')) {
            $q = $request->search;
            $query->whereHas('mahasiswa', fn($q2) => $q2->where('name', 'like', "%$q%"));
        }

        // Filter jenis penilaian (tengah / akhir)
        if ($request->filled('jenis')) {
            $query->where('jenis_penilaian', $request->jenis);
        }

        $penilaians = $query->latest()->paginate(20)->withQueryString();

        return view('kaprodi.mahasiswa.rekap_nilai', compact('penilaians'));
    }
}