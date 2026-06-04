<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LamaranMahasiswaController extends Controller
{
    /**
     * Tampilkan halaman "Lamaran Saya".
     */
    public function index()
    {
        $user = Auth::user();

        $lamarans = Lamaran::where('mahasiswa_id', $user->id)
            ->with(['lowongan.mitra'])
            ->latest()
            ->get();

        $stats = [
            'total'    => $lamarans->count(),
            'pending'  => $lamarans->where('status', 'pending')->count(),
            'diterima' => $lamarans->where('status', 'diterima')->count(),
            'ditolak'  => $lamarans->where('status', 'ditolak')->count(),
        ];

        return view('lamaran.index', compact('user', 'lamarans', 'stats'));
    }

    /**
     * Kirim lamaran baru.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'lowongan_id'        => 'required|exists:lowongan,id',
            'cv_path'            => 'nullable|file|mimes:pdf|max:2048',
            'surat_lamaran_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Cek apakah sudah magang aktif
        $sedangMagang = Lamaran::where('mahasiswa_id', $user->id)
            ->where('status', 'diterima')->exists();

        if ($sedangMagang) {
            return back()->with('error', 'Kamu sudah memiliki magang aktif. Tidak bisa melamar lagi.');
        }

        // Cek duplikasi
        $sudahMelamar = Lamaran::where('mahasiswa_id', $user->id)
            ->where('lowongan_id', $request->lowongan_id)->exists();

        if ($sudahMelamar) {
            return back()->with('error', 'Kamu sudah pernah melamar lowongan ini.');
        }

        $lowongan = Lowongan::findOrFail($request->lowongan_id);
        if ($lowongan->status !== 'aktif') {
            return back()->with('error', 'Lowongan ini sudah tidak tersedia.');
        }

        $cvPath    = null;
        $suratPath = null;

        if ($request->hasFile('cv_path')) {
            $cvPath = $request->file('cv_path')
                ->store("lamaran/{$user->id}/cv", 'public');
        }
        if ($request->hasFile('surat_lamaran_path')) {
            $suratPath = $request->file('surat_lamaran_path')
                ->store("lamaran/{$user->id}/surat", 'public');
        }

        Lamaran::create([
            'mahasiswa_id'       => $user->id,
            'lowongan_id'        => $request->lowongan_id,
            'status'             => 'pending',
            'cv_path'            => $cvPath,
            'surat_lamaran_path' => $suratPath,
        ]);

        return redirect()->route('lamaran.saya')
            ->with('success', 'Lamaran berhasil dikirim!');
    }

    /**
     * Batalkan lamaran (hanya jika masih pending).
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $lamaran = Lamaran::where('id', $id)
            ->where('mahasiswa_id', $user->id)
            ->firstOrFail();

        if ($lamaran->status !== 'pending') {
            return back()->with('error', 'Lamaran tidak bisa dibatalkan karena sudah diproses.');
        }

        if ($lamaran->cv_path) {
            Storage::disk('public')->delete($lamaran->cv_path);
        }
        if ($lamaran->surat_lamaran_path) {
            Storage::disk('public')->delete($lamaran->surat_lamaran_path);
        }

        $lamaran->delete();

        return back()->with('success', 'Lamaran berhasil dibatalkan.');
    }
}
