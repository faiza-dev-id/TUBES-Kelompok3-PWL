<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogMagang extends Model
{
    use HasFactory;

    protected $table = 'log_magang';

    protected $fillable = [
        'mahasiswa_id',
        'lowongan_id',
        'tanggal',
        'kegiatan',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
