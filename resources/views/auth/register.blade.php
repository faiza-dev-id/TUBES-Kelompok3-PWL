<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIGMA — Daftar Akun</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --maroon:#5a0a1a;
  --maroon-dark:#3d0612;
  --maroon-mid:#7a1228;
  --maroon-light:#8b1a3a;
  --cream:#f7f2eb;
  --cream-warm:#efe8de;
  --cream-dark:#e5dcd0;
  --cream-deeper:#d9cec0;
  --text-dark:#2a1a1a;
  --text-mid:#5c4a42;
  --text-soft:#8a7870;
  --text-faint:#b0a498;
  --silver:#b0b8c8;
  --silver-light:#d4dae6;
  --text-light:rgba(255,255,255,0.92);
  --text-muted:rgba(255,255,255,0.5);
  --input-bg:#ffffff;
  --input-border:#ddd5ca;
  --input-focus:#5a0a1a;
  --input-focus-ring:rgba(90,10,26,0.1);
  --error-bg:rgba(185,28,28,0.06);
  --error-border:rgba(185,28,28,0.18);
  --error-text:#991b1b;
}
html,body{font-family:'Plus Jakarta Sans',sans-serif;}
body{
  background:var(--maroon-dark);
  display:flex;align-items:center;justify-content:center;
  min-height:100vh;position:relative;overflow-x:hidden;
  padding:32px 16px;
}
.bg-orb{position:absolute;border-radius:50%;pointer-events:none;}
.orb1{width:560px;height:560px;top:-140px;right:-120px;background:radial-gradient(circle,rgba(139,26,58,0.4) 0%,transparent 70%);}
.orb2{width:420px;height:420px;bottom:-110px;left:-90px;background:radial-gradient(circle,rgba(90,10,26,0.55) 0%,transparent 70%);}
.orb3{width:220px;height:220px;top:42%;left:8%;background:radial-gradient(circle,rgba(176,184,200,0.055) 0%,transparent 70%);}

.container{
  display:flex;width:920px;max-width:96vw;
  border-radius:24px;overflow:hidden;
  border:1px solid rgba(180,192,210,0.12);
  position:relative;z-index:1;
  box-shadow:0 36px 90px rgba(0,0,0,0.5);
  animation:fadeUp .55s cubic-bezier(.16,1,.3,1) both;
}
@keyframes fadeUp{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:translateY(0)}}

/* ── LEFT ── */
.left{
  flex:1.15;
  background:linear-gradient(148deg,#6e1228 0%,#3d0612 58%,#280410 100%);
  padding:52px 44px;
  display:flex;flex-direction:column;justify-content:space-between;
  position:relative;overflow:hidden;
}
.left::before{content:'';position:absolute;top:-70px;right:-70px;width:260px;height:260px;border-radius:50%;background:radial-gradient(circle,rgba(180,192,210,0.07) 0%,transparent 70%);}
.left::after{content:'';position:absolute;bottom:-50px;left:-50px;width:200px;height:200px;border-radius:50%;background:radial-gradient(circle,rgba(180,192,210,0.045) 0%,transparent 70%);}

.brand{display:flex;flex-direction:column;gap:24px;position:relative;z-index:1;}
.logo-row{display:flex;align-items:center;gap:18px;}
.logo-icon{width:100px;height:100px;min-width:100px;display:flex;align-items:center;justify-content:center;overflow:visible;}
.logo-icon img{width:450px;height:350px;object-fit:contain;filter:brightness(0) invert(1);opacity:.85;}
.sigma-wordmark{height:300px;width:auto;max-width:1000px;object-fit:contain;opacity:.92;filter:drop-shadow(0 4px 16px rgba(0,0,0,0.4));transform:translateY(100px);}
.brand-tagline{font-size:12.5px;color:var(--text-muted);line-height:1.65;max-width:280px;font-weight:400;}
.left-footer{position:relative;z-index:1;}

/* ── RIGHT ── */
.right{
  flex:1;background:var(--cream);
  padding:48px 44px;
  display:flex;flex-direction:column;justify-content:center;
  position:relative;overflow-y:auto;
}
.right::before{
  content:'';position:absolute;left:0;top:8%;height:84%;width:1px;
  background:linear-gradient(to bottom,transparent,rgba(90,10,26,0.12) 30%,rgba(90,10,26,0.18) 50%,rgba(90,10,26,0.12) 70%,transparent);
}

.form-header{margin-bottom:28px;}
.form-title{font-family:'Playfair Display',serif;font-size:28px;font-weight:700;color:var(--text-dark);margin-bottom:6px;}
.form-sub{font-size:13px;color:var(--text-soft);}

.alert{padding:11px 14px;border-radius:10px;margin-bottom:18px;font-size:12.5px;line-height:1.5;display:flex;align-items:flex-start;gap:9px;}
.alert-error{background:var(--error-bg);border:1px solid var(--error-border);color:var(--error-text);}
.alert-error ul{padding-left:14px;list-style:disc;}
.alert svg{width:14px;height:14px;flex-shrink:0;margin-top:1px;}

.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:16px;}

