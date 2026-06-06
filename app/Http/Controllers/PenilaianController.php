<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Lamaran;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    /**
     * Tampilkan halaman hasil penilaian.
     */
    public function index()
    {
        $user = Auth::user();

        $lamaranDiterima = Lamaran::where('mahasiswa_id', $user->id)
            ->where('status', Lamaran::STATUS_DITERIMA)
            ->with('lowongan.mitra')
            ->latest()->first();

        if (!$lamaranDiterima) {
            return redirect()->route('dashboard')
                ->with('error', 'Kamu belum memiliki magang aktif.');
        }

        // Ambil penilaian milik mahasiswa ini
        $penilaian = Penilaian::where('mahasiswa_id', $user->id)
            ->where('lamaran_id', $lamaranDiterima->id)
            ->latest()->first();

        // Riwayat penilaian (mingguan / milestone)
        $riwayatPenilaian = Penilaian::where('mahasiswa_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $sedangMagang = true; // Sudah pasti magang aktif

        return view('penilaian.index', compact(
            'user',
            'lamaranDiterima',
            'penilaian',
            'riwayatPenilaian',
            'sedangMagang'
        ));
    }
}