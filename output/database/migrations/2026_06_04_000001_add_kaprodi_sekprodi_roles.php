<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Ubah enum role agar mencakup kaprodi & sekprodi.
     * MySQL tidak punya ALTER ENUM yang portable, jadi kita ganti kolom.
     */
    public function up(): void
    {
        // 1. Tambah kolom sementara dengan tipe baru
        Schema::table('users', function (Blueprint $table) {
            $table->string('role_new', 20)->default('mahasiswa')->after('role');
        });

        // 2. Salin data lama
        DB::statement("UPDATE users SET role_new = role");

        // 3. Hapus kolom lama
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        // 4. Rename kolom baru
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('role_new', 'role');
        });

        // 5. Tambah CHECK constraint (opsional, untuk PostgreSQL / MySQL 8.0.16+)
        // Kolom sudah string; validasi dilakukan di layer aplikasi.
    }

    public function down(): void
    {
        // Kembalikan ke enum lama (mahasiswa | mitra | admin)
        Schema::table('users', function (Blueprint $table) {
            $table->string('role_old', 20)->default('mahasiswa')->after('role');
        });

        DB::statement("UPDATE users SET role_old = CASE
            WHEN role IN ('mahasiswa','mitra','admin') THEN role
            ELSE 'mahasiswa'
        END");

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('role_old', 'role');
        });
    }
};
