<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Laporan Kegiatan — SIGMA</title>
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
.btn-logout:hover{background:rgba(255,255,255,.1);color:#fff;}
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:9;}
.page-title{font-size:15px;font-weight:700;}
.content{padding:28px;display:flex;flex-direction:column;gap:20px;}
.g4{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;}
.stat-c{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px;}
.stat-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:10px;}
.stat-icon svg{width:18px;height:18px;}
.icon-amber{background:var(--amber-dim);color:var(--amber);}
.icon-green{background:var(--green-dim);color:var(--green);}
.icon-blue{background:var(--blue-dim);color:var(--blue);}
.icon-red{background:var(--red-dim);color:var(--red);}
.stat-val{font-size:26px;font-weight:700;font-family:'DM Mono',monospace;}
.stat-lbl{font-size:12.5px;font-weight:600;margin-top:2px;}.stat-sub{font-size:11px;color:var(--text-3);}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:22px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;}
.card-title{font-size:13.5px;font-weight:700;}
.btn{padding:9px 18px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-primary{background:var(--primary);color:#fff;}.btn-primary:hover{background:var(--primary-hover);}
.btn-ghost{background:transparent;color:var(--text-2);border:1px solid var(--border);}
.btn-ghost:hover{border-color:var(--primary);color:var(--primary);}
.btn-danger{background:var(--red-dim);color:var(--red);border:none;padding:5px 10px;border-radius:7px;font-size:11px;font-weight:600;cursor:pointer;}
.pill{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;}
.p-ok{background:var(--green-dim);color:var(--green);}
.p-no{background:var(--red-dim);color:var(--red);}
.p-pend{background:var(--amber-dim);color:var(--amber);}
.p-blue{background:var(--blue-dim);color:var(--blue);}
/* jenis dokumen roadmap */
.doc-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;}
.doc-item{border:1px solid var(--border);border-radius:var(--radius);padding:16px;text-align:center;}
.doc-item.done{border-color:var(--green);background:var(--green-dim);}
.doc-item.pending-doc{border-color:var(--amber);background:var(--amber-dim);}
.doc-item.future{opacity:.5;}
.doc-icon{font-size:24px;margin-bottom:8px;}
.doc-label{font-size:12px;font-weight:700;}
.doc-sub{font-size:10.5px;color:var(--text-3);margin-top:3px;}
/* laporan list */
.laporan-item{display:flex;align-items:center;gap:14px;padding:14px;border-radius:10px;border:1px solid var(--border);margin-bottom:10px;transition:.15s;}
.laporan-item:hover{border-color:var(--primary);}
.lap-icon{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;background:var(--bg3);}
.lap-body{flex:1;}
.lap-judul{font-size:13px;font-weight:700;}
.lap-meta{font-size:11.5px;color:var(--text-3);margin-top:2px;}
.lap-actions{display:flex;gap:8px;align-items:center;}
.btn-download{background:var(--blue-dim);color:var(--blue);border:none;padding:6px 12px;border-radius:7px;font-size:11.5px;font-weight:600;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;gap:4px;}
.deadline-bar{background:linear-gradient(135deg,var(--amber-dim),rgba(192,112,32,.05));border:1px solid rgba(192,112,32,.2);border-radius:var(--radius);padding:16px 20px;display:flex;align-items:center;gap:14px;}
.form-group{margin-bottom:14px;}
.form-label{font-size:11.5px;font-weight:600;color:var(--text-2);margin-bottom:5px;display:block;}
.form-input,.form-select,.form-textarea{width:100%;padding:9px 12px;border:1px solid var(--border);border-radius:9px;font-family:inherit;font-size:13px;background:var(--bg3);color:var(--text-1);outline:none;transition:.15s;}
.form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--primary);background:#fff;}
.g2-form{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
.alert{padding:10px 14px;border-radius:9px;font-size:12.5px;margin-bottom:14px;}
.alert-success{background:var(--green-dim);color:var(--green);}
.alert-error{background:var(--red-dim);color:var(--red);}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:32px;text-align:center;color:var(--text-3);}
.empty-state svg{width:40px;height:40px;margin-bottom:12px;opacity:.4;}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:100;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:16px;width:500px;max-width:95vw;padding:24px;max-height:90vh;overflow-y:auto;}
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
    <a href="{{ route('dashboard') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Dashboard</a>
    <a href="{{ route('lowongan.browse') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>Lowongan Magang</a>
    <a href="{{ route('lamaran.index') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Lamaran Saya</a>
    <a href="{{ route('log.index') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>Log Kegiatan</a>
    <a href="{{ route('laporan.index') }}" class="nav-item active"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17H7A5 5 0 017 7h2"/><path d="M15 7h2a5 5 0 010 10h-2"/><line x1="8" y1="12" x2="16" y2="12"/></svg>Laporan Kegiatan</a>
    <a href="{{ route('penilaian.index') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>Hasil Penilaian</a>
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
    <div class="page-title">Laporan Kegiatan</div>
    <button class="btn btn-primary" onclick="document.getElementById('modalUpload').classList.add('open')">+ Upload Laporan</button>
  </div>
  <div class="content">

    @if(session('success'))
      <div class="alert alert-success">✓ {{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-error">✗ {{ session('error') }}</div>
    @endif

    {{-- DEADLINE BANNER --}}
    <div class="deadline-bar">
      <div style="font-size:28px;">⏰</div>
      <div style="flex:1">
        <div style="font-size:13px;font-weight:700;color:var(--amber);">Deadline Laporan Akhir</div>
        <div style="font-size:12px;color:var(--text-2);">{{ $deadline->format('d F Y') }}</div>
      </div>
      <div style="text-align:right;">
        <div style="font-size:22px;font-weight:700;font-family:'DM Mono',monospace;color:var(--amber);">{{ $hariTersisa }}</div>
        <div style="font-size:11px;color:var(--text-3);">hari tersisa</div>
      </div>
    </div>

    {{-- STATISTIK --}}
    <div class="g4">
      <div class="stat-c">
        <div class="stat-icon icon-blue"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
        <div class="stat-val">{{ $laporan->count() }}</div>
        <div class="stat-lbl">Total Dokumen</div>
        <div class="stat-sub">Semua laporan</div>
      </div>
      <div class="stat-c">
        <div class="stat-icon icon-green"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
        <div class="stat-val">{{ $laporan->where('status','diterima')->count() }}</div>
        <div class="stat-lbl">Diterima</div>
        <div class="stat-sub">Sudah divalidasi</div>
      </div>
      <div class="stat-c">
        <div class="stat-icon icon-amber"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <div class="stat-val">{{ $laporan->where('status','dikirim')->count() }}</div>
        <div class="stat-lbl">Dikirim</div>
        <div class="stat-sub">Menunggu review</div>
      </div>
      <div class="stat-c">
        <div class="stat-icon icon-red"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></div>
        <div class="stat-val">{{ $laporan->where('status','revisi')->count() }}</div>
        <div class="stat-lbl">Perlu Revisi</div>
        <div class="stat-sub">Harus diperbaiki</div>
      </div>
    </div>

    {{-- ROADMAP DOKUMEN --}}
    <div class="card">
      <div class="card-hd"><div class="card-title">Checklist Dokumen Wajib</div></div>
      <div class="doc-grid">
        @php
          $jenisList = [
            ['key'=>'mingguan','label'=>'Laporan Mingguan','icon'=>'📋'],
            ['key'=>'tengah',  'label'=>'Laporan Tengah',  'icon'=>'📊'],
            ['key'=>'akhir',   'label'=>'Laporan Akhir',   'icon'=>'📝'],
            ['key'=>'presentasi','label'=>'Bahan Presentasi','icon'=>'📊'],
          ];
        @endphp
        @foreach($jenisList as $jenis)
          @php
            $ada = $laporan->where('jenis_laporan', $jenis['key'])->first();
            $kelas = $ada ? ($ada->status === 'diterima' ? 'done' : 'pending-doc') : 'future';
          @endphp
          <div class="doc-item {{ $kelas }}">
            <div class="doc-icon">{{ $jenis['icon'] }}</div>
            <div class="doc-label">{{ $jenis['label'] }}</div>
            <div class="doc-sub">
              @if($ada)
                @if($ada->status === 'diterima') ✓ Diterima
                @elseif($ada->status === 'revisi') ⚠ Revisi
                @else ⏳ Menunggu review
                @endif
              @else Belum diunggah
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- DAFTAR LAPORAN --}}
    <div class="card">
      <div class="card-hd"><div class="card-title">Semua Laporan</div></div>
      @if($laporan->isEmpty())
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          <p>Belum ada laporan yang diunggah. Klik <strong>"+ Upload Laporan"</strong> untuk memulai.</p>
        </div>
      @else
        @foreach($laporan as $lap)
          <div class="laporan-item">
            <div class="lap-icon">
              @if(str_contains($lap->file_path, '.pdf')) 📄
              @elseif(str_contains($lap->file_path, '.ppt')) 📊
              @else 📝 @endif
            </div>
            <div class="lap-body">
              <div class="lap-judul">{{ $lap->judul_laporan }}</div>
              <div class="lap-meta">
                {{ ucfirst($lap->jenis_laporan) }} · Diunggah {{ $lap->created_at->diffForHumans() }}
                @if($lap->catatan_reviewer) · <em style="color:var(--red)">{{ $lap->catatan_reviewer }}</em> @endif
              </div>
            </div>
            <div class="lap-actions">
              @if($lap->status === 'diterima') <span class="pill p-ok">✓ Diterima</span>
              @elseif($lap->status === 'revisi') <span class="pill p-no">⚠ Revisi</span>
              @else <span class="pill p-pend">⏳ Dikirim</span>
              @endif
              <a href="{{ route('laporan.download', $lap->id) }}" class="btn-download">⬇ Unduh</a>
              @if($lap->status !== 'diterima')
                <form method="POST" action="{{ route('laporan.destroy', $lap->id) }}" onsubmit="return confirm('Hapus laporan ini?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn-danger">Hapus</button>
                </form>
              @endif
            </div>
          </div>
        @endforeach
      @endif
    </div>

  </div>
