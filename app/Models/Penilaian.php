<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'mahasiswa_id',
        'lamaran_id',
        'penilai_id',
        'jenis_penilaian',
        'nilai_kedisiplinan',
        'nilai_komunikasi',
        'nilai_teknis',
        'nilai_inisiatif',
        'nilai_kerjasama',
        'nilai_akhir',
        'catatan',
        'periode',
    ];

    protected $casts = [
        'nilai_kedisiplinan' => 'float',
        'nilai_komunikasi'   => 'float',
        'nilai_teknis'       => 'float',
        'nilai_inisiatif'    => 'float',
        'nilai_kerjasama'    => 'float',
        'nilai_akhir'        => 'float',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function lamaran()
    {
        return $this->belongsTo(Lamaran::class, 'lamaran_id');
    }

    public function penilai()
    {
        return $this->belongsTo(User::class, 'penilai_id');
    }

    /**
     * Hitung rata-rata dari semua komponen nilai.
     */
    public function getNilaiRataRataAttribute(): float
    {
        $komponen = array_filter([
            $this->nilai_kedisiplinan,
            $this->nilai_komunikasi,
            $this->nilai_teknis,
            $this->nilai_inisiatif,
            $this->nilai_kerjasama,
        ]);
        return count($komponen) ? round(array_sum($komponen) / count($komponen), 1) : 0;
    }

    /**
     * Konversi nilai akhir ke huruf (A/B/C/D/E).
     */
    public function getGradeAttribute(): string
    {
        $n = $this->nilai_akhir ?? $this->nilai_rata_rata;
        return match (true) {
            $n >= 85 => 'A',
            $n >= 75 => 'B',
            $n >= 65 => 'C',
            $n >= 55 => 'D',
            default  => 'E',
        };
    }
}
