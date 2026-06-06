<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Data Mahasiswa — SIGMA</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#faf7f4;--bg2:#ffffff;--bg3:#f3ede6;--border:rgba(100,30,50,.1);--text-1:#1a0a0f;--text-2:#6b4050;--text-3:#a07080;--primary:#8b1a3a;--primary-dim:rgba(139,26,58,.10);--primary-hover:#6e1530;--amber:#c07020;--amber-dim:rgba(192,112,32,.12);--red:#c0453f;--red-dim:rgba(192,69,63,.10);--green:#2e7d4f;--green-dim:rgba(46,125,79,.10);--blue:#1a5fa0;--blue-dim:rgba(26,95,160,.10);--radius:14px;--sidebar-w:230px;}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--text-1);display:flex;min-height:100vh;font-size:14px;}
.sidebar{width:var(--sidebar-w);background:var(--primary);display:flex;flex-direction:column;padding:24px 0;position:fixed;height:100vh;top:0;left:0;z-index:10;}
.sidebar-logo{display:flex;align-items:center;gap:10px;padding:0 20px 28px;border-bottom:1px solid rgba(255,255,255,.15);}
.logo-mark{width:34px;height:34px;background:rgba(255,255,255,.2);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;color:#fff;}
.logo-text{font-weight:700;font-size:15px;color:#fff;}.logo-sub{font-size:10px;color:rgba(255,255,255,.55);font-family:'DM Mono',monospace;}
.nav-group{padding:20px 12px 8px;flex:1;}
.nav-label{font-size:9.5px;letter-spacing:.12em;color:rgba(255,255,255,.45);text-transform:uppercase;font-weight:600;padding:0 8px;margin-bottom:6px;}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:9px;color:rgba(255,255,255,.7);font-size:13px;font-weight:500;margin-bottom:2px;transition:.15s;text-decoration:none;}
.nav-item:hover{background:rgba(255,255,255,.12);color:#fff;}.nav-item.active{background:rgba(255,255,255,.18);color:#fff;}
.nav-icon{width:16px;height:16px;flex-shrink:0;}
.sidebar-foot{padding:16px 12px;border-top:1px solid rgba(255,255,255,.15);}
.user-chip{display:flex;align-items:center;gap:10px;padding:10px;border-radius:10px;background:rgba(255,255,255,.12);}
.ava{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;}
.user-name{font-size:12px;font-weight:600;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.user-role{font-size:10px;color:rgba(255,255,255,.55);}
.btn-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;transition:.15s;width:100%;margin-top:8px;}
.btn-logout:hover{background:rgba(255,255,255,.1);color:#fff;}
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:9;}
.page-title{font-size:15px;font-weight:700;}.topbar-meta{font-size:12px;color:var(--text-3);}
.content{padding:28px;display:flex;flex-direction:column;gap:22px;}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;}
.card-hd{display:flex;align-items:center;justify-content:space-between;padding:18px 20px;border-bottom:1px solid var(--border);}
.card-title{font-size:13.5px;font-weight:700;}.card-link{font-size:12px;color:var(--primary);text-decoration:none;font-weight:600;}
.filter-row{display:flex;align-items:center;gap:10px;padding:14px 20px;border-bottom:1px solid var(--border);background:var(--bg3);flex-wrap:wrap;}
.filter-input{padding:7px 12px;border:1px solid var(--border);border-radius:8px;font-family:inherit;font-size:12.5px;background:var(--bg2);color:var(--text-1);outline:none;min-width:200px;}
.filter-input:focus{border-color:var(--primary);}
.filter-select{padding:7px 10px;border:1px solid var(--border);border-radius:8px;font-family:inherit;font-size:12.5px;background:var(--bg2);color:var(--text-1);outline:none;cursor:pointer;}
.filter-select:focus{border-color:var(--primary);}
.btn-filter{padding:7px 14px;background:var(--primary);color:#fff;border:none;border-radius:8px;font-size:12.5px;font-weight:600;cursor:pointer;font-family:inherit;}
.btn-reset{padding:7px 12px;border:1px solid var(--border);border-radius:8px;font-size:12px;color:var(--text-2);background:var(--bg2);text-decoration:none;}
.tbl{width:100%;border-collapse:collapse;}
.tbl th{font-size:10.5px;letter-spacing:.05em;text-transform:uppercase;color:var(--text-3);font-weight:600;padding:10px 16px;text-align:left;border-bottom:1px solid var(--border);background:var(--bg3);}
.tbl td{padding:12px 16px;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.tbl tr:last-child td{border-bottom:none;}.tbl tr:hover td{background:var(--bg3);}
.mhs-ava{width:30px;height:30px;border-radius:8px;background:var(--primary-dim);color:var(--primary);font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.pill{display:inline-flex;align-items:center;gap:5px;padding:3px 9px;border-radius:20px;font-size:10.5px;font-weight:600;white-space:nowrap;}
.pill-dot{width:6px;height:6px;border-radius:50%;flex-shrink:0;}
.p-ok{background:var(--green-dim);color:var(--green);}.p-ok .pill-dot{background:var(--green);}
.p-pend{background:var(--amber-dim);color:var(--amber);}.p-pend .pill-dot{background:var(--amber);}
.p-no{background:var(--red-dim);color:var(--red);}.p-no .pill-dot{background:var(--red);}
.p-blue{background:var(--blue-dim);color:var(--blue);}.p-blue .pill-dot{background:var(--blue);}
.p-gray{background:var(--bg3);color:var(--text-3);}.p-gray .pill-dot{background:var(--text-3);}
.prodi-tag{display:inline-block;padding:2px 8px;border-radius:6px;background:var(--blue-dim);color:var(--blue);font-size:10.5px;font-weight:600;}
.btn-detail{display:inline-flex;align-items:center;gap:5px;padding:5px 12px;border-radius:7px;font-size:11.5px;font-weight:600;color:var(--primary);border:1px solid rgba(139,26,58,.2);background:var(--primary-dim);text-decoration:none;transition:.15s;}
.btn-detail:hover{background:var(--primary);color:#fff;}
.pagination{display:flex;align-items:center;justify-content:space-between;padding:14px 20px;border-top:1px solid var(--border);}
.pag-info{font-size:11.5px;color:var(--text-3);}
.pag-links{display:flex;gap:4px;}
.pag-btn{padding:5px 11px;border-radius:7px;font-size:12px;font-weight:600;text-decoration:none;border:1px solid var(--border);color:var(--text-2);background:var(--bg2);transition:.15s;}
.pag-btn:hover{border-color:var(--primary);color:var(--primary);}
.pag-btn.active{background:var(--primary);color:#fff;border-color:var(--primary);}
.pag-btn.disabled{color:var(--text-3);pointer-events:none;}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:48px;text-align:center;color:var(--text-3);}
.empty-state svg{width:40px;height:40px;margin-bottom:12px;opacity:.4;}
.empty-state p{font-size:12.5px;}
@keyframes fadeUp{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .35s ease both;}
</style>
</head>
<body>

<nav class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-mark">Si</div>
    <div><div class="logo-text">SIGMA</div><div class="logo-sub">Kaprodi Portal</div></div>
  </div>
  <div class="nav-group">
    <div class="nav-label">Menu Utama</div>
    <a href="{{ route('kaprodi.dashboard') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
      Dashboard
    </a>
    <a href="{{ route('kaprodi.mahasiswa.index') }}" class="nav-item active">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
      Data Mahasiswa
    </a>
    <a href="{{ route('kaprodi.mahasiswa.rekap') }}" class="nav-item">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
      Rekap Nilai
    </a>
  </div>
  <div class="sidebar-foot">
    @php $initials = strtoupper(substr(Auth::user()->name, 0, 2)); @endphp
    <div class="user-chip">
      <div class="ava">{{ $initials }}</div>
      <div style="flex:1;min-width:0;">
        <div class="user-name">{{ Auth::user()->name }}</div>
        <div class="user-role">Kaprodi</div>
      </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn-logout">Keluar</button>
    </form>
  </div>
</nav>

<div class="main">
  <div class="topbar">
    <div class="page-title">Data Mahasiswa</div>
    <div class="topbar-meta">{{ $mahasiswas->total() }} mahasiswa terdaftar</div>
  </div>

  <div class="content">
    <div class="card fade-up">
      <div class="card-hd">
        <div class="card-title">Daftar Mahasiswa</div>
        <a href="{{ route('kaprodi.mahasiswa.rekap') }}" class="card-link">Rekap Nilai →</a>
      </div>

      <div class="filter-row">
        <form method="GET" action="{{ route('kaprodi.mahasiswa.index') }}" style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." class="filter-input">
          <select name="filter" class="filter-select" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            <option value="magang" {{ request('filter') === 'magang' ? 'selected' : '' }}>Sedang Magang</option>
          </select>
          <button type="submit" class="btn-filter">Cari</button>
          @if(request('search') || request('filter'))
            <a href="{{ route('kaprodi.mahasiswa.index') }}" class="btn-reset">✕ Reset</a>
          @endif
        </form>
      </div>

      <table class="tbl">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Prodi / Jurusan</th>
            <th>Semester</th>
            <th>Status Magang</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($mahasiswas as $mhs)
          @php
            $biodata = $mhs->mahasiswa;
            $lamaran = $mhs->lamaran->first();
            $status  = $lamaran->status ?? null;
            [$pillClass, $statusText] = match($status) {
              'diterima' => ['p-ok',   'Sedang Magang'],
              'selesai'  => ['p-blue', 'Selesai'],
              'pending'  => ['p-pend', 'Menunggu'],
              'ditolak'  => ['p-no',   'Ditolak'],
              default    => ['p-gray', 'Belum Melamar'],
            };
          @endphp
          <tr>
            <td style="color:var(--text-3);font-family:'DM Mono',monospace;">{{ $mahasiswas->firstItem() + $loop->index }}</td>
            <td>
              <div style="display:flex;align-items:center;gap:9px;">
                <div class="mhs-ava">{{ strtoupper(substr($mhs->name, 0, 2)) }}</div>
                <div>
                  <div style="font-weight:600;">{{ $mhs->name }}</div>
                  <div style="font-size:11px;color:var(--text-3);">{{ $mhs->email }}</div>
                </div>
              </div>
            </td>
            <td style="font-family:'DM Mono',monospace;font-size:11.5px;color:var(--text-2);">{{ $biodata?->nim ?? '—' }}</td>
            <td>
              @if($biodata?->jurusan)
                <span class="prodi-tag">{{ $biodata->jurusan }}</span>
              @else
                <span style="color:var(--text-3);">—</span>
              @endif
            </td>
            <td style="color:var(--text-2);">{{ $biodata?->semester ? 'Sem. '.$biodata->semester : '—' }}</td>
            <td>
              <span class="pill {{ $pillClass }}">
                <span class="pill-dot"></span>{{ $statusText }}
              </span>
            </td>
            <td>
              <a href="{{ route('kaprodi.mahasiswa.show', $mhs->id) }}" class="btn-detail">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                Detail
              </a>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7">
              <div class="empty-state">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <p>Tidak ada mahasiswa ditemukan.<br>Coba ubah filter pencarian.</p>
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>

      @if($mahasiswas->hasPages())
      <div class="pagination">
        <div class="pag-info">Menampilkan {{ $mahasiswas->firstItem() }}–{{ $mahasiswas->lastItem() }} dari {{ $mahasiswas->total() }} mahasiswa</div>
        <div class="pag-links">
          @if($mahasiswas->onFirstPage())
            <span class="pag-btn disabled">← Prev</span>
          @else
            <a href="{{ $mahasiswas->previousPageUrl() }}" class="pag-btn">← Prev</a>
          @endif
          @foreach($mahasiswas->getUrlRange(max(1,$mahasiswas->currentPage()-2), min($mahasiswas->lastPage(),$mahasiswas->currentPage()+2)) as $page => $url)
            <a href="{{ $url }}" class="pag-btn {{ $page == $mahasiswas->currentPage() ? 'active' : '' }}">{{ $page }}</a>
          @endforeach
          @if($mahasiswas->hasMorePages())
            <a href="{{ $mahasiswas->nextPageUrl() }}" class="pag-btn">Next →</a>
          @else
            <span class="pag-btn disabled">Next →</span>
          @endif
        </div>
      </div>
      @endif
    </div>
  </div>
</div>

</body>
</html>