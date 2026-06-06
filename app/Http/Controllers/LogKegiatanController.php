<?php

namespace App\Http\Controllers;

use App\Models\LogKegiatan;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogKegiatanController extends Controller
{
    /**
     * Tampilkan halaman log kegiatan mahasiswa.
     * Hanya bisa diakses jika mahasiswa sedang aktif magang.
     */
    public function index()
    {
        $user = Auth::user();

        // Pastikan mahasiswa sedang aktif magang
        $lamaranDiterima = Lamaran::where('mahasiswa_id', $user->id)
            ->where('status', Lamaran::STATUS_DITERIMA)
            ->with('lowongan.mitra')
            ->latest()
            ->first();

        if (!$lamaranDiterima) {
            return redirect()->route('dashboard')
                ->with('error', 'Kamu belum memiliki magang aktif.');
        }

        // Ambil semua log kegiatan milik user, dikelompokkan per minggu
        $logs = LogKegiatan::where('mahasiswa_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->get()
            ->groupBy('minggu_ke');

        // Hitung progress minggu
        $mulai = $lamaranDiterima->diproses_pada ?? $lamaranDiterima->created_at;
        $mingguBerjalan = max(1, (int) floor(\Carbon\Carbon::parse($mulai)->diffInWeeks(now())) + 1);
        $totalMinggu = 16;
        $mingguBerjalan = min($mingguBerjalan, $totalMinggu);

        $stats = [
            'total'     => LogKegiatan::where('mahasiswa_id', $user->id)->count(),
            'disetujui' => LogKegiatan::where('mahasiswa_id', $user->id)->where('status', 'disetujui')->count(),
            'menunggu'  => LogKegiatan::where('mahasiswa_id', $user->id)->where('status', 'menunggu')->count(),
        ];

        $sedangMagang = true; // Sudah pasti magang aktif (ada lamaranDiterima)

        return view('log_kegiatan.index', compact(
            'user',
            'lamaranDiterima',
            'logs',
            'mingguBerjalan',
            'totalMinggu',
            'stats',
            'sedangMagang'
        ));
    }

    /**
     * Simpan log kegiatan baru.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'judul_kegiatan' => 'required|string|max:255',
            'tanggal'        => 'required|date',
            'minggu_ke'      => 'required|integer|min:1|max:20',
            'jam_mulai'      => 'required',
            'jam_selesai'    => 'required',
            'lokasi'         => 'nullable|string|max:100',
            'deskripsi'      => 'required|string',
            'kategori'       => 'nullable|string|max:100',
        ]);

        // Pastikan mahasiswa sedang aktif magang
        $lamaranDiterima = Lamaran::where('mahasiswa_id', $user->id)
            ->where('status', Lamaran::STATUS_DITERIMA)
            ->first();

        if (!$lamaranDiterima) {
            return back()->with('error', 'Kamu belum memiliki magang aktif.');
        }

        LogKegiatan::create([
            'mahasiswa_id'   => $user->id,
            'lamaran_id'     => $lamaranDiterima->id,
            'judul_kegiatan' => $request->judul_kegiatan,
            'tanggal'        => $request->tanggal,
            'minggu_ke'      => $request->minggu_ke,
            'jam_mulai'      => $request->jam_mulai,
            'jam_selesai'    => $request->jam_selesai,
            'lokasi'         => $request->lokasi,
            'deskripsi'      => $request->deskripsi,
            'kategori'       => $request->kategori,
            'status'         => 'menunggu',
        ]);

        return back()->with('success', 'Log kegiatan berhasil ditambahkan!');
    }

    /**
     * Update log kegiatan (hanya jika status masih 'menunggu').
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $log = LogKegiatan::where('id', $id)
            ->where('mahasiswa_id', $user->id)
            ->firstOrFail();

        if ($log->status !== 'menunggu') {
            return back()->with('error', 'Log yang sudah disetujui tidak dapat diedit.');
        }

        $request->validate([
            'judul_kegiatan' => 'required|string|max:255',
            'tanggal'        => 'required|date',
            'minggu_ke'      => 'required|integer|min:1|max:20',
            'jam_mulai'      => 'required',
            'jam_selesai'    => 'required',
            'lokasi'         => 'nullable|string|max:100',
            'deskripsi'      => 'required|string',
            'kategori'       => 'nullable|string|max:100',
        ]);

        $log->update($request->only([
            'judul_kegiatan', 'tanggal', 'minggu_ke',
            'jam_mulai', 'jam_selesai', 'lokasi',
            'deskripsi', 'kategori',
        ]));

        return back()->with('success', 'Log kegiatan berhasil diperbarui!');
    }

    /**
     * Hapus log kegiatan (hanya jika status masih 'menunggu').
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $log = LogKegiatan::where('id', $id)
            ->where('mahasiswa_id', $user->id)
            ->firstOrFail();

        if ($log->status !== 'menunggu') {
            return back()->with('error', 'Log yang sudah disetujui tidak dapat dihapus.');
        }

        $log->delete();

        return back()->with('success', 'Log kegiatan berhasil dihapus.');
    }
}