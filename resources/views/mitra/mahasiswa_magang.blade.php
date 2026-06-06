<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Mahasiswa Magang — SIGMA</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#faf7f4;--bg2:#fff;--bg3:#f3ede6;--border:rgba(100,30,50,.1);--text-1:#1a0a0f;--text-2:#6b4050;--text-3:#a07080;--primary:#8b1a3a;--primary-dim:rgba(139,26,58,.10);--primary-hover:#6e1530;--amber:#c07020;--amber-dim:rgba(192,112,32,.12);--red:#c0453f;--red-dim:rgba(192,69,63,.10);--green:#2e7d4f;--green-dim:rgba(46,125,79,.10);--radius:14px;--sidebar-w:230px;}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--text-1);display:flex;min-height:100vh;font-size:14px;}
.sidebar{width:var(--sidebar-w);background:var(--primary);display:flex;flex-direction:column;padding:24px 0;position:fixed;height:100vh;top:0;left:0;z-index:10;}
.sidebar-logo{display:flex;align-items:center;gap:10px;padding:0 20px 28px;border-bottom:1px solid rgba(255,255,255,.15);}
.logo-mark{width:34px;height:34px;background:rgba(255,255,255,.2);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;color:#fff;}
.logo-text{font-weight:700;font-size:15px;color:#fff;}.logo-sub{font-size:10px;color:rgba(255,255,255,.55);}
.nav-group{padding:20px 12px 8px;flex:1;}
.nav-label{font-size:9.5px;letter-spacing:.12em;color:rgba(255,255,255,.45);text-transform:uppercase;font-weight:600;padding:0 8px;margin-bottom:6px;}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:9px;color:rgba(255,255,255,.7);font-size:13px;font-weight:500;margin-bottom:2px;transition:.15s;text-decoration:none;}
.nav-item:hover{background:rgba(255,255,255,.12);color:#fff;}.nav-item.active{background:rgba(255,255,255,.18);color:#fff;}
.nav-icon{width:16px;height:16px;flex-shrink:0;}
.sidebar-foot{padding:16px 12px;border-top:1px solid rgba(255,255,255,.15);}
.user-chip{display:flex;align-items:center;gap:10px;padding:10px;border-radius:10px;background:rgba(255,255,255,.12);}
.ava{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;}
.user-name{font-size:12px;font-weight:600;color:#fff;}.user-role{font-size:10px;color:rgba(255,255,255,.55);}
.btn-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;width:100%;margin-top:8px;}
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:9;}
.page-title{font-size:15px;font-weight:700;}
.content{padding:28px;display:flex;flex-direction:column;gap:20px;}
.pill{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;}
.p-ok{background:var(--green-dim);color:var(--green);}.p-red{background:var(--red-dim);color:var(--red);}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:22px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
.card-title{font-size:13.5px;font-weight:700;}
table{width:100%;border-collapse:collapse;}
th{padding:10px 14px;text-align:left;font-size:11px;font-weight:600;color:var(--text-3);text-transform:uppercase;letter-spacing:.05em;border-bottom:1px solid var(--border);}
td{padding:14px;border-bottom:1px solid var(--border);font-size:13px;vertical-align:middle;}
tr:last-child td{border-bottom:none;}
.btn{display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:9px;font-size:12px;font-weight:600;cursor:pointer;transition:.15s;border:none;text-decoration:none;}
.btn-danger{background:var(--red-dim);color:var(--red);}
.btn-danger:hover{background:var(--red);color:#fff;}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:50;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:18px;padding:28px;width:480px;max-width:90vw;box-shadow:0 20px 60px rgba(0,0,0,.2);}
.modal-title{font-size:16px;font-weight:700;margin-bottom:6px;color:var(--red);}
.modal-sub{font-size:13px;color:var(--text-3);margin-bottom:20px;}
label{display:block;font-size:12px;font-weight:600;color:var(--text-2);margin-bottom:6px;}
select,textarea{width:100%;border:1px solid var(--border);border-radius:10px;padding:10px 12px;font-size:13px;font-family:inherit;outline:none;resize:vertical;background:#fff;}
select:focus,textarea:focus{border-color:var(--primary);}
.modal-actions{display:flex;gap:10px;justify-content:flex-end;margin-top:20px;}
.btn-cancel{background:var(--bg3);color:var(--text-2);}
.alert{padding:12px 16px;border-radius:10px;font-size:13px;margin-bottom:16px;}
.alert-success{background:var(--green-dim);color:var(--green);}
.alert-error{background:var(--red-dim);color:var(--red);}
.empty-state{text-align:center;padding:48px 24px;color:var(--text-3);}
.empty-icon{width:48px;height:48px;margin:0 auto 12px;opacity:.4;}
</style>
</head>
<body>

{{-- Sidebar --}}
@include('mitra.components.sidebar')

<div class="main">
    {{-- Topbar --}}
    <div class="topbar">
        <div class="page-title">Mahasiswa Magang</div>
        <span style="font-size:12px;color:var(--text-3);">{{ $mitra->nama_perusahaan }}</span>
    </div>

    <div class="content">

        {{-- Flash Messages --}}
        @if(session('success'))
        <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-error">⚠ {{ session('error') }}</div>
        @endif

        {{-- Penjelasan --}}
        <div style="background:var(--amber-dim);border:1px solid rgba(192,112,32,.25);border-radius:12px;padding:14px 18px;font-size:13px;color:var(--amber);">
            <strong>Perhatian:</strong> Fitur hapus mahasiswa hanya digunakan dalam kondisi khusus (pelanggaran kontrak, ketidakhadiran berulang, dll). Alasan yang diisi akan tercatat dan bisa dilihat oleh Kaprodi.
        </div>

        {{-- Tabel Mahasiswa --}}
        <div class="card">
            <div class="card-hd">
                <div class="card-title">Daftar Mahasiswa Aktif & Riwayat</div>
                <span style="font-size:12px;color:var(--text-3);">{{ $mahasiswaMagang->count() }} mahasiswa</span>
            </div>

            @if($mahasiswaMagang->isEmpty())
            <div class="empty-state">
                <svg class="empty-icon" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>
                </svg>
                <p style="font-weight:600;margin-bottom:4px;">Belum ada mahasiswa magang</p>
                <p style="font-size:12px;">Mahasiswa yang lamarannya diterima akan muncul di sini</p>
            </div>
            @else
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mahasiswa</th>
                        <th>Lowongan</th>
                        <th>Mulai Magang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswaMagang as $lmr)
                    <tr>
                        <td style="color:var(--text-3);">{{ $loop->iteration }}</td>
                        <td>
                            <div style="font-weight:600;">{{ $lmr->mahasiswa->name ?? '-' }}</div>
                            <div style="font-size:12px;color:var(--text-3);">{{ $lmr->mahasiswa->email ?? '' }}</div>
                            @if($lmr->mahasiswa->mahasiswa)
                            <div style="font-size:11px;color:var(--text-3);">NIM: {{ $lmr->mahasiswa->mahasiswa->nim ?? '-' }}</div>
                            @endif
                        </td>
                        <td style="color:var(--text-2);">{{ $lmr->lowongan->judul_lowongan ?? '-' }}</td>
                        <td style="font-size:12px;color:var(--text-3);">
                            {{ $lmr->diproses_pada ? \Carbon\Carbon::parse($lmr->diproses_pada)->format('d M Y') : '-' }}
                        </td>
                        <td>
                            @if($lmr->status === 'diterima')
                                <span class="pill p-ok">Aktif Magang</span>
                            @elseif($lmr->status === 'dihapus_mitra')
                                <span class="pill p-red">Dikeluarkan</span>
                                <div style="font-size:11px;color:var(--red);margin-top:4px;">{{ $lmr->alasan_hapus_kategori ?? '' }}</div>
                            @endif
                        </td>
                        <td>
                            @if($lmr->status === 'diterima')
                            <button class="btn btn-danger"
                                onclick="openModal({{ $lmr->id }}, '{{ addslashes($lmr->mahasiswa->name ?? '') }}')">
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path d="M18 6L6 18M6 6l12 12"/>
                                </svg>
                                Keluarkan
                            </button>
                            @else
                            <span style="font-size:12px;color:var(--text-3);">
                                Dihapus {{ $lmr->dihapus_pada ? \Carbon\Carbon::parse($lmr->dihapus_pada)->format('d M Y') : '' }}
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

    </div>
</div>

{{-- Modal Konfirmasi Hapus --}}
<div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
    <div class="modal" onclick="event.stopPropagation()">
        <div class="modal-title">Keluarkan Mahasiswa dari Program Magang</div>
        <div class="modal-sub" id="modalSubtitle">Tindakan ini akan mengubah status magang mahasiswa menjadi "Dihapus Mitra". Pastikan alasan yang kamu isi akurat karena akan dilihat oleh Kaprodi.</div>

        <form id="hapusForm" method="POST">
            @csrf

            <div style="margin-bottom:14px;">
                <label for="alasan_hapus_kategori">Kategori Alasan <span style="color:var(--red)">*</span></label>
                <select name="alasan_hapus_kategori" id="alasan_hapus_kategori" required>
                    <option value="">-- Pilih kategori --</option>
                    <option value="Ketidakhadiran Berulang">Ketidakhadiran Berulang</option>
                    <option value="Pelanggaran Peraturan">Pelanggaran Peraturan Perusahaan</option>
                    <option value="Kinerja Tidak Memenuhi Standar">Kinerja Tidak Memenuhi Standar</option>
                    <option value="Pelanggaran Kontrak">Pelanggaran Kontrak</option>
                    <option value="Permintaan Mahasiswa">Atas Permintaan Mahasiswa</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div style="margin-bottom:4px;">
                <label for="alasan_hapus_detail">Keterangan Detail <span style="color:var(--red)">*</span></label>
                <textarea name="alasan_hapus_detail" id="alasan_hapus_detail" rows="4"
                    placeholder="Jelaskan secara rinci alasan pengeluaran mahasiswa ini (minimal 10 karakter)..."
                    required minlength="10" maxlength="1000"></textarea>
            </div>
            <div style="font-size:11px;color:var(--text-3);margin-bottom:16px;">Minimal 10 karakter. Akan tersimpan sebagai catatan resmi.</div>

            <div class="modal-actions">
                <button type="button" class="btn btn-cancel" onclick="closeModalDirect()">Batal</button>
                <button type="submit" class="btn btn-danger">
                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                    Ya, Keluarkan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(lamaranId, nama) {
    document.getElementById('modalOverlay').classList.add('open');
    document.getElementById('modalSubtitle').textContent =
        'Keluarkan ' + nama + ' dari program magang. Alasan wajib diisi dan akan dicatat untuk Kaprodi.';
    document.getElementById('hapusForm').action =
        '/mitra/mahasiswa-magang/' + lamaranId + '/hapus';
    // Reset form
    document.getElementById('alasan_hapus_kategori').value = '';
    document.getElementById('alasan_hapus_detail').value = '';
}

function closeModal(e) {
    if (e.target === document.getElementById('modalOverlay')) {
        closeModalDirect();
    }
}

function closeModalDirect() {
    document.getElementById('modalOverlay').classList.remove('open');
}
</script>

</body>
</html>