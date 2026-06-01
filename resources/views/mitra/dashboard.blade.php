<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Dashboard Mitra — SIGMA</title>
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
.user-name{font-size:12px;font-weight:600;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}.user-role{font-size:10px;color:rgba(255,255,255,.55);}
.btn-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;width:100%;margin-top:8px;}
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:9;}
.page-title{font-size:15px;font-weight:700;}
.topbar-right{display:flex;align-items:center;gap:10px;}
.btn{padding:7px 14px;border-radius:8px;font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-primary{background:var(--primary);color:#fff;}.btn-primary:hover{background:var(--primary-hover);}
.btn-outline{background:var(--bg3);color:var(--text-1);border:1px solid var(--border);}.btn-outline:hover{border-color:var(--primary);color:var(--primary);}
.content{padding:28px;display:flex;flex-direction:column;gap:20px;}
.pill{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;}
.p-ok{background:var(--green-dim);color:var(--green);}.p-pend{background:var(--amber-dim);color:var(--amber);}.p-red{background:var(--red-dim);color:var(--red);}.p-blue{background:var(--blue-dim);color:var(--blue);}
.stats-row{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;}
.stat-card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:20px;display:flex;flex-direction:column;gap:10px;}
.stat-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;}
.stat-icon svg{width:18px;height:18px;}
.stat-val{font-size:26px;font-weight:700;line-height:1;font-family:'DM Mono',monospace;}
.stat-label{font-size:11.5px;color:var(--text-3);font-weight:500;}
.stat-trend{font-size:10.5px;font-weight:600;}
.trend-up{color:var(--green);}.trend-down{color:var(--red);}.trend-neutral{color:var(--text-3);}
.g2{display:grid;grid-template-columns:2fr 1fr;gap:20px;}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:22px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
.card-title{font-size:13.5px;font-weight:700;}
.card-link{font-size:12px;color:var(--primary);text-decoration:none;font-weight:600;}
.table{width:100%;border-collapse:collapse;}
.table th{font-size:10.5px;font-weight:700;color:var(--text-3);text-transform:uppercase;letter-spacing:.08em;padding:8px 12px;text-align:left;border-bottom:1px solid var(--border);}
.table td{padding:11px 12px;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.table tr:last-child td{border-bottom:none;}
.table tr:hover td{background:var(--bg3);}
.td-ava{width:28px;height:28px;border-radius:7px;background:var(--primary-dim);color:var(--primary);font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.action-acc{background:var(--green-dim);color:var(--green);border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer;transition:.15s;}
.action-acc:hover{background:var(--green);color:#fff;}
.action-rej{background:var(--red-dim);color:var(--red);border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer;transition:.15s;}
.action-rej:hover{background:var(--red);color:#fff;}
.job-list{display:flex;flex-direction:column;gap:10px;}
.job-item{display:flex;align-items:center;gap:12px;padding:12px;border:1px solid var(--border);border-radius:10px;background:var(--bg3);}
.job-item-icon{width:36px;height:36px;border-radius:9px;background:var(--primary-dim);color:var(--primary);font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.job-item-info{flex:1;min-width:0;}.job-item-title{font-size:12.5px;font-weight:600;}.job-item-meta{font-size:11px;color:var(--text-3);margin-top:2px;}
.job-item-count{font-size:11px;font-weight:600;color:var(--primary);background:var(--primary-dim);padding:2px 8px;border-radius:20px;}
.feed{display:flex;flex-direction:column;gap:12px;}
.feed-item{display:flex;gap:12px;}
.feed-dot{width:8px;height:8px;border-radius:50%;background:var(--primary);flex-shrink:0;margin-top:4px;}
.feed-dot.amber{background:var(--amber);}.feed-dot.green{background:var(--green);}.feed-dot.blue{background:var(--blue);}
.feed-text{font-size:12px;color:var(--text-2);line-height:1.5;}
.feed-time{font-size:10.5px;color:var(--text-3);font-family:'DM Mono',monospace;margin-top:2px;}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:28px;text-align:center;color:var(--text-3);}
.empty-state svg{width:36px;height:36px;margin-bottom:10px;opacity:.4;}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:100;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:16px;width:420px;max-width:95vw;padding:24px;}
.modal-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
.modal-title{font-size:15px;font-weight:700;}
.modal-close{background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-3);line-height:1;}
.form-group{margin-bottom:14px;}
.form-label{font-size:11.5px;font-weight:600;color:var(--text-2);margin-bottom:5px;display:block;}
.form-textarea{width:100%;padding:9px 12px;border:1px solid var(--border);border-radius:9px;font-family:inherit;font-size:13px;background:var(--bg3);color:var(--text-1);outline:none;resize:vertical;min-height:80px;}
.form-textarea:focus{border-color:var(--primary);background:#fff;}
@keyframes fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease both;}
</style>
</head>
<body>

@include('mitra.components.sidebar')

<div class="main">
  <div class="topbar">
    <div class="page-title">Dashboard Mitra</div>
    <div class="topbar-right">
      <a href="{{ route('mitra.lowongan.index') }}" class="btn btn-primary">+ Buat Lowongan</a>
    </div>
  </div>

  <div class="content">

    @if(session('success'))
      <div style="background:var(--green-dim);color:var(--green);padding:10px 14px;border-radius:9px;font-size:12.5px;">✓ {{ session('success') }}</div>
    @endif

    {{-- ── STATISTIK ── --}}
    <div class="stats-row fade-up">
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--primary-dim);">
          <svg fill="none" stroke="var(--primary)" stroke-width="2" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>
        </div>
        <div class="stat-val">{{ $lowonganAktif }}</div>
        <div class="stat-label">Lowongan Aktif</div>
        <div class="stat-trend trend-neutral">Semua lowongan terbuka</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--amber-dim);">
          <svg fill="none" stroke="var(--amber)" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
        </div>
        <div class="stat-val">{{ $totalPelamar }}</div>
        <div class="stat-label">Total Pelamar</div>
        <div class="stat-trend {{ $pelamarMingguIni > 0 ? 'trend-up' : 'trend-neutral' }}">
          {{ $pelamarMingguIni > 0 ? '↑ '.$pelamarMingguIni.' pelamar baru minggu ini' : 'Belum ada pelamar baru' }}
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--green-dim);">
          <svg fill="none" stroke="var(--green)" stroke-width="2" viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
        </div>
        <div class="stat-val">{{ $mahasiswaAktif }}</div>
        <div class="stat-label">Mahasiswa Aktif Magang</div>
        <div class="stat-trend trend-up">↑ Sedang berjalan</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--blue-dim);">
          <svg fill="none" stroke="var(--blue)" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <div class="stat-val">{{ $penilaianBelumSelesai }}</div>
        <div class="stat-label">Penilaian Belum Selesai</div>
        <div class="stat-trend {{ $penilaianBelumSelesai > 0 ? 'trend-down' : 'trend-up' }}">
          {{ $penilaianBelumSelesai > 0 ? '↓ Perlu segera dinilai' : '✓ Semua sudah dinilai' }}
        </div>
      </div>
    </div>

    {{-- ── PELAMAR TERBARU + LOWONGAN ── --}}
    <div class="g2 fade-up" style="animation-delay:.1s">

      {{-- Pelamar pending --}}
      <div class="card">
        <div class="card-hd">
          <div class="card-title">Pelamar Terbaru</div>
          <a href="{{ route('mitra.pelamar.index') }}" class="card-link">Lihat Semua →</a>
        </div>
        @if($lamaranPending->isEmpty())
          <div class="empty-state">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            <p>Belum ada pelamar baru yang menunggu</p>
          </div>
        @else
          <table class="table">
            <thead>
              <tr>
                <th>Mahasiswa</th>
                <th>Posisi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lamaranPending as $lamaran)
                <tr>
                  <td>
                    <div style="display:flex;align-items:center;gap:9px;">
                      <div class="td-ava">{{ strtoupper(substr($lamaran->mahasiswa->name,0,2)) }}</div>
                      <div>
                        <div style="font-weight:600;font-size:12.5px;">{{ $lamaran->mahasiswa->name }}</div>
                        <div style="font-size:10.5px;color:var(--text-3);">{{ $lamaran->mahasiswa->email }}</div>
                      </div>
                    </div>
                  </td>
                  <td style="color:var(--text-2);">{{ $lamaran->lowongan->judul_lowongan ?? '-' }}</td>
                  <td style="font-size:11px;color:var(--text-3);font-family:'DM Mono',monospace;">
                    {{ $lamaran->created_at->format('d M Y') }}
                  </td>
                  <td>
                    <div style="display:flex;gap:6px;">
                      <button class="action-acc"
                        onclick="openModal('terima', {{ $lamaran->id }}, '{{ addslashes($lamaran->mahasiswa->name) }}')">
                        Terima
                      </button>
                      <button class="action-rej"
                        onclick="openModal('tolak', {{ $lamaran->id }}, '{{ addslashes($lamaran->mahasiswa->name) }}')">
                        Tolak
                      </button>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>

      {{-- Sidebar: Lowongan aktif + Activity feed --}}
      <div style="display:flex;flex-direction:column;gap:20px;">

        {{-- Lowongan --}}
        <div class="card">
          <div class="card-hd">
            <div class="card-title">Lowongan Saya</div>
            <a href="{{ route('mitra.lowongan.index') }}" class="card-link">Kelola →</a>
          </div>
          <div class="job-list">
            @forelse($lowongans as $low)
              <div class="job-item">
                <div class="job-item-icon">{{ strtoupper(substr($low->judul_lowongan,0,2)) }}</div>
                <div class="job-item-info">
                  <div class="job-item-title">{{ $low->judul_lowongan }}</div>
                  <div class="job-item-meta">{{ $low->durasi }} · <span class="{{ $low->status === 'aktif' ? 'p-ok' : 'p-red' }}" style="font-size:10px;padding:1px 6px;">{{ ucfirst($low->status) }}</span></div>
                </div>
                <div class="job-item-count">{{ $low->pending_count }} pending</div>
              </div>
            @empty
              <div class="empty-state" style="padding:16px;">
                <p style="font-size:12px;">Belum ada lowongan</p>
              </div>
            @endforelse
          </div>
        </div>

        {{-- Activity Feed --}}
        <div class="card">
          <div class="card-hd">
            <div class="card-title">Aktivitas Terbaru</div>
            <a href="{{ route('mitra.log.index') }}" class="card-link">Lihat →</a>
          </div>
          <div class="feed">
            @forelse($activityFeed as $log)
              <div class="feed-item">
                <div class="feed-dot {{ match($log->status) { 'disetujui' => 'green', 'ditolak' => '', default => 'amber' } }}"></div>
                <div>
                  <div class="feed-text">
                    <strong>{{ $log->mahasiswa->name }}</strong>
                    menambah log: {{ $log->judul_kegiatan }}
                  </div>
                  <div class="feed-time">{{ $log->tanggal->format('d M Y') }} · {{ substr($log->jam_mulai,0,5) }}</div>
                </div>
              </div>
            @empty
              <div style="font-size:12px;color:var(--text-3);text-align:center;padding:12px 0;">
                Belum ada aktivitas
              </div>
            @endforelse
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

