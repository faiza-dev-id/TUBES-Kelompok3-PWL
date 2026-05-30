<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Log Kegiatan — SIGMA</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#faf7f4;--bg2:#fff;--bg3:#f3ede6;--border:rgba(100,30,50,.1);--text-1:#1a0a0f;--text-2:#6b4050;--text-3:#a07080;--primary:#8b1a3a;--primary-dim:rgba(139,26,58,.10);--primary-hover:#6e1530;--amber:#c07020;--amber-dim:rgba(192,112,32,.12);--red:#c0453f;--red-dim:rgba(192,69,63,.10);--green:#2e7d4f;--green-dim:rgba(46,125,79,.10);--blue:#1a5fa0;--blue-dim:rgba(26,95,160,.10);--radius:14px;--sidebar-w:230px;}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--text-1);display:flex;min-height:100vh;font-size:14px;}
/* sidebar */
.sidebar{width:var(--sidebar-w);background:var(--primary);display:flex;flex-direction:column;padding:24px 0;position:fixed;height:100vh;top:0;left:0;z-index:10;}
.sidebar-logo{display:flex;align-items:center;gap:10px;padding:0 20px 28px;border-bottom:1px solid rgba(255,255,255,.15);}
.logo-mark{width:34px;height:34px;background:rgba(255,255,255,.2);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;color:#fff;}
.logo-text{font-weight:700;font-size:15px;color:#fff;}.logo-sub{font-size:10px;color:rgba(255,255,255,.55);}
.nav-group{padding:20px 12px 8px;flex:1;}
.nav-label{font-size:9.5px;letter-spacing:.12em;color:rgba(255,255,255,.45);text-transform:uppercase;font-weight:600;padding:0 8px;margin-bottom:6px;}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:9px;cursor:pointer;color:rgba(255,255,255,.7);font-size:13px;font-weight:500;margin-bottom:2px;transition:.15s;text-decoration:none;}
.nav-item:hover{background:rgba(255,255,255,.12);color:#fff;}.nav-item.active{background:rgba(255,255,255,.18);color:#fff;}
.nav-icon{width:16px;height:16px;flex-shrink:0;}
.sidebar-foot{padding:16px 12px;border-top:1px solid rgba(255,255,255,.15);}
.user-chip{display:flex;align-items:center;gap:10px;padding:10px;border-radius:10px;background:rgba(255,255,255,.12);}
.ava{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;}
.user-name{font-size:12px;font-weight:600;color:#fff;}.user-role{font-size:10px;color:rgba(255,255,255,.55);}
.btn-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;width:100%;margin-top:8px;}
.btn-logout:hover{background:rgba(255,255,255,.1);color:#fff;}
/* main */
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:9;}
.page-title{font-size:15px;font-weight:700;}
.content{padding:28px;display:flex;flex-direction:column;gap:20px;}
/* stat grid */
.g3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;}
.g2{display:grid;grid-template-columns:1.6fr 1fr;gap:20px;}
.stat-c{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px;}
.stat-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:10px;}
.stat-icon svg{width:18px;height:18px;}
.icon-amber{background:var(--amber-dim);color:var(--amber);}
.icon-green{background:var(--green-dim);color:var(--green);}
.icon-blue{background:var(--blue-dim);color:var(--blue);}
.stat-val{font-size:26px;font-weight:700;font-family:'DM Mono',monospace;}
.stat-lbl{font-size:12.5px;font-weight:600;margin-top:2px;}.stat-sub{font-size:11px;color:var(--text-3);}
/* card */
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:20px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
.card-title{font-size:13.5px;font-weight:700;}
/* table */
.tbl{width:100%;border-collapse:collapse;}
.tbl th{font-size:10.5px;letter-spacing:.05em;text-transform:uppercase;color:var(--text-3);font-weight:600;padding:0 0 10px;text-align:left;border-bottom:1px solid var(--border);}
.tbl td{padding:10px 0;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.tbl tr:last-child td{border-bottom:none;}
/* pills */
.pill{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;}
.p-ok{background:var(--green-dim);color:var(--green);}
.p-no{background:var(--red-dim);color:var(--red);}
.p-pend{background:var(--amber-dim);color:var(--amber);}
/* form */
.form-group{margin-bottom:14px;}
.form-label{font-size:11.5px;font-weight:600;color:var(--text-2);margin-bottom:5px;display:block;}
.form-input,.form-select,.form-textarea{width:100%;padding:9px 12px;border:1px solid var(--border);border-radius:9px;font-family:inherit;font-size:13px;background:var(--bg3);color:var(--text-1);outline:none;transition:.15s;}
.form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--primary);background:#fff;}
.form-textarea{resize:vertical;min-height:90px;}
.g2-form{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
.btn{padding:9px 18px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-primary{background:var(--primary);color:#fff;}.btn-primary:hover{background:var(--primary-hover);}
.btn-ghost{background:transparent;color:var(--text-2);border:1px solid var(--border);}
.btn-ghost:hover{border-color:var(--primary);color:var(--primary);}
.btn-danger{background:var(--red-dim);color:var(--red);border:none;padding:5px 10px;border-radius:7px;font-size:11px;font-weight:600;cursor:pointer;}
/* minggu accordion */
.week-group{border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;margin-bottom:10px;}
.week-hd{display:flex;align-items:center;justify-content:space-between;padding:12px 16px;background:var(--bg3);cursor:pointer;user-select:none;}
.week-hd:hover{background:#ede5dc;}
.week-title{font-size:13px;font-weight:700;}
.week-meta{font-size:11.5px;color:var(--text-3);}
.week-body{padding:0 16px;display:none;}
.week-body.open{display:block;padding-bottom:12px;}
.alert{padding:10px 14px;border-radius:9px;font-size:12.5px;margin-bottom:14px;}
.alert-success{background:var(--green-dim);color:var(--green);}
.alert-error{background:var(--red-dim);color:var(--red);}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:32px;text-align:center;color:var(--text-3);}
.empty-state svg{width:40px;height:40px;margin-bottom:12px;opacity:.4;}
/* overlay modal */
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:100;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:16px;width:520px;max-width:95vw;padding:24px;max-height:90vh;overflow-y:auto;}
.modal-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;}
.modal-title{font-size:15px;font-weight:700;}
.modal-close{background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-3);line-height:1;}
</style>
</head>
<body>

