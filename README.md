# SIGMA — Sistem Informasi Magang Mahasiswa

SIGMA (Sistem Informasi Magang Mahasiswa) merupakan aplikasi berbasis web yang dikembangkan untuk membantu pengelolaan proses magang mahasiswa secara terintegrasi, terstruktur, dan transparan. Sistem ini dirancang untuk mempermudah mahasiswa dalam mencari lowongan magang, mengajukan lamaran, serta melakukan monitoring kegiatan selama menjalani program magang. Selain itu, SIGMA juga membantu pihak mitra dan program studi dalam memantau perkembangan mahasiswa, mengelola data magang, serta melakukan evaluasi dan penilaian secara lebih efektif.

Aplikasi ini memiliki beberapa fitur utama, seperti manajemen lowongan magang, pengajuan lamaran mahasiswa, monitoring log kegiatan magang, dashboard analytics, serta pengelolaan data pengguna berdasarkan role masing-masing, yaitu mahasiswa, mitra, admin operator, ketua program studi, dan sekretaris program studi. Pada fitur monitoring magang, mahasiswa diwajibkan mengisi log kegiatan secara berkala yang berisi tanggal kegiatan, deskripsi aktivitas, dan keterangan tambahan. Data log tersebut nantinya dapat dipantau langsung oleh pihak mitra sebagai bentuk monitoring aktivitas mahasiswa selama menjalani magang.

Berdasarkan revisi dan masukan dari dosen, terdapat beberapa penyesuaian pada sistem, yaitu mitra tidak dapat melakukan registrasi akun secara mandiri karena akun mitra akan dibuat dan dikelola langsung oleh admin operator untuk menjaga validitas dan keamanan data perusahaan. Selain itu, pada proses seleksi lamaran magang, apabila mahasiswa ditolak oleh pihak mitra, sistem akan menampilkan alasan penolakan sehingga mahasiswa dapat mengetahui penyebab lamaran tidak diterima dan dapat melakukan evaluasi untuk pengajuan berikutnya.

SIGMA dikembangkan menggunakan framework Laravel dengan database MySQL serta menerapkan sistem version control menggunakan GitHub untuk mendukung kolaborasi tim dalam proses pengembangan aplikasi. Dengan adanya sistem ini, diharapkan proses pengelolaan magang menjadi lebih modern, efisien, serta mampu meningkatkan kualitas monitoring dan komunikasi antara mahasiswa, mitra, dan pihak kampus.



## 📋 Deskripsi

**SIGMA (Sistem Informasi Magang Mahasiswa)** adalah aplikasi berbasis web yang dikembangkan untuk membantu pengelolaan proses magang mahasiswa secara terintegrasi, terstruktur, dan transparan.

Sistem ini dirancang untuk:
- Mempermudah mahasiswa dalam mencari lowongan magang dan mengajukan lamaran
- Memungkinkan monitoring kegiatan magang secara real-time oleh mitra dan kaprodi
- Memberikan sistem penilaian yang terstruktur dari mitra kepada mahasiswa
- Membantu pihak program studi dalam memantau dan mengevaluasi seluruh proses magang

SIGMA dikembangkan menggunakan framework **Laravel** dengan database **MySQL**, serta menerapkan sistem version control menggunakan **GitHub** untuk mendukung kolaborasi tim dalam proses pengembangan.

---

## Peran dalam Sistem

SIGMA memiliki 4 peran (role) dengan hak akses dan fitur yang berbeda-beda:

# 1.Mahasiswa
| Fitur | Keterangan |
|-------|-----------|
| Registrasi & Login | Membuat akun dan mengisi biodata |
| Browse Lowongan | Melihat daftar lowongan magang yang tersedia |
| Kirim Lamaran | Mengajukan lamaran beserta CV dan surat lamaran |
| Log Kegiatan | Mencatat aktivitas harian selama magang |
| Upload Laporan | Mengunggah laporan mingguan, tengah, dan akhir |
| Lihat Penilaian | Melihat hasil penilaian dari mitra |

# 2.Mitra (Perusahaan)
| Fitur | Keterangan |
|-------|-----------|
| Kelola Lowongan | Membuat, mengedit, dan menutup lowongan magang |
| Seleksi Pelamar | Menerima atau menolak lamaran masuk |
| Monitor Log | Menyetujui atau menolak log kegiatan mahasiswa |
| Penilaian | Memberikan penilaian tengah dan akhir magang |
| Kelola Mahasiswa | Mengelola mahasiswa aktif magang, termasuk pengeluaran dengan alasan |

# 3.Admin Operator
| Fitur | Keterangan |
|-------|-----------|
| Manajemen User | Membuat, mengedit, dan menghapus akun semua pengguna |
| Manajemen Mitra | Mendaftarkan dan mengelola data perusahaan mitra |
| Monitor Lamaran | Memantau seluruh lamaran yang masuk dalam sistem |
| Reset Password | Mereset password user dan mengirimkannya via email |

# 4.Ketua Program Studi (Kaprodi)
| Fitur | Keterangan |
|-------|-----------|
| Dashboard Statistik | Melihat ringkasan data mahasiswa magang |
| Monitor Mahasiswa | Memantau progress magang setiap mahasiswa |
| Detail Mahasiswa | Melihat log, laporan, dan penilaian per mahasiswa |
| Rekap Nilai | Melihat rekap nilai akhir seluruh mahasiswa |

---

# Tampilan Output

# Landing Page
Halaman utama publik yang menampilkan informasi sistem SIGMA dan tombol login/register.

# Dashboard Mahasiswa
Menampilkan status magang aktif, progress log kegiatan, statistik lamaran, dan menu navigasi ke semua fitur mahasiswa.

# Halaman Browse Lowongan
Daftar lowongan magang yang tersedia dari berbagai mitra, lengkap dengan filter dan detail posisi.

# Halaman Lamaran Saya
Riwayat semua lamaran yang pernah diajukan beserta status (pending / diterima / ditolak) dan catatan dari mitra.

# Log Kegiatan Magang
Form pencatatan kegiatan harian dengan timeline per minggu, status persetujuan mitra, dan progress bar minggu berjalan.

# Dashboard Admin
Statistik keseluruhan sistem: total user, mitra, lamaran, dan monitor aktivitas.

# Dashboard Kaprodi
Grafik dan statistik mahasiswa magang, filter per prodi dan status, serta akses cepat ke detail setiap mahasiswa.

# Portal Mitra
Dashboard mitra dengan statistik pelamar, daftar mahasiswa aktif magang, form penilaian, dan manajemen lowongan.

---


## 🏁 Penutup

SIGMA dikembangkan sebagai solusi digital untuk memoderniasi proses magang mahasiswa yang selama ini masih dilakukan secara manual dan terpisah-pisah. Dengan adanya sistem ini, diharapkan proses pengelolaan magang menjadi lebih **modern**, **efisien**, dan **transparan** — meningkatkan kualitas komunikasi antara mahasiswa, mitra perusahaan, dan pihak program studi.

Sistem ini masih terus berkembang dan terbuka untuk pengembangan lebih lanjut, seperti integrasi notifikasi email, fitur chat antara mahasiswa dan mitra, serta ekspor laporan ke format PDF.

---

<p align="center">
  Dibuat oleh Kelompok 3 — Pemrograman Web Lanjut
</p>
