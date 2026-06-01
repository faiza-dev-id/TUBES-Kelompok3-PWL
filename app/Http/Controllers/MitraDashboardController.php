<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\LogKegiatan;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MitraDashboardController extends Controller
{
    public function index()
    {
        $user  = Auth::user();
        $mitra = $user->mitra;

        // ── Statistik utama ───────────────────────────────────────────
        $lowonganAktif       = $mitra->lowongans()->where('status', 'aktif')->count();
        $totalPelamar        = $mitra->lamarans()->count();
        $mahasiswaAktif      = $mitra->lamarans()->where('status', 'diterima')->count();
        $penilaianBelumSelesai = Penilaian::whereHas('lamaran', function ($q) use ($mitra) {
            $q->whereHas('lowongan', fn($q2) => $q2->where('mitra_id', $mitra->id))
              ->where('status', 'diterima');
        })->whereNull('nilai_akhir')->count();

        // ── Lamaran pending (perlu ditindak) ──────────────────────────
        $lamaranPending = Lamaran::whereHas('lowongan', fn($q) => $q->where('mitra_id', $mitra->id))
            ->where('status', 'pending')
            ->with('mahasiswa', 'lowongan')
            ->latest()
            ->take(6)
            ->get();

        // ── Lowongan milik mitra ──────────────────────────────────────
        $lowongans = $mitra->lowongans()
            ->withCount(['lamarans', 'lamarans as pending_count' => fn($q) => $q->where('status','pending')])
            ->latest()
            ->take(4)
            ->get();

        // ── Activity feed: log terbaru dari semua mahasiswa magang ────
        $activityFeed = LogKegiatan::whereHas('lamaran', function ($q) use ($mitra) {
            $q->whereHas('lowongan', fn($q2) => $q2->where('mitra_id', $mitra->id))
              ->where('status', 'diterima');
        })
        ->with('mahasiswa')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        // ── Trend: pelamar minggu ini vs minggu lalu ──────────────────
        $pelamarMingguIni  = $mitra->lamarans()->where('created_at', '>=', now()->startOfWeek())->count();
        $pelamarMingguLalu = $mitra->lamarans()
            ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
            ->count();

        return view('mitra.dashboard', compact(
            'user', 'mitra',
            'lowonganAktif', 'totalPelamar', 'mahasiswaAktif', 'penilaianBelumSelesai',
            'lamaranPending', 'lowongans', 'activityFeed',
            'pelamarMingguIni', 'pelamarMingguLalu'
        ));
    }
}
