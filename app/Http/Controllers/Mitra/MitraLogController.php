<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\LogKegiatan;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraLogController extends Controller
{
    public function index(Request $request)
    {
        $mitra = Auth::user()->mitra;

        // Ambil semua mahasiswa aktif magang di mitra ini
        $mahasiswaAktif = Lamaran::where('status', 'diterima')
            ->whereHas('lowongan', fn($q) => $q->where('mitra_id', $mitra->id))
            ->with('mahasiswa', 'lowongan')
            ->get();

        $query = LogKegiatan::whereHas('lamaran', function ($q) use ($mitra) {
            $q->whereHas('lowongan', fn($q2) => $q2->where('mitra_id', $mitra->id))
              ->where('status', 'diterima');
        })->with('mahasiswa', 'lamaran.lowongan');

        // Filter mahasiswa
        if ($request->filled('mahasiswa_id')) {
            $query->where('mahasiswa_id', $request->mahasiswa_id);
        }
        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        // Filter minggu
        if ($request->filled('minggu_ke')) {
            $query->where('minggu_ke', $request->minggu_ke);
        }

        $logs = $query->orderBy('tanggal', 'desc')->get();

        $stats = [
            'total'     => $logs->count(),
            'menunggu'  => $logs->where('status','menunggu')->count(),
            'disetujui' => $logs->where('status','disetujui')->count(),
            'ditolak'   => $logs->where('status','ditolak')->count(),
        ];

        return view('mitra.log_mahasiswa', compact('mitra', 'logs', 'mahasiswaAktif', 'stats'));
    }

    public function setujui(Request $request, $id)
    {
        $mitra = Auth::user()->mitra;
        $log   = LogKegiatan::whereHas('lamaran', function ($q) use ($mitra) {
            $q->whereHas('lowongan', fn($q2) => $q2->where('mitra_id', $mitra->id));
        })->findOrFail($id);

        $log->update([
            'status'              => 'disetujui',
            'catatan_pembimbing'  => $request->catatan_pembimbing,
        ]);

        return back()->with('success', 'Log kegiatan berhasil disetujui.');
    }

    public function tolak(Request $request, $id)
    {
        $mitra = Auth::user()->mitra;
        $log   = LogKegiatan::whereHas('lamaran', function ($q) use ($mitra) {
            $q->whereHas('lowongan', fn($q2) => $q2->where('mitra_id', $mitra->id));
        })->findOrFail($id);

        $request->validate(['catatan_pembimbing' => 'required|string|max:500']);

        $log->update([
            'status'             => 'ditolak',
            'catatan_pembimbing' => $request->catatan_pembimbing,
        ]);

        return back()->with('success', 'Log kegiatan ditolak dengan catatan.');
    }
}
