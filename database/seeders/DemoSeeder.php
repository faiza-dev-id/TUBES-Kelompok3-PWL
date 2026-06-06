<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Mahasiswa;
use App\Models\Lowongan;
use App\Models\Lamaran;
use App\Models\LogKegiatan;
use App\Models\LaporanKegiatan;
use App\Models\Penilaian;

/**
 * DemoSeeder — Data lengkap untuk presentasi TUBES PWL
 *
 * Jalankan dengan:
 *   php artisan db:seed --class=DemoSeeder
 *
 * Atau fresh dari awal:
 *   php artisan migrate:fresh --seed
 *   (lalu jalankan DemoSeeder secara terpisah jika tidak di DatabaseSeeder)
 *
 * AKUN LOGIN:
 * ┌─────────────┬──────────────────────────┬──────────────────┐
 * │ Role        │ Email                    │ Password         │
 * ├─────────────┼──────────────────────────┼──────────────────┤
 * │ Admin       │ admin@sigma.test         │ admin123         │
 * │ Kaprodi     │ kaprodi@sigma.test       │ kaprodi123       │
 * │ Sekprodi    │ sekprodi@sigma.test      │ sekprodi123      │
 * │ Mitra 1     │ mitra1@sigma.test        │ mitra123         │
 * │ Mitra 2     │ mitra2@sigma.test        │ mitra123         │
 * │ Mitra 3     │ mitra3@sigma.test        │ mitra123         │
 * │ Mahasiswa 1 │ mahasiswa1@sigma.test    │ mahasiswa123     │
 * │ Mahasiswa 2 │ mahasiswa2@sigma.test    │ mahasiswa123     │
 * │ Mahasiswa 3 │ mahasiswa3@sigma.test    │ mahasiswa123     │
 * │ Mahasiswa 4 │ mahasiswa4@sigma.test    │ mahasiswa123     │
 * │ Mahasiswa 5 │ mahasiswa5@sigma.test    │ mahasiswa123     │
 * └─────────────┴──────────────────────────┴──────────────────┘
 */
