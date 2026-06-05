<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Hasil Penilaian — SIGMA</title>
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
.g2{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:22px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;}
.card-title{font-size:13.5px;font-weight:700;}
.pill{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;}
.p-ok{background:var(--green-dim);color:var(--green);}
.p-no{background:var(--red-dim);color:var(--red);}
.p-pend{background:var(--amber-dim);color:var(--amber);}
/* Grade hero */
.grade-hero{background:linear-gradient(135deg,var(--primary),#6e1530);border-radius:var(--radius);padding:28px;display:flex;align-items:center;gap:24px;color:#fff;}
.grade-circle{width:90px;height:90px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;flex-direction:column;align-items:center;justify-content:center;flex-shrink:0;border:3px solid rgba(255,255,255,.3);}
.grade-letter{font-size:36px;font-weight:800;line-height:1;}
.grade-label{font-size:10px;color:rgba(255,255,255,.6);}
.grade-info{flex:1;}
.grade-score{font-size:32px;font-weight:700;font-family:'DM Mono',monospace;}
.grade-sub{font-size:13px;color:rgba(255,255,255,.7);margin-bottom:8px;}
.grade-note{font-size:12px;color:rgba(255,255,255,.6);line-height:1.5;}
/* nilai bar */
.nilai-row{margin-bottom:14px;}
.nilai-lbl{display:flex;justify-content:space-between;margin-bottom:5px;}
.nilai-name{font-size:12.5px;font-weight:600;}
.nilai-score{font-size:12.5px;font-family:'DM Mono',monospace;font-weight:700;}
.nilai-bar{height:8px;background:var(--bg3);border-radius:4px;overflow:hidden;}
.nilai-fill{height:100%;border-radius:4px;transition:width .6s ease;}
.fill-green{background:var(--green);}
.fill-blue{background:var(--blue);}
.fill-amber{background:var(--amber);}
.fill-primary{background:var(--primary);}
.fill-teal{background:#1a8070;}
/* tabel riwayat */
.tbl{width:100%;border-collapse:collapse;}
.tbl th{font-size:10.5px;letter-spacing:.05em;text-transform:uppercase;color:var(--text-3);font-weight:600;padding:0 0 10px;text-align:left;border-bottom:1px solid var(--border);}
.tbl td{padding:10px 0;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.tbl tr:last-child td{border-bottom:none;}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:40px;text-align:center;color:var(--text-3);}
.empty-state svg{width:48px;height:48px;margin-bottom:14px;opacity:.35;}
.empty-state h3{font-size:14px;font-weight:700;margin-bottom:6px;color:var(--text-2);}
.empty-state p{font-size:12.5px;line-height:1.5;}
.alert{padding:10px 14px;border-radius:9px;font-size:12.5px;margin-bottom:14px;}
.alert-success{background:var(--green-dim);color:var(--green);}
.alert-error{background:var(--red-dim);color:var(--red);}
/* radar-like bars */
.radar-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
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
    <a href="{{ route('laporan.index') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17H7A5 5 0 017 7h2"/><path d="M15 7h2a5 5 0 010 10h-2"/><line x1="8" y1="12" x2="16" y2="12"/></svg>Laporan Kegiatan</a>
    <a href="{{ route('penilaian.index') }}" class="nav-item active"><svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>Hasil Penilaian</a>
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
    <div class="page-title">Hasil Penilaian</div>
  </div>
  <div class="content">

    @if(session('success'))
      <div class="alert alert-success">✓ {{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-error">✗ {{ session('error') }}</div>
    @endif

    @if($penilaian)
      {{-- ── GRADE HERO ── --}}
      <div class="grade-hero">
        <div class="grade-circle">
          <div class="grade-letter">{{ $penilaian->grade }}</div>
          <div class="grade-label">GRADE</div>
        </div>
        <div class="grade-info">
          <div class="grade-score">{{ $penilaian->nilai_akhir ?? $penilaian->nilai_rata_rata }}<span style="font-size:16px;color:rgba(255,255,255,.5)">/100</span></div>
          <div class="grade-sub">Nilai Akhir Magang · {{ $penilaian->periode ?? 'Periode aktif' }}</div>
          @if($penilaian->catatan)
            <div class="grade-note">💬 "{{ $penilaian->catatan }}"</div>
          @endif
        </div>
        <div style="text-align:right;flex-shrink:0;">
          <div style="font-size:11px;color:rgba(255,255,255,.5);margin-bottom:3px;">Penilai</div>
          <div style="font-size:13px;font-weight:700;color:#fff;">{{ $penilaian->penilai->name ?? 'Pembimbing Lapangan' }}</div>
          <div style="font-size:11px;color:rgba(255,255,255,.55);margin-top:3px;">{{ $lamaranDiterima->lowongan->mitra->nama_perusahaan ?? '-' }}</div>
        </div>
      </div>

      {{-- ── BREAKDOWN NILAI + RIWAYAT ── --}}
      <div class="g2">
        <div class="card">
          <div class="card-hd"><div class="card-title">Rincian Nilai per Komponen</div></div>
          @php
            $komponen = [
              ['label'=>'Kedisiplinan',  'val'=>$penilaian->nilai_kedisiplinan, 'color'=>'fill-green'],
              ['label'=>'Komunikasi',    'val'=>$penilaian->nilai_komunikasi,   'color'=>'fill-blue'],
              ['label'=>'Kemampuan Teknis','val'=>$penilaian->nilai_teknis,     'color'=>'fill-primary'],
              ['label'=>'Inisiatif',     'val'=>$penilaian->nilai_inisiatif,   'color'=>'fill-amber'],
              ['label'=>'Kerja Tim',     'val'=>$penilaian->nilai_kerjasama,   'color'=>'fill-teal'],
            ];
          @endphp
          @foreach($komponen as $k)
            <div class="nilai-row">
              <div class="nilai-lbl">
                <span class="nilai-name">{{ $k['label'] }}</span>
                <span class="nilai-score">{{ $k['val'] ?? '-' }}</span>
              </div>
              <div class="nilai-bar">
                <div class="nilai-fill {{ $k['color'] }}" style="width:{{ $k['val'] ?? 0 }}%"></div>
              </div>
            </div>
          @endforeach
        </div>

        <div class="card">
          <div class="card-hd"><div class="card-title">Riwayat Penilaian</div></div>
          @if($riwayatPenilaian->isEmpty())
            <div class="empty-state" style="padding:20px;">
              <p>Belum ada riwayat penilaian</p>
            </div>
          @else
            <table class="tbl">
              <thead><tr><th>Periode</th><th>Jenis</th><th>Nilai</th><th>Grade</th></tr></thead>
              <tbody>
                @foreach($riwayatPenilaian as $rp)
                  <tr>
                    <td style="font-family:'DM Mono',monospace;font-size:11px;">{{ $rp->periode ?? $rp->created_at->format('M Y') }}</td>
                    <td>{{ ucfirst($rp->jenis_penilaian) }}</td>
                    <td style="font-weight:700;font-family:'DM Mono',monospace;">{{ $rp->nilai_akhir ?? $rp->nilai_rata_rata }}</td>
                    <td>
                      @php $g = $rp->grade; @endphp
                      <span class="pill {{ in_array($g,['A','B']) ? 'p-ok' : ($g==='C' ? 'p-pend' : 'p-no') }}">{{ $g }}</span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>

    @else
      {{-- ── BELUM ADA PENILAIAN ── --}}
      <div class="card">
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
          </svg>
          <h3>Penilaian Belum Tersedia</h3>
          <p>Kamu belum menerima penilaian dari pembimbing lapangan.<br>
            Penilaian akan muncul di sini setelah pembimbing mengisi evaluasi.</p>
        </div>
      </div>

      {{-- Informasi magang aktif tetap ditampilkan --}}
      <div class="card">
        <div class="card-hd"><div class="card-title">Informasi Magang Berjalan</div></div>
        <table class="tbl">
          <tbody>
            <tr>
              <td style="color:var(--text-3);width:30%">Posisi</td>
              <td><strong>{{ $lamaranDiterima->lowongan->judul_lowongan ?? '-' }}</strong></td>
            </tr>
            <tr>
              <td style="color:var(--text-3)">Mitra</td>
              <td>{{ $lamaranDiterima->lowongan->mitra->nama_perusahaan ?? '-' }}</td>
            </tr>
            <tr>
              <td style="color:var(--text-3)">Mulai Magang</td>
              <td style="font-family:'DM Mono',monospace;font-size:12px;">
                {{ $lamaranDiterima->diproses_pada ? $lamaranDiterima->diproses_pada->format('d M Y') : '-' }}
              </td>
            </tr>
            <tr>
              <td style="color:var(--text-3)">Status</td>
              <td><span class="pill p-ok">Aktif Magang</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    @endif

  </div>
</div>
</body>
</html>