.form-group{margin-bottom:16px;}
label{display:block;font-size:11px;font-weight:700;color:var(--text-mid);letter-spacing:.08em;text-transform:uppercase;margin-bottom:8px;}
.input-wrap{position:relative;}
.input-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--text-faint);pointer-events:none;transition:color .25s;}
.input-icon svg{width:15px;height:15px;}
input[type="email"],input[type="password"],input[type="text"],input[type="number"]{
  width:100%;background:var(--input-bg);
  border:1.5px solid var(--input-border);border-radius:10px;
  padding:12px 14px 12px 42px;
  font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;
  color:var(--text-dark);outline:none;
  transition:border-color .25s,box-shadow .25s;
}
input::placeholder{color:var(--text-faint);}
input:focus{border-color:var(--input-focus);box-shadow:0 0 0 3px var(--input-focus-ring);}
.input-wrap:focus-within .input-icon{color:var(--maroon-mid);}
.eye-btn{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--text-faint);cursor:pointer;padding:3px;display:flex;align-items:center;transition:color .25s;}
.eye-btn:hover{color:var(--text-mid);}
.eye-btn svg{width:15px;height:15px;}
.has-eye{padding-right:40px !important;}

/* PW STRENGTH */
.pw-strength{margin-top:8px;display:none;}
.pw-strength.vis{display:block;}
.pw-bars{display:flex;gap:4px;margin-bottom:5px;}
.pw-bar{flex:1;height:3px;border-radius:99px;background:var(--cream-deeper);transition:background .3s;}
.pw-bar.weak{background:rgba(185,28,28,0.6);}
.pw-bar.mid{background:rgba(192,112,32,0.7);}
.pw-bar.strong{background:rgba(22,101,52,0.7);}
.pw-label{font-size:10.5px;color:var(--text-soft);font-weight:600;}

.field-error{margin-top:6px;font-size:11.5px;color:var(--error-text);}

.btn-daftar{
  width:100%;padding:13px;
  background:linear-gradient(135deg,var(--maroon-light) 0%,var(--maroon) 100%);
  border:none;border-radius:10px;
  color:#fff;font-family:'Plus Jakarta Sans',sans-serif;
  font-size:14px;font-weight:600;cursor:pointer;letter-spacing:.03em;
  transition:all .25s;
  display:flex;align-items:center;justify-content:center;gap:8px;
  box-shadow:0 4px 18px rgba(90,10,26,0.25);
  position:relative;overflow:hidden;margin-top:4px;
}
.btn-daftar::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,transparent 30%,rgba(255,255,255,0.08) 50%,transparent 70%);transform:translateX(-100%);transition:transform .5s ease;}
.btn-daftar svg{width:16px;height:16px;}
.btn-daftar:hover{background:linear-gradient(135deg,var(--maroon-mid) 0%,var(--maroon-light) 100%);transform:translateY(-1px);box-shadow:0 8px 28px rgba(90,10,26,0.35);}
.btn-daftar:hover::before{transform:translateX(100%);}
.btn-daftar:active{transform:translateY(0);}

.footer-link{text-align:center;margin-top:20px;font-size:12.5px;color:var(--text-soft);}
.footer-link a{color:var(--maroon-mid);font-weight:600;text-decoration:none;transition:color .2s;}
.footer-link a:hover{color:var(--maroon);}

@media(max-width:640px){
  .left{display:none;}
  .right{padding:36px 24px;border-radius:24px;}
  body{background:var(--cream);}
  .grid-2{grid-template-columns:1fr;}
}
</style>
</head>
<body>
<div class="bg-orb orb1"></div>
<div class="bg-orb orb2"></div>
<div class="bg-orb orb3"></div>

