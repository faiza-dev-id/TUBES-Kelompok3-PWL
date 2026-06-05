<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LogMagang;
use App\Models\User;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nim', 'jurusan', 'fakultas', 'semester', 'no_hp', 'foto_profil'];
        'user_id',
        'nim',
        'jurusan',
        'semester',
        'fakultas',
        'no_hp',
        'foto_profil'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logMagang()
    {
        return $this->hasMany(LogMagang::class);
    }
}
