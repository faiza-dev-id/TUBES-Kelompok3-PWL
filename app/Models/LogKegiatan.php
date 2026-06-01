<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogKegiatan extends Model
{
    use HasFactory;

    protected $table = 'log_kegiatan';

    protected $fillable = [
        'mahasiswa_id',
        'lamaran_id',
        'judul_kegiatan',
        'tanggal',
        'minggu_ke',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
        'deskripsi',
        'kategori',
        'status',
        'catatan_pembimbing',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    const STATUS_MENUNGGU  = 'menunggu';
    const STATUS_DISETUJUI = 'disetujui';
    const STATUS_DITOLAK   = 'ditolak';

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function lamaran()
    {
        return $this->belongsTo(Lamaran::class, 'lamaran_id');
    }

    public function getLabelStatusAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_MENUNGGU  => 'Menunggu',
            self::STATUS_DISETUJUI => 'Disetujui',
            self::STATUS_DITOLAK   => 'Ditolak',
            default                => 'Tidak Diketahui',
        };
    }
}
