<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LamaranController extends Controller
{
    // ============================================================
    // [MAHASISWA] Melamar lowongan magang
    // POST /api/lamaran
    // ============================================================
    public function store(Request $request): JsonResponse
    {
        // Validasi input
        $request->validate([
            'lowongan_id'         => 'required|exists:lowongans,id',
            'cv_path'             => 'nullable|file|mimes:pdf|max:2048',
            'surat_lamaran_path'  => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $mahasiswa = Auth::user();

        // Pastikan user adalah mahasiswa
        if ($mahasiswa->role !== 'mahasiswa') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya mahasiswa yang dapat melamar.',
            ], 403);
        }

        // Cek apakah mahasiswa sudah pernah melamar lowongan yang sama
        $sudahMelamar = Lamaran::where('mahasiswa_id', $mahasiswa->id)
                                ->where('lowongan_id', $request->lowongan_id)
                                ->exists();

        if ($sudahMelamar) {
            return response()->json([
                'success' => false,
                'message' => 'Kamu sudah pernah melamar lowongan ini.',
            ], 409);
        }

        // Cek apakah lowongan masih tersedia/aktif
        $lowongan = Lowongan::findOrFail($request->lowongan_id);
        if ($lowongan->status !== 'aktif') {
            return response()->json([
                'success' => false,
                'message' => 'Lowongan ini sudah tidak tersedia.',
            ], 400);
        }

        // Upload CV jika ada
        $cvPath = null;
        if ($request->hasFile('cv_path')) {
            $cvPath = $request->file('cv_path')
                              ->store("lamaran/{$mahasiswa->id}/cv", 'public');
        }

        // Upload surat lamaran jika ada
        $suratPath = null;
        if ($request->hasFile('surat_lamaran_path')) {
            $suratPath = $request->file('surat_lamaran_path')
                                 ->store("lamaran/{$mahasiswa->id}/surat", 'public');
        }

        // Simpan lamaran ke database
        $lamaran = Lamaran::create([
            'mahasiswa_id'        => $mahasiswa->id,
            'lowongan_id'         => $request->lowongan_id,
            'status'              => Lamaran::STATUS_PENDING,
            'cv_path'             => $cvPath,
            'surat_lamaran_path'  => $suratPath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Lamaran berhasil dikirim! Status: Pending.',
            'data'    => $lamaran->load('lowongan'),
        ], 201);
    }

    // ============================================================
    // [MAHASISWA] Melihat semua lamaran miliknya + status
    // GET /api/lamaran/saya
    // ============================================================
    public function riwayatSaya(): JsonResponse
    {
        $mahasiswa = Auth::user();

        $lamarans = Lamaran::where('mahasiswa_id', $mahasiswa->id)
                           ->with(['lowongan.mitra']) // eager load relasi
                           ->latest()
                           ->get()
                           ->map(function ($lamaran) {
                               return [
                                   'id'             => $lamaran->id,
                                   'lowongan'       => $lamaran->lowongan->judul ?? '-',
                                   'mitra'          => $lamaran->lowongan->mitra->name ?? '-',
                                   'status'         => $lamaran->status,
                                   'label_status'   => $lamaran->label_status,
                                   'catatan_mitra'  => $lamaran->catatan_mitra,
                                   'tanggal_lamar'  => $lamaran->created_at->format('d M Y'),
                                   'diproses_pada'  => $lamaran->diproses_pada
                                                       ? $lamaran->diproses_pada->format('d M Y')
                                                       : null,
                               ];
                           });

        return response()->json([
            'success' => true,
            'message' => 'Riwayat lamaran kamu.',
            'total'   => $lamarans->count(),
            'data'    => $lamarans,
        ]);
    }

    // ============================================================
    // [MAHASISWA] Detail satu lamaran miliknya
    // GET /api/lamaran/{id}
    // ============================================================
    public function show($id): JsonResponse
    {
        $mahasiswa = Auth::user();

        $lamaran = Lamaran::where('id', $id)
                          ->where('mahasiswa_id', $mahasiswa->id)
                          ->with('lowongan.mitra')
                          ->firstOrFail();

        return response()->json([
            'success' => true,
            'data'    => $lamaran,
        ]);
    }

    // ============================================================
    // [MITRA] Melihat semua pelamar pada lowongan miliknya
    // GET /api/mitra/lamaran?lowongan_id=1&status=pending
    // ============================================================
    public function daftarPelamar(Request $request): JsonResponse
    {
        $mitra = Auth::user();

        // Pastikan user adalah mitra
        if ($mitra->role !== 'mitra') {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak. Hanya mitra yang dapat melihat pelamar.',
            ], 403);
        }

        $query = Lamaran::whereHas('lowongan', function ($q) use ($mitra) {
                            $q->where('mitra_id', $mitra->id);
                         })
                         ->with(['mahasiswa', 'lowongan']);

        // Filter berdasarkan lowongan tertentu (opsional)
        if ($request->has('lowongan_id')) {
            $query->where('lowongan_id', $request->lowongan_id);
        }

        // Filter berdasarkan status (opsional)
        if ($request->has('status')) {
            $request->validate([
                'status' => Rule::in(['pending', 'diterima', 'ditolak']),
            ]);
            $query->where('status', $request->status);
        }

        $pelamars = $query->latest()->get()->map(function ($lamaran) {
            return [
                'lamaran_id'    => $lamaran->id,
                'mahasiswa'     => [
                    'id'    => $lamaran->mahasiswa->id,
                    'nama'  => $lamaran->mahasiswa->name,
                    'email' => $lamaran->mahasiswa->email,
                ],
                'lowongan'      => $lamaran->lowongan->judul ?? '-',
                'status'        => $lamaran->status,
                'label_status'  => $lamaran->label_status,
                'cv'            => $lamaran->cv_path
                                   ? asset('storage/' . $lamaran->cv_path)
                                   : null,
                'surat_lamaran' => $lamaran->surat_lamaran_path
                                   ? asset('storage/' . $lamaran->surat_lamaran_path)
                                   : null,
                'tanggal_lamar' => $lamaran->created_at->format('d M Y'),
            ];
        });

        return response()->json([
            'success' => true,
            'total'   => $pelamars->count(),
            'data'    => $pelamars,
        ]);
    }

    // ============================================================
    // [MITRA] Menerima pelamar
    // PATCH /api/mitra/lamaran/{id}/terima
    // ============================================================
    public function terima(Request $request, $id): JsonResponse
    {
        $mitra = Auth::user();

        if ($mitra->role !== 'mitra') {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak.',
            ], 403);
        }

        $lamaran = Lamaran::whereHas('lowongan', function ($q) use ($mitra) {
                              $q->where('mitra_id', $mitra->id);
                           })
                          ->where('id', $id)
                          ->firstOrFail();

        // Cegah update jika sudah diproses
        if ($lamaran->status !== Lamaran::STATUS_PENDING) {
            return response()->json([
                'success' => false,
                'message' => "Lamaran ini sudah diproses dengan status: {$lamaran->status}.",
            ], 400);
        }

        $lamaran->update([
            'status'        => Lamaran::STATUS_DITERIMA,
            'catatan_mitra' => $request->catatan_mitra ?? null,
            'diproses_pada' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pelamar berhasil diterima! ✅',
            'data'    => $lamaran->fresh(),
        ]);
    }

    // ============================================================
    // [MITRA] Menolak pelamar
    // PATCH /api/mitra/lamaran/{id}/tolak
    // ============================================================
    public function tolak(Request $request, $id): JsonResponse
    {
        $mitra = Auth::user();

        if ($mitra->role !== 'mitra') {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak.',
            ], 403);
        }

        $lamaran = Lamaran::whereHas('lowongan', function ($q) use ($mitra) {
                              $q->where('mitra_id', $mitra->id);
                           })
                          ->where('id', $id)
                          ->firstOrFail();

        // Cegah update jika sudah diproses
        if ($lamaran->status !== Lamaran::STATUS_PENDING) {
            return response()->json([
                'success' => false,
                'message' => "Lamaran ini sudah diproses dengan status: {$lamaran->status}.",
            ], 400);
        }

        // Wajib ada catatan alasan penolakan
        $request->validate([
            'catatan_mitra' => 'nullable|string|max:500',
        ]);

        $lamaran->update([
            'status'        => Lamaran::STATUS_DITOLAK,
            'catatan_mitra' => $request->catatan_mitra ?? 'Tidak memenuhi kualifikasi.',
            'diproses_pada' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pelamar telah ditolak. ❌',
            'data'    => $lamaran->fresh(),
        ]);
    }

    // ============================================================
    // [MAHASISWA] Membatalkan lamaran (hanya jika masih pending)
    // DELETE /api/lamaran/{id}
    // ============================================================
    public function destroy($id): JsonResponse
    {
        $mahasiswa = Auth::user();

        $lamaran = Lamaran::where('id', $id)
                          ->where('mahasiswa_id', $mahasiswa->id)
                          ->firstOrFail();

        if ($lamaran->status !== Lamaran::STATUS_PENDING) {
            return response()->json([
                'success' => false,
                'message' => 'Lamaran tidak bisa dibatalkan karena sudah diproses.',
            ], 400);
        }

        // Hapus file dokumen jika ada
        if ($lamaran->cv_path) {
            Storage::disk('public')->delete($lamaran->cv_path);
        }
        if ($lamaran->surat_lamaran_path) {
            Storage::disk('public')->delete($lamaran->surat_lamaran_path);
        }

        $lamaran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lamaran berhasil dibatalkan.',
        ]);
    }
}