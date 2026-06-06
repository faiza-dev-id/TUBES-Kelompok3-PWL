<?php

namespace App\Http\Controllers;

use App\Models\LaporanKegiatan;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanKegiatanController extends Controller
{
    /**
     * Tampilkan halaman laporan kegiatan mahasiswa.
     */
    public function index()
    {
        $user = Auth::user();

        $lamaranDiterima = Lamaran::where('mahasiswa_id', $user->id)
            ->where('status', Lamaran::STATUS_DITERIMA)
            ->with('lowongan.mitra')
            ->latest()
            ->first();

        if (!$lamaranDiterima) {
            return redirect()->route('dashboard')
                ->with('error', 'Kamu belum memiliki magang aktif.');
        }

        $laporan = LaporanKegiatan::where('mahasiswa_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Hitung hari tersisa sebelum deadline
        $mulai = $lamaranDiterima->diproses_pada ?? $lamaranDiterima->created_at;
        $deadline = \Carbon\Carbon::parse($mulai)->addWeeks(16);
        $hariTersisa = max(0, now()->lte($deadline) ? (int) now()->diffInDays($deadline) : 0);

        $docSelesai = $laporan->where('status', 'diterima')->count();
        $docTotal   = 4; // laporan mingguan, tengah, akhir, presentasi
        $sedangMagang = true; // Sudah pasti magang aktif

        return view('laporan.index', compact(
            'user',
            'lamaranDiterima',
            'laporan',
            'hariTersisa',
            'deadline',
            'docSelesai',
            'docTotal',
            'sedangMagang'
        ));
    }

    /**
     * Upload laporan baru.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'jenis_laporan' => 'required|in:mingguan,tengah,akhir,presentasi,lainnya',
            'file_laporan'  => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
            'keterangan'    => 'nullable|string|max:500',
        ]);

        $lamaranDiterima = Lamaran::where('mahasiswa_id', $user->id)
            ->where('status', Lamaran::STATUS_DITERIMA)
            ->first();

        if (!$lamaranDiterima) {
            return back()->with('error', 'Kamu belum memiliki magang aktif.');
        }

        $filePath = $request->file('file_laporan')
            ->store("laporan/{$user->id}", 'public');

        LaporanKegiatan::create([
            'mahasiswa_id'  => $user->id,
            'lamaran_id'    => $lamaranDiterima->id,
            'judul_laporan' => $request->judul_laporan,
            'jenis_laporan' => $request->jenis_laporan,
            'file_path'     => $filePath,
            'keterangan'    => $request->keterangan,
            'status'        => 'dikirim',
        ]);

        return back()->with('success', 'Laporan berhasil diunggah!');
    }

    /**
     * Download file laporan.
     */
    public function download($id)
    {
        $user = Auth::user();

        $laporan = LaporanKegiatan::where('id', $id)
            ->where('mahasiswa_id', $user->id)
            ->firstOrFail();

       $path = storage_path('app/public/' . $laporan->file_path);
$ext  = pathinfo($laporan->file_path, PATHINFO_EXTENSION);
return response()->download($path, $laporan->judul_laporan . '.' . $ext);
    }

    /**
     * Hapus laporan (hanya jika status 'dikirim').
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $laporan = LaporanKegiatan::where('id', $id)
            ->where('mahasiswa_id', $user->id)
            ->firstOrFail();

        if ($laporan->status === 'diterima') {
            return back()->with('error', 'Laporan yang sudah diterima tidak dapat dihapus.');
        }

        Storage::disk('public')->delete($laporan->file_path);
        $laporan->delete();

        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}