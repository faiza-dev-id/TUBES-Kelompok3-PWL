<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'laporan_kegiatan';

    protected $fillable = [
        'mahasiswa_id',
        'lamaran_id',
        'judul_laporan',
        'jenis_laporan',
        'file_path',
        'keterangan',
        'status',
        'catatan_reviewer',
    ];

    const JENIS = ['mingguan', 'tengah', 'akhir', 'presentasi', 'lainnya'];
    const STATUS_DIKIRIM  = 'dikirim';
    const STATUS_DITERIMA = 'diterima';
    const STATUS_REVISI   = 'revisi';

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function lamaran()
    {
        return $this->belongsTo(Lamaran::class, 'lamaran_id');
    }
}
