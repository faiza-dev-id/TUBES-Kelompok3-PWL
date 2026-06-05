<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Dashboard Mahasiswa — SIGMA</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root {
  --bg: #faf7f4;
  --bg2: #ffffff;
  --bg3: #f3ede6;
  --border: rgba(100,30,50,.1);
  --text-1: #1a0a0f;
  --text-2: #6b4050;
  --text-3: #a07080;
  --primary: #8b1a3a;
  --primary-dim: rgba(139,26,58,.10);
  --primary-hover: #6e1530;
  --amber: #c07020;
  --amber-dim: rgba(192,112,32,.12);
  --red: #c0453f;
  --red-dim: rgba(192,69,63,.10);
  --green: #2e7d4f;
  --green-dim: rgba(46,125,79,.10);
  --blue: #1a5fa0;
  --blue-dim: rgba(26,95,160,.10);
  --radius: 14px;
  --sidebar-w: 230px;
}
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

.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:9;box-shadow:0 1px 0 var(--border);}
.page-title{font-size:15px;font-weight:700;}
.topbar-right{display:flex;align-items:center;gap:10px;}
.btn-notif{width:34px;height:34px;border-radius:8px;background:var(--bg3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;position:relative;}
.notif-dot{position:absolute;top:7px;right:7px;width:6px;height:6px;border-radius:50%;background:var(--red);}
.btn{padding:7px 14px;border-radius:8px;font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-primary{background:var(--primary);color:#fff;}
.btn-primary:hover{background:var(--primary-hover);}
.btn-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;transition:.15s;width:100%;margin-top:8px;}
.btn-logout:hover{background:rgba(255,255,255,.1);color:#fff;}

.content{padding:28px;display:flex;flex-direction:column;gap:22px;}

.hero{background:linear-gradient(135deg,var(--primary),#6e1530);border-radius:var(--radius);padding:24px;display:flex;align-items:center;gap:20px;position:relative;overflow:hidden;color:#fff;}
.hero::before{content:'';position:absolute;top:-40px;right:-40px;width:220px;height:220px;background:rgba(255,255,255,.05);border-radius:50%;}
.hero-ava{width:58px;height:58px;border-radius:14px;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:700;color:#fff;flex-shrink:0;}
.hero-name{font-size:20px;font-weight:700;margin-bottom:3px;}
.hero-meta{font-size:12.5px;color:rgba(255,255,255,.7);margin-bottom:10px;}
.htags{display:flex;flex-wrap:wrap;gap:6px;}
.htag{padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;}
.htag-green{background:rgba(46,125,79,.3);color:#a8e6c0;}
.htag-blue{background:rgba(255,255,255,.15);color:#fff;}
.htag-amber{background:rgba(192,112,32,.3);color:#ffd080;}
.htag-gray{background:rgba(255,255,255,.1);color:rgba(255,255,255,.6);}
.hero-right{margin-left:auto;text-align:right;flex-shrink:0;}
.hero-pct{font-size:32px;font-weight:700;color:#fff;font-family:'DM Mono',monospace;}
.hero-sub{font-size:11px;color:rgba(255,255,255,.55);margin-bottom:10px;}
.prog-wrap{width:140px;}
.prog-bar{height:5px;background:rgba(255,255,255,.2);border-radius:3px;overflow:hidden;margin-bottom:5px;}
.prog-fill{height:100%;background:rgba(255,255,255,.7);border-radius:3px;}
.prog-note{font-size:10.5px;color:rgba(255,255,255,.55);font-family:'DM Mono',monospace;}

.g4{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;}
.g2{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.g3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;}
.stat-c{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;flex-direction:column;gap:8px;}
.stat-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;}
.stat-icon svg{width:18px;height:18px;}
.icon-blue{background:var(--blue-dim);color:var(--blue);}
.icon-green{background:var(--green-dim);color:var(--green);}
.icon-amber{background:var(--amber-dim);color:var(--amber);}
.icon-purple{background:var(--primary-dim);color:var(--primary);}
.icon-red{background:var(--red-dim);color:var(--red);}
.stat-val{font-size:26px;font-weight:700;font-family:'DM Mono',monospace;line-height:1;}
.stat-lbl{font-size:12.5px;font-weight:600;color:var(--text-1);}
.stat-sub{font-size:11px;color:var(--text-3);}

.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:20px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
.card-title{font-size:13.5px;font-weight:700;}
.card-link{font-size:12px;color:var(--primary);text-decoration:none;font-weight:600;}
.card-link:hover{text-decoration:underline;}

.tbl{width:100%;border-collapse:collapse;}
.tbl th{font-size:10.5px;letter-spacing:.05em;text-transform:uppercase;color:var(--text-3);font-weight:600;padding:0 0 10px;text-align:left;border-bottom:1px solid var(--border);}
.tbl td{padding:10px 0;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.tbl tr:last-child td{border-bottom:none;}

.pill{display:inline-flex;align-items:center;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;white-space:nowrap;}
.p-ok{background:var(--green-dim);color:var(--green);}
.p-no{background:var(--red-dim);color:var(--red);}
.p-pend{background:var(--amber-dim);color:var(--amber);}
.p-blue{background:var(--blue-dim);color:var(--blue);}

.tl{display:flex;flex-direction:column;}
.tl-item{display:flex;gap:12px;margin-bottom:0;}
.tl-g{display:flex;flex-direction:column;align-items:center;width:20px;flex-shrink:0;}
.tl-dot{width:12px;height:12px;border-radius:50%;flex-shrink:0;margin-top:2px;}
.tl-line{width:1.5px;flex:1;min-height:28px;background:var(--border);margin:4px 0;}
.tl-item:last-child .tl-line{display:none;}
.dot-done{background:var(--green);}
.dot-now{background:var(--primary);box-shadow:0 0 0 3px var(--primary-dim);}
.dot-future{background:var(--bg3);border:2px solid var(--border);}
.tl-body{padding-bottom:18px;}
.tl-label{font-size:12.5px;font-weight:600;}
.lbl-active{color:var(--primary);}
.lbl-muted{color:var(--text-3);}
.tl-desc{font-size:11.5px;color:var(--text-2);margin:2px 0;}
.tl-date{font-size:10.5px;color:var(--text-3);font-family:'DM Mono',monospace;}

.lowongan-list{display:flex;flex-direction:column;gap:10px;}
.lowongan-item{display:flex;align-items:center;gap:12px;padding:12px;border-radius:10px;border:1px solid var(--border);background:var(--bg3);transition:.15s;text-decoration:none;color:inherit;}
.lowongan-item:hover{border-color:var(--primary);}
.low-logo{width:36px;height:36px;border-radius:9px;background:var(--bg2);display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;color:var(--text-2);flex-shrink:0;border:1px solid var(--border);}
.low-body{flex:1;min-width:0;}
.low-company{font-size:13px;font-weight:700;}
.low-pos{font-size:11.5px;color:var(--text-2);}
.low-tags{display:flex;gap:5px;margin-top:4px;}
.low-tag{font-size:10px;padding:2px 7px;border-radius:20px;background:var(--bg2);color:var(--text-3);font-weight:500;border:1px solid var(--border);}
.low-right{text-align:right;flex-shrink:0;}
.low-slot{font-size:10.5px;color:var(--amber);font-weight:600;}

/* Quick action cards saat magang aktif */
.quick-actions{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;}
.qa-card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;align-items:center;gap:14px;text-decoration:none;color:inherit;transition:.15s;}
.qa-card:hover{border-color:var(--primary);box-shadow:0 2px 12px rgba(139,26,58,.08);}
.qa-icon{width:42px;height:42px;border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.qa-icon svg{width:20px;height:20px;}
.qa-body{}
.qa-title{font-size:13px;font-weight:700;margin-bottom:2px;}
.qa-sub{font-size:11.5px;color:var(--text-3);}

.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:32px 16px;text-align:center;color:var(--text-3);}
.empty-state svg{width:40px;height:40px;margin-bottom:12px;opacity:.4;}
.empty-state p{font-size:12.5px;}

.lamaran-row td:first-child{font-weight:600;}

.magang-banner{background:linear-gradient(135deg,var(--green-dim),rgba(46,125,79,.05));border:1px solid rgba(46,125,79,.2);border-radius:var(--radius);padding:18px 22px;display:flex;align-items:center;gap:14px;}
.magang-banner-icon{width:42px;height:42px;border-radius:11px;background:var(--green-dim);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.magang-banner-icon svg{width:22px;height:22px;color:var(--green);}
.magang-banner-title{font-size:13.5px;font-weight:700;color:var(--green);margin-bottom:3px;}
.magang-banner-desc{font-size:12px;color:var(--text-2);}

/* Progress summary bar saat magang aktif */
.progress-summary{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px 22px;}
.ps-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;}
.ps-title{font-size:13.5px;font-weight:700;}
.ps-sub{font-size:12px;color:var(--text-3);}
.ps-weeks{display:grid;grid-template-columns:repeat(16,1fr);gap:3px;}
.ps-cell{height:22px;border-radius:4px;display:flex;align-items:center;justify-content:center;font-size:8px;font-weight:700;font-family:'DM Mono',monospace;}
.wc-done{background:var(--primary);color:#fff;}
.wc-now{background:var(--primary);color:#fff;outline:2px solid var(--primary);outline-offset:2px;}
.wc-future{background:var(--bg3);color:var(--text-3);}
.ps-labels{display:flex;justify-content:space-between;margin-top:6px;}
.ps-lbl{font-size:9px;color:var(--text-3);}

@keyframes fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease both;}
</style>
</head>
<body>

{{-- ═══════════════════════════ SIDEBAR ═══════════════════════════ --}}
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
    <a href="{{ route('dashboard') }}" class="nav-item active">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
      Dashboard
    </a>
    <a href="{{ route('lowongan.browse') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>
      Lowongan Magang
    </a>
    <a href="{{ route('lamaran.saya') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
      Lamaran Saya
    </a>
    @if($sedangMagang)
    <a href="{{ route('log-kegiatan.index') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
      Log Kegiatan
    </a>
    <a href="{{ route('laporan-kegiatan.index') }}" class="nav-item">
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
        <div class="user-role">{{ $sedangMagang ? 'Mahasiswa Aktif Magang' : 'Mahasiswa' }}</div>
      </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn-logout">Keluar</button>
    </form>
  </div>
</nav>

{{-- ═══════════════════════════ MAIN ═══════════════════════════ --}}
<div class="main">
  <div class="topbar">
    <div class="page-title">Dashboard Mahasiswa</div>
    <div class="topbar-right">
      <div class="btn-notif">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
        @if(!$lamarans->isEmpty())<div class="notif-dot"></div>@endif
      </div>
    </div>
  </div>

  <div class="content">

    {{-- ── HERO CARD ── --}}
    <div class="hero fade-up">
      <div class="hero-ava">{{ $initials }}</div>
      <div>
        <div class="hero-name">{{ $user->name }}</div>
        <div class="hero-meta">{{ $user->email }}</div>
        <div class="htags">
          @if($sedangMagang && $statsMagang)
            <span class="htag htag-green">Sedang Magang</span>
            <span class="htag htag-blue">{{ $lamaranDiterima?->lowongan?->mitra?->nama_perusahaan ?? 'Mitra' }}</span>
            <span class="htag htag-amber">Minggu ke-{{ $statsMagang['minggu_berjalan'] }}</span>
          @else
            <span class="htag htag-amber">Belum Magang</span>
            <span class="htag htag-gray">Cari Lowongan</span>
          @endif
        </div>
      </div>
      <div class="hero-right">
        @if($sedangMagang && $statsMagang)
          {{-- Progress magang saat aktif --}}
          <div class="hero-pct">{{ $statsMagang['progress_pct'] ?? 0 }}<span style="font-size:16px;color:rgba(255,255,255,.5)">%</span></div>
          <div class="hero-sub">Progress magang</div>
          <div class="prog-wrap">
            <div class="prog-bar">
              <div class="prog-fill" style="width: {{ $statsMagang['progress_pct'] ?? 0 }}%;"></div>
            </div>
           
            <div class="prog-note">{{ $statsMagang['minggu_berjalan'] }} / {{ $statsMagang['total_minggu'] }} minggu selesai</div>
          </div>
        @else
          {{-- Total lamaran saat belum magang --}}
          <div class="hero-pct">{{ $stats['total_lamaran'] }}</div>
          <div class="hero-sub">Total lamaran</div>
          <div class="prog-wrap">
            <div class="prog-bar">
              @php
                $pct = $stats['total_lamaran'] > 0
                  ? round(($stats['diterima'] / $stats['total_lamaran']) * 100)
                  : 0;
              @endphp
              <div class="prog-fill" style="width: {{ $pct }}%;"></div>
            </div>
            <div class="prog-note">{{ $pct }}% diterima</div>
          </div>
        @endif
      </div>
    </div>


    @if($sedangMagang)
      {{-- ══ DASHBOARD SAAT MAGANG AKTIF ══ --}}

      {{-- ── 4 STAT MAGANG ── --}}
      <div class="g4 fade-up" style="animation-delay:.1s">
        <div class="stat-c">
          <div class="stat-icon icon-green">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
          <div class="stat-val">{{ $statsMagang['nilai_sementara'] ?? '—' }}</div>
          <div class="stat-lbl">Nilai Sementara</div>
          <div class="stat-sub">Rata-rata semua komponen</div>
        </div>
        <div class="stat-c">
          <div class="stat-icon icon-blue">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          </div>
          <div class="stat-val">{{ $statsMagang['log_minggu_ini'] }}</div>
          <div class="stat-lbl">Log Minggu Ini</div>
          <div class="stat-sub">Dari 5 hari kerja</div>
        </div>
        <div class="stat-c">
          <div class="stat-icon icon-amber">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <div class="stat-val">{{ $statsMagang['laporan_terkumpul'] }}/{{ $statsMagang['total_dok_wajib'] }}</div>
          <div class="stat-lbl">Laporan Terkumpul</div>
          <div class="stat-sub">{{ $statsMagang['total_dok_wajib'] - $statsMagang['laporan_terkumpul'] }} laporan belum dikumpulkan</div>
        </div>
        <div class="stat-c">
          <div class="stat-icon icon-purple">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div class="stat-val">{{ $statsMagang['hari_tersisa'] }}</div>
          <div class="stat-lbl">Hari Tersisa</div>
          <div class="stat-sub">Berakhir {{ $statsMagang['deadline']->format('d M Y') }}</div>
        </div>
      </div>

      {{-- ── PROGRESS MINGGU ── --}}
      <div class="progress-summary fade-up" style="animation-delay:.15s">
        <div class="ps-head">
          <div class="ps-title">Progress Magang</div>
          <div class="ps-sub">
            Minggu ke-<strong>{{ $statsMagang['minggu_berjalan'] }}</strong>
            dari <strong>{{ $statsMagang['total_minggu'] }}</strong> minggu
            &nbsp;·&nbsp; <strong>{{ $statsMagang['progress_pct'] ?? 0 }}%</strong> selesai
          </div>
        </div>
        <div class="ps-weeks">
          @for($w = 1; $w <= $statsMagang['total_minggu']; $w++)
            @if($w < $statsMagang['minggu_berjalan'])
              <div class="ps-cell wc-done">{{ $w }}</div>
            @elseif($w == $statsMagang['minggu_berjalan'])
              <div class="ps-cell wc-now">{{ $w }}</div>
            @else
              <div class="ps-cell wc-future">{{ $w }}</div>
            @endif
          @endfor
        </div>
        <div class="ps-labels">
          <span class="ps-lbl">{{ $statsMagang['mulai']->format('d M Y') }}</span>
          <span class="ps-lbl">Sekarang →</span>
          <span class="ps-lbl">{{ $statsMagang['deadline']->format('d M Y') }}</span>
        </div>
      </div>

      {{-- ── LOG TERBARU + TIMELINE ── --}}
      <div class="g2 fade-up" style="animation-delay:.2s">
        <div class="card">
          <div class="card-hd">
            <div class="card-title">Log Kegiatan Terbaru</div>
            <a href="{{ route('log-kegiatan.index') }}" class="card-link">Lihat semua →</a>
          </div>
          @if($logTerbaru->isEmpty())
            <div class="empty-state">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
              <p>Belum ada log kegiatan.<br>Mulai catat aktivitas harianmu.</p>
            </div>
          @else
            <div style="display:flex;flex-direction:column;">
              @foreach($logTerbaru as $log)
                <div style="display:flex;gap:14px;align-items:flex-start;padding:11px 0;border-bottom:1px solid var(--border);">
                  <div style="width:36px;text-align:center;flex-shrink:0;">
                    <div style="font-size:16px;font-weight:700;font-family:'DM Mono',monospace;line-height:1;">{{ $log->tanggal->format('d') }}</div>
                    <div style="font-size:10px;color:var(--text-3);text-transform:uppercase;">{{ $log->tanggal->format('M') }}</div>
                  </div>
                  @php
                    $dotColor = match($log->kategori ?? '') {
                      'Meeting'  => '#8b1a3a',
                      'Coding'   => '#1a5fa0',
                      'Desain'   => '#2e7d4f',
                      'Testing'  => '#c07020',
                      default    => '#a07080',
                    };
                  @endphp
                  <div style="padding-top:5px;flex-shrink:0;">
                    <div style="width:9px;height:9px;border-radius:50%;background:{{ $dotColor }};"></div>
                  </div>
                  <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $log->judul_kegiatan }}</div>
                    <div style="font-size:11.5px;color:var(--text-3);margin-top:2px;">
                      {{ substr($log->jam_mulai,0,5) }}–{{ substr($log->jam_selesai,0,5) }}
                      @if($log->lokasi) · {{ $log->lokasi }} @endif
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>

        <div class="card">
          <div class="card-hd"><div class="card-title">Timeline Magang</div></div>
          <div class="tl">
            <div class="tl-item">
              <div class="tl-g"><div class="tl-dot dot-done"></div><div class="tl-line"></div></div>
              <div class="tl-body">
                <div class="tl-label">Pendaftaran & Seleksi</div>
                <div class="tl-desc">Proses aplikasi dan penerimaan</div>
                <div class="tl-date">{{ $lamaranDiterima->created_at->format('d M Y') }}</div>
              </div>
            </div>
            <div class="tl-item">
              <div class="tl-g"><div class="tl-dot dot-done"></div><div class="tl-line"></div></div>
              <div class="tl-body">
                <div class="tl-label">Lamaran Diterima</div>
                <div class="tl-desc">Mitra menerima lamaranmu</div>
                <div class="tl-date">{{ $lamaranDiterima->diproses_pada ? $lamaranDiterima->diproses_pada->format('d M Y') : '-' }}</div>
              </div>
            </div>
            <div class="tl-item">
              <div class="tl-g"><div class="tl-dot dot-now"></div><div class="tl-line"></div></div>
              <div class="tl-body">
                <div class="tl-label lbl-active">Pelaksanaan Magang</div>
                <div class="tl-desc">Minggu ke-{{ $statsMagang['minggu_berjalan'] }} · sedang berjalan</div>
                <div class="tl-date">{{ now()->format('d M Y') }}</div>
              </div>
            </div>
            <div class="tl-item">
              <div class="tl-g"><div class="tl-dot dot-future"></div><div class="tl-line"></div></div>
              <div class="tl-body">
                <div class="tl-label lbl-muted">Penilaian Akhir</div>
                <div class="tl-desc">Evaluasi oleh pembimbing lapangan</div>
              </div>
            </div>
            <div class="tl-item">
              <div class="tl-g"><div class="tl-dot dot-future"></div></div>
              <div class="tl-body">
                <div class="tl-label lbl-muted">Pengumpulan Laporan Akhir</div>
                <div class="tl-desc">{{ $statsMagang['deadline']->format('d M Y') }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @else
      {{-- ── BELUM MAGANG: Lowongan Terbaru + Riwayat Lamaran ── --}}
      <div class="g2 fade-up" style="animation-delay:.2s">
        <div class="card">
          <div class="card-hd">
            <div class="card-title">Lowongan Terbaru</div>
            <a href="{{ route('lowongan.browse') }}" class="card-link">Lihat semua →</a>
          </div>
          <div class="lowongan-list">
            @forelse($lowonganTerbaru as $lowongan)
              <a href="{{ route('lowongan.browse') }}" class="lowongan-item">
                <div class="low-logo">
                  {{ strtoupper(substr($lowongan->mitra->nama_perusahaan ?? $lowongan->mitra->name ?? 'LW', 0, 2)) }}
                </div>
                <div class="low-body">
                  <div class="low-company">{{ $lowongan->mitra->nama_perusahaan ?? $lowongan->mitra->name ?? 'Mitra' }}</div>
                  <div class="low-pos">{{ $lowongan->judul_lowongan }}</div>
                  <div class="low-tags">
                    <span class="low-tag">{{ ucfirst($lowongan->status) }}</span>
                    @if($lowongan->durasi)
                      <span class="low-tag">{{ $lowongan->durasi }}</span>
                    @endif
                  </div>
                </div>
                <div class="low-right">
                  <div class="low-slot">Tersedia</div>
                </div>
              </a>
            @empty
              <div class="empty-state">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>
                <p>Belum ada lowongan tersedia</p>
              </div>
            @endforelse
          </div>
        </div>

        <div class="card">
          <div class="card-hd">
            <div class="card-title">Riwayat Lamaran</div>
            <a href="{{ route('lamaran.saya') }}" class="card-link">Lihat semua →</a>
          </div>
          @if($lamarans->isEmpty())
            <div class="empty-state">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              <p>Belum ada lamaran yang dikirim</p>
            </div>
          @else
            <table class="tbl">
              <thead>
                <tr>
                  <th>Posisi</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lamarans->take(4) as $lamaran)
                  <tr>
                    <td style="font-weight:600">{{ $lamaran->lowongan->judul_lowongan ?? '-' }}</td>
                    <td>
                      @if($lamaran->status === 'diterima')
                        <span class="pill p-ok">✓ Diterima</span>
                      @elseif($lamaran->status === 'ditolak')
                        <span class="pill p-no">✗ Ditolak</span>
                      @else
                        <span class="pill p-pend">⏳ Pending</span>
                      @endif
                    </td>
                    <td style="color:var(--text-3);font-family:'DM Mono',monospace;font-size:11px;">
                      {{ $lamaran->created_at->format('d M Y') }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    @endif

  </div>
</div>

</body>
</html>