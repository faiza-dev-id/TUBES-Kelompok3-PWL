<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $table = 'lamaran';

    protected $fillable = [
        'mahasiswa_id',
        'lowongan_id',
        'status',
        'catatan_mitra',
        'cv_path',
        'surat_lamaran_path',
        'diproses_pada',
    ];

    protected $casts = [
        'diproses_pada' => 'datetime',
    ];

    const STATUS_PENDING  = 'pending';
    const STATUS_DITERIMA = 'diterima';
    const STATUS_DITOLAK  = 'ditolak';

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }

    public function logKegiatan()
    {
        return $this->hasMany(LogKegiatan::class, 'lamaran_id');
    }

    public function laporanKegiatan()
    {
        return $this->hasMany(LaporanKegiatan::class, 'lamaran_id');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'lamaran_id');
    }
}
