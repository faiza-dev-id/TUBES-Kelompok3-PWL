<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

/**
 * Controller untuk mitra mengelola mahasiswa yang sedang magang.
 * Fitur utama: menghapus mahasiswa dari program magang dengan menyertakan alasan.
 * Alasan ini akan bisa dilihat oleh Kaprodi.
 */
class MitraMahasiswaController extends Controller
{
    /**
     * Daftar mahasiswa yang sedang aktif magang di mitra ini.
     */
    public function index()
    {
        $user  = Auth::user();
        $mitra = $user->mitra;

        if (!$mitra) {
            abort(403, 'Akses ditolak.');
        }

        // Ambil semua lamaran berstatus 'diterima' (aktif magang) dan 'dihapus_mitra'
        $mahasiswaMagang = Lamaran::whereHas('lowongan', fn($q) => $q->where('mitra_id', $mitra->id))
            ->whereIn('status', ['diterima', 'dihapus_mitra'])
            ->with(['mahasiswa.mahasiswa', 'lowongan'])
            ->latest('diproses_pada')
            ->get();

        return view('mitra.mahasiswa_magang', compact('mitra', 'mahasiswaMagang'));
    }

    /**
     * Hapus mahasiswa dari program magang.
     * Alasan wajib diisi dan akan tersimpan untuk dilihat Kaprodi.
     */
    public function hapus(Request $request, $lamaranId)
    {
        $user  = Auth::user();
        $mitra = $user->mitra;

        if (!$mitra) {
            abort(403, 'Akses ditolak.');
        }

        $lamaran = Lamaran::whereHas('lowongan', fn($q) => $q->where('mitra_id', $mitra->id))
            ->where('status', 'diterima')
            ->findOrFail($lamaranId);

        $request->validate([
            'alasan_hapus_kategori' => 'required|string|max:100',
            'alasan_hapus_detail'   => 'required|string|min:10|max:1000',
        ], [
            'alasan_hapus_kategori.required' => 'Kategori alasan wajib dipilih.',
            'alasan_hapus_detail.required'   => 'Keterangan detail wajib diisi.',
            'alasan_hapus_detail.min'        => 'Keterangan detail minimal 10 karakter.',
        ]);

        $lamaran->update([
            'status'                => 'dihapus_mitra',
            'alasan_hapus_kategori' => $request->alasan_hapus_kategori,
            'alasan_hapus_detail'   => $request->alasan_hapus_detail,
            'dihapus_pada'          => Carbon::now(),
        ]);

        return back()->with('success',
            "Mahasiswa {$lamaran->mahasiswa->name} telah dikeluarkan dari program magang. Alasan telah dicatat."
        );
    }
}
