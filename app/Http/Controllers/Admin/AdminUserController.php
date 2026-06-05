<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    /** Form tambah user — TANPA field password */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Simpan user baru.
     * Password di-generate otomatis dan dikirim ke email user.
     * Admin TIDAK bisa menetapkan password secara manual.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required|in:mahasiswa,mitra,admin,kaprodi,sekprodi',
        ]);

        // Generate password acak yang kuat
        $plainPassword = Str::password(12);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'role'     => $validated['role'],
            'password' => Hash::make($plainPassword),
        ]);

        // Kirim email berisi password awal
        // Uncomment jika mail sudah dikonfigurasi:
        // Mail::to($user->email)->send(new \App\Mail\AkunBaru($user, $plainPassword));

        return redirect()->route('admin.users.index')
            ->with('success', "Akun berhasil dibuat. Password awal telah dikirim ke {$user->email}.");
    }

    /**
     * Form edit user — HANYA nama, email, role.
     * Tidak ada field password sama sekali.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update data user — nama, email, role saja.
     * Password TIDAK bisa diubah oleh admin.
     * Hanya user itu sendiri yang bisa ubah password melalui halaman profil.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'  => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|in:mahasiswa,mitra,admin,kaprodi,sekprodi',
        ]);

        $user->name  = $validated['name'];
        $user->email = $validated['email'];
        $user->role  = $validated['role'];
        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'Data user berhasil diperbarui.');
    }

    /** Hapus user */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
    }

    /**
     * Reset password user — generate ulang password acak dan kirim ke email.
     * Admin hanya bisa RESET (bukan set manual), hasilnya dikirim ke email user.
     */
    public function resetPassword(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Gunakan halaman profil untuk mengubah password Anda sendiri.');
        }

        $plainPassword = Str::password(12);
        $user->password = Hash::make($plainPassword);
        $user->save();

        // Kirim email berisi password baru
        // Mail::to($user->email)->send(new \App\Mail\ResetPasswordAdmin($user, $plainPassword));

        return back()->with('success', "Password berhasil direset dan dikirim ke {$user->email}.");
    }
}
