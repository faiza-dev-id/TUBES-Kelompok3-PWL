<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lamaran', function (Blueprint $table) {
            // Status baru: 'dihapus_mitra' — mahasiswa dikeluarkan oleh mitra
            // Kolom alasan yang diisi mitra saat menghapus mahasiswa
            $table->string('alasan_hapus_kategori')->nullable()->after('catatan_mitra');
            $table->text('alasan_hapus_detail')->nullable()->after('alasan_hapus_kategori');
            $table->timestamp('dihapus_pada')->nullable()->after('alasan_hapus_detail');
        });
    }

    public function down(): void
    {
        Schema::table('lamaran', function (Blueprint $table) {
            $table->dropColumn(['alasan_hapus_kategori', 'alasan_hapus_detail', 'dihapus_pada']);
        });
    }
};
