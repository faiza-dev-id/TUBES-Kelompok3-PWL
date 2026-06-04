<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Lamaran;
use App\Models\Penilaian;
use App\Models\Mitra;

class KaprodiDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'total_mahasiswa' => User::where('role', 'mahasiswa')->count(),
            'sedang_magang'   => Lamaran::where('status', 'diterima')->count(),
            'total_mitra'     => Mitra::count(),
            'selesai_magang'  => Penilaian::distinct('mahasiswa_id')->count('mahasiswa_id'),
        ];

        // Mahasiswa yang sedang magang
        $mahasiswaMagang = Lamaran::where('status', 'diterima')
            ->with(['mahasiswa', 'lowongan.mitra'])
            ->latest('diproses_pada')
            ->take(8)
            ->get();

        // Rekapitulasi nilai (yang sudah ada nilai akhir)
        $rekapNilai = Penilaian::whereNotNull('nilai_akhir')
            ->with(['mahasiswa', 'lamaran.lowongan.mitra'])
            ->latest()
            ->take(8)
            ->get();

        return view('kaprodi.dashboard', compact(
            'user', 'stats', 'mahasiswaMagang', 'rekapNilai'
        ));
    }
}