<nav class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-mark">Si</div>
    <div><div class="logo-text">SIGMA</div><div class="logo-sub">Mahasiswa Portal</div></div>
  </div>
  <div class="nav-group">
    <div class="nav-label">Menu Utama</div>
    <a href="{{ route('dashboard') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Dashboard</a>
    <a href="{{ route('lowongan.browse') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>Lowongan Magang</a>
    <a href="{{ route('lamaran.saya') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Lamaran Saya</a>
    <a href="{{ route('log-kegiatan.index') }}" class="nav-item active">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>Log Kegiatan</a>
    <a href="{{ route('laporan-kegiatan.index') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17H7A5 5 0 017 7h2"/><path d="M15 7h2a5 5 0 010 10h-2"/><line x1="8" y1="12" x2="16" y2="12"/></svg>Laporan Kegiatan</a>
    <a href="{{ route('penilaian.index') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>Hasil Penilaian</a>
  </div>
  <div class="sidebar-foot">
    @php $initials = strtoupper(substr($user->name,0,2)); @endphp
    <div class="user-chip">
      <div class="ava">{{ $initials }}</div>
      <div class="user-info"><div class="user-name">{{ $user->name }}</div><div class="user-role">Mahasiswa Aktif Magang</div></div>
    </div>
    <form method="POST" action="{{ route('logout') }}">@csrf
      <button type="submit" class="btn-logout">Keluar</button>
    </form>
  </div>
</nav>

