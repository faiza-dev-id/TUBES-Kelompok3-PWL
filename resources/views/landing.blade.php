<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIGMA — Sistem Informasi Manajemen Magang</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --maroon:#5a0a1a;--maroon-dark:#3d0612;--maroon-mid:#7a1228;--maroon-light:#8b1a3a;
  --cream:#f7f2eb;--cream-warm:#efe8de;--cream-dark:#e5dcd0;
  --text-dark:#2a1a1a;--text-mid:#5c4a42;--text-soft:#8a7870;--text-faint:#b0a498;
  --silver:#b0b8c8;--silver-light:#d4dae6;
  --text-light:rgba(255,255,255,0.92);--text-muted:rgba(255,255,255,0.55);
}
html{scroll-behavior:smooth;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--cream);color:var(--text-dark);overflow-x:hidden;}

/* ── NAVBAR ── */
nav{
  position:fixed;top:0;left:0;right:0;z-index:100;
  padding:18px 0;
  background:rgba(61,6,18,0.92);
  backdrop-filter:blur(16px);
  border-bottom:1px solid rgba(180,192,210,0.1);
  transition:0.3s;
}
.nav-inner{max-width:1100px;margin:0 auto;padding:0 32px;display:flex;align-items:center;justify-content:space-between;}
.nav-brand{display:flex;align-items:center;gap:12px;}
.nav-sigma{height:28px;object-fit:contain;opacity:0.9;filter:brightness(0) invert(1);}
.nav-links{display:flex;align-items:center;gap:28px;}
.nav-links a{font-size:13.5px;color:var(--text-muted);text-decoration:none;font-weight:500;transition:0.2s;}
.nav-links a:hover{color:#fff;}
.nav-cta{display:flex;gap:10px;}
.btn-nav-login{
  padding:8px 20px;border-radius:8px;font-size:13px;font-weight:600;
  border:1.5px solid rgba(180,192,210,0.25);color:rgba(255,255,255,0.8);
  background:transparent;cursor:pointer;text-decoration:none;transition:0.2s;
  font-family:'Plus Jakarta Sans',sans-serif;
}
.btn-nav-login:hover{border-color:rgba(180,192,210,0.5);color:#fff;}
.btn-nav-daftar{
  padding:8px 20px;border-radius:8px;font-size:13px;font-weight:600;
  background:linear-gradient(135deg,#8b1a3a,#6e1530);color:#fff;
  border:none;cursor:pointer;text-decoration:none;transition:0.2s;
  font-family:'Plus Jakarta Sans',sans-serif;
}
.btn-nav-daftar:hover{background:linear-gradient(135deg,#a01f44,#8b1a3a);transform:translateY(-1px);}

/* ── HERO ── */
.hero{
  min-height:100vh;
  background:linear-gradient(148deg,#6e1228 0%,#3d0612 55%,#280410 100%);
  display:flex;align-items:center;justify-content:center;
  position:relative;overflow:hidden;padding:120px 32px 80px;
}
.hero-orb{position:absolute;border-radius:50%;pointer-events:none;}
.orb1{width:600px;height:600px;top:-150px;right:-100px;background:radial-gradient(circle,rgba(139,26,58,0.4) 0%,transparent 70%);}
.orb2{width:450px;height:450px;bottom:-100px;left:-80px;background:radial-gradient(circle,rgba(90,10,26,0.55) 0%,transparent 70%);}
.orb3{width:250px;height:250px;top:40%;left:5%;background:radial-gradient(circle,rgba(176,184,200,0.05) 0%,transparent 70%);}
.hero-inner{max-width:1100px;width:100%;margin:0 auto;display:flex;flex-direction:row-reverse;align-items:center;gap:80px;position:relative;z-index:1;}
.hero-text{flex:1;}
.hero-badge{
  display:inline-flex;align-items:center;gap:7px;
  background:rgba(180,192,210,0.1);border:1px solid rgba(180,192,210,0.18);
  border-radius:99px;padding:6px 14px;margin-bottom:28px;
}
.hero-badge span{font-size:11.5px;color:rgba(180,192,210,0.8);font-weight:600;letter-spacing:0.05em;text-transform:uppercase;}
.hero-dot{width:6px;height:6px;border-radius:50%;background:#5dca8c;box-shadow:0 0 8px rgba(93,202,140,0.6);}
.hero-title{
  font-family:'Playfair Display',serif;
  font-size:58px;font-weight:900;
  color:#fff;line-height:1.1;margin-bottom:20px;
  letter-spacing:-0.02em;
}
.hero-title span{
  background:linear-gradient(135deg,#d4dae6,#b0b8c8);
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;
}
.hero-sub{font-size:16px;color:var(--text-muted);line-height:1.7;max-width:480px;margin-bottom:36px;}
.hero-btns{display:flex;gap:12px;flex-wrap:wrap;}
.btn-hero-primary{
  padding:14px 28px;border-radius:10px;font-size:15px;font-weight:600;
  background:var(--cream);color:var(--maroon);border:none;cursor:pointer;
  text-decoration:none;transition:0.2s;display:inline-flex;align-items:center;gap:8px;
  font-family:'Plus Jakarta Sans',sans-serif;
  box-shadow:0 4px 20px rgba(0,0,0,0.2);
}
.btn-hero-primary:hover{background:#fff;transform:translateY(-2px);box-shadow:0 8px 30px rgba(0,0,0,0.25);}
.btn-hero-secondary{
  padding:14px 28px;border-radius:10px;font-size:15px;font-weight:600;
  background:transparent;color:rgba(255,255,255,0.85);
  border:1.5px solid rgba(180,192,210,0.25);cursor:pointer;
  text-decoration:none;transition:0.2s;display:inline-flex;align-items:center;gap:8px;
  font-family:'Plus Jakarta Sans',sans-serif;
}
.btn-hero-secondary:hover{border-color:rgba(180,192,210,0.5);color:#fff;transform:translateY(-2px);}
.btn-hero-primary svg,.btn-hero-secondary svg{width:16px;height:16px;}

.hero-visual{flex:0 0 420px;position:relative;display:flex;align-items:center;justify-content:center;}
.hero-logo-img{
  width:420px;
  max-width:100%;
  object-fit:contain;
  filter:drop-shadow(0 0 60px rgba(139,26,58,0.55)) drop-shadow(0 0 120px rgba(180,192,210,0.18));
  animation:floatLogo 4s ease-in-out infinite;
  opacity:0.92;
}
@keyframes floatLogo{
  0%,100%{transform:translateY(0);}
  50%{transform:translateY(-14px);}
}
.hero-card{
  background:rgba(255,255,255,0.06);
  border:1px solid rgba(180,192,210,0.12);
  border-radius:20px;padding:28px;
  backdrop-filter:blur(10px);
}
.hero-card-title{font-size:12px;font-weight:700;color:rgba(180,192,210,0.6);letter-spacing:0.08em;text-transform:uppercase;margin-bottom:18px;}
.stat-row{display:flex;flex-direction:column;gap:14px;}
.stat-item{display:flex;align-items:center;gap:14px;}
.stat-icon{width:40px;height:40px;border-radius:10px;background:rgba(180,192,210,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.stat-icon svg{width:18px;height:18px;color:var(--silver-light);}
.stat-label{font-size:12px;color:var(--text-muted);}
.stat-val{font-size:18px;font-weight:700;color:#fff;}
.stat-bar-wrap{flex:1;height:4px;background:rgba(180,192,210,0.1);border-radius:99px;overflow:hidden;}
.stat-bar{height:100%;border-radius:99px;background:linear-gradient(90deg,#8b1a3a,#b0b8c8);}
.hero-card-2{
  position:absolute;bottom:-24px;right:-24px;
  background:var(--cream);border-radius:14px;padding:16px 20px;
  box-shadow:0 8px 30px rgba(0,0,0,0.25);
  display:flex;align-items:center;gap:12px;
}
.card2-icon{width:36px;height:36px;border-radius:9px;background:var(--maroon-light);display:flex;align-items:center;justify-content:center;}
.card2-icon svg{width:16px;height:16px;color:#fff;}
.card2-text{font-size:11px;color:var(--text-soft);}
.card2-val{font-size:15px;font-weight:700;color:var(--text-dark);}

/* ── SECTION COMMON ── */
section{padding:96px 32px;}
.section-inner{max-width:1100px;margin:0 auto;}
.section-tag{display:inline-block;font-size:11px;font-weight:700;color:var(--maroon-light);letter-spacing:0.1em;text-transform:uppercase;margin-bottom:12px;}
.section-title{font-family:'Playfair Display',serif;font-size:38px;font-weight:700;color:var(--text-dark);margin-bottom:14px;line-height:1.2;}
.section-sub{font-size:15px;color:var(--text-soft);line-height:1.7;max-width:520px;}

/* ── FITUR ── */
.fitur{background:var(--cream);}
.fitur-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:56px;}
.fitur-card{
  background:#fff;border:1.5px solid var(--cream-dark);
  border-radius:18px;padding:32px 28px;
  transition:0.25s;position:relative;overflow:hidden;
}
.fitur-card::before{
  content:'';position:absolute;top:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg,var(--maroon-light),var(--maroon-mid));
  opacity:0;transition:0.25s;
}
.fitur-card:hover{border-color:var(--cream-deeper);transform:translateY(-4px);box-shadow:0 12px 40px rgba(90,10,26,0.08);}
.fitur-card:hover::before{opacity:1;}
.fitur-icon{
  width:48px;height:48px;border-radius:12px;
  background:linear-gradient(135deg,rgba(139,26,58,0.1),rgba(90,10,26,0.06));
  display:flex;align-items:center;justify-content:center;margin-bottom:20px;
}
.fitur-icon svg{width:22px;height:22px;color:var(--maroon-light);}
.fitur-title{font-size:16px;font-weight:700;color:var(--text-dark);margin-bottom:10px;}
.fitur-desc{font-size:13.5px;color:var(--text-soft);line-height:1.65;}

/* ── CARA KERJA ── */
.cara-kerja{background:linear-gradient(148deg,#6e1228 0%,#3d0612 60%,#280410 100%);position:relative;overflow:hidden;}
.cara-kerja .section-title{color:#fff;}
.cara-kerja .section-sub{color:var(--text-muted);}
.cara-kerja .section-tag{color:rgba(180,192,210,0.7);}
.cara-orb{position:absolute;border-radius:50%;pointer-events:none;}
.cara-o1{width:400px;height:400px;top:-100px;right:-80px;background:radial-gradient(circle,rgba(139,26,58,0.35) 0%,transparent 70%);}
.cara-o2{width:300px;height:300px;bottom:-80px;left:-60px;background:radial-gradient(circle,rgba(61,6,18,0.5) 0%,transparent 70%);}
.steps-wrap{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;margin-top:56px;position:relative;z-index:1;}
.steps-wrap::before{
  content:'';position:absolute;top:32px;left:calc(12.5% + 16px);right:calc(12.5% + 16px);
  height:1px;background:rgba(180,192,210,0.15);
}
.step-card{text-align:center;padding:0 8px;}
.step-num{
  width:64px;height:64px;border-radius:50%;
  background:rgba(180,192,210,0.1);border:1.5px solid rgba(180,192,210,0.2);
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 20px;position:relative;z-index:1;
  font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:#fff;
  transition:0.25s;
}
.step-card:hover .step-num{background:var(--maroon-light);border-color:var(--maroon-light);}
.step-title{font-size:15px;font-weight:700;color:#fff;margin-bottom:8px;}
.step-desc{font-size:12.5px;color:var(--text-muted);line-height:1.6;}

/* ── TENTANG ── */
.tentang{background:var(--cream-warm);}
.tentang-inner{display:flex;align-items:center;gap:80px;}
.tentang-text{flex:1;}
.tentang-visual{flex:0 0 420px;}
.tentang-box{
  background:#fff;border:1.5px solid var(--cream-dark);border-radius:20px;padding:36px;
  box-shadow:0 8px 40px rgba(90,10,26,0.06);
}
.tentang-box-title{font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--text-dark);margin-bottom:20px;}
.tentang-list{display:flex;flex-direction:column;gap:14px;}
.tentang-item{display:flex;align-items:flex-start;gap:12px;}
.tentang-check{
  width:22px;height:22px;border-radius:6px;
  background:linear-gradient(135deg,var(--maroon-light),var(--maroon));
  display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;
}
.tentang-check svg{width:11px;height:11px;color:#fff;}
.tentang-item-text{font-size:13.5px;color:var(--text-mid);line-height:1.5;}

/* ── CTA ── */
.cta-section{
  background:linear-gradient(135deg,var(--maroon-light),var(--maroon-dark));
  padding:96px 32px;text-align:center;position:relative;overflow:hidden;
}
.cta-orb{position:absolute;border-radius:50%;pointer-events:none;}
.cta-o1{width:400px;height:400px;top:-100px;right:-80px;background:radial-gradient(circle,rgba(139,26,58,0.4) 0%,transparent 70%);}
.cta-o2{width:300px;height:300px;bottom:-80px;left:-60px;background:radial-gradient(circle,rgba(61,6,18,0.5) 0%,transparent 70%);}
.cta-inner{position:relative;z-index:1;max-width:600px;margin:0 auto;}
.cta-title{font-family:'Playfair Display',serif;font-size:42px;font-weight:700;color:#fff;margin-bottom:16px;line-height:1.2;}
.cta-sub{font-size:15px;color:var(--text-muted);margin-bottom:36px;line-height:1.7;}
.cta-btns{display:flex;gap:12px;justify-content:center;flex-wrap:wrap;}

/* ── FOOTER ── */
footer{background:var(--maroon-dark);padding:40px 32px;text-align:center;border-top:1px solid rgba(180,192,210,0.08);}
.footer-inner{max-width:1100px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;}
.footer-brand{display:flex;align-items:center;gap:10px;}
.footer-logo{width:28px;height:28px;object-fit:contain;filter:brightness(0) invert(1);opacity:0.7;}
.footer-sigma{height:22px;object-fit:contain;opacity:0.7;filter:brightness(0) invert(1);}
.footer-copy{font-size:12.5px;color:rgba(255,255,255,0.3);}

@media(max-width:768px){
  .hero-inner{flex-direction:column;gap:48px;}
  .hero-visual{display:none;}
  .hero-title{font-size:38px;}
  .fitur-grid{grid-template-columns:1fr;}
  .steps-wrap{grid-template-columns:1fr 1fr;}
  .tentang-inner{flex-direction:column;}
  .tentang-visual{width:100%;}
  .footer-inner{flex-direction:column;gap:12px;}
  .nav-links{display:none;}
}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav>
  <div class="nav-inner">
    <div class="nav-brand">
      
    </div>
    <div class="nav-links">
      <a href="#fitur">Fitur</a>
      <a href="#cara-kerja">Cara Kerja</a>
      <a href="#tentang">Tentang</a>
    </div>
    <div class="nav-cta">
      <a href="{{ route('login') }}" class="btn-nav-login">Masuk</a>
      <a href="{{ route('register') }}" class="btn-nav-daftar">Daftar</a>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-orb orb1"></div>
  <div class="hero-orb orb2"></div>
  <div class="hero-orb orb3"></div>
  <div class="hero-inner">
    <div class="hero-text">
      <div class="hero-badge">
        <div class="hero-dot"></div>
        <span>Platform Magang Mahasiswa</span>
      </div>
      <h1 class="hero-title">Kelola Magang<br>Lebih <span>Terstruktur</span><br>& Efisien</h1>
      <p class="hero-sub">SIGMA adalah platform terpadu untuk mengelola seluruh proses magang mahasiswa dari pendaftaran, seleksi, monitoring, hingga penilaian akhir.</p>
      <div class="hero-btns">
        <a href="{{ route('register') }}" class="btn-hero-primary">
          <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M8 3v10M3 8h10"/></svg>
          Daftar Sekarang
        </a>
        <a href="{{ route('login') }}" class="btn-hero-secondary">
          <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M10 3h3a1 1 0 011 1v8a1 1 0 01-1 1h-3"/><polyline points="7 11 10 8 7 5"/><line x1="10" y1="8" x2="2" y2="8"/></svg>
          Sudah punya akun
        </a>
      </div>
    </div>

    <div class="hero-visual">
      <img
        src="{{ asset('images/logo_sigma_2.png') }}"
        alt="SIGMA Logo"
        class="hero-logo-img"
      >
    </div>
  </div>
</section>

<!-- FITUR -->
<section class="fitur" id="fitur">
  <div class="section-inner">
    <div class="section-tag">Fitur Unggulan</div>
    <h2 class="section-title">Semua yang kamu butuhkan<br>dalam satu platform</h2>
    <p class="section-sub">Dirancang khusus untuk memudahkan proses magang dari awal hingga akhir.</p>
    <div class="fitur-grid">
      <div class="fitur-card">
        <div class="fitur-icon"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M5 5h3M5 11h4"/></svg></div>
        <div class="fitur-title">Pendaftaran Online</div>
        <div class="fitur-desc">Mahasiswa dapat mendaftar dan memilih lowongan magang secara online tanpa perlu datang langsung.</div>
      </div>
      <div class="fitur-card">
        <div class="fitur-icon"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 2l6 3-6 3-6-3 6-3z"/><path d="M2 8v4c0 1.1 2.7 2 6 2s6-.9 6-2V8"/></svg></div>
        <div class="fitur-title">Seleksi oleh Mitra</div>
        <div class="fitur-desc">Perusahaan mitra dapat meninjau lamaran dan melakukan seleksi mahasiswa secara langsung di platform.</div>
      </div>
      <div class="fitur-card">
        <div class="fitur-icon"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="12" height="11" rx="1.5"/><path d="M5 1v3M11 1v3M2 7h12"/></svg></div>
        <div class="fitur-title">Monitoring & Logbook</div>
        <div class="fitur-desc">Pantau kegiatan magang harian mahasiswa melalui logbook digital yang terintegrasi.</div>
      </div>
      <div class="fitur-card">
        <div class="fitur-icon"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="8" cy="8" r="6"/><path d="M8 4v4l3 2"/></svg></div>
        <div class="fitur-title">Penilaian Real-time</div>
        <div class="fitur-desc">Mitra dan kaprodi dapat memberikan penilaian secara langsung berdasarkan kinerja mahasiswa.</div>
      </div>
      <div class="fitur-card">
        <div class="fitur-icon"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 12V5l5-3 5 3v7"/><path d="M6 12V9h4v3"/></svg></div>
        <div class="fitur-title">Manajemen Mitra</div>
        <div class="fitur-desc">Admin dapat mengelola data perusahaan mitra, memverifikasi akun, dan memantau aktivitas lowongan.</div>
      </div>
      <div class="fitur-card">
        <div class="fitur-icon"><svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 12h12M4 12V7l4-4 4 4v5"/><path d="M6 12V9h4v3"/></svg></div>
        <div class="fitur-title">Laporan Akhir</div>
        <div class="fitur-desc">Generate laporan magang secara otomatis untuk keperluan akademik dan administrasi kampus.</div>
      </div>
    </div>
  </div>
</section>

<!-- CARA KERJA -->
<section class="cara-kerja" id="cara-kerja">
  <div class="cara-orb cara-o1"></div>
  <div class="cara-orb cara-o2"></div>
  <div class="section-inner">
    <div class="section-tag">Cara Kerja</div>
    <h2 class="section-title">4 Langkah mudah<br>mulai magang</h2>
    <p class="section-sub">Proses yang sederhana dan terstruktur untuk semua pihak yang terlibat.</p>
    <div class="steps-wrap">
      <div class="step-card">
        <div class="step-num">1</div>
        <div class="step-title">Daftar Akun</div>
        <div class="step-desc">Mahasiswa dan mitra membuat akun SIGMA dan menunggu verifikasi admin.</div>
      </div>
      <div class="step-card">
        <div class="step-num">2</div>
        <div class="step-title">Pilih Lowongan</div>
        <div class="step-desc">Mahasiswa browse lowongan dari mitra yang tersedia dan mengajukan lamaran.</div>
      </div>
      <div class="step-card">
        <div class="step-num">3</div>
        <div class="step-title">Seleksi & Mulai</div>
        <div class="step-desc">Mitra meninjau lamaran, melakukan seleksi, dan mahasiswa yang diterima mulai magang.</div>
      </div>
      <div class="step-card">
        <div class="step-num">4</div>
        <div class="step-title">Monitoring & Nilai</div>
        <div class="step-desc">Kegiatan magang dipantau lewat logbook, diakhiri dengan penilaian dan laporan akhir.</div>
      </div>
    </div>
  </div>
</section>

<!-- TENTANG -->
<section class="tentang" id="tentang">
  <div class="section-inner">
    <div class="tentang-inner">
      <div class="tentang-text">
        <div class="section-tag">Tentang SIGMA</div>
        <h2 class="section-title">Platform magang<br>yang dirancang<br>untuk kampus</h2>
        <p class="section-sub" style="margin-bottom:32px">SIGMA adalah Sistem Informasi Manajemen Magang yang dibangun untuk mempermudah koordinasi antara mahasiswa, perusahaan mitra, dan pihak kampus dalam mengelola program magang secara digital.</p>
        <a href="{{ route('register') }}" class="btn-hero-primary" style="display:inline-flex;background:linear-gradient(135deg,#8b1a3a,#6e1530);color:#fff;">
          <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8" style="width:16px;height:16px"><path d="M8 3v10M3 8h10"/></svg>
          Mulai Sekarang
        </a>
      </div>
      <div class="tentang-visual">
        <div class="tentang-box">
          <div class="tentang-box-title">Mengapa SIGMA?</div>
          <div class="tentang-list">
            <div class="tentang-item">
              <div class="tentang-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 6l3 3 5-5"/></svg></div>
              <div class="tentang-item-text">Satu platform untuk semua pihak — mahasiswa, mitra, dan kaprodi</div>
            </div>
            <div class="tentang-item">
              <div class="tentang-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 6l3 3 5-5"/></svg></div>
              <div class="tentang-item-text">Proses pendaftaran dan seleksi yang transparan dan efisien</div>
            </div>
            <div class="tentang-item">
              <div class="tentang-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 6l3 3 5-5"/></svg></div>
              <div class="tentang-item-text">Monitoring kegiatan harian via logbook digital terintegrasi</div>
            </div>
            <div class="tentang-item">
              <div class="tentang-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 6l3 3 5-5"/></svg></div>
              <div class="tentang-item-text">Penilaian dan laporan akhir yang terstandarisasi</div>
            </div>
            <div class="tentang-item">
              <div class="tentang-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 6l3 3 5-5"/></svg></div>
              <div class="tentang-item-text">Akses mudah dari mana saja melalui browser</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="cta-orb cta-o1"></div>
  <div class="cta-orb cta-o2"></div>
  <div class="cta-inner">
    <h2 class="cta-title">Siap memulai<br>perjalanan magangmu?</h2>
    <p class="cta-sub">Bergabung dengan ratusan mahasiswa dan puluhan perusahaan mitra yang sudah menggunakan SIGMA.</p>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand">

    </div>
    <div class="footer-copy">© 2026 SIGMA Sistem Informasi Manajemen Magang</div>
    
  </div>
</footer>

</body>
</html>