<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Admin Dashboard – Sistem Magang</title>
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
  --purple: #6b3fa0;
  --purple-dim: rgba(107,63,160,.10);
  --radius: 14px;
  --sidebar-w: 230px;
}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--text-1);display:flex;min-height:100vh;font-size:14px;}

/* ── SIDEBAR ── */
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
.nav-badge{margin-left:auto;background:rgba(255,255,255,.2);color:#fff;font-size:9.5px;font-weight:700;padding:1px 7px;border-radius:20px;font-family:'DM Mono',monospace;}
.sidebar-foot{padding:16px 12px;border-top:1px solid rgba(255,255,255,.15);}
.user-chip{display:flex;align-items:center;gap:10px;padding:10px;border-radius:10px;background:rgba(255,255,255,.12);}
.ava{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;}
.user-info{flex:1;min-width:0;}
.user-name{font-size:12px;font-weight:600;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.user-role{font-size:10px;color:rgba(255,255,255,.55);}
.btn-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;transition:.15s;width:100%;margin-top:8px;}
.btn-logout:hover{background:rgba(255,255,255,.1);color:#fff;}

/* ── MAIN ── */
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:9;box-shadow:0 1px 0 var(--border);}
.page-title{font-size:15px;font-weight:700;}
.topbar-right{display:flex;align-items:center;gap:10px;}
.btn-notif{width:34px;height:34px;border-radius:8px;background:var(--bg3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;position:relative;}
.notif-dot{position:absolute;top:7px;right:7px;width:6px;height:6px;border-radius:50%;background:var(--red);}
.btn{padding:7px 14px;border-radius:8px;font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-primary{background:var(--primary);color:#fff;}
.btn-primary:hover{background:var(--primary-hover);}

.content{padding:28px;display:flex;flex-direction:column;gap:22px;}

/* ── STATS GRID ── */
.g4{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;}
.g2{display:grid;grid-template-columns:1fr 1fr;gap:14px;}

.stat-c{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;flex-direction:column;gap:8px;}
.stat-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;}
.stat-icon svg{width:18px;height:18px;}
.icon-blue{background:var(--blue-dim);color:var(--blue);}
.icon-green{background:var(--green-dim);color:var(--green);}
.icon-amber{background:var(--amber-dim);color:var(--amber);}
.icon-purple{background:var(--purple-dim);color:var(--purple);}
.stat-val{font-size:26px;font-weight:700;font-family:'DM Mono',monospace;line-height:1;}
.stat-lbl{font-size:12.5px;font-weight:600;color:var(--text-1);}
.stat-sub{font-size:11px;color:var(--text-3);}

/* ── CARD ── */
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:20px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
.card-title{font-size:13.5px;font-weight:700;}
.card-link{font-size:12px;color:var(--primary);text-decoration:none;font-weight:600;}
.card-link:hover{text-decoration:underline;}

/* ── TABLE ── */
.tbl{width:100%;border-collapse:collapse;}
.tbl th{font-size:10.5px;letter-spacing:.05em;text-transform:uppercase;color:var(--text-3);font-weight:600;padding:0 0 10px;text-align:left;border-bottom:1px solid var(--border);}
.tbl td{padding:10px 0;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.tbl tr:last-child td{border-bottom:none;}

/* ── PILLS ── */
.pill{display:inline-flex;align-items:center;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;white-space:nowrap;}
.p-ok{background:var(--green-dim);color:var(--green);}
.p-no{background:var(--red-dim);color:var(--red);}
.p-pend{background:var(--amber-dim);color:var(--amber);}
.p-blue{background:var(--blue-dim);color:var(--blue);}
.p-purple{background:var(--purple-dim);color:var(--purple);}
.p-cyan{background:rgba(6,148,162,.10);color:#0694a2;}
.p-indigo{background:rgba(60,72,196,.10);color:#3c48c4;}

/* ── USER ROWS ── */
.user-ava{width:30px;height:30px;border-radius:8px;background:var(--primary-dim);display:flex;align-items:center;justify-content:center;font-size:10.5px;font-weight:700;color:var(--primary);flex-shrink:0;}

/* ── FLASH ── */
.flash-success{background:var(--green-dim);border:1px solid rgba(46,125,79,.2);color:var(--green);border-radius:var(--radius);padding:12px 16px;font-size:12.5px;font-weight:500;}

/* ── ANIMATION ── */
@keyframes fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease both;}
</style>
</head>
<body>

{{-- ═══════════════════════════ SIDEBAR ═══════════════════════════ --}}
@include('admin.components.sidebar')

{{-- ═══════════════════════════ MAIN ═══════════════════════════ --}}
<div class="main">

  {{-- Topbar --}}
  <div class="topbar">
    <div class="page-title">Dashboard Admin</div>
    <div class="topbar-right">
      <div class="btn-notif">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/>
          <path d="M13.73 21a2 2 0 01-3.46 0"/>
        </svg>
        <div class="notif-dot"></div>
      </div>
    </div>
  </div>

  <div class="content">

    {{-- Page heading --}}
    <div class="fade-up" style="animation-delay:.05s">
      <div style="font-size:20px;font-weight:700;margin-bottom:3px;">Dashboard Admin</div>
      <div style="font-size:12.5px;color:var(--text-3);">Selamat datang, {{ auth()->user()->name }}</div>
    </div>

    {{-- Flash --}}
    @if(session('success'))
      <div class="flash-success fade-up" style="animation-delay:.1s">
        {{ session('success') }}
      </div>
    @endif

    {{-- Stats Cards --}}
    <div class="g4 fade-up" style="animation-delay:.1s">

      <div class="stat-c">
        <div class="stat-icon icon-blue">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/>
          </svg>
        </div>
        <div class="stat-val">{{ $stats['total_mahasiswa'] }}</div>
        <div class="stat-lbl">Total Mahasiswa</div>
        <div class="stat-sub">Terdaftar di sistem</div>
      </div>

      <div class="stat-c">
        <div class="stat-icon icon-purple">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
          </svg>
        </div>
        <div class="stat-val">{{ $stats['total_mitra'] }}</div>
        <div class="stat-lbl">Total Mitra</div>
        <div class="stat-sub">Perusahaan aktif</div>
      </div>

      <div class="stat-c">
        <div class="stat-icon icon-green">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <div class="stat-val">{{ $stats['sedang_magang'] }}</div>
        <div class="stat-lbl">Sedang Magang</div>
        <div class="stat-sub">Magang aktif saat ini</div>
      </div>

      <div class="stat-c">
        <div class="stat-icon icon-amber">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <div class="stat-val">{{ $stats['lamaran_pending'] }}</div>
        <div class="stat-lbl">Lamaran Pending</div>
        <div class="stat-sub">Menunggu tinjauan</div>
      </div>

    </div>

    {{-- User Terbaru + Lamaran Pending --}}
    <div class="g2 fade-up" style="animation-delay:.2s">

      {{-- User Terbaru --}}
      <div class="card">
        <div class="card-hd">
          <div class="card-title">User Terbaru</div>
          <a href="{{ route('admin.users.index') }}" class="card-link">Lihat semua →</a>
        </div>
        <div style="display:flex;flex-direction:column;gap:0">
          @forelse($usersRecent as $u)
          <div style="display:flex;align-items:center;justify-content:space-between;padding:9px 0;border-bottom:1px solid var(--border);">
            <div style="display:flex;align-items:center;gap:10px">
              <div class="user-ava">{{ strtoupper(substr($u->name, 0, 2)) }}</div>
              <div>
                <div style="font-size:12.5px;font-weight:600;">{{ $u->name }}</div>
                <div style="font-size:11px;color:var(--text-3);">{{ $u->email }}</div>
              </div>
            </div>
            @php
              $roleClass = match($u->role) {
                'admin'    => 'p-no',
                'mitra'    => 'p-purple',
                'kaprodi'  => 'p-indigo',
                'sekprodi' => 'p-cyan',
                default    => 'p-blue',
              };
            @endphp
            <span class="pill {{ $roleClass }}">{{ $u->role }}</span>
          </div>
          @empty
          <div style="padding:28px 0;text-align:center;color:var(--text-3);font-size:12.5px;">
            Belum ada user.
          </div>
          @endforelse
        </div>
      </div>

      {{-- Lamaran Pending --}}
      <div class="card">
        <div class="card-hd">
          <div class="card-title">Lamaran Pending</div>
          <a href="{{ route('admin.lamaran.index', ['status' => 'pending']) }}" class="card-link">Lihat semua →</a>
        </div>
        @if($lamaranPending->isEmpty())
          <div style="padding:28px 0;text-align:center;color:var(--text-3);">
            <svg style="width:36px;height:36px;margin:0 auto 10px;display:block;opacity:.35" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div style="font-size:12.5px;">Tidak ada lamaran pending.</div>
          </div>
        @else
          <table class="tbl">
            <thead>
              <tr>
                <th>Mahasiswa</th>
                <th>Posisi</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lamaranPending as $lmr)
              <tr>
                <td style="font-weight:600">{{ $lmr->mahasiswa->name ?? '-' }}</td>
                <td style="color:var(--text-2)">
                  <div style="font-size:12px;">{{ $lmr->lowongan->judul_lowongan ?? '-' }}</div>
                  <div style="font-size:10.5px;color:var(--text-3);margin-top:1px;">{{ $lmr->lowongan->mitra->nama_perusahaan ?? '-' }}</div>
                </td>
                <td><span class="pill p-pend">⏳ Pending</span></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>

    </div>

  </div>
</div>

</body>
</html>