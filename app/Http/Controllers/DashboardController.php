<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Lamaran;
use App\Models\Lowongan;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ── Riwayat lamaran milik user yang login ──────────────────────────
        $lamarans = Lamaran::where('mahasiswa_id', $user->id)
            ->with('lowongan')
            ->latest()
            ->get();

        // Cek apakah mahasiswa sedang aktif magang
        // (ada lamaran dengan status 'diterima')
        $lamaranDiterima = $lamarans->firstWhere('status', Lamaran::STATUS_DITERIMA);
        $sedangMagang    = $lamaranDiterima !== null;

        // ── Lowongan terbaru (hanya tampil jika BELUM magang aktif) ────────
        $lowonganTerbaru = collect();
        if (! $sedangMagang) {
            $lowonganTerbaru = Lowongan::where('status', 'aktif')
                ->with('mitra')
                ->latest()
                ->take(3)
                ->get();
        }

        // ── Statistik ringkas ──────────────────────────────────────────────
        $stats = [
            'total_lamaran' => $lamarans->count(),
            'pending'       => $lamarans->where('status', Lamaran::STATUS_PENDING)->count(),
            'diterima'      => $lamarans->where('status', Lamaran::STATUS_DITERIMA)->count(),
            'ditolak'       => $lamarans->where('status', Lamaran::STATUS_DITOLAK)->count(),
        ];

        return view('dashboard', compact(
            'user',
            'sedangMagang',
            'lamaranDiterima',
            'lamarans',
            'lowonganTerbaru',
            'stats'
        ));
    }
}