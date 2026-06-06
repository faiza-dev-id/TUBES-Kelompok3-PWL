<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Lowongan Magang — SIGMA</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#faf7f4;--bg2:#fff;--bg3:#f3ede6;--border:rgba(100,30,50,.1);--text-1:#1a0a0f;--text-2:#6b4050;--text-3:#a07080;--primary:#8b1a3a;--primary-dim:rgba(139,26,58,.10);--primary-hover:#6e1530;--amber:#c07020;--amber-dim:rgba(192,112,32,.12);--red:#c0453f;--red-dim:rgba(192,69,63,.10);--green:#2e7d4f;--green-dim:rgba(46,125,79,.10);--blue:#1a5fa0;--blue-dim:rgba(26,95,160,.10);--radius:14px;--sidebar-w:230px;}
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
.search-bar{display:flex;gap:10px;}
.search-input{flex:1;padding:10px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:13px;background:var(--bg2);outline:none;}
.search-input:focus{border-color:var(--primary);}
.btn{padding:9px 18px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-primary{background:var(--primary);color:#fff;}.btn-primary:hover{background:var(--primary-hover);}
/* lowongan cards */
.lowongan-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:16px;}
.low-card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:20px;display:flex;flex-direction:column;gap:12px;transition:.15s;}
.low-card:hover{border-color:var(--primary);box-shadow:0 4px 16px rgba(139,26,58,.08);}
.low-card-hd{display:flex;align-items:flex-start;gap:12px;}
.low-logo{width:44px;height:44px;border-radius:11px;background:var(--bg3);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:var(--text-2);flex-shrink:0;border:1px solid var(--border);}
.low-title{font-size:14px;font-weight:700;line-height:1.3;}
.low-company{font-size:12.5px;color:var(--text-2);margin-top:2px;}
.low-desc{font-size:12.5px;color:var(--text-2);line-height:1.6;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;}
.low-tags{display:flex;flex-wrap:wrap;gap:6px;}
.low-tag{font-size:10.5px;padding:3px 9px;border-radius:20px;background:var(--bg3);color:var(--text-2);font-weight:500;border:1px solid var(--border);}
.low-foot{display:flex;align-items:center;justify-content:space-between;padding-top:10px;border-top:1px solid var(--border);}
.btn-lamar{padding:8px 18px;border-radius:9px;font-size:12.5px;font-weight:600;cursor:pointer;border:none;background:var(--primary);color:#fff;transition:.15s;}
.btn-lamar:hover{background:var(--primary-hover);}
.btn-lamar:disabled,.btn-lamar.sudah{background:var(--bg3);color:var(--text-3);cursor:not-allowed;}
.pill{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;}
.p-ok{background:var(--green-dim);color:var(--green);}
.p-pend{background:var(--amber-dim);color:var(--amber);}
.magang-aktif-notice{background:linear-gradient(135deg,var(--amber-dim),rgba(192,112,32,.05));border:1px solid rgba(192,112,32,.2);border-radius:var(--radius);padding:16px 20px;display:flex;align-items:center;gap:12px;}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:40px;text-align:center;color:var(--text-3);grid-column:span 2;}
.empty-state svg{width:44px;height:44px;margin-bottom:14px;opacity:.35;}
.empty-state h3{font-size:14px;font-weight:700;color:var(--text-2);margin-bottom:6px;}
.alert{padding:10px 14px;border-radius:9px;font-size:12.5px;margin-bottom:0;}
.alert-success{background:var(--green-dim);color:var(--green);}
.alert-error{background:var(--red-dim);color:var(--red);}
/* modal */
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:100;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:16px;width:480px;max-width:95vw;padding:24px;max-height:90vh;overflow-y:auto;}
.modal-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;}
.modal-title{font-size:15px;font-weight:700;}
.modal-close{background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-3);}
.form-group{margin-bottom:14px;}
.form-label{font-size:11.5px;font-weight:600;color:var(--text-2);margin-bottom:5px;display:block;}
.form-input{width:100%;padding:9px 12px;border:1px solid var(--border);border-radius:9px;font-family:inherit;font-size:13px;background:var(--bg3);color:var(--text-1);outline:none;}
.form-input:focus{border-color:var(--primary);background:#fff;}
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
    <a href="{{ route('dashboard') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Dashboard</a>
    <a href="{{ route('lowongan.browse') }}" class="nav-item active"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>Lowongan Magang</a>
    <a href="{{ route('lamaran.index') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Lamaran Saya</a>
    @if($sedangMagang)
    <a href="{{ route('log.index') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>Log Kegiatan</a>
    <a href="{{ route('laporan.index') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17H7A5 5 0 017 7h2"/><path d="M15 7h2a5 5 0 010 10h-2"/><line x1="8" y1="12" x2="16" y2="12"/></svg>Laporan Kegiatan</a>
    <a href="{{ route('penilaian.index') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>Hasil Penilaian</a>
    @endif
  </div>
  <div class="sidebar-foot">
    @php $initials = strtoupper(substr($user->name,0,2)); @endphp
    <div class="user-chip">
      <div class="ava">{{ $initials }}</div>
      <div class="user-info"><div class="user-name">{{ $user->name }}</div><div class="user-role">Mahasiswa</div></div>
    </div>
    <form method="POST" action="{{ route('logout') }}">@csrf
      <button type="submit" class="btn-logout">Keluar</button>
    </form>
  </div>
</nav>

<div class="main">
  <div class="topbar">
    <div class="page-title">Lowongan Magang</div>
    <span style="font-size:12.5px;color:var(--text-3);">{{ $lowongans->count() }} lowongan tersedia</span>
  </div>
  <div class="content">

    @if(session('success'))
      <div class="alert alert-success">✓ {{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-error">✗ {{ session('error') }}</div>
    @endif

    @if($sedangMagang)
      <div class="magang-aktif-notice">
        <div style="font-size:22px;">⚠️</div>
        <div>
          <div style="font-size:13px;font-weight:700;color:var(--amber);">Kamu sedang aktif magang</div>
          <div style="font-size:12px;color:var(--text-2);">
            Tidak bisa melamar lowongan baru selama magang aktif.
            @if($lamaranDiterima) Posisi: <strong>{{ $lamaranDiterima->lowongan->judul_lowongan }}</strong>@endif
          </div>
        </div>
      </div>
    @endif

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('lowongan.browse') }}" class="search-bar">
      <input type="text" name="q" class="search-input" placeholder="Cari posisi atau kata kunci..." value="{{ request('q') }}">
      <button type="submit" class="btn btn-primary">🔍 Cari</button>
    </form>

    {{-- GRID LOWONGAN --}}
    <div class="lowongan-grid">
      @forelse($lowongans as $lowongan)
        <div class="low-card">
          <div class="low-card-hd">
            <div class="low-logo">
              {{ strtoupper(substr($lowongan->mitra->nama_perusahaan ?? $lowongan->mitra->name ?? 'LW', 0, 2)) }}
            </div>
            <div>
              <div class="low-title">{{ $lowongan->judul_lowongan }}</div>
              <div class="low-company">{{ $lowongan->mitra->nama_perusahaan ?? $lowongan->mitra->name ?? '-' }}</div>
            </div>
          </div>
          <div class="low-desc">{{ $lowongan->deskripsi }}</div>
          <div class="low-tags">
            <span class="low-tag">📅 {{ $lowongan->durasi }}</span>
            <span class="low-tag">{{ ucfirst($lowongan->status) }}</span>
            @if($lowongan->mitra->alamat ?? false)
              <span class="low-tag">📍 {{ mb_strimwidth($lowongan->mitra->alamat ?? '', 0, 30, '...') }}</span>
            @endif
          </div>
          <div class="low-foot">
            <div style="font-size:11px;color:var(--text-3);">Dibuka {{ $lowongan->created_at->diffForHumans() }}</div>
            @if($sedangMagang)
              <button class="btn-lamar sudah" disabled>Sedang Magang</button>
            @elseif(in_array($lowongan->id, $sudahDilamar))
              <span class="pill p-pend">⏳ Sudah Dilamar</span>
            @else
              <button class="btn-lamar" onclick="openModal({{ $lowongan->id }}, '{{ addslashes($lowongan->judul_lowongan) }}', '{{ addslashes($lowongan->mitra->nama_perusahaan ?? '') }}')">Lamar Sekarang</button>
            @endif
          </div>
        </div>
      @empty
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>
          <h3>Belum Ada Lowongan</h3>
          <p>Saat ini belum ada lowongan yang tersedia.<br>Coba lagi beberapa saat nanti.</p>
        </div>
      @endforelse
    </div>

  </div>
</div>

{{-- MODAL LAMAR --}}
<div class="modal-overlay" id="modalLamar">
  <div class="modal">
    <div class="modal-hd">
      <div class="modal-title">Konfirmasi Lamaran</div>
      <button class="modal-close" onclick="closeModal()">×</button>
    </div>
    <div style="margin-bottom:18px;">
      <div style="font-size:13px;font-weight:700;" id="modal-posisi">-</div>
      <div style="font-size:12px;color:var(--text-2);margin-top:3px;" id="modal-mitra">-</div>
    </div>
    <form method="POST" action="{{ route('lamaran.store') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="lowongan_id" id="modal-lowongan-id">
      <div class="form-group">
        <label class="form-label">Upload CV <span style="color:var(--red);">*</span> (PDF, maks. 2MB)</label>
        <input type="file" name="cv_path" id="input-cv" class="form-input" accept=".pdf" required>
        <div style="font-size:11px;color:var(--text-3);margin-top:4px;">Wajib diisi. Hanya file PDF yang diterima.</div>
      </div>
      <div class="form-group">
        <label class="form-label">Surat Lamaran <span style="color:var(--red);">*</span> (PDF, maks. 2MB)</label>
        <input type="file" name="surat_lamaran_path" id="input-surat" class="form-input" accept=".pdf" required>
        <div style="font-size:11px;color:var(--text-3);margin-top:4px;">Wajib diisi. Hanya file PDF yang diterima.</div>
      </div>
      <div style="background:var(--amber-dim);border-radius:9px;padding:10px 14px;font-size:12px;color:var(--amber);margin-bottom:16px;">
        ⚠ CV dan Surat Lamaran wajib dilampirkan dalam format PDF.
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;">
        <button type="button" class="btn" style="background:var(--bg3);color:var(--text-2);" onclick="closeModal()">Batal</button>
        <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
      </div>
    </form>
  </div>
</div>

<script>
function openModal(id, posisi, mitra) {
  document.getElementById('modal-lowongan-id').value = id;
  document.getElementById('modal-posisi').textContent = posisi;
  document.getElementById('modal-mitra').textContent = mitra;
  // Reset form setiap kali modal dibuka
  document.getElementById('input-cv').value = '';
  document.getElementById('input-surat').value = '';
  document.getElementById('modalLamar').classList.add('open');
}
function closeModal() {
  document.getElementById('modalLamar').classList.remove('open');
}

document.querySelector('#modalLamar form').addEventListener('submit', function(e) {
  const cv    = document.getElementById('input-cv');
  const surat = document.getElementById('input-surat');
  let errors  = [];

  if (!cv.files || cv.files.length === 0) {
    errors.push('CV wajib dilampirkan.');
  }
  if (!surat.files || surat.files.length === 0) {
    errors.push('Surat Lamaran wajib dilampirkan.');
  }

  if (errors.length > 0) {
    e.preventDefault();
    alert('⚠ ' + errors.join('\n'));
    return false;
  }
});
</script>
</body>
</html>