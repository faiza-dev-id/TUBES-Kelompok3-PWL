<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitras';

    protected $fillable = [
        'user_id',
        'nama_perusahaan',
        'alamat',
        'email',
    ];

    // ── Relasi ────────────────────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lowongans()
    {
        return $this->hasMany(Lowongan::class, 'mitra_id');
    }

    public function lowongansAktif()
    {
        return $this->hasMany(Lowongan::class, 'mitra_id')
                    ->where('status', 'aktif');
    }

    // Semua lamaran lewat lowongan milik mitra ini
    public function lamarans()
    {
        return $this->hasManyThrough(
            Lamaran::class,
            Lowongan::class,
            'mitra_id',   // FK di lowongan
            'lowongan_id' // FK di lamaran
        );
    }

    // Mahasiswa yang sedang aktif magang (lamaran diterima)
    public function mahasiswaAktif()
    {
        return $this->lamarans()->where('status', 'diterima');
    }

    // ── Accessor ──────────────────────────────────────────────────────

    /**
     * Alias agar $mitra->name bisa dipakai di blade tanpa error
     */
    public function getNameAttribute(): string
    {
        return $this->nama_perusahaan;
    }

    /**
     * Inisial perusahaan (maks 2 huruf)
     */
    public function getInisialsAttribute(): string
    {
        $words = explode(' ', $this->nama_perusahaan);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        }
        return strtoupper(substr($this->nama_perusahaan, 0, 2));
    }
}