<div class="container">

  <!-- LEFT -->
  <div class="left">
    <div class="brand">
      <div class="logo-row">
        <div class="logo-icon">
          <img src="{{ asset('images/logo_sigma_2.png') }}" alt="SIGMA icon">
        </div>
        <img class="sigma-wordmark" src="{{ asset('images/logo_sigma.png') }}" alt="SIGMA">
      </div>
      <div class="brand-tagline">Sistem Informasi Manajemen Magang adalah platform terpadu pengelolaan magang mahasiswa.</div>
    </div>
    <div class="left-footer"></div>
  </div>

  <!-- RIGHT -->
  <div class="right">
    <div class="form-header">
      <div class="form-title">Buat akun baru</div>
      <div class="form-sub">Daftar sebagai Mahasiswa SIGMA</div>
    </div>

    @if($errors->any())
      <div class="alert alert-error">
        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
          <circle cx="8" cy="8" r="7"/><line x1="8" y1="5" x2="8" y2="8"/><circle cx="8" cy="11" r=".6" fill="currentColor"/>
        </svg>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
      @csrf

      <div class="form-group">
        <label>Nama Lengkap</label>
        <div class="input-wrap">
          <span class="input-icon">
            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="8" cy="5" r="3"/><path d="M3 14a5 5 0 0110 0"/></svg>
          </span>
          <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}" autocomplete="name" required>
        </div>
        @error('name')<div class="field-error">{{ $message }}</div>@enderror
      </div>

      <div class="form-group">
        <label>Email</label>
        <div class="input-wrap">
          <span class="input-icon">
            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="3" width="14" height="10" rx="2"/><path d="M1 5l7 5 7-5"/></svg>
          </span>
          <input type="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}" autocomplete="email" required>
        </div>
        @error('email')<div class="field-error">{{ $message }}</div>@enderror
      </div>

      <div class="grid-2">
        <div class="form-group" style="margin-bottom:0">
          <label>Password</label>
          <div class="input-wrap">
            <span class="input-icon">
              <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="7" width="10" height="8" rx="1.5"/><path d="M5 7V5a3 3 0 016 0v2"/></svg>
            </span>
            <input type="password" name="password" id="pw1" placeholder="Min. 8 karakter" class="has-eye" oninput="checkStrength()" autocomplete="new-password" required>
            <button class="eye-btn" type="button" onclick="togglePw('pw1','e1')">
              <svg id="e1" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z"/><circle cx="8" cy="8" r="2"/></svg>
            </button>
          </div>
          <div class="pw-strength" id="pw-strength">
            <div class="pw-bars">
              <div class="pw-bar" id="b1"></div><div class="pw-bar" id="b2"></div>
              <div class="pw-bar" id="b3"></div><div class="pw-bar" id="b4"></div>
            </div>
            <span class="pw-label" id="pw-lbl"></span>
          </div>
          @error('password')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group" style="margin-bottom:0">
          <label>Konfirmasi Password</label>
          <div class="input-wrap">
            <span class="input-icon">
              <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="7" width="10" height="8" rx="1.5"/><path d="M5 7V5a3 3 0 016 0v2"/></svg>
            </span>
            <input type="password" name="password_confirmation" id="pw2" placeholder="Ulangi password" class="has-eye" autocomplete="new-password" required>
            <button class="eye-btn" type="button" onclick="togglePw('pw2','e2')">
              <svg id="e2" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z"/><circle cx="8" cy="8" r="2"/></svg>
            </button>
          </div>
        </div>
      </div>

      <div style="margin-bottom:22px"></div>

      <button class="btn-daftar" type="submit">
        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M11 7a4 4 0 11-8 0 4 4 0 018 0z"/><path d="M14 14a6 6 0 00-12 0"/>
          <line x1="13" y1="5" x2="13" y2="9"/><line x1="11" y1="7" x2="15" y2="7"/>
        </svg>
        Daftar Sekarang
      </button>
    </form>

    <div class="footer-link">
      Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
    </div>
  </div>

</div>

<script>
const EYE_OPEN='<path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z"/><circle cx="8" cy="8" r="2"/>';
const EYE_OFF='<path d="M2 2l12 12M6.5 6.7A3 3 0 0110 9.5M4.2 4.3C2.5 5.5 1 8 1 8s2.5 5 7 5c1.4 0 2.7-.4 3.8-1M7 5.1A7 7 0 0115 8s-.8 1.6-2.2 2.8"/><circle cx="8" cy="8" r="2" opacity=".3"/>';
function togglePw(inputId,iconId){
  const inp=document.getElementById(inputId);const show=inp.type==='password';
  inp.type=show?'text':'password';
  document.getElementById(iconId).innerHTML=show?EYE_OFF:EYE_OPEN;
}
function checkStrength(){
  const pw=document.getElementById('pw1').value;
  const str=document.getElementById('pw-strength');
  if(!pw){str.classList.remove('vis');return;}
  str.classList.add('vis');
  let score=0;
  if(pw.length>=8)score++;
  if(/[A-Z]/.test(pw))score++;
  if(/[0-9]/.test(pw))score++;
  if(/[^A-Za-z0-9]/.test(pw))score++;
  const cls=score<=1?'weak':score<=2?'mid':'strong';
  const lbls=['','Lemah','Cukup','Kuat','Sangat Kuat'];
  const color=score<=1?'rgba(185,28,28,0.8)':score<=2?'rgba(192,112,32,0.85)':'rgba(22,101,52,0.9)';
  [1,2,3,4].forEach(i=>{
    const b=document.getElementById('b'+i);
    b.className='pw-bar';if(i<=score)b.classList.add(cls);
  });
  const lbl=document.getElementById('pw-lbl');
  lbl.textContent=lbls[score]||'Lemah';lbl.style.color=color;
}
</script>
</body>
</html>