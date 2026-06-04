<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminMitraController extends Controller
{
    public function index(Request $request)
    {
        $query = Mitra::with('user');

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(fn($q2) => $q2->where('nama_perusahaan', 'like', "%$q%")
                ->orWhere('email', 'like', "%$q%"));
        }

        $mitras = $query->latest()->paginate(15)->withQueryString();

        return view('admin.mitra.index', compact('mitras'));
    }

    public function create()
    {
        return view('admin.mitra.create');
    }

    /**
     * Buat akun User (role=mitra) sekaligus data Mitra.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|min:3|max:100',
            'alamat'          => 'required|min:5|max:255',
            'email'           => 'required|email|unique:mitras,email|unique:users,email',
            'password'        => 'required|min:8|confirmed',
        ]);

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'name'     => $validated['nama_perusahaan'],
                'email'    => $validated['email'],
                'role'     => 'mitra',
                'password' => Hash::make($validated['password']),
            ]);

            Mitra::create([
                'user_id'         => $user->id,
                'nama_perusahaan' => $validated['nama_perusahaan'],
                'alamat'          => $validated['alamat'],
                'email'           => $validated['email'],
            ]);
        });

        return redirect()->route('admin.mitra.index')
            ->with('success', 'Mitra berhasil ditambahkan.');
    }

    public function edit(Mitra $mitra)
    {
        return view('admin.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|min:3|max:100',
            'alamat'          => 'required|min:5|max:255',
            'email'           => 'required|email|unique:mitras,email,' . $mitra->id,
        ]);

        $mitra->update($validated);

        // Sinkronkan nama & email ke tabel users
        if ($mitra->user) {
            $mitra->user->update([
                'name'  => $validated['nama_perusahaan'],
                'email' => $validated['email'],
            ]);
        }

        return redirect()->route('admin.mitra.index')
            ->with('success', 'Data mitra berhasil diperbarui.');
    }

    public function destroy(Mitra $mitra)
    {
        DB::transaction(function () use ($mitra) {
            $mitra->user?->delete(); // cascade: hapus user sekaligus
            $mitra->delete();
        });

        return redirect()->route('admin.mitra.index')
            ->with('success', 'Mitra berhasil dihapus.');
    }
}
