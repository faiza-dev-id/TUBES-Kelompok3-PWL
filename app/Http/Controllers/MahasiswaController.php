<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    // List semua mahasiswa (admin) atau profil sendiri (mahasiswa)
    public function index()
    {
        $mahasiswa = Mahasiswa::with('user')->get();
        return response()->json($mahasiswa);
    }

    // Tampilkan profil mahasiswa tertentu
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);
        return response()->json($mahasiswa);
    }

    // Tambah data mahasiswa
    public function store(Request $request)
    {
        $request->validate([
            'user_id'  => 'required|exists:users,id|unique:mahasiswa,user_id',
            'nim'      => 'required|unique:mahasiswa,nim',
            'jurusan'  => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:14',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json($mahasiswa, 201);
    }

    // Edit data mahasiswa
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim'      => 'sometimes|unique:mahasiswa,nim,' . $id,
            'jurusan'  => 'sometimes|string|max:100',
            'semester' => 'sometimes|integer|min:1|max:14',
        ]);

        $mahasiswa->update($request->all());
        return response()->json($mahasiswa);
    }

    // Hapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json(['message' => 'Mahasiswa berhasil dihapus']);
    }

    // Profil mahasiswa yang sedang login
    public function profile()
    {
        $mahasiswa = Mahasiswa::with('user')
            ->where('user_id', Auth::id())
            ->firstOrFail();
        return response()->json($mahasiswa);
    }
}
