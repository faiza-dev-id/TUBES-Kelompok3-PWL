<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    
        if (!Schema::hasTable('log_magang')) {
            Schema::create('log_magang', function (Blueprint $table) {
                $table->id();
                $table->foreignId('mahasiswa_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('lowongan_id')->constrained('lowongan')->onDelete('cascade');
                $table->date('tanggal');
                $table->text('kegiatan');
                $table->text('keterangan')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('log_magang');
    }
};