</div>

{{-- MODAL UPLOAD --}}
<div class="modal-overlay" id="modalUpload">
  <div class="modal">
    <div class="modal-hd">
      <div class="modal-title">Upload Laporan Kegiatan</div>
      <button class="modal-close" onclick="document.getElementById('modalUpload').classList.remove('open')">×</button>
    </div>
    <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="form-label">Judul Laporan *</label>
        <input type="text" name="judul_laporan" class="form-input" placeholder="Contoh: Laporan Minggu ke-3" required>
      </div>
      <div class="form-group">
        <label class="form-label">Jenis Laporan *</label>
        <select name="jenis_laporan" class="form-select" required>
          <option value="">-- Pilih jenis --</option>
          <option value="mingguan">Laporan Mingguan</option>
          <option value="tengah">Laporan Tengah</option>
          <option value="akhir">Laporan Akhir</option>
          <option value="presentasi">Bahan Presentasi</option>
          <option value="lainnya">Lainnya</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">File Laporan * (PDF/DOC/PPT, maks 10MB)</label>
        <input type="file" name="file_laporan" class="form-input" accept=".pdf,.doc,.docx,.ppt,.pptx" required>
      </div>
      <div class="form-group">
        <label class="form-label">Keterangan (opsional)</label>
        <textarea name="keterangan" class="form-textarea" placeholder="Catatan tambahan..."></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;">
        <button type="button" class="btn btn-ghost" onclick="document.getElementById('modalUpload').classList.remove('open')">Batal</button>
        <button type="submit" class="btn btn-primary">Upload Laporan</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>