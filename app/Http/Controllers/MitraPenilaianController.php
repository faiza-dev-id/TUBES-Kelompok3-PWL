<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraPenilaianController extends Controller
{
    public function index()
    {
        $mitra = Auth::user()->mitra;

        // Semua mahasiswa aktif magang di mitra ini
        $mahasiswaAktif = Lamaran::where('status', 'diterima')
            ->whereHas('lowongan', fn($q) => $q->where('mitra_id', $mitra->id))
            ->with(['mahasiswa', 'lowongan', 'penilaian'])
            ->get();

        return view('mitra.penilaian', compact('mitra', 'mahasiswaAktif'));
    }

    public function store(Request $request)
    {
        $mitra = Auth::user()->mitra;

        $request->validate([
            'lamaran_id'         => 'required|exists:lamaran,id',
            'jenis_penilaian'    => 'required|in:tengah,akhir',
            'nilai_kedisiplinan' => 'required|numeric|min:0|max:100',
            'nilai_komunikasi'   => 'required|numeric|min:0|max:100',
            'nilai_teknis'       => 'required|numeric|min:0|max:100',
            'nilai_inisiatif'    => 'required|numeric|min:0|max:100',
            'nilai_kerjasama'    => 'required|numeric|min:0|max:100',
            'catatan'            => 'nullable|string|max:1000',
            'periode'            => 'nullable|string|max:100',
        ]);

        // Pastikan lamaran milik mitra ini
        $lamaran = Lamaran::whereHas('lowongan', fn($q) => $q->where('mitra_id', $mitra->id))
            ->where('id', $request->lamaran_id)
            ->firstOrFail();

        // Hitung nilai akhir rata-rata
        $nilaiAkhir = round((
            $request->nilai_kedisiplinan +
            $request->nilai_komunikasi   +
            $request->nilai_teknis       +
            $request->nilai_inisiatif    +
            $request->nilai_kerjasama
        ) / 5, 2);

        // Update jika sudah ada untuk jenis yang sama, atau buat baru
        Penilaian::updateOrCreate(
            [
                'mahasiswa_id'    => $lamaran->mahasiswa_id,
                'lamaran_id'      => $lamaran->id,
                'jenis_penilaian' => $request->jenis_penilaian,
            ],
            [
                'penilai_id'         => Auth::id(),
                'nilai_kedisiplinan' => $request->nilai_kedisiplinan,
                'nilai_komunikasi'   => $request->nilai_komunikasi,
                'nilai_teknis'       => $request->nilai_teknis,
                'nilai_inisiatif'    => $request->nilai_inisiatif,
                'nilai_kerjasama'    => $request->nilai_kerjasama,
                'nilai_akhir'        => $nilaiAkhir,
                'catatan'            => $request->catatan,
                'periode'            => $request->periode,
            ]
        );

        return back()->with('success', 'Penilaian berhasil disimpan!');
    }
}
