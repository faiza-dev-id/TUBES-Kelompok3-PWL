<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
{
    if (Auth::check()) {
        return redirect('/');
    }

    return view('auth.register');
}

    public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ], [
        'name.required' => 'Nama wajib diisi.',
        'name.min' => 'Nama minimal 3 karakter.',

        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',

        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 8 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    Auth::login($user);

    return redirect('/');
}

    public function showLogin()
{
    if (Auth::check()) {
        return redirect('/');
    }

    return view('auth.login');
}

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect('/');
    }

    return back()->with('error', 'Email atau password salah.');
}

   public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
}
}