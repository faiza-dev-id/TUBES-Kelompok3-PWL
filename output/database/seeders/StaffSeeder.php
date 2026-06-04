<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Buat akun default untuk Admin, Kaprodi, dan Sekprodi.
     * Jalankan: php artisan db:seed --class=StaffSeeder
     */
    public function run(): void
    {
        $staff = [
            [
                'name'     => 'Administrator',
                'email'    => 'admin@magang.test',
                'role'     => 'admin',
                'password' => 'admin12345',
            ],
            [
                'name'     => 'Kaprodi',
                'email'    => 'kaprodi@magang.test',
                'role'     => 'kaprodi',
                'password' => 'kaprodi12345',
            ],
            [
                'name'     => 'Sekretaris Prodi',
                'email'    => 'sekprodi@magang.test',
                'role'     => 'sekprodi',
                'password' => 'sekprodi12345',
            ],
        ];

        foreach ($staff as $s) {
            User::updateOrCreate(
                ['email' => $s['email']],
                [
                    'name'     => $s['name'],
                    'role'     => $s['role'],
                    'password' => Hash::make($s['password']),
                ]
            );
        }

        $this->command->info('✅ Akun staff berhasil dibuat:');
        foreach ($staff as $s) {
            $this->command->line("   {$s['role']}: {$s['email']} / {$s['password']}");
        }
    }
}
