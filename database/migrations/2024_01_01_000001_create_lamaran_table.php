<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mahasiswa_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('lowongan_id')
                  ->constrained('lowongan')
                  ->onDelete('cascade');

            $table->enum('status', ['pending', 'diterima', 'ditolak'])
                  ->default('pending');

            $table->text('catatan_mitra')->nullable();

            $table->string('cv_path')->nullable();
            $table->string('surat_lamaran_path')->nullable();

            $table->timestamp('diproses_pada')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};