<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mitra;
use App\Models\Lamaran;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan';

    protected $fillable = [
        'mitra_id',
        'judul_lowongan',
        'deskripsi',
        'durasi',
        'status',
    ];

    const STATUS_AKTIF    = 'aktif';
    const STATUS_NONAKTIF = 'nonaktif';

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function lamarans()
    {
        return $this->hasMany(Lamaran::class, 'lowongan_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('status', self::STATUS_AKTIF);
    }
}
