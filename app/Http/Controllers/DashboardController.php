<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\LogKegiatan;
use App\Models\LaporanKegiatan;
use App\Models\Penilaian;
use Carbon\Carbon;

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

        // ── Data khusus saat SEDANG MAGANG ────────────────────────────────
        $statsMagang     = null;
        $logTerbaru      = collect();
        $lowonganTerbaru = collect();

        if ($sedangMagang) {
            // Hitung progress minggu
            $mulai          = $lamaranDiterima->diproses_pada ?? $lamaranDiterima->created_at;
            $totalMinggu    = 16;
            $mingguBerjalan = min($totalMinggu, max(1, (int) floor(Carbon::parse($mulai)->diffInWeeks(now())) + 1));
            $deadline       = Carbon::parse($mulai)->addWeeks($totalMinggu);
            $hariTersisa    = now()->lte($deadline) ? (int) now()->diffInDays($deadline) : 0;
            $progressPct    = round(($mingguBerjalan / $totalMinggu) * 100);

            // Nilai sementara dari tabel penilaian
            $penilaian = Penilaian::where('mahasiswa_id', $user->id)
                ->where('lamaran_id', $lamaranDiterima->id)
                ->latest()->first();

            // Log minggu ini
            $startOfWeek  = now()->startOfWeek();
            $logMingguIni = LogKegiatan::where('mahasiswa_id', $user->id)
                ->where('tanggal', '>=', $startOfWeek)
                ->count();

            // Laporan terkumpul
            $totalDokWajib   = 4; // mingguan, tengah, akhir, presentasi
            $laporanTerkumpul = LaporanKegiatan::where('mahasiswa_id', $user->id)
                ->whereIn('jenis_laporan', ['mingguan', 'tengah', 'akhir', 'presentasi'])
                ->count();

            // Log kegiatan terbaru (5 terakhir)
            $logTerbaru = LogKegiatan::where('mahasiswa_id', $user->id)
                ->orderBy('tanggal', 'desc')
                ->take(5)
                ->get();

            $statsMagang = [
                'nilai_sementara'   => $penilaian ? ($penilaian->nilai_akhir ?? $penilaian->nilai_rata_rata) : null,
                'log_minggu_ini'    => $logMingguIni,
                'laporan_terkumpul' => $laporanTerkumpul,
                'total_dok_wajib'   => $totalDokWajib,
                'hari_tersisa'      => $hariTersisa,
                'deadline'          => $deadline,
                'minggu_berjalan'   => $mingguBerjalan,
                'total_minggu'      => $totalMinggu,
                'progress_pct'      => $progressPct,
                'mulai'             => Carbon::parse($mulai),
            ];

        } else {
            // Lowongan terbaru hanya jika belum magang
            $lowonganTerbaru = Lowongan::where('status', 'aktif')
                ->with('mitra')
                ->latest()
                ->take(3)
                ->get();
        }

        // Statistik lamaran (tetap dikirim, dipakai di halaman lamaran saya)
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
            'stats',
            'statsMagang',
            'logTerbaru'
        ));
    }
}