<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /** Daftar semua user */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(fn($q2) => $q2->where('name', 'like', "%$q%")
                ->orWhere('email', 'like', "%$q%"));
        }

        $users = $query->latest()->paginate(20)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    /** Form tambah user */
    public function create()
    {
        return view('admin.users.create');
    }

    /** Simpan user baru (oleh admin, bisa set role apapun) */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|min:3|max:100',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required|in:mahasiswa,mitra,admin,kaprodi,sekprodi',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'role'     => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    /** Form edit user */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /** Update data user */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => 'required|min:3|max:100',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required|in:mahasiswa,mitra,admin,kaprodi,sekprodi',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name  = $validated['name'];
        $user->email = $validated['email'];
        $user->role  = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    /** Hapus user */
    public function destroy(User $user)
    {
        // Cegah admin menghapus dirinya sendiri
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}
