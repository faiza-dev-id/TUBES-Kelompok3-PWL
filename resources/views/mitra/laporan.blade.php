@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Mahasiswa - SIGMA</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
:root{--primary:#8b1a3a;--primary-dim:#f3e8ec;--sidebar-w:230px;--text-2:#4b5563;--text-3:#9ca3af;--border:rgba(100,30,50,.1);--green:#16a34a;--green-dim:#dcfce7;--amber:#b45309;--amber-dim:#fffbeb;--red:#dc2626;--red-dim:#fee2e2;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:#f8f5f6;}
.sidebar{width:var(--sidebar-w);background:var(--primary);display:flex;flex-direction:column;padding:24px 0;position:fixed;height:100vh;top:0;left:0;z-index:10;}
.sidebar-logo{display:flex;align-items:center;gap:10px;padding:0 20px 28px;border-bottom:1px solid rgba(255,255,255,.15);}
.logo-mark{width:34px;height:34px;background:rgba(255,255,255,.2);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;color:#fff;}
.logo-text{font-weight:700;font-size:15px;color:#fff;}.logo-sub{font-size:10px;color:rgba(255,255,255,.55);}
.nav-group{padding:20px 12px 8px;flex:1;}
.nav-label{font-size:9.5px;letter-spacing:.12em;color:rgba(255,255,255,.45);text-transform:uppercase;font-weight:600;padding:0 8px;margin-bottom:6px;}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:9px;color:rgba(255,255,255,.7);font-size:13px;font-weight:500;margin-bottom:2px;transition:.15s;text-decoration:none;}
.nav-icon{width:16px;height:16px;flex-shrink:0;overflow:hidden;}
.nav-item:hover{background:rgba(255,255,255,.12);color:#fff;}.nav-item.active{background:rgba(255,255,255,.18);color:#fff;}
.sidebar-foot{padding:16px 12px;border-top:1px solid rgba(255,255,255,.15);}
.user-chip{display:flex;align-items:center;gap:10px;padding:10px;border-radius:10px;background:rgba(255,255,255,.12);}
.ava{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;flex-shrink:0;}
.user-name{font-size:12px;font-weight:600;color:#fff;}.user-role{font-size:10px;color:rgba(255,255,255,.55);}
.pill{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10.5px;font-weight:600;}
.p-ok{background:var(--green-dim);color:var(--green);}
.p-pend{background:var(--amber-dim);color:var(--amber);}
.p-red{background:var(--red-dim);color:var(--red);}
.table{width:100%;border-collapse:collapse;}
.table th{text-align:left;font-size:11px;font-weight:600;color:var(--text-3);text-transform:uppercase;letter-spacing:.06em;padding:10px 12px;border-bottom:1px solid #f0e8ea;}
.table td{padding:12px;border-bottom:1px solid #faf5f6;font-size:13px;vertical-align:top;}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.4);z-index:100;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:16px;padding:24px;width:420px;max-width:90vw;}
.modal-hd{display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;}
.modal-title{font-weight:700;font-size:15px;}
.modal-close{background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-3);}
.form-label{font-size:12px;font-weight:600;color:var(--text-2);display:block;margin-bottom:4px;}
.form-textarea{width:100%;border:1px solid #e5e7eb;border-radius:8px;padding:8px 10px;font-size:13px;resize:vertical;min-height:80px;outline:none;box-sizing:border-box;}
.btn-ok{background:var(--green);color:#fff;border:none;padding:8px 18px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;}
.btn-rev{background:var(--amber);color:#fff;border:none;padding:8px 18px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;}
</style>
</head>
<body style="padding-left:230px;">
@include('mitra.components.sidebar')
<main style="padding:32px;min-height:100vh;">
  <h1 style="font-size:20px;font-weight:700;color:#1f2937;margin-bottom:24px;">Laporan Mahasiswa</h1>

  @if(session('success'))
    <div style="background:#dcfce7;color:#16a34a;padding:10px 16px;border-radius:8px;margin-bottom:16px;font-size:13px;">
      {{ session('success') }}
    </div>
  @endif

  <div style="background:#fff;border-radius:16px;box-shadow:0 1px 4px rgba(0,0,0,.06);overflow:hidden;">
    @if($laporan->isEmpty())
      <div style="padding:48px;text-align:center;color:var(--text-3);">
        <p>Belum ada laporan dari mahasiswa.</p>
      </div>
    @else
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Mahasiswa</th>
            <th>Judul Laporan</th>
            <th>Jenis</th>
            <th>Tanggal Upload</th>
            <th>File</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($laporan as $lap)
          <tr>
            <td style="color:var(--text-3);">{{ $loop->iteration }}</td>
            <td>
              <div style="font-weight:600;">{{ $lap->mahasiswa->name ?? '-' }}</div>
              <div style="font-size:11px;color:var(--text-3);">{{ $lap->mahasiswa->email ?? '' }}</div>
            </td>
            <td>
              <div style="font-weight:500;">{{ $lap->judul_laporan }}</div>
              @if($lap->catatan_reviewer)
                <div style="font-size:11px;color:var(--amber);margin-top:2px;">Catatan: {{ $lap->catatan_reviewer }}</div>
              @endif
            </td>
            <td><span class="pill p-pend">{{ ucfirst($lap->jenis_laporan) }}</span></td>
            <td style="font-size:11px;color:var(--text-3);">{{ $lap->created_at->format('d M Y') }}</td>
            <td>
              @if($lap->file_path)
                <a href="{{ Storage::url($lap->file_path) }}" target="_blank"
                   style="background:var(--primary-dim);color:var(--primary);padding:5px 10px;border-radius:7px;font-size:11px;font-weight:600;text-decoration:none;">
                  Unduh
                </a>
              @else
                <span style="font-size:11px;color:#aaa;">-</span>
              @endif
            </td>
            <td>
              @if($lap->status === 'diterima')
                <span class="pill p-ok">Disetujui</span>
              @elseif($lap->status === 'revisi')
                <span class="pill p-red">Revisi</span>
              @else
                <span class="pill p-pend">Menunggu</span>
              @endif
            </td>
            <td>
              @if($lap->status === 'dikirim')
                <div style="display:flex;gap:6px;">
                  <button class="btn-ok" onclick="openModal('setujui', {{ $lap->id }}, '{{ addslashes($lap->judul_laporan) }}')">Setujui</button>
                  <button class="btn-rev" onclick="openModal('revisi', {{ $lap->id }}, '{{ addslashes($lap->judul_laporan) }}')">Revisi</button>
                </div>
              @else
                <span style="font-size:11px;color:var(--text-3);">Sudah diproses</span>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</main>

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
      @method('POST')
      <div style="margin-bottom:12px;">
        <label class="form-label">Catatan <span id="catatan-hint"></span></label>
        <textarea name="catatan_reviewer" id="catatan_reviewer" class="form-textarea" placeholder="Tulis catatan..."></textarea>
      </div>
      <div style="display:flex;gap:10px;justify-content:flex-end;">
        <button type="button" onclick="document.getElementById('modalAksi').classList.remove('open')"
          style="background:#f3f4f6;color:var(--text-2);border:1px solid #e5e7eb;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;">
          Batal
        </button>
        <button type="submit" id="modal-submit" style="padding:8px 18px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;border:none;color:#fff;">Konfirmasi</button>
      </div>
    </form>
  </div>
</div>

<script>
function openModal(aksi, id, judul) {
  const form = document.getElementById('modal-form');
  const submitBtn = document.getElementById('modal-submit');
  const desc = document.getElementById('modal-desc');
  const hint = document.getElementById('catatan-hint');

  if (aksi === 'setujui') {
    form.action = '/mitra/laporan/' + id + '/setujui';
    submitBtn.style.background = '#16a34a';
    submitBtn.textContent = 'Setujui';
    document.getElementById('modal-judul').textContent = 'Setujui Laporan';
    desc.textContent = 'Setujui laporan: "' + judul + '"?';
    hint.textContent = '(opsional)';
  } else {
    form.action = '/mitra/laporan/' + id + '/revisi';
    submitBtn.style.background = '#b45309';
    submitBtn.textContent = 'Minta Revisi';
    document.getElementById('modal-judul').textContent = 'Minta Revisi';
    desc.textContent = 'Minta revisi untuk laporan: "' + judul + '"?';
    hint.textContent = '(wajib)';
  }

  document.getElementById('modalAksi').classList.add('open');
}
</script>
</body>
</html>