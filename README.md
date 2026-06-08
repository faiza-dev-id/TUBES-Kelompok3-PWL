# 🎓 Sistem Manajemen Magang Mahasiswa (SIGMA)

Aplikasi web berbasis Laravel untuk mengelola seluruh proses magang mahasiswa — mulai dari pendaftaran, seleksi lamaran, pelaksanaan magang, hingga penilaian akhir.

---

## 📋 Daftar Isi

- [Tentang Aplikasi](#tentang-aplikasi)
- [Peran Pengguna](#peran-pengguna)
- [Fitur Lengkap](#fitur-lengkap)
- [Instalasi](#instalasi)
- [Saran Pengembangan dari Dosen](#saran-pengembangan-dari-dosen)

---

## Tentang Aplikasi

Sistem Manajemen Magang Mahasiswa adalah platform digital yang menjembatani mahasiswa, perusahaan mitra, admin kampus, dan ketua program studi dalam satu ekosistem terintegrasi. Aplikasi ini menggantikan proses manual yang memakan waktu dengan alur digital yang transparan dan terstruktur.

---

## Peran Pengguna

Aplikasi ini memiliki **4 peran** dengan portal dan hak akses masing-masing:

| Peran | Portal | Keterangan |
|---|---|---|
| **Mahasiswa** | `/dashboard` | Mendaftar, melamar, menjalankan & melaporkan magang |
| **Mitra** | `/mitra/dashboard` | Mengelola lowongan, menyeleksi pelamar, menilai mahasiswa |
| **Admin** | `/admin/dashboard` | Mengelola seluruh user, mitra, dan memantau lamaran |
| **Kaprodi** | `/kaprodi/dashboard` | Memantau data mahasiswa dan rekap nilai magang |

---

## Fitur Lengkap

### 🧑‍🎓 Portal Mahasiswa

**Autentikasi & Profil**
- Registrasi akun mahasiswa baru
- Login dan logout dengan proteksi session
- Pengisian biodata wajib setelah registrasi pertama (NIM, Program Studi, dll.)
- Edit profil mahasiswa (nama, email, foto, dll.)

**Browse & Melamar Lowongan**
- Melihat daftar lowongan magang yang tersedia dari berbagai mitra
- Melihat detail lowongan (deskripsi, persyaratan, perusahaan mitra)
- Melamar lowongan dengan upload **CV** (PDF) dan **Surat Lamaran** (PDF)
- Sistem pencegah duplikasi — tidak bisa melamar lowongan yang sama dua kali
- Pembatalan lamaran yang masih berstatus *pending*

**Riwayat Lamaran**
- Melihat semua lamaran yang pernah dikirim beserta statusnya (*pending*, *diterima*, *ditolak*)
- Melihat catatan/keterangan dari mitra terkait keputusan lamaran
- Informasi tanggal melamar dan tanggal diproses

**Log Kegiatan Magang**
- Pencatatan log harian/mingguan selama masa magang berlangsung
- Log dikelompokkan per minggu (durasi magang 16 minggu)
- Melihat progress minggu magang yang berjalan
- Edit dan hapus log yang belum disetujui mitra
- Melihat status log: *menunggu*, *disetujui*, *ditolak*

**Laporan Kegiatan**
- Upload laporan kegiatan dalam format PDF
- Download laporan yang sudah diupload
- Hapus laporan kegiatan

**Penilaian**
- Melihat hasil penilaian dari mitra (penilaian tengah dan akhir magang)
- Komponen nilai: Kedisiplinan, Komunikasi, Teknis, Inisiatif, Kerjasama
- Melihat nilai akhir rata-rata

---

### 🏢 Portal Mitra

**Dashboard**
- Ringkasan statistik: jumlah lowongan aktif, total pelamar, mahasiswa sedang magang

**Manajemen Lowongan**
- Membuat lowongan magang baru
- Mengedit informasi lowongan yang sudah ada
- Menonaktifkan atau menghapus lowongan
- Melihat daftar lowongan yang dimiliki

**Seleksi Pelamar**
- Melihat daftar semua pelamar beserta dokumen (CV & Surat Lamaran)
- Filter pelamar berdasarkan lowongan atau status
- **Menerima** pelamar — status berubah menjadi *diterima*
- **Menolak** pelamar — status berubah menjadi *ditolak* dengan catatan alasan
- Tidak bisa mengubah keputusan yang sudah diproses

**Manajemen Mahasiswa Magang**
- Melihat daftar mahasiswa yang sedang aktif magang
- Menonaktifkan/mengeluarkan mahasiswa dari program magang

**Pemantauan Log Kegiatan**
- Melihat semua log kegiatan mahasiswa yang sedang magang
- Menyetujui log kegiatan mahasiswa
- Menolak log kegiatan dengan keterangan

**Penilaian Mahasiswa**
- Memberikan penilaian tengah magang dan penilaian akhir magang
- Komponen penilaian: Kedisiplinan, Komunikasi, Teknis, Inisiatif, Kerjasama (skala 0–100)
- Nilai akhir dihitung otomatis dari rata-rata 5 komponen
- Menambahkan catatan untuk mahasiswa
- Penilaian bisa diperbarui (update or create)

**Nilai Akhir**
- Melihat rekap nilai akhir semua mahasiswa yang pernah magang di perusahaan

---

### 🛡️ Portal Admin

**Dashboard**
- Statistik keseluruhan sistem (total user, mitra, lamaran, dll.)

**Manajemen User**
- Melihat daftar semua user terdaftar di sistem
- Membuat akun user baru dengan berbagai role
- Mengedit data user (nama, email, role)
- Menghapus akun user
- Reset password user

**Manajemen Mitra**
- Mendaftarkan perusahaan mitra baru beserta akun login-nya sekaligus
- Mengedit data mitra (nama perusahaan, alamat, email)
- Menghapus mitra (akun user terkait ikut terhapus secara otomatis)
- Pencarian mitra berdasarkan nama atau email
- Paginasi daftar mitra (15 data per halaman)

**Monitor Lamaran**
- Memantau seluruh lamaran yang masuk dari semua mahasiswa ke semua mitra
- Melihat detail lamaran tertentu

---

### 🎓 Portal Kaprodi

**Dashboard**
- Ringkasan data mahasiswa yang sedang dan sudah menyelesaikan magang

**Pemantauan Mahasiswa**
- Melihat daftar semua mahasiswa yang terdaftar dalam sistem
- Melihat detail profil dan riwayat magang mahasiswa tertentu

**Rekap Nilai**
- Melihat rekap nilai magang seluruh mahasiswa
- Data nilai dapat digunakan untuk keperluan akademik

---

## Saran Pengembangan dari Dosen

Berikut adalah fitur-fitur yang disarankan oleh dosen untuk dikembangkan lebih lanjut guna meningkatkan kualitas dan kelengkapan sistem:

1. Notifikasi alasan penolakan ke mahasiswa — ketika mitra menolak lamaran, mahasiswa mendapat pesam otomatis berisi alasan penolakan yang jelas.
2. Admin/operator membuat email untuk mitra  — admin mendaftarkan akun mitra agar aman dan hany amitra yang dapat mengakses akun tersebut.

## Struktur Direktori Utama

```
manajemen-magang-mahasiswa/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Controller portal admin
│   │   │   ├── Kaprodi/        # Controller portal kaprodi
│   │   │   ├── Mitra/          # Controller portal mitra
│   │   │   └── ...             # Controller mahasiswa & umum
│   │   └── Middleware/         # Middleware role-based access
│   └── Models/                 # Eloquent models
├── database/
│   ├── migrations/             # Skema tabel database
│   └── seeders/                # Data seeder & demo
├── resources/views/            # Blade templates
└── routes/
    ├── web.php                 # Routes mahasiswa
    ├── admin.php               # Routes admin
    ├── mitra.php               # Routes mitra
    ├── kaprodi.php             # Routes kaprodi
    └── api.php                 # API routes (Sanctum)
```

---

## Alur Utama Sistem

```
Mahasiswa Register → Isi Biodata → Browse Lowongan → Kirim Lamaran
        ↓
Mitra Review Lamaran → Terima / Tolak (+ Alasan)
        ↓
Mahasiswa Diterima → Mulai Magang → Catat Log Kegiatan → Upload Laporan
        ↓
Mitra Review Log → Setujui / Tolak
        ↓
Mitra Beri Penilaian Tengah & Akhir → Kaprodi Pantau Rekap Nilai
```

---

*Dikembangkan sebagai proyek mata kuliah — Teknologi Informasi, 2026*
