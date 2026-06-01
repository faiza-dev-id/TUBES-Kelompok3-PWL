<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Kelola Lowongan — SIGMA</title>
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
.user-name{font-size:12px;font-weight:600;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}.user-role{font-size:10px;color:rgba(255,255,255,.55);}
.btn-logout{background:transparent;color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.2);padding:6px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer;width:100%;margin-top:8px;}
.main{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;}
.topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:9;}
.page-title{font-size:15px;font-weight:700;}
.btn{padding:7px 14px;border-radius:8px;font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-primary{background:var(--primary);color:#fff;}.btn-primary:hover{background:var(--primary-hover);}
.content{padding:28px;display:flex;flex-direction:column;gap:20px;}
.pill{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;}
.p-ok{background:var(--green-dim);color:var(--green);}.p-red{background:var(--red-dim);color:var(--red);}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:22px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;}
.card-title{font-size:13.5px;font-weight:700;}
.table{width:100%;border-collapse:collapse;}
.table th{font-size:10.5px;font-weight:700;color:var(--text-3);text-transform:uppercase;letter-spacing:.08em;padding:8px 12px;text-align:left;border-bottom:1px solid var(--border);}
.table td{padding:12px 12px;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.table tr:last-child td{border-bottom:none;}
.table tr:hover td{background:var(--bg3);}
.btn-sm{padding:5px 10px;border-radius:7px;font-size:11px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-edit{background:var(--amber-dim);color:var(--amber);}.btn-edit:hover{background:var(--amber);color:#fff;}
.btn-del{background:var(--red-dim);color:var(--red);}.btn-del:hover{background:var(--red);color:#fff;}
.alert{padding:10px 14px;border-radius:9px;font-size:12.5px;}
.alert-success{background:var(--green-dim);color:var(--green);}
.alert-error{background:var(--red-dim);color:var(--red);}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:40px;text-align:center;color:var(--text-3);}
.empty-state svg{width:40px;height:40px;margin-bottom:12px;opacity:.4;}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:100;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:16px;width:520px;max-width:95vw;padding:24px;max-height:90vh;overflow-y:auto;}
.modal-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;}
.modal-title{font-size:15px;font-weight:700;}
.modal-close{background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-3);line-height:1;}
.form-group{margin-bottom:14px;}
.form-label{font-size:11.5px;font-weight:600;color:var(--text-2);margin-bottom:5px;display:block;}
.form-input,.form-select,.form-textarea{width:100%;padding:9px 12px;border:1px solid var(--border);border-radius:9px;font-family:inherit;font-size:13px;background:var(--bg3);color:var(--text-1);outline:none;transition:.15s;}
.form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--primary);background:#fff;}
.form-textarea{resize:vertical;min-height:100px;}
</style>
</head>
<body>
@include('mitra.components.sidebar')

