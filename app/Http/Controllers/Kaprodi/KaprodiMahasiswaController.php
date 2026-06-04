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
    public function index(Request $request)
    {
        $query = User::where('role', 'mahasiswa')->with('mahasiswa');

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(fn($q2) => $q2->where('name', 'like', "%$q%")
                ->orWhere('email', 'like', "%$q%"));
        }

        // ✅ Fix: langsung whereHas ke lamaran pakai mahasiswa_id = users.id
        if ($request->filter === 'magang') {
            $query->whereHas('lamaran', fn($q) =>
                $q->where('status', 'diterima')
            );
        }

        $mahasiswas = $query->paginate(20)->withQueryString();

        return view('kaprodi.mahasiswa.index', compact('mahasiswas'));
    }

    public function show(User $user)
    {
        abort_if($user->role !== 'mahasiswa', 404);

        $lamaran = Lamaran::where('mahasiswa_id', $user->id)
            ->with('lowongan.mitra')
            ->latest()
            ->get();

        $lamaranAktif = $lamaran->firstWhere('status', 'diterima');

        $logKegiatan = LogKegiatan::where('mahasiswa_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->take(20)
            ->get();

        $laporan = LaporanKegiatan::where('mahasiswa_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $penilaian = Penilaian::where('mahasiswa_id', $user->id)
            ->with('penilai')
            ->get();

        return view('kaprodi.mahasiswa.show', compact(
            'user', 'lamaran', 'lamaranAktif', 'logKegiatan', 'laporan', 'penilaian'
        ));
    }

    public function rekapNilai(Request $request)
    {
        $query = Penilaian::with(['mahasiswa', 'lamaran.lowongan.mitra', 'penilai']);

        if ($request->filled('search')) {
            $q = $request->search;
            $query->whereHas('mahasiswa', fn($q2) => $q2->where('name', 'like', "%$q%"));
        }

        $penilaians = $query->latest()->paginate(20)->withQueryString();

        return view('kaprodi.mahasiswa.rekap_nilai', compact('penilaians'));
    }
}