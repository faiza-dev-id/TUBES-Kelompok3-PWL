<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MitraAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Pastikan user punya role mitra
        if ($user->role !== 'mitra') {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk Mitra.');
        }

        // Pastikan data mitra ada di tabel mitras
        if (!$user->mitra) {
            Auth::logout();
            return redirect()->route('login')
                ->with('error', 'Data mitra tidak ditemukan. Hubungi administrator.');
        }

        return $next($request);
    }
}
