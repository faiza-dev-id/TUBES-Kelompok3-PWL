<?php
// ╔══════════════════════════════════════════════════════════════════════╗
// ║  2026_05_30_000001_create_log_kegiatan_table.php                    ║
// ╚══════════════════════════════════════════════════════════════════════╝

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('log_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('lamaran_id')->constrained('lamaran')->cascadeOnDelete();
            $table->string('judul_kegiatan');
            $table->date('tanggal');
            $table->unsignedTinyInteger('minggu_ke');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('lokasi')->nullable();
            $table->text('deskripsi');
            $table->string('kategori')->nullable();
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->text('catatan_pembimbing')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_kegiatan');
    }
};
