<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KaprodiAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Kaprodi DAN Sekprodi bisa masuk portal ini
        if (!Auth::user()->isKaprodiOrSekprodi()) {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk Kaprodi / Sekprodi.');
        }

        return $next($request);
    }
}
