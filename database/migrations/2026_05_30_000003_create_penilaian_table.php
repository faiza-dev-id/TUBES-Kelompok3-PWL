<?php
// ╔══════════════════════════════════════════════════════════════════════╗
// ║  2026_05_30_000003_create_penilaian_table.php                       ║
// ╚══════════════════════════════════════════════════════════════════════╝

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('lamaran_id')->constrained('lamaran')->cascadeOnDelete();
            $table->foreignId('penilai_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('jenis_penilaian', ['tengah', 'akhir'])->default('akhir');
            $table->decimal('nilai_kedisiplinan', 5, 2)->nullable();
            $table->decimal('nilai_komunikasi',   5, 2)->nullable();
            $table->decimal('nilai_teknis',       5, 2)->nullable();
            $table->decimal('nilai_inisiatif',    5, 2)->nullable();
            $table->decimal('nilai_kerjasama',    5, 2)->nullable();
            $table->decimal('nilai_akhir',        5, 2)->nullable();
            $table->text('catatan')->nullable();
            $table->string('periode')->nullable(); // cth: "Mei–Jul 2026"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
