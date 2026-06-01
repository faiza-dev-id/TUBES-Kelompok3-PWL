<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MitraPelamarController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if (!$user || !$user->mitra) {
            abort(403, 'Akses ditolak.');
        }

        $mitra = $user->mitra;

        $lowongans = Lowongan::where('mitra_id', $mitra->id)->get();

        $query = Lamaran::whereHas('lowongan', function ($q) use ($mitra) {
            $q->where('mitra_id', $mitra->id);
        })->with(['mahasiswa', 'lowongan']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('lowongan_id')) {
            $query->where('lowongan_id', $request->lowongan_id);
        }

        $lamarans = $query->latest()->get();

        $stats = [
            'total'    => $lamarans->count(),
            'pending'  => $lamarans->where('status', 'pending')->count(),
            'diterima' => $lamarans->where('status', 'diterima')->count(),
            'ditolak'  => $lamarans->where('status', 'ditolak')->count(),
        ];

        return view('mitra.pelamar', compact(
            'mitra',
            'lamarans',
            'lowongans',
            'stats'
        ));
    }

    public function terima(Request $request, $id)
    {
        $user = Auth::user();

        if (!$user || !$user->mitra) {
            abort(403, 'Akses ditolak.');
        }

        $mitra = $user->mitra;

        $lamaran = Lamaran::whereHas('lowongan', function ($q) use ($mitra) {
            $q->where('mitra_id', $mitra->id);
        })->findOrFail($id);

        $request->validate([
            'catatan_mitra' => 'nullable|string|max:500',
        ]);

        $lamaran->update([
            'status'        => 'diterima',
            'catatan_mitra' => $request->catatan_mitra,
            'diproses_pada' => Carbon::now(),
        ]);

        return back()->with(
            'success',
            'Lamaran berhasil diterima!'
        );
    }

    public function tolak(Request $request, $id)
    {
        $user = Auth::user();

        if (!$user || !$user->mitra) {
            abort(403, 'Akses ditolak.');
        }

        $mitra = $user->mitra;

        $lamaran = Lamaran::whereHas('lowongan', function ($q) use ($mitra) {
            $q->where('mitra_id', $mitra->id);
        })->findOrFail($id);

        $request->validate([
            'catatan_mitra' => 'nullable|string|max:500',
        ]);

        $lamaran->update([
            'status'        => 'ditolak',
            'catatan_mitra' => $request->catatan_mitra,
            'diproses_pada' => Carbon::now(),
        ]);

        return back()->with(
            'success',
            'Lamaran berhasil ditolak.'
        );
    }
}
