<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ─────────────────────────────────────────────
    // Tampilkan form registrasi biodata mahasiswa
    // ─────────────────────────────────────────────
    public function showRegister()
    {
       return view('auth.register');
    }

    // ─────────────────────────────────────────────
    // Proses registrasi + simpan biodata mahasiswa
    // ─────────────────────────────────────────────
    public function register(Request $request)
    {
        $request->validate([
            // data akun
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:8|confirmed',

            // biodata mahasiswa
            'nim'                   => 'required|string|unique:mahasiswa,nim',
            'jurusan'               => 'required|string|max:100',
            'semester'              => 'required|integer|min:1|max:14',
        ], [
            // pesan error dalam Bahasa Indonesia
            'name.required'         => 'Nama lengkap wajib diisi.',
            'email.required'        => 'Email wajib diisi.',
            'email.unique'          => 'Email sudah terdaftar.',
            'password.required'     => 'Password wajib diisi.',
            'password.min'          => 'Password minimal 8 karakter.',
            'password.confirmed'    => 'Konfirmasi password tidak cocok.',
            'nim.required'          => 'NIM wajib diisi.',
            'nim.unique'            => 'NIM sudah terdaftar.',
            'jurusan.required'      => 'Jurusan wajib diisi.',
            'semester.required'     => 'Semester wajib dipilih.',
            'semester.min'          => 'Semester tidak valid.',
            'semester.max'          => 'Semester tidak valid.',
        ]);

        // 1. Buat akun User
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'mahasiswa',   // sesuaikan jika kolom role ada
        ]);

        // 2. Simpan biodata Mahasiswa
        Mahasiswa::create([
            'user_id'  => $user->id,
            'nim'      => $request->nim,
            'jurusan'  => $request->jurusan,
            'semester' => $request->semester,
        ]);

        // 3. Login otomatis
        Auth::login($user);

        return redirect()->route('mahasiswa.index')
        ->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name . '.');
    }

    // ─────────────────────────────────────────────
    // Login
    // ─────────────────────────────────────────────
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('mahasiswa.profile'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // ─────────────────────────────────────────────
    // Logout
    // ─────────────────────────────────────────────
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