<div class="main">
  <div class="topbar">
    <div class="page-title">Kelola Lowongan</div>
    <button class="btn btn-primary" onclick="document.getElementById('modalTambah').classList.add('open')">+ Buat Lowongan</button>
  </div>
  <div class="content">

    @if(session('success'))<div class="alert alert-success">✓ {{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-error">✗ {{ session('error') }}</div>@endif

    <div class="card">
      <div class="card-hd">
        <div class="card-title">Semua Lowongan ({{ $lowongans->count() }})</div>
      </div>
      @if($lowongans->isEmpty())
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M21 13V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h8"/><path d="M16 19h6m-3-3v6"/></svg>
          <p>Belum ada lowongan. Klik "+ Buat Lowongan" untuk memulai.</p>
        </div>
      @else
        <table class="table">
          <thead><tr><th>Judul Lowongan</th><th>Durasi</th><th>Pelamar</th><th>Pending</th><th>Status</th><th>Dibuat</th><th></th></tr></thead>
          <tbody>
            @foreach($lowongans as $low)
              <tr>
                <td>
                  <div style="font-weight:600;">{{ $low->judul_lowongan }}</div>
                  <div style="font-size:11px;color:var(--text-3);margin-top:2px;">{{ mb_strimwidth($low->deskripsi, 0, 60, '...') }}</div>
                </td>
                <td style="color:var(--text-2);">{{ $low->durasi }}</td>
                <td style="font-family:'DM Mono',monospace;">{{ $low->lamarans_count }}</td>
                <td>
                  @if($low->pending_count > 0)
                    <span class="pill" style="background:var(--amber-dim);color:var(--amber);">{{ $low->pending_count }} pending</span>
                  @else
                    <span style="color:var(--text-3);font-size:11px;">—</span>
                  @endif
                </td>
                <td>
                  <span class="pill {{ $low->status === 'aktif' ? 'p-ok' : 'p-red' }}">{{ ucfirst($low->status) }}</span>
                </td>
                <td style="font-size:11px;color:var(--text-3);font-family:'DM Mono',monospace;">{{ $low->created_at->format('d M Y') }}</td>
                <td>
                  <div style="display:flex;gap:6px;">
                    <button class="btn-sm btn-edit" onclick="openEdit({{ $low->id }}, '{{ addslashes($low->judul_lowongan) }}', {{ json_encode($low->deskripsi) }}, '{{ $low->durasi }}', '{{ $low->status }}')">Edit</button>
                    <form method="POST" action="{{ route('mitra.lowongan.destroy', $low->id) }}" onsubmit="return confirm('Hapus lowongan ini?')">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn-sm btn-del">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>

  </div>
</div>

{{-- MODAL TAMBAH --}}
<div class="modal-overlay" id="modalTambah">
  <div class="modal">
    <div class="modal-hd">
      <div class="modal-title">Buat Lowongan Baru</div>
      <button class="modal-close" onclick="document.getElementById('modalTambah').classList.remove('open')">×</button>
    </div>
    <form method="POST" action="{{ route('mitra.lowongan.store') }}">
      @csrf
      <div class="form-group">
        <label class="form-label">Judul Lowongan *</label>
        <input type="text" name="judul_lowongan" class="form-input" placeholder="Contoh: Frontend Developer Intern" required>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi Pekerjaan *</label>
        <textarea name="deskripsi" class="form-textarea" placeholder="Tugas, tanggung jawab, dan kualifikasi yang dibutuhkan..." required></textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Durasi Magang *</label>
        <input type="text" name="durasi" class="form-input" placeholder="Contoh: 3 Bulan" required>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:6px;">
        <button type="button" onclick="document.getElementById('modalTambah').classList.remove('open')" style="background:var(--bg3);color:var(--text-2);border:1px solid var(--border);padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Lowongan</button>
      </div>
    </form>
  </div>
</div>

{{-- MODAL EDIT --}}
<div class="modal-overlay" id="modalEdit">
  <div class="modal">
    <div class="modal-hd">
      <div class="modal-title">Edit Lowongan</div>
      <button class="modal-close" onclick="document.getElementById('modalEdit').classList.remove('open')">×</button>
    </div>
    <form method="POST" id="formEdit">
      @csrf @method('PUT')
      <div class="form-group">
        <label class="form-label">Judul Lowongan *</label>
        <input type="text" name="judul_lowongan" id="edit-judul" class="form-input" required>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi *</label>
        <textarea name="deskripsi" id="edit-deskripsi" class="form-textarea" required></textarea>
      </div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
        <div class="form-group">
          <label class="form-label">Durasi *</label>
          <input type="text" name="durasi" id="edit-durasi" class="form-input" required>
        </div>
        <div class="form-group">
          <label class="form-label">Status *</label>
          <select name="status" id="edit-status" class="form-select">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
          </select>
        </div>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:6px;">
        <button type="button" onclick="document.getElementById('modalEdit').classList.remove('open')" style="background:var(--bg3);color:var(--text-2);border:1px solid var(--border);padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>

<script>
function openEdit(id, judul, deskripsi, durasi, status) {
  document.getElementById('edit-judul').value    = judul;
  document.getElementById('edit-deskripsi').value = deskripsi;
  document.getElementById('edit-durasi').value   = durasi;
  document.getElementById('edit-status').value   = status;
  document.getElementById('formEdit').action = `/mitra/lowongan/${id}`;
  document.getElementById('modalEdit').classList.add('open');
}
</script>
</body>
</html>
