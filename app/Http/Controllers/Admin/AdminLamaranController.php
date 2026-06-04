<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lamaran;

class AdminLamaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Lamaran::with(['mahasiswa', 'lowongan.mitra']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $q = $request->search;
            $query->whereHas('mahasiswa', fn($q2) => $q2->where('name', 'like', "%$q%"))
                  ->orWhereHas('lowongan.mitra', fn($q3) => $q3->where('nama_perusahaan', 'like', "%$q%"));
        }

        $lamarans = $query->latest()->paginate(20)->withQueryString();

        $stats = [
            'total'   => Lamaran::count(),
            'pending' => Lamaran::where('status', 'pending')->count(),
            'diterima'=> Lamaran::where('status', 'diterima')->count(),
            'ditolak' => Lamaran::where('status', 'ditolak')->count(),
        ];

        return view('admin.lamaran.index', compact('lamarans', 'stats'));
    }

    public function show(Lamaran $lamaran)
    {
        $lamaran->load(['mahasiswa', 'lowongan.mitra']);
        return view('admin.lamaran.show', compact('lamaran'));
    }
}