class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key check sementara agar bisa truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Bersihkan data lama (urutan: child dulu, parent belakangan)
        Penilaian::truncate();
        LaporanKegiatan::truncate();
        LogKegiatan::truncate();
        Lamaran::truncate();
        Lowongan::truncate();
        Mahasiswa::truncate();
        Mitra::truncate();
        User::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->command->info('🌱 Seeding data demo untuk presentasi...');

        // ═══════════════════════════════════════════════════════════
        // 1. STAFF (Admin, Kaprodi, Sekprodi)
        // ═══════════════════════════════════════════════════════════
        $admin = User::create([
            'name'     => 'Administrator SIGMA',
            'email'    => 'admin@sigma.test',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        $kaprodi = User::create([
            'name'     => 'Dr. Hendra Kusuma, M.T.',
            'email'    => 'kaprodi@sigma.test',
            'password' => Hash::make('kaprodi123'),
            'role'     => 'kaprodi',
        ]);

        $sekprodi = User::create([
            'name'     => 'Siti Rahayu, S.Kom.',
            'email'    => 'sekprodi@sigma.test',
            'password' => Hash::make('sekprodi123'),
            'role'     => 'sekprodi',
        ]);

        $this->command->line('   ✅ Staff: admin, kaprodi, sekprodi');

        // ═══════════════════════════════════════════════════════════
        // 2. MITRA (3 perusahaan)
        // ═══════════════════════════════════════════════════════════
        $mitraUsers = [
            ['name' => 'PT Nusantara Teknologi', 'email' => 'mitra1@sigma.test', 'perusahaan' => 'PT Nusantara Teknologi', 'alamat' => 'Jl. Sudirman No. 45, Jakarta Pusat'],
            ['name' => 'CV Inovasi Digital',     'email' => 'mitra2@sigma.test', 'perusahaan' => 'CV Inovasi Digital',     'alamat' => 'Jl. Asia Afrika No. 12, Bandung'],
            ['name' => 'PT Solusi Cerdas',       'email' => 'mitra3@sigma.test', 'perusahaan' => 'PT Solusi Cerdas',       'alamat' => 'Jl. Pemuda No. 88, Surabaya'],
        ];

        $mitraModels = [];
        foreach ($mitraUsers as $m) {
            $user = User::create([
                'name'     => $m['name'],
                'email'    => $m['email'],
                'password' => Hash::make('mitra123'),
                'role'     => 'mitra',
            ]);
            $mitra = Mitra::create([
                'user_id'         => $user->id,
                'nama_perusahaan' => $m['perusahaan'],
                'alamat'          => $m['alamat'],
                'email'           => $m['email'],
            ]);
            $mitraModels[] = $mitra;
        }

        $this->command->line('   ✅ Mitra: 3 perusahaan');

        // ═══════════════════════════════════════════════════════════
        // 3. LOWONGAN (2-3 per mitra)
        // ═══════════════════════════════════════════════════════════
        $lowonganData = [
            // Mitra 1
            ['mitra' => 0, 'judul' => 'Web Developer (Laravel)',      'deskripsi' => 'Mengembangkan aplikasi web berbasis Laravel, bekerja dalam tim Agile, membantu maintenance sistem internal perusahaan.', 'durasi' => '3 Bulan', 'status' => 'aktif'],
            ['mitra' => 0, 'judul' => 'UI/UX Designer',               'deskripsi' => 'Merancang tampilan antarmuka aplikasi mobile dan web, membuat wireframe dan prototype menggunakan Figma.', 'durasi' => '3 Bulan', 'status' => 'aktif'],
            // Mitra 2
            ['mitra' => 1, 'judul' => 'Mobile Developer (Flutter)',   'deskripsi' => 'Membantu pengembangan aplikasi mobile menggunakan Flutter, integrasi API, dan testing fitur baru.', 'durasi' => '4 Bulan', 'status' => 'aktif'],
            ['mitra' => 1, 'judul' => 'Data Analyst Intern',          'deskripsi' => 'Analisis data penjualan, membuat laporan visualisasi menggunakan Python dan Tableau, mendukung keputusan bisnis.', 'durasi' => '3 Bulan', 'status' => 'nonaktif'],
            // Mitra 3
            ['mitra' => 2, 'judul' => 'Backend Developer (Node.js)',  'deskripsi' => 'Pengembangan REST API menggunakan Node.js dan Express, bekerja dengan database PostgreSQL dan Redis.', 'durasi' => '3 Bulan', 'status' => 'aktif'],
            ['mitra' => 2, 'judul' => 'Quality Assurance Engineer',   'deskripsi' => 'Melakukan pengujian manual dan otomatis pada aplikasi web, membuat test case dan laporan bug.', 'durasi' => '3 Bulan', 'status' => 'aktif'],
        ];

        $lowongans = [];
        foreach ($lowonganData as $l) {
            $lowongans[] = Lowongan::create([
                'mitra_id'       => $mitraModels[$l['mitra']]->id,
                'judul_lowongan' => $l['judul'],
                'deskripsi'      => $l['deskripsi'],
                'durasi'         => $l['durasi'],
                'status'         => $l['status'],
            ]);
        }

        $this->command->line('   ✅ Lowongan: 6 posisi (5 aktif, 1 nonaktif)');

        // ═══════════════════════════════════════════════════════════
        // 4. MAHASISWA (5 orang dengan biodata lengkap)
        // ═══════════════════════════════════════════════════════════
        $mahasiswaData = [
            ['name' => 'Andi Prasetyo',    'email' => 'mahasiswa1@sigma.test', 'nim' => '2201001', 'jurusan' => 'Teknik Informatika', 'fakultas' => 'Fakultas Teknik', 'semester' => 6, 'no_hp' => '081234567001'],
            ['name' => 'Bunga Ramadhani',  'email' => 'mahasiswa2@sigma.test', 'nim' => '2201002', 'jurusan' => 'Teknik Informatika', 'fakultas' => 'Fakultas Teknik', 'semester' => 6, 'no_hp' => '081234567002'],
            ['name' => 'Cahyo Nugroho',    'email' => 'mahasiswa3@sigma.test', 'nim' => '2201003', 'jurusan' => 'Sistem Informasi',   'fakultas' => 'Fakultas Teknik', 'semester' => 6, 'no_hp' => '081234567003'],
            ['name' => 'Dewi Anggraini',   'email' => 'mahasiswa4@sigma.test', 'nim' => '2201004', 'jurusan' => 'Sistem Informasi',   'fakultas' => 'Fakultas Teknik', 'semester' => 6, 'no_hp' => '081234567004'],
            ['name' => 'Eko Santoso',      'email' => 'mahasiswa5@sigma.test', 'nim' => '2201005', 'jurusan' => 'Teknik Informatika', 'fakultas' => 'Fakultas Teknik', 'semester' => 6, 'no_hp' => '081234567005'],
        ];

        $mahasiswaUsers = [];
        foreach ($mahasiswaData as $m) {
            $user = User::create([
                'name'     => $m['name'],
                'email'    => $m['email'],
                'password' => Hash::make('mahasiswa123'),
                'role'     => 'mahasiswa',
            ]);
            Mahasiswa::create([
                'user_id'  => $user->id,
                'nim'      => $m['nim'],
                'jurusan'  => $m['jurusan'],
                'fakultas' => $m['fakultas'],
                'semester' => $m['semester'],
                'no_hp'    => $m['no_hp'],
            ]);
            $mahasiswaUsers[] = $user;
        }

        $this->command->line('   ✅ Mahasiswa: 5 orang dengan biodata lengkap');

        // ═══════════════════════════════════════════════════════════
        // 5. LAMARAN
        // Skenario presentasi:
        //   - Mhs 1: diterima di lowongan 1 (sedang aktif magang)
        //   - Mhs 2: diterima di lowongan 3 (sedang aktif magang)
        //   - Mhs 3: diterima di lowongan 5 (sedang aktif magang)
        //   - Mhs 4: pending di lowongan 1
        //   - Mhs 5: ditolak di lowongan 2, pending di lowongan 5
        // ═══════════════════════════════════════════════════════════
        $mulaiMagang1 = Carbon::now()->subWeeks(8); // Mhs 1 sudah 8 minggu magang
        $mulaiMagang2 = Carbon::now()->subWeeks(5); // Mhs 2 sudah 5 minggu magang
        $mulaiMagang3 = Carbon::now()->subWeeks(3); // Mhs 3 sudah 3 minggu magang

        // Mhs 1 — diterima lowongan 1 (Web Dev Laravel, Mitra 1)
        $lamaran1 = Lamaran::create([
            'mahasiswa_id'       => $mahasiswaUsers[0]->id,
            'lowongan_id'        => $lowongans[0]->id,
            'status'             => 'diterima',
            'catatan_mitra'      => 'Selamat! Kamu diterima sebagai Web Developer Intern. Harap hadir pada Senin pukul 08.00.',
            'cv_path'            => null,
            'surat_lamaran_path' => null,
            'diproses_pada'      => $mulaiMagang1,
        ]);

        // Mhs 2 — diterima lowongan 3 (Flutter, Mitra 2)
        $lamaran2 = Lamaran::create([
            'mahasiswa_id'       => $mahasiswaUsers[1]->id,
            'lowongan_id'        => $lowongans[2]->id,
            'status'             => 'diterima',
            'catatan_mitra'      => 'Diterima sebagai Mobile Developer Intern. Bawa laptop pribadi ya.',
            'cv_path'            => null,
            'surat_lamaran_path' => null,
            'diproses_pada'      => $mulaiMagang2,
        ]);

        // Mhs 3 — diterima lowongan 5 (Node.js, Mitra 3)
        $lamaran3 = Lamaran::create([
            'mahasiswa_id'       => $mahasiswaUsers[2]->id,
            'lowongan_id'        => $lowongans[4]->id,
            'status'             => 'diterima',
            'catatan_mitra'      => 'Diterima! Briefing awal hari Senin pukul 09.00 WIB.',
            'cv_path'            => null,
            'surat_lamaran_path' => null,
            'diproses_pada'      => $mulaiMagang3,
        ]);

        // Mhs 4 — pending lowongan 1 (Web Dev)
        $lamaran4 = Lamaran::create([
            'mahasiswa_id'       => $mahasiswaUsers[3]->id,
            'lowongan_id'        => $lowongans[0]->id,
            'status'             => 'pending',
            'cv_path'            => null,
            'surat_lamaran_path' => null,
        ]);

        // Mhs 5 — ditolak lowongan 2 (UI/UX)
        Lamaran::create([
            'mahasiswa_id'       => $mahasiswaUsers[4]->id,
            'lowongan_id'        => $lowongans[1]->id,
            'status'             => 'ditolak',
            'catatan_mitra'      => 'Mohon maaf, posisi sudah terisi. Silakan coba lowongan lain.',
            'cv_path'            => null,
            'surat_lamaran_path' => null,
            'diproses_pada'      => Carbon::now()->subDays(10),
        ]);

        // Mhs 5 — pending lowongan 5 (Node.js)
        Lamaran::create([
            'mahasiswa_id'       => $mahasiswaUsers[4]->id,
            'lowongan_id'        => $lowongans[4]->id,
            'status'             => 'pending',
            'cv_path'            => null,
            'surat_lamaran_path' => null,
        ]);

        $this->command->line('   ✅ Lamaran: 6 entri (3 diterima, 2 pending, 1 ditolak)');

        // ═══════════════════════════════════════════════════════════
        // 6. LOG KEGIATAN — untuk Mhs 1 (8 minggu), Mhs 2 (5 minggu), Mhs 3 (3 minggu)
        // ═══════════════════════════════════════════════════════════
        $kegiatanTemplates = [
            ['judul' => 'Orientasi dan Pengenalan Lingkungan Kerja',    'kategori' => 'Orientasi',       'deskripsi' => 'Pengenalan tim, struktur organisasi, dan alur kerja perusahaan. Mendapatkan akses sistem dan tools yang digunakan.'],
            ['judul' => 'Mempelajari Codebase Proyek',                  'kategori' => 'Pembelajaran',    'deskripsi' => 'Membaca dan memahami struktur proyek yang sudah ada, dokumentasi teknis, dan standar coding perusahaan.'],
            ['judul' => 'Implementasi Fitur CRUD',                      'kategori' => 'Development',     'deskripsi' => 'Mengimplementasikan fitur Create, Read, Update, Delete untuk modul manajemen data sesuai spesifikasi.'],
            ['judul' => 'Review Code dan Bug Fixing',                   'kategori' => 'Development',     'deskripsi' => 'Melakukan review kode bersama senior developer, memperbaiki bug yang ditemukan pada fitur sebelumnya.'],
            ['judul' => 'Integrasi API Eksternal',                      'kategori' => 'Development',     'deskripsi' => 'Mengintegrasikan layanan API pihak ketiga untuk fitur notifikasi dan autentikasi.'],
            ['judul' => 'Testing dan Dokumentasi',                      'kategori' => 'Quality Control', 'deskripsi' => 'Menulis unit test untuk fitur yang sudah dibuat, membuat dokumentasi teknis dan panduan penggunaan.'],
            ['judul' => 'Sprint Planning dan Task Breakdown',           'kategori' => 'Project Management', 'deskripsi' => 'Mengikuti sprint planning, membantu breakdown task dan estimasi story point bersama tim.'],
            ['judul' => 'Presentasi Progress ke Tim',                   'kategori' => 'Komunikasi',      'deskripsi' => 'Mempresentasikan progress pengerjaan fitur kepada tim dan menerima feedback untuk perbaikan.'],
        ];

        // Helper: buat log kegiatan per minggu
        $buatLog = function(User $mhsUser, Lamaran $lamaran, Carbon $mulai, int $jumlahMinggu) use ($kegiatanTemplates) {
            for ($minggu = 1; $minggu <= $jumlahMinggu; $minggu++) {
                $template = $kegiatanTemplates[($minggu - 1) % count($kegiatanTemplates)];
                $tanggal  = $mulai->copy()->addWeeks($minggu - 1)->addDays(1); // Selasa tiap minggu
                $status   = $minggu <= ($jumlahMinggu - 1) ? 'disetujui' : 'menunggu'; // Minggu terakhir masih menunggu

                LogKegiatan::create([
                    'mahasiswa_id'      => $mhsUser->id,
                    'lamaran_id'        => $lamaran->id,
                    'judul_kegiatan'    => $template['judul'],
                    'tanggal'           => $tanggal->format('Y-m-d'),
                    'minggu_ke'         => $minggu,
                    'jam_mulai'         => '08:00:00',
                    'jam_selesai'       => '17:00:00',
                    'lokasi'            => 'Kantor Mitra',
                    'deskripsi'         => $template['deskripsi'],
                    'kategori'          => $template['kategori'],
                    'status'            => $status,
                    'catatan_pembimbing' => $status === 'disetujui' ? 'Log kegiatan sudah sesuai. Pertahankan.' : null,
                ]);
            }
        };

        $buatLog($mahasiswaUsers[0], $lamaran1, $mulaiMagang1, 8); // Mhs 1: 8 minggu
        $buatLog($mahasiswaUsers[1], $lamaran2, $mulaiMagang2, 5); // Mhs 2: 5 minggu
        $buatLog($mahasiswaUsers[2], $lamaran3, $mulaiMagang3, 3); // Mhs 3: 3 minggu

        $this->command->line('   ✅ Log Kegiatan: 16 entri (8+5+3 minggu)');

        // ═══════════════════════════════════════════════════════════
        // 7. LAPORAN KEGIATAN
        // ═══════════════════════════════════════════════════════════
        // Mhs 1 (8 minggu) — sudah upload laporan mingguan dan tengah
        LaporanKegiatan::create([
            'mahasiswa_id'  => $mahasiswaUsers[0]->id,
            'lamaran_id'    => $lamaran1->id,
            'judul_laporan' => 'Laporan Mingguan 1-4 - Web Developer Intern',
            'jenis_laporan' => 'mingguan',
            'file_path'     => 'laporan/demo/laporan_mingguan_mhs1.pdf',
            'keterangan'    => 'Laporan kegiatan minggu 1 sampai 4',
            'status'        => 'diterima',
            'catatan_reviewer' => 'Laporan lengkap dan terstruktur. Bagus!',
        ]);
        LaporanKegiatan::create([
            'mahasiswa_id'  => $mahasiswaUsers[0]->id,
            'lamaran_id'    => $lamaran1->id,
            'judul_laporan' => 'Laporan Tengah Semester - Web Developer Intern',
            'jenis_laporan' => 'tengah',
            'file_path'     => 'laporan/demo/laporan_tengah_mhs1.pdf',
            'keterangan'    => 'Laporan evaluasi pertengahan periode magang',
            'status'        => 'dikirim',
            'catatan_reviewer' => null,
        ]);

        // Mhs 2 (5 minggu) — baru upload laporan mingguan
        LaporanKegiatan::create([
            'mahasiswa_id'  => $mahasiswaUsers[1]->id,
            'lamaran_id'    => $lamaran2->id,
            'judul_laporan' => 'Laporan Mingguan 1-4 - Mobile Developer Intern',
            'jenis_laporan' => 'mingguan',
            'file_path'     => 'laporan/demo/laporan_mingguan_mhs2.pdf',
            'keterangan'    => 'Laporan kegiatan 4 minggu pertama',
            'status'        => 'revisi',
            'catatan_reviewer' => 'Mohon lengkapi bagian output dan hasil kerja di setiap minggu.',
        ]);

        // Mhs 3 (3 minggu) — belum upload laporan (baru mulai)

        $this->command->line('   ✅ Laporan Kegiatan: 3 entri');

        // ═══════════════════════════════════════════════════════════
        // 8. PENILAIAN
        // Mhs 1 sudah dapat penilaian tengah dari Mitra 1
        // ═══════════════════════════════════════════════════════════
        Penilaian::create([
            'mahasiswa_id'       => $mahasiswaUsers[0]->id,
            'lamaran_id'         => $lamaran1->id,
            'penilai_id'         => $mitraModels[0]->user_id,
            'jenis_penilaian'    => 'tengah',
            'nilai_kedisiplinan' => 88,
            'nilai_komunikasi'   => 82,
            'nilai_teknis'       => 90,
            'nilai_inisiatif'    => 85,
            'nilai_kerjasama'    => 87,
            'nilai_akhir'        => round((88 + 82 + 90 + 85 + 87) / 5, 2), // 86.40
            'catatan'            => 'Mahasiswa menunjukkan kemampuan teknis yang baik dan mudah beradaptasi dengan lingkungan kerja. Perlu ditingkatkan kemampuan komunikasi verbal.',
            'periode'            => 'Maret–Mei 2026',
        ]);

        // Mhs 2 penilaian tengah dari Mitra 2
        Penilaian::create([
            'mahasiswa_id'       => $mahasiswaUsers[1]->id,
            'lamaran_id'         => $lamaran2->id,
            'penilai_id'         => $mitraModels[1]->user_id,
            'jenis_penilaian'    => 'tengah',
            'nilai_kedisiplinan' => 80,
            'nilai_komunikasi'   => 85,
            'nilai_teknis'       => 78,
            'nilai_inisiatif'    => 82,
            'nilai_kerjasama'    => 90,
            'nilai_akhir'        => round((80 + 85 + 78 + 82 + 90) / 5, 2), // 83.00
            'catatan'            => 'Sangat kooperatif dalam tim. Perlu meningkatkan pemahaman Flutter state management.',
            'periode'            => 'April–Juni 2026',
        ]);

        $this->command->line('   ✅ Penilaian: 2 entri (penilaian tengah)');

        // ═══════════════════════════════════════════════════════════
        // RINGKASAN
        // ═══════════════════════════════════════════════════════════
        $this->command->newLine();
        $this->command->info('✅ Seeding selesai! Ringkasan data:');
        $this->command->table(
            ['Tabel', 'Jumlah Data'],
            [
                ['users',             User::count()],
                ['mitras',            Mitra::count()],
                ['lowongan',          Lowongan::count()],
                ['mahasiswa',         Mahasiswa::count()],
                ['lamaran',           Lamaran::count()],
                ['log_kegiatan',      LogKegiatan::count()],
                ['laporan_kegiatan',  LaporanKegiatan::count()],
                ['penilaian',         Penilaian::count()],
            ]
        );

        $this->command->newLine();
        $this->command->line('🔑 <comment>Akun login untuk demo:</comment>');
        $this->command->line('   Admin    : admin@sigma.test       / admin123');
        $this->command->line('   Kaprodi  : kaprodi@sigma.test     / kaprodi123');
        $this->command->line('   Mitra 1  : mitra1@sigma.test      / mitra123');
        $this->command->line('   Mahasiswa: mahasiswa1@sigma.test  / mahasiswa123');
    }
}