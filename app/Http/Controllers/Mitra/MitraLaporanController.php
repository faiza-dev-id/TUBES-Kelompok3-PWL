<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatan;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraLaporanController extends Controller
{
    /**
     * Daftar semua laporan mahasiswa yang magang di mitra ini.
     */
    public function index()
    {
        $user  = Auth::user();
        $mitra = $user->mitra;

        if (!$mitra) {
            abort(403, 'Akses ditolak.');
        }

        $laporan = LaporanKegiatan::whereHas('lamaran.lowongan', function ($q) use ($mitra) {
            $q->where('mitra_id', $mitra->id);
        })->with(['mahasiswa', 'lamaran.lowongan'])
          ->orderBy('created_at', 'desc')
          ->get();

        return view('mitra.laporan', compact('mitra', 'laporan'));
    }

    /**
     * Setujui laporan mahasiswa.
     */
    public function setujui(Request $request, $id)
    {
        $user  = Auth::user();
        $mitra = $user->mitra;

        $laporan = LaporanKegiatan::whereHas('lamaran.lowongan', function ($q) use ($mitra) {
            $q->where('mitra_id', $mitra->id);
        })->findOrFail($id);

        $request->validate([
            'catatan_reviewer' => 'nullable|string|max:500',
        ]);

        $laporan->update([
            'status'           => 'diterima',
            'catatan_reviewer' => $request->catatan_reviewer,
        ]);

        return back()->with('success', 'Laporan berhasil disetujui.');
    }

    /**
     * Minta revisi laporan mahasiswa.
     */
    public function revisi(Request $request, $id)
    {
        $user  = Auth::user();
        $mitra = $user->mitra;

        $laporan = LaporanKegiatan::whereHas('lamaran.lowongan', function ($q) use ($mitra) {
            $q->where('mitra_id', $mitra->id);
        })->findOrFail($id);

        $request->validate([
            'catatan_reviewer' => 'required|string|max:500',
        ]);

        $laporan->update([
            'status'           => 'revisi',
            'catatan_reviewer' => $request->catatan_reviewer,
        ]);

        return back()->with('success', 'Laporan diminta untuk direvisi.');
    }
}
