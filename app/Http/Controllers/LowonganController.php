<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Mitra;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::with('mitra')->latest()->get();
        return view('lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        $mitras = Mitra::all();
        return view('lowongan.create', compact('mitras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mitra_id'       => 'required',
            'judul_lowongan' => 'required|string|max:255',
            'deskripsi'      => 'required',
            'durasi'         => 'required|string',
            'status'         => 'required|in:aktif,nonaktif',
        ]);

        Lowongan::create($request->all());

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function show(Lowongan $lowongan)
    {
        return view('lowongan.show', compact('lowongan'));
    }

    public function edit(Lowongan $lowongan)
    {
        $mitras = Mitra::all();
        return view('lowongan.edit', compact('lowongan', 'mitras'));
    }

    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'mitra_id'       => 'required',
            'judul_lowongan' => 'required|string|max:255',
            'deskripsi'      => 'required',
            'durasi'         => 'required|string',
            'status'         => 'required|in:aktif,nonaktif',
        ]);

        $lowongan->update($request->all());

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diupdate');
    }

    public function destroy(Lowongan $lowongan)
    {
        $lowongan->delete();
        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus');
    }
}