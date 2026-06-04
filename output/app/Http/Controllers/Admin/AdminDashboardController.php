<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Lamaran;
use App\Models\Mahasiswa;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_mahasiswa' => User::where('role', 'mahasiswa')->count(),
            'total_mitra'     => Mitra::count(),
            'sedang_magang'   => Lamaran::where('status', 'diterima')->count(),
            'lamaran_pending' => Lamaran::where('status', 'pending')->count(),
        ];

        // Daftar user terbaru
        $usersRecent = User::latest()->take(10)->get();

        // Lamaran terbaru (pending)
        $lamaranPending = Lamaran::where('status', 'pending')
            ->with(['mahasiswa', 'lowongan.mitra'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'usersRecent', 'lamaranPending'));
    }
}
