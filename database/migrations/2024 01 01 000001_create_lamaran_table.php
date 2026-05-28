<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
 
            // Relasi ke mahasiswa (users dengan role mahasiswa)
            $table->foreignId('mahasiswa_id')
                  ->constrained('users')
                  ->onDelete('cascade');
 
            // Relasi ke lowongan magang yang dibuat oleh mitra
            $table->foreignId('lowongan_id')
                  ->constrained('lowongans')
                  ->onDelete('cascade');
 
            // Status lamaran: pending | diterima | ditolak
            $table->enum('status', ['pending', 'diterima', 'ditolak'])
                  ->default('pending');
 
            // Catatan/alasan dari mitra (opsional, misal alasan ditolak)
            $table->text('catatan_mitra')->nullable();
 
            // Dokumen pendukung lamaran (CV, surat lamaran, dll) - path file
            $table->string('cv_path')->nullable();
            $table->string('surat_lamaran_path')->nullable();
 
            // Tanggal mitra memproses lamaran
            $table->timestamp('diproses_pada')->nullable();
 
            $table->timestamps(); // created_at & updated_at
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamarans');
    }
};