{{-- resources/views/admin/components/sidebar.blade.php --}}
<style>
/* Sidebar admin — harus di-load SETELAH Tailwind agar menang */
.adm-sidebar{width:230px;background:#8b1a3a;display:flex;flex-direction:column;padding:24px 0;position:fixed;height:100vh;top:0;left:0;z-index:10;font-family:inherit;}
.adm-sidebar *{box-sizing:border-box;}
.adm-logo{display:flex;align-items:center;gap:10px;padding:0 20px 24px;border-bottom:1px solid rgba(255,255,255,.15);margin-bottom:4px;}
.adm-logo-mark{width:34px;height:34px;min-width:34px;background:rgba(255,255,255,.2);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;color:#fff;}
.adm-logo-text{font-weight:700;font-size:15px;color:#fff;line-height:1.2;}
.adm-logo-sub{font-size:10px;color:rgba(255,255,255,.55);}
.adm-nav{padding:16px 12px 8px;flex:1;}
.adm-nav-label{font-size:9.5px;letter-spacing:.12em;color:rgba(255,255,255,.45);text-transform:uppercase;font-weight:600;padding:0 8px;margin-bottom:6px;}
.adm-nav-item{display:flex!important;align-items:center!important;gap:10px!important;padding:9px 10px!important;border-radius:9px!important;color:rgba(255,255,255,.7)!important;font-size:13px!important;font-weight:500!important;margin-bottom:2px!important;transition:.15s!important;text-decoration:none!important;background:transparent!important;}
.adm-nav-item:hover{background:rgba(255,255,255,.12)!important;color:#fff!important;}
.adm-nav-item.adm-active{background:rgba(255,255,255,.18)!important;color:#fff!important;}
.adm-nav-item svg{width:16px!important;height:16px!important;min-width:16px!important;flex-shrink:0!important;color:inherit!important;}
.adm-foot{padding:16px 12px;border-top:1px solid rgba(255,255,255,.15);}
.adm-chip{display:flex;align-items:center;gap:10px;padding:10px;border-radius:10px;background:rgba(255,255,255,.12);}
.adm-ava{width:32px;height:32px;min-width:32px;border-radius:8px;background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;}
.adm-chip-info{flex:1;min-width:0;}
.adm-chip-name{font-size:12px;font-weight:600;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.adm-chip-role{font-size:10px;color:rgba(255,255,255,.55);}
.adm-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;width:100%;margin-top:8px;transition:.15s;}
.adm-logout:hover{background:rgba(255,255,255,.1);color:#fff;}
</style>

<nav class="adm-sidebar">
  <div class="adm-logo">
    <div class="adm-logo-mark">ADM</div>
    <div>
      <div class="adm-logo-text">SIGMA</div>
      <div class="adm-logo-sub">Admin Portal</div>
    </div>
  </div>

  <div class="adm-nav">
    <div class="adm-nav-label">Menu Utama</div>

    <a href="{{ route('admin.dashboard') }}"
       class="adm-nav-item {{ request()->routeIs('admin.dashboard') ? 'adm-active' : '' }}">
      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
        <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
      </svg>
      Dashboard
    </a>

    <a href="{{ route('admin.users.index') }}"
       class="adm-nav-item {{ request()->routeIs('admin.users.*') ? 'adm-active' : '' }}">
      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
        <circle cx="9" cy="7" r="4"/>
        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
      </svg>
      Manajemen User
    </a>

    <a href="{{ route('admin.mitra.index') }}"
       class="adm-nav-item {{ request()->routeIs('admin.mitra.*') ? 'adm-active' : '' }}">
      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/>
        <path d="M16 19h6m-3-3v6"/>
      </svg>
      Mitra / Perusahaan
    </a>

    <a href="{{ route('admin.lamaran.index') }}"
       class="adm-nav-item {{ request()->routeIs('admin.lamaran.*') ? 'adm-active' : '' }}">
      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
      </svg>
      Monitor Lamaran
    </a>
  </div>

  <div class="adm-foot">
    <div class="adm-chip">
      <div class="adm-ava">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
      <div class="adm-chip-info">
        <div class="adm-chip-name">{{ auth()->user()->name }}</div>
        <div class="adm-chip-role">Administrator</div>
      </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">@csrf
      <button type="submit" class="adm-logout">Keluar</button>
    </form>
  </div>
</nav>
