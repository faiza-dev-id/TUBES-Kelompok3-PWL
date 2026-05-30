<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganBrowseController extends Controller
{
    /**
     * Tampilkan daftar lowongan yang tersedia untuk mahasiswa.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // Cek apakah sedang magang aktif
        $lamaranDiterima = Lamaran::where('mahasiswa_id', $user->id)
            ->where('status', Lamaran::STATUS_DITERIMA)
            ->with('lowongan.mitra')
            ->latest()->first();
        $sedangMagang = $lamaranDiterima !== null;

        // ID lowongan yang sudah dilamar
        $sudahDilamar = Lamaran::where('mahasiswa_id', $user->id)
            ->pluck('lowongan_id')
            ->toArray();

        // Query lowongan aktif
        $query = Lowongan::where('status', 'aktif')->with('mitra');

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('judul_lowongan', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
            });
        }

        $lowongans = $query->latest()->get();

        return view('lowongan.browse', compact(
            'user',
            'lowongans',
            'sedangMagang',
            'lamaranDiterima',
            'sudahDilamar'
        ));
    }

    /**
     * Detail satu lowongan.
     */
    public function show($id)
    {
        $user    = Auth::user();
        $lowongan = Lowongan::with('mitra')->findOrFail($id);

        $sudahMelamar = Lamaran::where('mahasiswa_id', $user->id)
            ->where('lowongan_id', $id)->exists();

        $sedangMagang = Lamaran::where('mahasiswa_id', $user->id)
            ->where('status', 'diterima')->exists();

        return view('lowongan.show', compact('user', 'lowongan', 'sudahMelamar', 'sedangMagang'));
    }
}
