<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    // List semua mahasiswa (admin)
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

    // Edit data mahasiswa (API)
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim'      => 'sometimes|unique:mahasiswa,nim,' . $id,
            'jurusan'  => 'sometimes|string|max:100',
            'fakultas' => 'sometimes|string|max:100',
            'semester' => 'sometimes|integer|min:1|max:14',
            'no_hp'    => 'sometimes|string|max:20',
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

    // Dashboard mahasiswa (web)
public function dashboard()
{
    $user      = Auth::user();
    $mahasiswa = Mahasiswa::with('user')->where('user_id', $user->id)->first();

    $sedangMagang    = false;
    $statsMagang     = null;
    $lamaranDiterima = null;
    $logTerbaru      = collect();
    $lamarans        = collect();
    $lowonganTerbaru = collect();
    $stats = [
        'total_lamaran' => 0,
        'diterima'      => 0,
    ];

    return view('dashboard', compact(
        'user',
        'mahasiswa',
        'sedangMagang',
        'statsMagang',
        'lamaranDiterima',
        'logTerbaru',
        'lamarans',
        'stats',
        'lowonganTerbaru'
    ));
}
    // ─────────────────────────────────────────────
    // Tampilkan halaman edit profil (web)
    // ─────────────────────────────────────────────
    public function profile()
    {
        $mahasiswa = Mahasiswa::with('user')
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('mahasiswa.edit-profil', compact('mahasiswa'));
    }

    // ─────────────────────────────────────────────
    // Simpan perubahan profil (web)
    // ─────────────────────────────────────────────
    public function updateProfile(Request $request)
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'name'        => 'required|string|max:255',
            'nim'         => 'required|string|unique:mahasiswa,nim,' . $mahasiswa->id,
            'fakultas'    => 'required|string|max:100',
            'jurusan'     => 'required|string|max:100',
            'semester'    => 'required|integer|min:1|max:14',
            'no_hp'       => 'nullable|string|max:20',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'nim.required'      => 'NIM wajib diisi.',
            'nim.unique'        => 'NIM sudah digunakan.',
            'fakultas.required' => 'Fakultas wajib diisi.',
            'jurusan.required'  => 'Program studi wajib diisi.',
            'semester.required' => 'Semester wajib dipilih.',
            'foto_profil.image' => 'File harus berupa gambar.',
            'foto_profil.max'   => 'Ukuran foto maksimal 2MB.',
        ]);

        // Update nama di tabel users
        $mahasiswa->user->update(['name' => $request->name]);

        // Handle upload foto
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama kalau ada
            if ($mahasiswa->foto_profil) {
                Storage::disk('public')->delete($mahasiswa->foto_profil);
            }
            $path = $request->file('foto_profil')->store('foto-profil', 'public');
            $mahasiswa->foto_profil = $path;
        }

        // Update data mahasiswa
        $mahasiswa->nim      = $request->nim;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->jurusan  = $request->jurusan;
        $mahasiswa->semester = $request->semester;
        $mahasiswa->no_hp    = $request->no_hp;
        $mahasiswa->save();

        return redirect()->route('mahasiswa.profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
