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

    const STATUS_PENDING = 'pending';
    const STATUS_DITERIMA = 'diterima';
    const STATUS_DITOLAK = 'ditolak';

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeDiterima($query)
    {
        return $query->where('status', self::STATUS_DITERIMA);
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', self::STATUS_DITOLAK);
    }

    public function getLabelStatusAttribute(): string
    {
        return match ($tihs->status) {
            self::STATUS_PENDING    =>  '⏳ Pending - Lamaran kamu sedang menunggu ditinjau oleh mitra.',
            self::STATUS_DITERIMA   =>  '✅ Diterima - Selamat! Lamaran kamu telah diterima oleh mitra.',
            self::STATUS_DITOLAK    =>  '❌ Ditolak - Maaf, lamaran kamu belum berhasil kali ini. Tetap semangat!',
            default                 =>  'Tidak Diketahui',
        };
    }
}