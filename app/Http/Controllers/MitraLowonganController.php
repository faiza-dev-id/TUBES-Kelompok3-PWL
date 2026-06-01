<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraLowonganController extends Controller
{
    public function index()
    {
        $mitra    = Auth::user()->mitra;
        $lowongans = Lowongan::where('mitra_id', $mitra->id)
            ->withCount(['lamarans', 'lamarans as pending_count' => fn($q) => $q->where('status','pending'),
                                     'lamarans as diterima_count' => fn($q) => $q->where('status','diterima')])
            ->latest()->get();

        return view('mitra.lowongan', compact('mitra', 'lowongans'));
    }

    public function store(Request $request)
    {
        $mitra = Auth::user()->mitra;

        $request->validate([
            'judul_lowongan' => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'durasi'         => 'required|string|max:100',
        ]);

        Lowongan::create([
            'mitra_id'       => $mitra->id,
            'judul_lowongan' => $request->judul_lowongan,
            'deskripsi'      => $request->deskripsi,
            'durasi'         => $request->durasi,
            'status'         => 'aktif',
        ]);

        return back()->with('success', 'Lowongan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $mitra   = Auth::user()->mitra;
        $lowongan = Lowongan::where('id', $id)->where('mitra_id', $mitra->id)->firstOrFail();

        $request->validate([
            'judul_lowongan' => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'durasi'         => 'required|string|max:100',
            'status'         => 'required|in:aktif,nonaktif',
        ]);

        $lowongan->update($request->only('judul_lowongan', 'deskripsi', 'durasi', 'status'));

        return back()->with('success', 'Lowongan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mitra   = Auth::user()->mitra;
        $lowongan = Lowongan::where('id', $id)->where('mitra_id', $mitra->id)->firstOrFail();
        $lowongan->delete();

        return back()->with('success', 'Lowongan berhasil dihapus.');
    }
}
