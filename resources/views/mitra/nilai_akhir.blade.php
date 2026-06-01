<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Nilai Akhir Magang — SIGMA</title>
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
/* summary hero */
.summary-hero{background:linear-gradient(135deg,var(--primary),#6e1530);border-radius:var(--radius);padding:24px 28px;display:flex;align-items:center;gap:24px;color:#fff;}
.sh-big{font-size:42px;font-weight:700;font-family:'DM Mono',monospace;line-height:1;}
.sh-label{font-size:13px;color:rgba(255,255,255,.7);margin-bottom:4px;}
.sh-divider{width:1px;height:50px;background:rgba(255,255,255,.2);}
.sh-stat{text-align:center;flex:1;}
.sh-stat-val{font-size:22px;font-weight:700;font-family:'DM Mono',monospace;}
.sh-stat-label{font-size:11px;color:rgba(255,255,255,.6);margin-top:2px;}
.card{background:var(--bg2);border:1px solid var(--border);border-radius:var(--radius);padding:22px;}
.card-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;}
.card-title{font-size:13.5px;font-weight:700;}
.table{width:100%;border-collapse:collapse;}
.table th{font-size:10.5px;font-weight:700;color:var(--text-3);text-transform:uppercase;letter-spacing:.08em;padding:8px 12px;text-align:left;border-bottom:1px solid var(--border);}
.table td{padding:13px 12px;font-size:12.5px;border-bottom:1px solid var(--border);vertical-align:middle;}
.table tr:last-child td{border-bottom:none;}
.table tr:hover td{background:var(--bg3);}
.td-ava{width:34px;height:34px;border-radius:9px;background:var(--primary-dim);color:var(--primary);font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
/* grade badge */
.grade{display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:9px;font-size:14px;font-weight:800;font-family:'DM Mono',monospace;}
.grade-A{background:#dcfce7;color:#166534;}
.grade-B{background:#dbeafe;color:#1e40af;}
.grade-C{background:#fef9c3;color:#854d0e;}
.grade-D{background:#fee2e2;color:#991b1b;}
.grade-E{background:var(--red-dim);color:var(--red);}
/* bar komponen */
.bar-group{display:flex;flex-direction:column;gap:3px;}
.bar-row{display:flex;align-items:center;gap:5px;}
.bar-label{font-size:9.5px;color:var(--text-3);width:50px;flex-shrink:0;}
.bar{height:4px;background:var(--bg3);border-radius:2px;flex:1;overflow:hidden;}
.bar-fill{height:100%;border-radius:2px;background:var(--primary);}
.bar-val{font-size:9.5px;font-family:'DM Mono',monospace;width:22px;text-align:right;color:var(--text-2);}
.empty-state{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:40px;text-align:center;color:var(--text-3);}
.empty-state svg{width:40px;height:40px;margin-bottom:12px;opacity:.4;}
</style>
</head>
<body>
@include('mitra.components.sidebar')

<div class="main">
  <div class="topbar">
    <div class="page-title">Nilai Akhir Magang</div>
  </div>
  <div class="content">

    @if($riwayat->isNotEmpty())
      {{-- SUMMARY HERO --}}
      @php
        $sudahDinilai  = $riwayat->filter(fn($l) => $l->penilaian->isNotEmpty())->count();
        $belumDinilai  = $riwayat->filter(fn($l) => $l->penilaian->isEmpty())->count();
        $countA = $riwayat->filter(fn($l) => optional($l->penilaian->first())->grade === 'A')->count();
        $countB = $riwayat->filter(fn($l) => optional($l->penilaian->first())->grade === 'B')->count();
      @endphp
      <div class="summary-hero">
        <div>
          <div class="sh-label">Rata-rata Nilai Keseluruhan</div>
          <div class="sh-big">{{ $rataRataKeseluruhan ? number_format($rataRataKeseluruhan, 1) : '—' }}</div>
        </div>
        <div class="sh-divider"></div>
        <div class="sh-stat"><div class="sh-stat-val">{{ $riwayat->count() }}</div><div class="sh-stat-label">Total Mahasiswa</div></div>
        <div class="sh-divider"></div>
        <div class="sh-stat"><div class="sh-stat-val">{{ $sudahDinilai }}</div><div class="sh-stat-label">Sudah Dinilai</div></div>
        <div class="sh-divider"></div>
        <div class="sh-stat"><div class="sh-stat-val">{{ $belumDinilai }}</div><div class="sh-stat-label">Belum Dinilai</div></div>
        <div class="sh-divider"></div>
        <div class="sh-stat"><div class="sh-stat-val">{{ $countA }}</div><div class="sh-stat-label">Grade A</div></div>
        <div class="sh-divider"></div>
        <div class="sh-stat"><div class="sh-stat-val">{{ $countB }}</div><div class="sh-stat-label">Grade B</div></div>
      </div>
    @endif

    {{-- TABEL --}}
    <div class="card">
      <div class="card-hd"><div class="card-title">Rekap Nilai Semua Mahasiswa</div></div>

      @if($riwayat->isEmpty())
        <div class="empty-state">
          <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
          <p>Belum ada mahasiswa yang menyelesaikan magang</p>
        </div>
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Mahasiswa</th>
              <th>Posisi</th>
              <th>Periode</th>
              <th>Komponen</th>
              <th>Nilai Akhir</th>
              <th>Grade</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($riwayat as $lamaran)
              @php
                $nilaiAkhir  = $lamaran->penilaian->where('jenis_penilaian','akhir')->first();
                $nilaiTengah = $lamaran->penilaian->where('jenis_penilaian','tengah')->first();
                $p = $nilaiAkhir ?? $nilaiTengah;
              @endphp
              <tr>
                <td>
                  <div style="display:flex;align-items:center;gap:10px;">
                    <div class="td-ava">{{ strtoupper(substr($lamaran->mahasiswa->name,0,2)) }}</div>
                    <div>
                      <div style="font-weight:600;">{{ $lamaran->mahasiswa->name }}</div>
                      <div style="font-size:10.5px;color:var(--text-3);">{{ $lamaran->mahasiswa->email }}</div>
                    </div>
                  </div>
                </td>
                <td style="color:var(--text-2);">{{ $lamaran->lowongan->judul_lowongan ?? '-' }}</td>
                <td style="font-size:11px;font-family:'DM Mono',monospace;color:var(--text-3);">
                  {{ $p->periode ?? ($lamaran->diproses_pada ? $lamaran->diproses_pada->format('M Y') : '—') }}
                </td>
                <td>
                  @if($p)
                    <div class="bar-group">
                      @foreach([
                        ['Disiplin', $p->nilai_kedisiplinan],
                        ['Komunksi', $p->nilai_komunikasi],
                        ['Teknis',   $p->nilai_teknis],
                        ['Inisiati', $p->nilai_inisiatif],
                        ['Tim',      $p->nilai_kerjasama],
                      ] as [$lbl, $v])
                        <div class="bar-row">
                          <div class="bar-label">{{ $lbl }}</div>
                          <div class="bar"><div class="bar-fill" style="width:{{ $v ?? 0 }}%;"></div></div>
                          <div class="bar-val">{{ $v ?? '—' }}</div>
                        </div>
                      @endforeach
                    </div>
                  @else
                    <span style="font-size:11.5px;color:var(--text-3);">Belum diisi</span>
                  @endif
                </td>
                <td>
                  @if($p && $p->nilai_akhir)
                    <span style="font-size:20px;font-weight:700;font-family:'DM Mono',monospace;color:var(--primary);">{{ $p->nilai_akhir }}</span>
                  @else
                    <span style="color:var(--text-3);">—</span>
                  @endif
                </td>
                <td>
                  @if($p)
                    @php $g = $p->grade; @endphp
                    <div class="grade grade-{{ $g }}">{{ $g }}</div>
                  @else
                    <span style="color:var(--text-3);">—</span>
                  @endif
                </td>
                <td>
                  @if($p)
                    <span class="pill p-ok">✓ {{ ucfirst($p->jenis_penilaian) }}</span>
                  @else
                    <span class="pill p-pend">Belum dinilai</span>
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
</body>
</html>
