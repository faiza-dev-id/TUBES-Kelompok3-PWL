<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk enkripsi password

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun Admin
        User::create([
            'name' => 'Admin Magang',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'), // Password di-hash agar aman
            'role' => 'admin', // Menentukan role sebagai admin
        ]);

        // (Opsional) Kamu juga bisa membuat satu akun mahasiswa buat tes nanti
        User::create([
            'name' => 'Mahasiswa Test',
            'email' => 'mahasiswa@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
        ]);
    }
}
