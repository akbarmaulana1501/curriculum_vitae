<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <title>Masuk | Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--ink:#10151f;--panel:#171e2a;--line:#303b4c;--cyan:#8bdcf4;--soft:#aeb9c9}
        *{box-sizing:border-box}body{min-height:100vh;margin:0;display:grid;place-items:center;overflow:hidden;background:var(--ink);color:#f1f5f9;font:15px 'DM Sans',sans-serif}
        body:before,body:after{content:'';position:fixed;border-radius:50%;filter:blur(2px);pointer-events:none}body:before{width:440px;height:440px;top:-230px;left:-120px;background:#8bdcf417}body:after{width:380px;height:380px;right:-170px;bottom:-200px;background:#8bdcf412}
        .shell{position:relative;z-index:1;width:min(960px,calc(100% - 40px));display:grid;grid-template-columns:.9fr 1.1fr;border:1px solid var(--line);border-radius:20px;overflow:hidden;background:var(--panel);box-shadow:0 30px 80px #0008}
        .intro{padding:52px 46px;background:linear-gradient(145deg,#171e2a,#10151f);border-right:1px solid var(--line);display:flex;flex-direction:column;justify-content:space-between;min-height:560px}.brand{display:flex;align-items:center;gap:11px;color:#fff;text-decoration:none;font:800 22px 'Plus Jakarta Sans',sans-serif}.logo{width:38px;height:38px;border-radius:11px;background:var(--cyan);display:grid;place-items:center}.logo svg{width:22px;height:22px;fill:none;stroke:var(--ink);stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}.brand span{color:var(--cyan)}.intro h1{margin:45px 0 15px;font:800 clamp(31px,4vw,46px)/1.08 'Plus Jakarta Sans';letter-spacing:-1.8px}.intro p{max-width:290px;margin:0;color:var(--soft);line-height:1.7}.tag{color:var(--cyan);font:600 11px 'DM Sans';letter-spacing:1.7px;text-transform:uppercase}.back{color:var(--soft);text-decoration:none;font-size:13px}.back:hover{color:var(--cyan)}
        .form-area{padding:52px 56px;display:flex;align-items:center;background:#10151f}.form{width:100%}.form h2{margin:0 0 8px;font:800 27px 'Plus Jakarta Sans';letter-spacing:-1px}.form>p{margin:0 0 30px;color:var(--soft)}label{display:block;margin:0 0 8px;font-weight:700;color:#e2e8f0}input{width:100%;padding:13px 14px;border:1px solid var(--line);border-radius:9px;background:var(--panel);color:#f1f5f9;font:inherit;outline:none;transition:.18s;margin-bottom:19px}input:focus{border-color:var(--cyan);box-shadow:0 0 0 3px #8bdcf421}input::placeholder{color:#718096}.remember{display:flex;align-items:center;gap:8px;color:var(--soft);font-size:13px;margin:-3px 0 24px}.remember input{width:auto;margin:0;accent-color:var(--cyan)}button{width:100%;border:0;border-radius:9px;padding:13px;background:var(--cyan);color:var(--ink);font:800 14px 'DM Sans';cursor:pointer;transition:.18s}button:hover{background:#b8ebf9;transform:translateY(-1px)}.error{margin:-10px 0 16px;color:#fca5a5;font-size:13px}.mobile-back{display:none;margin-top:26px;text-align:center}
        @media(max-width:720px){body{overflow:auto;padding:20px}.shell{grid-template-columns:1fr}.intro{min-height:auto;padding:30px;border-right:0;border-bottom:1px solid var(--line)}.intro h1,.intro p,.intro .back{display:none}.form-area{padding:34px 30px}.mobile-back{display:block}}
    </style>
</head>
<body>
    <div class="shell">
        <aside class="intro">
            <a class="brand" href="{{ route('portfolio') }}"><span class="logo"><svg viewBox="0 0 24 24"><path d="M4 7.5h5l1.5 2H20v8.5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"/><path d="M4 7.5v-1a2 2 0 0 1 2-2h3l1.5 2H18a2 2 0 0 1 2 2v1"/><path d="M8.5 14h7"/></svg></span>portfolio<span>.</span></a>
            <div><p class="tag">Content management</p><h1>Kelola karya terbaik Anda.</h1><p>Perbarui profil, pengalaman, proyek, dan keahlian dalam satu dashboard.</p></div>
            <a class="back" href="{{ route('portfolio') }}">← Kembali ke portfolio</a>
        </aside>
        <main class="form-area"><form class="form" method="post" action="{{ route('login.store') }}">@csrf
            <h2>Selamat datang kembali.</h2><p>Masuk untuk membuka dashboard admin.</p>
            <label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
            <label for="password">Kata sandi</label><input id="password" type="password" name="password" placeholder="Masukkan kata sandi" required>
            @error('email')<p class="error">{{ $message }}</p>@enderror
            <label class="remember"><input type="checkbox" name="remember"> Ingat saya di perangkat ini</label>
            <button type="submit">Masuk ke dashboard →</button>
            <p class="mobile-back"><a class="back" href="{{ route('portfolio') }}">← Kembali ke portfolio</a></p>
        </form></main>
    </div>
</body></html>
