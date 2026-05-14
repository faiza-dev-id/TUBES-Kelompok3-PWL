<?php

namespace App\Http\Controllers;

use App\Models\Mitra; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MitraController extends Controller
{
    //daftar semua mitra
    public function index()
    {
        $mitras = Mitra::all(); 
        return view('mitra.index', compact('mitras'));
    }

    //form tambah mitra
    public function create()
    {
        return view('mitra.create');
    }

    //penyimpan data ke database
    public function store(Request $request)
    {
        // Validasi input agar tidak kosong atau email salah format
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:mitras',
        ]);

        Mitra::create($request->all());
        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil ditambahkan!');
    }

    //Menghapus data mitra
    public function destroy(Mitra $mitra)
    {
        $mitra->delete();
        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil dihapus!');
    }

    //pengedit data mitra
    public function edit(Mitra $mitra)
    {
        return view('mitra.edit', compact('mitra'));
    }
    
    public function update(Request $request, Mitra $mitra) 
    {
    $request->validate([
        'nama_perusahaan' => 'required',
        'alamat' => 'required',
        'email' => 'required|email',
    ]);
    $mitra->update($request->all());
    return redirect()->route('mitra.index')->with('success', 'Mitra berhasil diupdate!');
    }    
}

