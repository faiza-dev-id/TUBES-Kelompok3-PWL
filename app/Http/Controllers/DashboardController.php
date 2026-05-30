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

        $lamarans = Lamaran::where('mahasiswa_id', $user->id)
            ->with('lowongan.mitra')
            ->latest()
            ->get();

        $lamaranDiterima = $lamarans->firstWhere('status', Lamaran::STATUS_DITERIMA);
        $sedangMagang    = $lamaranDiterima !== null;

        $lowonganTerbaru = collect();
        if (! $sedangMagang) {
            $lowonganTerbaru = Lowongan::where('status', 'aktif')
                ->with('mitra')
                ->latest()
                ->take(3)
                ->get();
        }

        $stats = [
            'total_lamaran' => $lamarans->count(),
            'pending'       => $lamarans->where('status', Lamaran::STATUS_PENDING)->count(),
            'diterima'      => $lamarans->where('status', Lamaran::STATUS_DITERIMA)->count(),
            'ditolak'       => $lamarans->where('status', Lamaran::STATUS_DITOLAK)->count(),
        ];

        $mingguBerjalan = 1;
        $totalMinggu    = 16;
        if ($sedangMagang && $lamaranDiterima) {
            $mulai = $lamaranDiterima->diproses_pada ?? $lamaranDiterima->created_at;
            $mingguBerjalan = min(16, max(1, (int) floor(\Carbon\Carbon::parse($mulai)->diffInWeeks(now())) + 1));
        }

        return view('dashboard', compact(
            'user',
            'sedangMagang',
            'lamaranDiterima',
            'lamarans',
            'lowonganTerbaru',
            'stats',
            'mingguBerjalan',
            'totalMinggu'
        ));
    }
}