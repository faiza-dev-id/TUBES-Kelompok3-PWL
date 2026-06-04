<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Penilaian Mahasiswa — SIGMA</title>
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
.p-ok{background:var(--green-dim);color:var(--green);}.p-pend{background:var(--amber-dim);color:var(--amber);}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:22px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;}
.card-title{font-size:13.5px;font-weight:700;}
.btn{padding:7px 14px;border-radius:8px;font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:.15s;}
.btn-primary{background:var(--primary);color:#fff;}.btn-primary:hover{background:var(--primary-hover);}
/* mahasiswa cards */
.mhs-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:16px;}
.mhs-card{border:1px solid var(--border);border-radius:var(--radius);padding:18px;background:var(--bg3);display:flex;flex-direction:column;gap:12px;}
.mhs-card-hd{display:flex;align-items:center;gap:12px;}
.mhs-ava{width:44px;height:44px;border-radius:11px;background:var(--primary-dim);color:var(--primary);font-size:14px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.mhs-name{font-size:13.5px;font-weight:700;}
.mhs-pos{font-size:12px;color:var(--text-2);}
/* nilai komponen mini bars */
.nilai-mini{display:flex;flex-direction:column;gap:6px;}
.nilai-mini-row{display:flex;align-items:center;gap:8px;}
.nilai-mini-label{font-size:11px;color:var(--text-3);width:90px;flex-shrink:0;}
.nilai-mini-bar{flex:1;height:5px;background:var(--border);border-radius:3px;overflow:hidden;}
.nilai-mini-fill{height:100%;border-radius:3px;background:var(--primary);}
.nilai-mini-val{font-size:11px;font-family:'DM Mono',monospace;font-weight:700;width:28px;text-align:right;flex-shrink:0;}
.alert{padding:10px 14px;border-radius:9px;font-size:12.5px;}
.alert-success{background:var(--green-dim);color:var(--green);}
.alert-error{background:var(--red-dim);color:var(--red);}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:40px;text-align:center;color:var(--text-3);}
.empty-state svg{width:40px;height:40px;margin-bottom:12px;opacity:.4;}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:100;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:16px;width:560px;max-width:95vw;padding:26px;max-height:90vh;overflow-y:auto;}
.modal-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;}
.modal-title{font-size:15px;font-weight:700;}
.modal-close{background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-3);line-height:1;}
.form-group{margin-bottom:14px;}
.form-label{font-size:11.5px;font-weight:600;color:var(--text-2);margin-bottom:5px;display:block;}
.form-input,.form-select,.form-textarea{width:100%;padding:9px 12px;border:1px solid var(--border);border-radius:9px;font-family:inherit;font-size:13px;background:var(--bg3);color:var(--text-1);outline:none;transition:.15s;}
.form-input:focus,.form-select:focus,.form-textarea:focus{border-color:var(--primary);background:#fff;}
.form-textarea{resize:vertical;min-height:80px;}
.g2-form{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
/* range slider */
.range-row{display:flex;align-items:center;gap:10px;}
.range-input{flex:1;accent-color:var(--primary);}
.range-val{font-size:14px;font-weight:700;font-family:'DM Mono',monospace;width:36px;text-align:right;color:var(--primary);}
.section-divider{font-size:11.5px;font-weight:700;color:var(--text-3);text-transform:uppercase;letter-spacing:.08em;margin:8px 0 14px;padding-bottom:6px;border-bottom:1px solid var(--border);}
</style>
</head>
<body>
@include('mitra.components.sidebar')

<div class="main">
  <div class="topbar">
    <div class="page-title">Penilaian Mahasiswa</div>
  </div>
  <div class="content">

    @if(session('success'))<div class="alert alert-success">✓ {{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-error">✗ {{ session('error') }}</div>@endif

    @if($mahasiswaAktif->isEmpty())
      <div class="card">
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <p>Belum ada mahasiswa yang aktif magang di perusahaan Anda.</p>
        </div>
      </div>
    @else
      <div class="card">
        <div class="card-hd"><div class="card-title">Mahasiswa Aktif Magang ({{ $mahasiswaAktif->count() }})</div></div>
        <div class="mhs-grid">
          @foreach($mahasiswaAktif as $lamaran)
            @php
              $nilaiAkhir = $lamaran->penilaian->where('jenis_penilaian','akhir')->first();
              $nilaiTengah = $lamaran->penilaian->where('jenis_penilaian','tengah')->first();
              $penilaianTerbaru = $nilaiAkhir ?? $nilaiTengah;
            @endphp
            <div class="mhs-card">
              <div class="mhs-card-hd">
                <div class="mhs-ava">{{ strtoupper(substr($lamaran->mahasiswa->name,0,2)) }}</div>
                <div>
                  <div class="mhs-name">{{ $lamaran->mahasiswa->name }}</div>
                  <div class="mhs-pos">{{ $lamaran->lowongan->judul_lowongan }}</div>
                  <div style="margin-top:5px;">
                    @if($nilaiAkhir) <span class="pill p-ok">✓ Nilai Akhir</span>
                    @elseif($nilaiTengah) <span class="pill p-pend">Nilai Tengah</span>
                    @else <span class="pill" style="background:var(--border);color:var(--text-3);">Belum Dinilai</span>
                    @endif
                  </div>
                </div>
              </div>

              @if($penilaianTerbaru)
                <div class="nilai-mini">
                  @foreach([
                    ['Kedisiplinan', $penilaianTerbaru->nilai_kedisiplinan],
                    ['Komunikasi',   $penilaianTerbaru->nilai_komunikasi],
                    ['Teknis',       $penilaianTerbaru->nilai_teknis],
                    ['Inisiatif',    $penilaianTerbaru->nilai_inisiatif],
                    ['Kerja Tim',    $penilaianTerbaru->nilai_kerjasama],
                  ] as [$label, $nilai])
                    <div class="nilai-mini-row">
                      <div class="nilai-mini-label">{{ $label }}</div>
                      <div class="nilai-mini-bar"><div class="nilai-mini-fill" style="width:{{ $nilai ?? 0 }}%;"></div></div>
                      <div class="nilai-mini-val">{{ $nilai ?? '—' }}</div>
                    </div>
                  @endforeach
                  <div style="display:flex;justify-content:space-between;margin-top:4px;padding-top:8px;border-top:1px solid var(--border);">
                    <span style="font-size:12px;font-weight:700;">Nilai Akhir</span>
                    <span style="font-size:18px;font-weight:700;font-family:'DM Mono',monospace;color:var(--primary);">{{ $penilaianTerbaru->nilai_akhir }}</span>
                  </div>
                </div>
              @endif

              <div style="display:flex;gap:8px;margin-top:4px;">
                <button class="btn btn-primary" style="flex:1;font-size:12px;padding:7px;"
                  onclick="openModal({{ $lamaran->id }}, '{{ addslashes($lamaran->mahasiswa->name) }}', 'akhir')">
                  {{ $nilaiAkhir ? '✏ Edit Nilai Akhir' : '+ Nilai Akhir' }}
                </button>
                <button class="btn" style="background:var(--amber-dim);color:var(--amber);font-size:12px;padding:7px;"
                  onclick="openModal({{ $lamaran->id }}, '{{ addslashes($lamaran->mahasiswa->name) }}', 'tengah')">
                  {{ $nilaiTengah ? 'Edit Tengah' : '+ Tengah' }}
                </button>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif

  </div>
</div>

{{-- MODAL PENILAIAN --}}
<div class="modal-overlay" id="modalNilai">
  <div class="modal">
    <div class="modal-hd">
      <div class="modal-title" id="modal-title">Isi Penilaian</div>
      <button class="modal-close" onclick="document.getElementById('modalNilai').classList.remove('open')">×</button>
    </div>
    <p style="font-size:12.5px;color:var(--text-2);margin-bottom:18px;" id="modal-sub"></p>
    <form method="POST" action="{{ route('mitra.penilaian.store') }}">
      @csrf
      <input type="hidden" name="lamaran_id" id="inp-lamaran">
      <input type="hidden" name="jenis_penilaian" id="inp-jenis">

      <div class="section-divider">Komponen Penilaian (0–100)</div>

      @php
        $komponen = [
          ['kedisiplinan', 'Kedisiplinan', 'Kehadiran, ketepatan waktu, dan kepatuhan aturan'],
          ['komunikasi',   'Komunikasi',   'Kemampuan berkomunikasi lisan dan tulisan'],
          ['teknis',       'Kemampuan Teknis', 'Penguasaan skill teknis sesuai bidang'],
          ['inisiatif',    'Inisiatif',    'Proaktif dan inovasi dalam pekerjaan'],
          ['kerjasama',    'Kerja Tim',    'Kolaborasi dan kontribusi dalam tim'],
        ];
      @endphp

      @foreach($komponen as [$key, $label, $desc])
        <div class="form-group">
          <label class="form-label">{{ $label }} <span style="font-weight:400;color:var(--text-3);">— {{ $desc }}</span></label>
          <div class="range-row">
            <input type="range" name="nilai_{{ $key }}" id="r-{{ $key }}"
              class="range-input" min="0" max="100" value="80"
              oninput="document.getElementById('v-{{ $key }}').textContent=this.value">
            <div class="range-val" id="v-{{ $key }}">80</div>
          </div>
        </div>
      @endforeach

      <div class="g2-form" style="margin-top:4px;">
        <div class="form-group">
          <label class="form-label">Periode</label>
          <input type="text" name="periode" class="form-input" placeholder="Contoh: Mei–Jul 2026">
        </div>
        <div></div>
      </div>

      <div class="form-group">
        <label class="form-label">Catatan / Evaluasi Umum</label>
        <textarea name="catatan" class="form-textarea" placeholder="Catatan keseluruhan performa mahasiswa..."></textarea>
      </div>

      <div style="background:var(--primary-dim);border-radius:9px;padding:10px 14px;font-size:12px;color:var(--primary);margin-bottom:16px;">
        ℹ Nilai akhir dihitung otomatis sebagai rata-rata dari 5 komponen di atas.
      </div>

      <div style="display:flex;gap:10px;justify-content:flex-end;">
        <button type="button" onclick="document.getElementById('modalNilai').classList.remove('open')" style="background:var(--bg3);color:var(--text-2);border:1px solid var(--border);padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
      </div>
    </form>
  </div>
</div>

<script>
function openModal(lamaranId, nama, jenis) {
  document.getElementById('inp-lamaran').value = lamaranId;
  document.getElementById('inp-jenis').value   = jenis;
  document.getElementById('modal-title').textContent = `Penilaian ${jenis === 'akhir' ? 'Akhir' : 'Tengah'}`;
  document.getElementById('modal-sub').textContent   = `Mahasiswa: ${nama}`;
  document.getElementById('modalNilai').classList.add('open');
}
</script>
</body>
</html>
