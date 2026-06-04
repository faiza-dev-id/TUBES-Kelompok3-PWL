<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;

class MitraNilaiAkhirController extends Controller
{
    public function index()
    {
        $mitra = Auth::user()->mitra;

        // Semua mahasiswa yang pernah magang (aktif maupun selesai)
        $riwayat = Lamaran::where('status', 'diterima')
            ->whereHas('lowongan', fn($q) => $q->where('mitra_id', $mitra->id))
            ->with([
                'mahasiswa',
                'lowongan',
                'penilaian' => fn($q) => $q->latest(),
            ])
            ->latest()
            ->get();

        // Hitung rata-rata nilai semua mahasiswa
        $rataRataKeseluruhan = $riwayat->flatMap(fn($l) => $l->penilaian)
            ->whereNotNull('nilai_akhir')
            ->avg('nilai_akhir');

        return view('mitra.nilai_akhir', compact('mitra', 'riwayat', 'rataRataKeseluruhan'));
    }
}