{{-- MODAL TERIMA/TOLAK --}}
<div class="modal-overlay" id="modalAksi">
  <div class="modal">
    <div class="modal-hd">
      <div class="modal-title" id="modal-judul">Konfirmasi</div>
      <button class="modal-close" onclick="closeModal()">×</button>
    </div>
    <p style="font-size:13px;color:var(--text-2);margin-bottom:16px;" id="modal-desc"></p>
    <form method="POST" id="modal-form">
      @csrf
      <div class="form-group">
        <label class="form-label">Catatan untuk mahasiswa (opsional)</label>
        <textarea name="catatan_mitra" class="form-textarea" placeholder="Misal: Selamat bergabung! / Mohon maaf, posisi sudah terisi..."></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;">
        <button type="button" onclick="closeModal()" style="background:var(--bg3);color:var(--text-2);border:1px solid var(--border);padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;">Batal</button>
        <button type="submit" id="modal-submit" class="btn btn-primary">Konfirmasi</button>
      </div>
    </form>
  </div>
</div>

<script>
function openModal(aksi, lamaranId, nama) {
  const form = document.getElementById('modal-form');
  if (aksi === 'terima') {
    document.getElementById('modal-judul').textContent = 'Terima Lamaran';
    document.getElementById('modal-desc').textContent = `Terima lamaran dari ${nama}? Mahasiswa akan mendapat notifikasi.`;
    document.getElementById('modal-submit').textContent = 'Terima';
    document.getElementById('modal-submit').style.background = 'var(--green)';
    form.action = `/mitra/pelamar/${lamaranId}/terima`;
  } else {
    document.getElementById('modal-judul').textContent = 'Tolak Lamaran';
    document.getElementById('modal-desc').textContent = `Tolak lamaran dari ${nama}?`;
    document.getElementById('modal-submit').textContent = 'Tolak';
    document.getElementById('modal-submit').style.background = 'var(--red)';
    form.action = `/mitra/pelamar/${lamaranId}/tolak`;
  }
  document.getElementById('modalAksi').classList.add('open');
}
function closeModal() {
  document.getElementById('modalAksi').classList.remove('open');
}
</script>
</body>
</html>
