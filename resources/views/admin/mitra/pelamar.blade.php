@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Daftar Pelamar - SIGMA</title>
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
.g4{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;}
.stat-card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;flex-direction:column;gap:8px;}
.stat-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;}
.stat-icon svg{width:18px;height:18px;}
.stat-val{font-size:24px;font-weight:700;font-family:'DM Mono',monospace;}
.stat-label{font-size:11.5px;color:var(--text-3);}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:22px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
.card-title{font-size:13.5px;font-weight:700;}
.filter-row{display:flex;gap:10px;align-items:center;}
.filter-select{padding:7px 12px;border:1px solid var(--border);border-radius:8px;font-family:inherit;font-size:12.5px;background:var(--bg2);color:var(--text-1);outline:none;}
.filter-select:focus{border-color:var(--primary);}
.btn{padding:7px 14px;border-radius:8px;font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-outline{background:var(--bg3);color:var(--text-1);border:1px solid var(--border);}
.table{width:100%;border-collapse:collapse;}
.table th{font-size:10.5px;font-weight:700;color:var(--text-3);text-transform:uppercase;letter-spacing:.08em;padding:8px 12px;text-align:left;border-bottom:1px solid var(--border);}
.table td{padding:12px 12px;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.table tr:last-child td{border-bottom:none;}
.table tr:hover td{background:var(--bg3);}
.td-ava{width:32px;height:32px;border-radius:8px;background:var(--primary-dim);color:var(--primary);font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.action-acc{background:var(--green-dim);color:var(--green);border:none;padding:5px 12px;border-radius:7px;font-size:11.5px;font-weight:600;cursor:pointer;}
.action-acc:hover{background:var(--green);color:#fff;}
.action-rej{background:var(--red-dim);color:var(--red);border:none;padding:5px 12px;border-radius:7px;font-size:11.5px;font-weight:600;cursor:pointer;}
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
    <div class="page-title">Daftar Pelamar</div>
  </div>
  <div class="content">

    @if(session('success'))<div class="alert alert-success"> {{ session('success') }}</div>@endif

    {{-- STATISTIK --}}
    <div class="g4">
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--primary-dim);"><svg fill="none" stroke="var(--primary)" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
        <div class="stat-val">{{ $stats['total'] }}</div>
        <div class="stat-label">Total Pelamar</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--amber-dim);"><svg fill="none" stroke="var(--amber)" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <div class="stat-val">{{ $stats['pending'] }}</div>
        <div class="stat-label">Menunggu Review</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--green-dim);"><svg fill="none" stroke="var(--green)" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
        <div class="stat-val">{{ $stats['diterima'] }}</div>
        <div class="stat-label">Diterima</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:var(--red-dim);"><svg fill="none" stroke="var(--red)" stroke-width="2" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></div>
        <div class="stat-val">{{ $stats['ditolak'] }}</div>
        <div class="stat-label">Ditolak</div>
      </div>
    </div>

    {{-- TABEL --}}
    <div class="card">
      <div class="card-hd">
        <div class="card-title">Semua Lamaran</div>
        <form method="GET" action="{{ route('mitra.pelamar.index') }}" class="filter-row">
          <select name="lowongan_id" class="filter-select" onchange="this.form.submit()">
            <option value="">Semua Lowongan</option>
            @foreach($lowongans as $low)
              <option value="{{ $low->id }}" {{ request('lowongan_id') == $low->id ? 'selected' : '' }}>{{ $low->judul_lowongan }}</option>
            @endforeach
          </select>
          <select name="status" class="filter-select" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="diterima" {{ request('status') === 'diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="ditolak" {{ request('status') === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
          </select>
        </form>
      </div>
      @if($lamarans->isEmpty())
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          <p>Belum ada lamaran masuk</p>
        </div>
      @else
        <table class="table">
          <thead><tr><th>Mahasiswa</th><th>Posisi</th><th>Tanggal Lamar</th><th>Dokumen</th><th>Status</th><th>Catatan</th><th>Aksi</th></tr></thead>
          <tbody>
            @foreach($lamarans as $lam)
              <tr>
                <td>
                  <div style="display:flex;align-items:center;gap:10px;">
                    <div class="td-ava">{{ strtoupper(substr($lam->mahasiswa->name,0,2)) }}</div>
                    <div>
                      <div style="font-weight:600;">{{ $lam->mahasiswa->name }}</div>
                      <div style="font-size:11px;color:var(--text-3);">{{ $lam->mahasiswa->email }}</div>
                    </div>
                  </div>
                </td>
                <td style="color:var(--text-2);">{{ $lam->lowongan->judul_lowongan ?? '-' }}</td>
                <td style="font-size:11px;color:var(--text-3);font-family:'DM Mono',monospace;">{{ $lam->created_at->format('d M Y') }}</td>
                <td>
                  <div style="display:flex;gap:6px;flex-wrap:wrap;">
                    @if($lam->cv_path)
                      <a href="{{ Storage::url($lam->cv_path) }}" target="_blank"
                         style="background:#f3e8ec;color:#8b1a3a;padding:5px 10px;border-radius:7px;font-size:11px;font-weight:600;text-decoration:none;">CV</a>
                    @else
                      <span style="font-size:11px;color:#aaa;">-</span>
                    @endif
                    @if($lam->surat_lamaran_path)
                      <a href="{{ Storage::url($lam->surat_lamaran_path) }}" target="_blank"
                         style="background:#fffbeb;color:#b45309;padding:5px 10px;border-radius:7px;font-size:11px;font-weight:600;text-decoration:none;">Surat</a>
                    @endif
                  </div>
                </td>
                <td>
                  @if($lam->status === 'diterima') <span class="pill p-ok">Diterima</span>
                  @elseif($lam->status === 'ditolak') <span class="pill p-red">Ditolak</span>
                  @else <span class="pill p-pend">Pending</span>
                  @endif
                </td>
                <td style="font-size:11.5px;color:var(--text-2);max-width:160px;">
                  {{ $lam->catatan_mitra ?? '-' }}
                </td>
                <td>
                  @if($lam->status === 'pending')
                    <div style="display:flex;gap:6px;">
                      <button class="action-acc" onclick="openModal('terima', {{ $lam->id }}, '{{ addslashes($lam->mahasiswa->name) }}')">Terima</button>
                      <button class="action-rej" onclick="openModal('tolak', {{ $lam->id }}, '{{ addslashes($lam->mahasiswa->name) }}')">Tolak</button>
                    </div>
                  @else
                    <span style="font-size:11px;color:var(--text-3);">
                      {{ $lam->diproses_pada ? $lam->diproses_pada->format('d M Y') : '-' }}
                    </span>
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
      <button class="modal-close" onclick="document.getElementById('modalAksi').classList.remove('open')">x</button>
    </div>
    <p style="font-size:13px;color:var(--text-2);margin-bottom:16px;" id="modal-desc"></p>
    <form method="POST" id="modal-form">
      @csrf
      <div class="form-group">
        <label class="form-label">Catatan untuk mahasiswa (opsional)</label>
        <textarea name="catatan_mitra" class="form-textarea" placeholder="Tulis catatan..."></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;">
        <button type="button" onclick="document.getElementById('modalAksi').classList.remove('open')" style="background:var(--bg3);color:var(--text-2);border:1px solid var(--border);padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;">Batal</button>
        <button type="submit" id="modal-submit" style="padding:8px 18px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;border:none;color:#fff;">Konfirmasi</button>
      </div>
    </form>
  </div>
</div>

<script>
function openModal(aksi, id, nama) {
  const form = document.getElementById('modal-form');
  const submit = document.getElementById('modal-submit');
  if (aksi === 'terima') {
    document.getElementById('modal-judul').textContent = 'Terima Lamaran';
    document.getElementById('modal-desc').textContent = `Terima lamaran dari ${nama}?`;
    submit.textContent = 'Terima'; submit.style.background = 'var(--green)';
    form.action = `/mitra/pelamar/${id}/terima`;
  } else {
    document.getElementById('modal-judul').textContent = 'Tolak Lamaran';
    document.getElementById('modal-desc').textContent = `Tolak lamaran dari ${nama}?`;
    submit.textContent = 'Tolak'; submit.style.background = 'var(--red)';
    form.action = `/mitra/pelamar/${id}/tolak`;
  }
  document.getElementById('modalAksi').classList.add('open');
}
</script>
</body>
</html>