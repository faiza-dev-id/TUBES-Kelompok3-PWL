<?php

namespace App\Http\Controllers;

use App\Models\LogMagang;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LogMagangController extends Controller
{
    // Mahasiswa: lihat log milik sendiri
    public function index(Request $request)
    {
        $mahasiswa = Mahasiswa::where('user_id', $request->user()->id)->firstOrFail();

        $logs = LogMagang::where('mahasiswa_id', $mahasiswa->id)
            ->with('lowongan')
            ->orderBy('tanggal', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $logs,
        ]);
    }

    // Mahasiswa: tambah log baru
    public function store(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongan,id',
            'tanggal'     => 'required|date',
            'kegiatan'    => 'required|string|min:5',
            'keterangan'  => 'nullable|string',
        ]);

        $mahasiswa = Mahasiswa::where('user_id', $request->user()->id)->firstOrFail();

        $log = LogMagang::create([
            'mahasiswa_id' => $mahasiswa->id,
            'lowongan_id'  => $request->lowongan_id,
            'tanggal'      => $request->tanggal,
            'kegiatan'     => $request->kegiatan,
            'keterangan'   => $request->keterangan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Log magang berhasil ditambahkan',
            'data'    => $log,
        ], 201);
    }

    // Mahasiswa: lihat detail satu log
    public function show(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::where('user_id', $request->user()->id)->firstOrFail();

        $log = LogMagang::where('mahasiswa_id', $mahasiswa->id)
            ->with('lowongan')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $log,
        ]);
    }

    // Mahasiswa: edit log
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::where('user_id', $request->user()->id)->firstOrFail();

        $log = LogMagang::where('mahasiswa_id', $mahasiswa->id)->findOrFail($id);

        $request->validate([
            'tanggal'    => 'sometimes|date',
            'kegiatan'   => 'sometimes|string|min:5',
            'keterangan' => 'nullable|string',
        ]);

        $log->update($request->only(['tanggal', 'kegiatan', 'keterangan']));

        return response()->json([
            'success' => true,
            'message' => 'Log magang berhasil diperbarui',
            'data'    => $log,
        ]);
    }

    // Mahasiswa: hapus log
    public function destroy(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::where('user_id', $request->user()->id)->firstOrFail();

        $log = LogMagang::where('mahasiswa_id', $mahasiswa->id)->findOrFail($id);
        $log->delete();

        return response()->json([
            'success' => true,
            'message' => 'Log magang berhasil dihapus',
        ]);
    }

    // Mitra: lihat semua log dari semua mahasiswa
    public function indexMitra(Request $request)
    {
        $query = LogMagang::with(['mahasiswa.user', 'lowongan'])
            ->orderBy('tanggal', 'desc');

        // Filter opsional per mahasiswa
        if ($request->has('mahasiswa_id')) {
            $query->where('mahasiswa_id', $request->mahasiswa_id);
        }

        $logs = $query->get();

        return response()->json([
            'success' => true,
            'total'   => $logs->count(),
            'data'    => $logs,
        ]);
    }
}
