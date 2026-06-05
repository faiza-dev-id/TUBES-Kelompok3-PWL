<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('fakultas')->nullable()->after('jurusan');
            $table->string('no_hp', 20)->nullable()->after('fakultas');
            $table->string('foto_profil')->nullable()->after('no_hp');
        });
    }

    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn(['fakultas', 'no_hp', 'foto_profil']);
        });
    }
};
