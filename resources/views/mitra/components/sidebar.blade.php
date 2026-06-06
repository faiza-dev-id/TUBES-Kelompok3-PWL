{{-- ═══════════════════════════ SIDEBAR MITRA ═══════════════════════════ --}}
<nav class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-mark">Si</div>
    <div><div class="logo-text">SIGMA</div><div class="logo-sub">Mitra Portal</div></div>
  </div>
  <div class="nav-group">
    <div class="nav-label">Menu Utama</div>
    <a href="{{ route('mitra.dashboard') }}" class="nav-item {{ request()->routeIs('mitra.dashboard') ? 'active' : '' }}">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Dashboard
    </a>
    <a href="{{ route('mitra.lowongan.index') }}" class="nav-item {{ request()->routeIs('mitra.lowongan.*') ? 'active' : '' }}">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>Lowongan Magang
    </a>
    <a href="{{ route('mitra.pelamar.index') }}" class="nav-item {{ request()->routeIs('mitra.pelamar.*') ? 'active' : '' }}">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>Daftar Pelamar
    </a>
    {{-- FIX: tambah menu Mahasiswa Magang yang sebelumnya tidak ada --}}
    <a href="{{ route('mitra.mahasiswa.index') }}" class="nav-item {{ request()->routeIs('mitra.mahasiswa.*') ? 'active' : '' }}">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 11l-4 4-2-2"/></svg>Mahasiswa Magang
    </a>
    <a href="{{ route('mitra.log.index') }}" class="nav-item {{ request()->routeIs('mitra.log.*') ? 'active' : '' }}">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>Log Kegiatan Mahasiswa
    </a>
    <a href="{{ route('mitra.penilaian.index') }}" class="nav-item {{ request()->routeIs('mitra.penilaian.*') ? 'active' : '' }}">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>Penilaian Mahasiswa
    </a>
    <a href="{{ route('mitra.nilai-akhir.index') }}" class="nav-item {{ request()->routeIs('mitra.nilai-akhir.*') ? 'active' : '' }}">
      <svg class="nav-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>Nilai Akhir Magang
    </a>
  </div>
  <div class="sidebar-foot">
    @php $initials = $mitra->inisials; @endphp
    <div class="user-chip">
      <div class="ava">{{ $initials }}</div>
      <div class="user-info">
        <div class="user-name">{{ $mitra->nama_perusahaan }}</div>
        <div class="user-role">Mitra Magang</div>
      </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">@csrf
      <button type="submit" style="background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;width:100%;margin-top:8px;">Keluar</button>
    </form>
  </div>
</nav>