<div class="main">
  <div class="topbar">
    <div class="page-title">Log Kegiatan</div>
    <button class="btn btn-primary" onclick="document.getElementById('modalTambah').classList.add('open')">+ Tambah Log</button>
  </div>
  <div class="content">

    @if(session('success'))
      <div class="alert alert-success">✓ {{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-error">✗ {{ session('error') }}</div>
    @endif

    {{-- STATISTIK --}}
    <div class="g3">
      <div class="stat-c">
        <div class="stat-icon icon-blue">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
        </div>
        <div class="stat-val">{{ $stats['total'] }}</div>
        <div class="stat-lbl">Total Log</div>
        <div class="stat-sub">Semua kegiatan</div>
      </div>
      <div class="stat-c">
        <div class="stat-icon icon-green">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div class="stat-val">{{ $stats['disetujui'] }}</div>
        <div class="stat-lbl">Disetujui</div>
        <div class="stat-sub">Telah dikonfirmasi</div>
      </div>
      <div class="stat-c">
        <div class="stat-icon icon-amber">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div class="stat-val">{{ $stats['menunggu'] }}</div>
        <div class="stat-lbl">Menunggu</div>
        <div class="stat-sub">Belum dikonfirmasi</div>
      </div>
    </div>

    {{-- INFO MAGANG --}}
    <div class="card" style="background:linear-gradient(135deg,var(--primary-dim),rgba(139,26,58,.04));border-color:rgba(139,26,58,.2);">
      <div style="display:flex;align-items:center;gap:14px;">
        <div style="flex:1">
          <div style="font-size:13px;font-weight:700;color:var(--primary);margin-bottom:3px;">
            {{ $lamaranDiterima->lowongan->judul_lowongan ?? '-' }}
          </div>
          <div style="font-size:12px;color:var(--text-2);">
            {{ $lamaranDiterima->lowongan->mitra->nama_perusahaan ?? '-' }}
            · Durasi: {{ $lamaranDiterima->lowongan->durasi ?? '-' }}
          </div>
        </div>
        <div style="text-align:right;">
          <div style="font-size:22px;font-weight:700;font-family:'DM Mono',monospace;color:var(--primary);">Minggu {{ $mingguBerjalan }}</div>
          <div style="font-size:11px;color:var(--text-3);">dari {{ $totalMinggu }} minggu</div>
        </div>
      </div>
      {{-- progress bar --}}
      <div style="margin-top:12px;height:5px;background:rgba(139,26,58,.12);border-radius:3px;overflow:hidden;">
        <div style="height:100%;width:{{ round(($mingguBerjalan/$totalMinggu)*100) }}%;background:var(--primary);border-radius:3px;"></div>
      </div>
    </div>

    {{-- LOG PER MINGGU --}}
    <div class="card">
      <div class="card-hd"><div class="card-title">Daftar Log Kegiatan</div></div>

      @if($logs->isEmpty())
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
          <p>Belum ada log kegiatan. Klik <strong>"+ Tambah Log"</strong> untuk memulai.</p>
        </div>
      @else
        @foreach($logs as $minggu => $items)
          <div class="week-group">
            <div class="week-hd" onclick="toggleWeek({{ $minggu }})">
              <span class="week-title">Minggu ke-{{ $minggu }}</span>
              <span class="week-meta">{{ $items->count() }} kegiatan · <span class="pill {{ $items->where('status','disetujui')->count() == $items->count() ? 'p-ok' : 'p-pend' }}">{{ $items->where('status','disetujui')->count() }}/{{ $items->count() }} disetujui</span></span>
            </div>
            <div class="week-body" id="week-{{ $minggu }}">
              <table class="tbl">
                <thead><tr><th>Tanggal</th><th>Judul Kegiatan</th><th>Kategori</th><th>Jam</th><th>Status</th><th></th></tr></thead>
                <tbody>
                  @foreach($items as $log)
                  <tr>
                    <td style="font-family:'DM Mono',monospace;font-size:11px;">{{ $log->tanggal->format('d M Y') }}</td>
                    <td>
                      <div style="font-weight:600;">{{ $log->judul_kegiatan }}</div>
                      @if($log->lokasi)<div style="font-size:11px;color:var(--text-3);">📍 {{ $log->lokasi }}</div>@endif
                    </td>
                    <td>
                      @if($log->kategori)<span class="pill p-blue" style="background:var(--blue-dim);color:var(--blue);">{{ $log->kategori }}</span>@else<span style="color:var(--text-3);font-size:11px;">-</span>@endif
                    </td>
                    <td style="font-size:11.5px;font-family:'DM Mono',monospace;">{{ substr($log->jam_mulai,0,5) }}–{{ substr($log->jam_selesai,0,5) }}</td>
                    <td>
                      @if($log->status === 'disetujui') <span class="pill p-ok">✓ Disetujui</span>
                      @elseif($log->status === 'ditolak') <span class="pill p-no">✗ Ditolak</span>
                      @else <span class="pill p-pend">⏳ Menunggu</span>
                      @endif
                    </td>
                    <td>
                      @if($log->status === 'menunggu')
                        <form method="POST" action="{{ route('log-kegiatan.destroy', $log->id) }}" onsubmit="return confirm('Hapus log ini?')">
                          @csrf @method('DELETE')
                          <button type="submit" class="btn-danger">Hapus</button>
                        </form>
                      @endif
                    </td>
                  </tr>
                  @if($log->catatan_pembimbing)
                  <tr>
                    <td colspan="6" style="padding-top:0;font-size:11.5px;color:var(--text-2);background:var(--bg3);padding:6px 10px;border-radius:6px;">
                      💬 Catatan pembimbing: {{ $log->catatan_pembimbing }}
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        @endforeach
      @endif
    </div>

  </div>
</div>

{{-- MODAL TAMBAH LOG --}}
<div class="modal-overlay" id="modalTambah">
  <div class="modal">
    <div class="modal-hd">
      <div class="modal-title">Tambah Log Kegiatan</div>
      <button class="modal-close" onclick="document.getElementById('modalTambah').classList.remove('open')">×</button>
    </div>
    <form method="POST" action="{{ route('log-kegiatan.store') }}">
      @csrf
      <div class="form-group">
        <label class="form-label">Judul Kegiatan *</label>
        <input type="text" name="judul_kegiatan" class="form-input" placeholder="Contoh: Membuat komponen React" required>
      </div>
      <div class="g2-form">
        <div class="form-group">
          <label class="form-label">Tanggal *</label>
          <input type="date" name="tanggal" class="form-input" value="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
          <label class="form-label">Minggu ke- *</label>
          <input type="number" name="minggu_ke" class="form-input" min="1" max="20" value="{{ $mingguBerjalan }}" required>
        </div>
      </div>
      <div class="g2-form">
        <div class="form-group">
          <label class="form-label">Jam Mulai *</label>
          <input type="time" name="jam_mulai" class="form-input" value="08:00" required>
        </div>
        <div class="form-group">
          <label class="form-label">Jam Selesai *</label>
          <input type="time" name="jam_selesai" class="form-input" value="17:00" required>
        </div>
      </div>
      <div class="g2-form">
        <div class="form-group">
          <label class="form-label">Lokasi</label>
          <input type="text" name="lokasi" class="form-input" placeholder="Contoh: Kantor / WFH">
        </div>
        <div class="form-group">
          <label class="form-label">Kategori</label>
          <select name="kategori" class="form-select">
            <option value="">-- Pilih kategori --</option>
            <option value="Coding">Coding</option>
            <option value="Meeting">Meeting</option>
            <option value="Desain">Desain</option>
            <option value="Dokumentasi">Dokumentasi</option>
            <option value="Testing">Testing</option>
            <option value="Riset">Riset</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi Kegiatan *</label>
        <textarea name="deskripsi" class="form-textarea" placeholder="Ceritakan apa yang kamu kerjakan hari ini..." required></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;">
        <button type="button" class="btn btn-ghost" onclick="document.getElementById('modalTambah').classList.remove('open')">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Log</button>
      </div>
    </form>
  </div>
</div>

<script>
function toggleWeek(n) {
  const el = document.getElementById('week-' + n);
  el.classList.toggle('open');
}
// Buka minggu berjalan secara default
document.addEventListener('DOMContentLoaded', () => {
  const current = document.getElementById('week-{{ $mingguBerjalan }}');
  if (current) current.classList.add('open');
});
</script>
</body>
</html>
