<?php
// ╔══════════════════════════════════════════════════════════════════════╗
// ║  2026_05_30_000002_create_laporan_kegiatan_table.php                ║
// ╚══════════════════════════════════════════════════════════════════════╝

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laporan_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('lamaran_id')->constrained('lamaran')->cascadeOnDelete();
            $table->string('judul_laporan');
            $table->enum('jenis_laporan', ['mingguan', 'tengah', 'akhir', 'presentasi', 'lainnya']);
            $table->string('file_path');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['dikirim', 'diterima', 'revisi'])->default('dikirim');
            $table->text('catatan_reviewer')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_kegiatan');
    }
};
