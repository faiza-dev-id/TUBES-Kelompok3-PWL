<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Lamaran Saya — SIGMA</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#faf7f4;--bg2:#ffffff;--bg3:#f3ede6;--border:rgba(100,30,50,.1);--text-1:#1a0a0f;--text-2:#6b4050;--text-3:#a07080;--primary:#8b1a3a;--primary-dim:rgba(139,26,58,.10);--primary-hover:#6e1530;--amber:#c07020;--amber-dim:rgba(192,112,32,.12);--red:#c0453f;--red-dim:rgba(192,69,63,.10);--green:#2e7d4f;--green-dim:rgba(46,125,79,.10);--blue:#1a5fa0;--blue-dim:rgba(26,95,160,.10);--radius:14px;--sidebar-w:230px;}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--text-1);display:flex;min-height:100vh;font-size:14px;}

.sidebar{width:var(--sidebar-w);background:var(--primary);border-right:1px solid rgba(0,0,0,.08);display:flex;flex-direction:column;padding:24px 0;position:fixed;height:100vh;top:0;left:0;z-index:10;}
.sidebar-logo{display:flex;align-items:center;gap:10px;padding:0 20px 28px;border-bottom:1px solid rgba(255,255,255,.15);}
.logo-mark{width:34px;height:34px;background:rgba(255,255,255,.2);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;color:#fff;}
.logo-text{font-weight:700;font-size:15px;color:#fff;}
.logo-sub{font-size:10px;color:rgba(255,255,255,.55);font-family:'DM Mono',monospace;}
.nav-group{padding:20px 12px 8px;flex:1;}
.nav-label{font-size:9.5px;letter-spacing:.12em;color:rgba(255,255,255,.45);text-transform:uppercase;font-weight:600;padding:0 8px;margin-bottom:6px;}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:9px;cursor:pointer;color:rgba(255,255,255,.7);font-size:13px;font-weight:500;margin-bottom:2px;transition:.15s;text-decoration:none;}
.nav-item:hover{background:rgba(255,255,255,.12);color:#fff;}
.nav-item.active{background:rgba(255,255,255,.18);color:#fff;}
.nav-icon{width:16px;height:16px;flex-shrink:0;}
.sidebar-foot{padding:16px 12px;border-top:1px solid rgba(255,255,255,.15);}
.user-chip{display:flex;align-items:center;gap:10px;padding:10px;border-radius:10px;background:rgba(255,255,255,.12);}
.ava{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;}
.user-info{flex:1;min-width:0;}
.user-name{font-size:12px;font-weight:600;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.user-role{font-size:10px;color:rgba(255,255,255,.55);}
.btn-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;transition:.15s;width:100%;margin-top:8px;}
.btn-logout:hover{background:rgba(255,255,255,.1);color:#fff;}

.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:9;box-shadow:0 1px 0 var(--border);}
.page-title{font-size:15px;font-weight:700;}
.content{padding:28px;display:flex;flex-direction:column;gap:20px;}

.g4{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;}
.stat-c{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;flex-direction:column;gap:8px;}
.stat-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;}
.stat-icon svg{width:18px;height:18px;}
.icon-blue{background:var(--blue-dim);color:var(--blue);}
.icon-green{background:var(--green-dim);color:var(--green);}
.icon-amber{background:var(--amber-dim);color:var(--amber);}
.icon-red{background:var(--red-dim);color:var(--red);}
.stat-val{font-size:26px;font-weight:700;font-family:'DM Mono',monospace;line-height:1;}
.stat-lbl{font-size:12.5px;font-weight:600;color:var(--text-1);}
.stat-sub{font-size:11px;color:var(--text-3);}

.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:20px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
.card-title{font-size:13.5px;font-weight:700;}

.tbl{width:100%;border-collapse:collapse;}
.tbl th{font-size:10.5px;letter-spacing:.05em;text-transform:uppercase;color:var(--text-3);font-weight:600;padding:0 12px 10px;text-align:left;border-bottom:1px solid var(--border);}
.tbl td{padding:12px 12px;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.tbl tr:last-child td{border-bottom:none;}
.tbl tr:hover td{background:var(--bg3);}

.pill{display:inline-flex;align-items:center;gap:5px;padding:3px 9px;border-radius:20px;font-size:10.5px;font-weight:600;white-space:nowrap;}
.pill-dot{width:6px;height:6px;border-radius:50%;flex-shrink:0;}
.p-ok{background:var(--green-dim);color:var(--green);}
.p-ok .pill-dot{background:var(--green);}
.p-no{background:var(--red-dim);color:var(--red);}
.p-no .pill-dot{background:var(--red);}
.p-pend{background:var(--amber-dim);color:var(--amber);}
.p-pend .pill-dot{background:var(--amber);}

.btn-cancel{background:var(--red-dim);color:var(--red);border:none;padding:5px 12px;border-radius:7px;font-size:11.5px;font-weight:600;cursor:pointer;transition:.15s;}
.btn-cancel:hover{background:var(--red);color:#fff;}

.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:48px 16px;text-align:center;color:var(--text-3);}
.empty-state svg{width:40px;height:40px;margin-bottom:12px;opacity:.4;}
.empty-state p{font-size:12.5px;line-height:1.6;}

.alert{padding:10px 14px;border-radius:9px;font-size:12.5px;margin-bottom:4px;}
.alert-success{background:var(--green-dim);color:var(--green);}
.alert-error{background:var(--red-dim);color:var(--red);}

.low-logo{width:34px;height:34px;border-radius:8px;background:var(--primary-dim);color:var(--primary);font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
</style>
</head>
<body>

{{-- ── SIDEBAR (sama persis dengan dashboard mahasiswa) ── --}}
<nav class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-mark">Si</div>
    <div>
      <div class="logo-text">SIGMA</div>
      <div class="logo-sub">Mahasiswa Portal</div>
    </div>
  </div>
  <div class="nav-group">
    <div class="nav-label">Menu Utama</div>
    <a href="{{ route('dashboard') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
      Dashboard
    </a>
    <a href="{{ route('lowongan.browse') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>
      Lowongan Magang
    </a>
    <a href="{{ route('lamaran.index') }}" class="nav-item active">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
      Lamaran Saya
    </a>
    @if($sedangMagang)
    <a href="{{ route('log.index') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
      Log Kegiatan
    </a>
    <a href="{{ route('laporan.index') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17H7A5 5 0 017 7h2"/><path d="M15 7h2a5 5 0 010 10h-2"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
      Laporan Kegiatan
    </a>
    <a href="{{ route('penilaian.index') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
      Hasil Penilaian
    </a>
    @endif
  </div>
  <div class="sidebar-foot">
    @php $initials = strtoupper(substr($user->name, 0, 2)); @endphp
    <div class="user-chip">
      <div class="ava">{{ $initials }}</div>
      <div class="user-info">
        <div class="user-name">{{ $user->name }}</div>
        <div class="user-role">Mahasiswa</div>
      </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn-logout">Keluar</button>
    </form>
  </div>
</nav>

{{-- ── MAIN ── --}}
<div class="main">
  <div class="topbar">
    <div class="page-title">Lamaran Saya</div>
  </div>

  <div class="content">

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    {{-- ── 4 STAT CARDS ── --}}
    <div class="g4">
      <div class="stat-c">
        <div class="stat-icon icon-blue">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="stat-val">{{ $stats['total'] }}</div>
        <div class="stat-lbl">Total Lamaran</div>
        <div class="stat-sub">Semua waktu</div>
      </div>
      <div class="stat-c">
        <div class="stat-icon icon-amber">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div class="stat-val">{{ $stats['pending'] }}</div>
        <div class="stat-lbl">Menunggu</div>
        <div class="stat-sub">Belum diproses</div>
      </div>
      <div class="stat-c">
        <div class="stat-icon icon-green">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <div class="stat-val">{{ $stats['diterima'] }}</div>
        <div class="stat-lbl">Diterima</div>
        <div class="stat-sub">Lamaran berhasil</div>
      </div>
      <div class="stat-c">
        <div class="stat-icon icon-red">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
        </div>
        <div class="stat-val">{{ $stats['ditolak'] }}</div>
        <div class="stat-lbl">Ditolak</div>
        <div class="stat-sub">Tidak diterima</div>
      </div>
    </div>

    {{-- ── TABEL LAMARAN ── --}}
    <div class="card">
      <div class="card-hd">
        <div class="card-title">Riwayat Lamaran</div>
      </div>

      @if($lamarans->isEmpty())
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          <p>Belum ada lamaran yang dikirim.<br>Cari lowongan dan mulai lamar sekarang.</p>
          <a href="{{ route('lowongan.browse') }}" style="margin-top:14px;padding:8px 18px;background:var(--primary);color:#fff;border-radius:9px;text-decoration:none;font-size:12.5px;font-weight:600;">
            Cari Lowongan →
          </a>
        </div>
      @else
        <table class="tbl">
          <thead>
            <tr>
              <th>No</th>
              <th>Posisi & Perusahaan</th>
              <th>Tanggal Lamar</th>
              <th>Diproses</th>
              <th>Status</th>
              <th>Catatan Mitra</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($lamarans as $i => $lamaran)
            <tr>
              <td style="color:var(--text-3);font-family:'DM Mono',monospace;">{{ $i + 1 }}</td>
              <td>
                <div style="display:flex;align-items:center;gap:10px;">
                  <div class="low-logo">
                    {{ strtoupper(substr($lamaran->lowongan?->mitra?->nama_perusahaan ?? 'LW', 0, 2)) }}
                  </div>
                  <div>
                    <div style="font-weight:600;font-size:13px;">{{ $lamaran->lowongan?->judul_lowongan ?? '-' }}</div>
                    <div style="font-size:11px;color:var(--text-3);">{{ $lamaran->lowongan?->mitra?->nama_perusahaan ?? '-' }}</div>
                  </div>
                </div>
              </td>
              <td style="color:var(--text-3);font-family:'DM Mono',monospace;font-size:11.5px;">
                {{ $lamaran->created_at->format('d M Y') }}
              </td>
              <td style="color:var(--text-3);font-family:'DM Mono',monospace;font-size:11.5px;">
                {{ $lamaran->diproses_pada ? $lamaran->diproses_pada->format('d M Y') : '—' }}
              </td>
              <td>
                @if($lamaran->status === 'diterima')
                  <span class="pill p-ok"><span class="pill-dot"></span>Diterima</span>
                @elseif($lamaran->status === 'ditolak')
                  <span class="pill p-no"><span class="pill-dot"></span>Ditolak</span>
                @else
                  <span class="pill p-pend"><span class="pill-dot"></span>Menunggu</span>
                @endif
              </td>
              <td style="max-width:180px;">
                @if($lamaran->catatan_mitra)
                  <span style="font-size:11.5px;color:var(--text-2);display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                    {{ $lamaran->catatan_mitra }}
                  </span>
                @else
                  <span style="color:var(--text-3);font-size:11.5px;">—</span>
                @endif
              </td>
              <td>
                @if($lamaran->status === 'pending')
                  <form method="POST" action="{{ route('lamaran.destroy', $lamaran->id) }}"
                        onsubmit="return confirm('Batalkan lamaran ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-cancel">Batalkan</button>
                  </form>
                @else
                  <span style="font-size:11px;color:var(--text-3);">—</span>
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

</body>
</html>