<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Log Kegiatan Mahasiswa — SIGMA</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#faf7f4;--bg2:#fff;--bg3:#f3ede6;--border:rgba(100,30,50,.1);--text-1:#1a0a0f;--text-2:#6b4050;--text-3:#a07080;--primary:#8b1a3a;--primary-dim:rgba(139,26,58,.10);--primary-hover:#6e1530;--amber:#c07020;--amber-dim:rgba(192,112,32,.12);--red:#c0453f;--red-dim:rgba(192,69,63,.10);--green:#2e7d4f;--green-dim:rgba(46,125,79,.10);--radius:14px;--sidebar-w:230px;}
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
.pill{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;}
.p-ok{background:var(--green-dim);color:var(--green);}.p-pend{background:var(--amber-dim);color:var(--amber);}.p-red{background:var(--red-dim);color:var(--red);}
.g3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;}
.stat-card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;flex-direction:column;gap:8px;}
.stat-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;}
.stat-icon svg{width:18px;height:18px;}
.stat-val{font-size:24px;font-weight:700;font-family:'DM Mono',monospace;}
.stat-label{font-size:11.5px;color:var(--text-3);}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:22px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;flex-wrap:wrap;gap:10px;}
.card-title{font-size:13.5px;font-weight:700;}
.filter-row{display:flex;gap:8px;align-items:center;flex-wrap:wrap;}
.filter-select{padding:6px 10px;border:1px solid var(--border);border-radius:8px;font-family:inherit;font-size:12px;background:var(--bg2);outline:none;}
.filter-select:focus{border-color:var(--primary);}
.table{width:100%;border-collapse:collapse;}
.table th{font-size:10.5px;font-weight:700;color:var(--text-3);text-transform:uppercase;letter-spacing:.08em;padding:8px 12px;text-align:left;border-bottom:1px solid var(--border);}
.table td{padding:11px 12px;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.table tr:last-child td{border-bottom:none;}
.table tr:hover td{background:var(--bg3);}
.td-ava{width:28px;height:28px;border-radius:7px;background:var(--primary-dim);color:var(--primary);font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.action-acc{background:var(--green-dim);color:var(--green);border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer;}
.action-acc:hover{background:var(--green);color:#fff;}
.action-rej{background:var(--red-dim);color:var(--red);border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer;}
.action-rej:hover{background:var(--red);color:#fff;}
.alert{padding:10px 14px;border-radius:9px;font-size:12.5px;}
.alert-success{background:var(--green-dim);color:var(--green);}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:40px;text-align:center;color:var(--text-3);}
.empty-state svg{width:40px;height:40px;margin-bottom:12px;opacity:.4;}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:100;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:16px;width:440px;max-width:95vw;padding:24px;}
.modal-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
.modal-title{font-size:15px;font-weight:700;}
.modal-close{background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-3);line-height:1;}
.form-group{margin-bottom:14px;}
.form-label{font-size:11.5px;font-weight:600;color:var(--text-2);margin-bottom:5px;display:block;}
.form-textarea{width:100%;padding:9px 12px;border:1px solid var(--border);border-radius:9px;font-family:inherit;font-size:13px;background:var(--bg3);outline:none;resize:vertical;min-height:80px;}
.form-textarea:focus{border-color:var(--primary);background:#fff;}
</style>
</head>
<body>
@include('mitra.components.sidebar')

<div class="main">
  <div class="topbar">
    <div class="page-title">Log Kegiatan Mahasiswa</div>
  </div>
  <div class="content">

    @if(session('success'))<div class="alert alert-success">✓ {{ session('success') }}</div>@endif

    {{-- STATISTIK --}}
    <div class="g3">
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--primary-dim);"><svg fill="none" stroke="var(--primary)" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
        <div class="stat-val">{{ $stats['total'] }}</div>
        <div class="stat-label">Total Log</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--amber-dim);"><svg fill="none" stroke="var(--amber)" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <div class="stat-val">{{ $stats['menunggu'] }}</div>
        <div class="stat-label">Perlu Ditinjau</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--green-dim);"><svg fill="none" stroke="var(--green)" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
        <div class="stat-val">{{ $stats['disetujui'] }}</div>
        <div class="stat-label">Disetujui</div>
      </div>
    </div>

    {{-- TABEL LOG --}}
    <div class="card">
      <div class="card-hd">
        <div class="card-title">Semua Log Kegiatan</div>
        <form method="GET" action="{{ route('mitra.log.index') }}" class="filter-row">
          <select name="mahasiswa_id" class="filter-select" onchange="this.form.submit()">
            <option value="">Semua Mahasiswa</option>
            @foreach($mahasiswaAktif as $mhs)
              <option value="{{ $mhs->mahasiswa_id }}" {{ request('mahasiswa_id') == $mhs->mahasiswa_id ? 'selected' : '' }}>
                {{ $mhs->mahasiswa->name }}
              </option>
            @endforeach
          </select>
          <select name="status" class="filter-select" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            <option value="menunggu" {{ request('status') === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="disetujui" {{ request('status') === 'disetujui' ? 'selected' : '' }}>Disetujui</option>
            <option value="ditolak" {{ request('status') === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
          </select>
          <select name="minggu_ke" class="filter-select" onchange="this.form.submit()">
            <option value="">Semua Minggu</option>
            @for($w = 1; $w <= 16; $w++)
              <option value="{{ $w }}" {{ request('minggu_ke') == $w ? 'selected' : '' }}>Minggu ke-{{ $w }}</option>
            @endfor
          </select>
        </form>
      </div>
      @if($logs->isEmpty())
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
          <p>Belum ada log kegiatan yang perlu ditinjau</p>
        </div>
      @else
        <table class="table">
          <thead><tr><th>Mahasiswa</th><th>Kegiatan</th><th>Tanggal</th><th>Minggu</th><th>Jam</th><th>Status</th><th>Aksi</th></tr></thead>
          <tbody>
            @foreach($logs as $log)
              <tr>
                <td>
                  <div style="display:flex;align-items:center;gap:8px;">
                    <div class="td-ava">{{ strtoupper(substr($log->mahasiswa->name,0,2)) }}</div>
                    <div style="font-weight:600;font-size:12px;">{{ $log->mahasiswa->name }}</div>
                  </div>
                </td>
                <td>
                  <div style="font-weight:600;">{{ $log->judul_kegiatan }}</div>
                  @if($log->lokasi)<div style="font-size:11px;color:var(--text-3);">📍 {{ $log->lokasi }}</div>@endif
                  @if($log->catatan_pembimbing)<div style="font-size:11px;color:var(--primary);margin-top:2px;">💬 {{ $log->catatan_pembimbing }}</div>@endif
                </td>
                <td style="font-family:'DM Mono',monospace;font-size:11px;">{{ $log->tanggal->format('d M Y') }}</td>
                <td style="font-size:12px;">ke-{{ $log->minggu_ke }}</td>
                <td style="font-size:11px;font-family:'DM Mono',monospace;">{{ substr($log->jam_mulai,0,5) }}–{{ substr($log->jam_selesai,0,5) }}</td>
                <td>
                  @if($log->status === 'disetujui') <span class="pill p-ok">✓ Disetujui</span>
                  @elseif($log->status === 'ditolak') <span class="pill p-red">✗ Ditolak</span>
                  @else <span class="pill p-pend">⏳ Menunggu</span>
                  @endif
                </td>
                <td>
                  @if($log->status === 'menunggu')
                    <div style="display:flex;gap:5px;">
                      <button class="action-acc" onclick="openModal('setujui', {{ $log->id }})">Setujui</button>
                      <button class="action-rej" onclick="openModal('tolak', {{ $log->id }})">Tolak</button>
                    </div>
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

{{-- MODAL --}}
<div class="modal-overlay" id="modalAksi">
  <div class="modal">
    <div class="modal-hd">
      <div class="modal-title" id="modal-judul">Konfirmasi</div>
      <button class="modal-close" onclick="document.getElementById('modalAksi').classList.remove('open')">×</button>
    </div>
    <form method="POST" id="modal-form">@csrf
      <div class="form-group">
        <label class="form-label" id="catatan-label">Catatan pembimbing (opsional)</label>
        <textarea name="catatan_pembimbing" class="form-textarea" id="catatan-input" placeholder="Tulis catatan..."></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;">
        <button type="button" onclick="document.getElementById('modalAksi').classList.remove('open')" style="background:var(--bg3);color:var(--text-2);border:1px solid var(--border);padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;">Batal</button>
        <button type="submit" id="modal-submit" style="padding:8px 18px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;border:none;color:#fff;">Konfirmasi</button>
      </div>
    </form>
  </div>
</div>

<script>
function openModal(aksi, id) {
  const form = document.getElementById('modal-form');
  const submit = document.getElementById('modal-submit');
  if (aksi === 'setujui') {
    document.getElementById('modal-judul').textContent = 'Setujui Log Kegiatan';
    document.getElementById('catatan-label').textContent = 'Catatan pembimbing (opsional)';
    document.getElementById('catatan-input').required = false;
    submit.textContent = 'Setujui'; submit.style.background = 'var(--green)';
    form.action = `/mitra/log-mahasiswa/${id}/setujui`;
  } else {
    document.getElementById('modal-judul').textContent = 'Tolak Log Kegiatan';
    document.getElementById('catatan-label').textContent = 'Alasan penolakan *';
    document.getElementById('catatan-input').required = true;
    submit.textContent = 'Tolak'; submit.style.background = 'var(--red)';
    form.action = `/mitra/log-mahasiswa/${id}/tolak`;
  }
  document.getElementById('modalAksi').classList.add('open');
}
</script>
</body>
</html>
