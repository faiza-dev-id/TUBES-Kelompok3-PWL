<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table = 'lowongan';
    
    protected $fillable = [
        'mitra_id',
        'judul_lowongan',
        'deskripsi',
        'durasi',
        'status'
    ];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }
}