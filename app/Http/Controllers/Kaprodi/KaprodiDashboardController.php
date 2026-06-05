<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Lamaran;
use App\Models\Penilaian;
use App\Models\Mitra;

class KaprodiDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $stats = [
            'total_mahasiswa' => User::where('role', 'mahasiswa')->count(),
            'sedang_magang'   => Lamaran::where('status', 'diterima')->count(),
            'total_mitra'     => Mitra::count(),
            'selesai_magang'  => Penilaian::distinct('mahasiswa_id')->count('mahasiswa_id'),
        ];

        // Daftar prodi unik untuk filter
        $prodiList = Mahasiswa::select('jurusan')
            ->whereNotNull('jurusan')
            ->distinct()
            ->orderBy('jurusan')
            ->pluck('jurusan');

        // Filter
        $filterProdi  = $request->get('prodi');
        $filterStatus = $request->get('status');

        // Query mahasiswa dengan status lamaran terbaru
        $query = User::where('role', 'mahasiswa')
            ->with(['mahasiswa', 'lamaran' => function ($q) {
                $q->latest()->limit(1);
            }])
            ->when($filterProdi, function ($q) use ($filterProdi) {
                $q->whereHas('mahasiswa', fn($m) => $m->where('jurusan', $filterProdi));
            })
            ->when($filterStatus === 'magang', function ($q) {
                $q->whereHas('lamaran', fn($l) => $l->where('status', 'diterima'));
            })
            ->when($filterStatus === 'belum', function ($q) {
                $q->whereDoesntHave('lamaran', fn($l) => $l->where('status', 'diterima'));
            })
            ->when($filterStatus === 'selesai', function ($q) {
                $q->whereHas('lamaran', fn($l) => $l->where('status', 'selesai'));
            });

        $mahasiswaList = $query->paginate(15)->withQueryString();

        return view('kaprodi.dashboard', compact(
            'user', 'stats', 'mahasiswaList', 'prodiList', 'filterProdi', 'filterStatus'
        ));
    }
}