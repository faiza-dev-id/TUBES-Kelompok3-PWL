<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ROLE_MAHASISWA = 'mahasiswa';
    const ROLE_MITRA     = 'mitra';
    const ROLE_ADMIN     = 'admin';
    const ROLE_KAPRODI   = 'kaprodi';
    const ROLE_SEKPRODI  = 'sekprodi';

    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // ── Role helpers ──────────────────────────────────────────────────

    public function isMitra(): bool        { return $this->role === self::ROLE_MITRA; }
    public function isMahasiswa(): bool    { return $this->role === self::ROLE_MAHASISWA; }
    public function isAdmin(): bool        { return $this->role === self::ROLE_ADMIN; }
    public function isKaprodi(): bool      { return $this->role === self::ROLE_KAPRODI; }
    public function isSekprodi(): bool     { return $this->role === self::ROLE_SEKPRODI; }

    public function isKaprodiOrSekprodi(): bool
    {
        return in_array($this->role, [self::ROLE_KAPRODI, self::ROLE_SEKPRODI]);
    }

    public function isStaff(): bool
    {
        return in_array($this->role, [
            self::ROLE_ADMIN,
            self::ROLE_KAPRODI,
            self::ROLE_SEKPRODI,
        ]);
    }

    // ── Relasi ────────────────────────────────────────────────────────

    public function mitra()
    {
        return $this->hasOne(Mitra::class, 'user_id');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'user_id');
    }

    // ✅ Tambahan: relasi lamaran langsung dari users.id ke lamaran.mahasiswa_id
    public function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'mahasiswa_id');
    }
}