<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <title>Dashboard Admin | Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        :root {
            --navy: #172d29;
            --navy2: #23443e;
            --paper: #f5f7f6;
            --line: #e6ebe8;
            --ink: #172521;
            --muted: #71807b;
            --accent: #e77955;
            --side: 260px
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font: 15px 'DM Sans', sans-serif
        }

        .sidebar {
            position: fixed;
            z-index: 20;
            inset: 0 auto 0 0;
            width: var(--side);
            padding: 25px 15px;
            background: var(--navy);
            color: #f5f9f7;
            display: flex;
            flex-direction: column;
            transition: width .25s ease, transform .25s ease;
            overflow: visible
        }

        .brand {
            height: 47px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            color: #fff;
            text-decoration: none;
            font: 800 20px 'Plus Jakarta Sans', sans-serif;
            white-space: nowrap
        }

        .brand-mark {
            width: 35px;
            height: 35px;
            border-radius: 11px;
            background: linear-gradient(135deg, #f49a76, #dc6049);
            display: grid;
            place-items: center;
            flex: none;
            box-shadow: 0 5px 12px #e7795540
        }

        .brand-mark svg {
            width: 21px;
            height: 21px;
            stroke: #fff;
            stroke-width: 1.8;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round
        }

        .brand-text span {
            color: #f2a58d
        }

        .side-label {
            margin: 34px 11px 10px;
            color: #8da39d;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.4px;
            white-space: nowrap
        }

        .side-nav {
            display: grid;
            gap: 5px
        }

        .side-nav a {
            height: 47px;
            border-radius: 10px;
            padding: 0 12px;
            color: #b8c9c3;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 13px;
            white-space: nowrap;
            transition: .16s
        }

        .side-nav a:hover {
            background: #213d37;
            color: #fff
        }

        .side-nav a.active {
            background: var(--accent);
            color: #fff;
            font-weight: 700
        }

        .icon {
            width: 21px;
            height: 21px;
            display: grid;
            place-items: center;
            flex: none
        }

        .side-bottom {
            margin-top: auto;
            border-top: 1px solid #315049;
            padding-top: 15px;
            overflow: hidden
        }

        .profile-mini {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            white-space: nowrap
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #d5a285;
            color: var(--navy);
            display: grid;
            place-items: center;
            font-weight: 800;
            flex: none
        }

        .profile-mini small {
            display: block;
            color: #8da39d;
            margin-top: 2px
        }

        .logout {
            width: 100%;
            margin-top: 5px;
            border: 0;
            background: transparent;
            color: #b8c9c3;
            padding: 11px;
            border-radius: 8px;
            text-align: left;
            font: inherit;
            cursor: pointer;
            white-space: nowrap
        }

        .logout:hover {
            background: #213d37;
            color: #fff
        }

        .collapse {
            position: absolute;
            right: -17px;
            top: 30px;
            width: 34px;
            height: 34px;
            border: 1px solid #dfe7e3;
            border-radius: 10px;
            background: #fff;
            color: var(--navy);
            cursor: pointer;
            display: grid;
            place-items: center;
            box-shadow: 0 4px 12px #15251f22
        }

        .hamburger,
        .hamburger:before,
        .hamburger:after {
            width: 16px;
            height: 2px;
            background: currentColor;
            border-radius: 3px;
            display: block;
            content: '';
            transition: transform .2s ease
        }

        .hamburger {
            position: relative
        }

        .hamburger:before {
            position: absolute;
            top: -5px
        }

        .hamburger:after {
            position: absolute;
            top: 5px
        }

        .main {
            margin-left: var(--side);
            min-height: 100vh;
            transition: margin-left .25s ease
        }

        .topbar {
            height: 82px;
            padding: 0 38px;
            border-bottom: 1px solid var(--line);
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .topbar-title {
            font: 700 17px 'Plus Jakarta Sans', sans-serif
        }

        .topbar-sub {
            font-size: 12px;
            color: var(--muted);
            margin-top: 3px
        }

        .right-actions {
            display: flex;
            align-items: center;
            gap: 13px
        }

        .site-link {
            padding: 10px 14px;
            border: 1px solid var(--line);
            border-radius: 9px;
            color: var(--ink);
            text-decoration: none;
            font-weight: 600
        }

        .site-link:hover {
            border-color: #bdcbc5
        }

        .menu-btn {
            display: none;
            border: 0;
            background: none;
            font-size: 25px;
            color: var(--navy);
            cursor: pointer
        }

        .content {
            max-width: 1100px;
            padding: 42px 38px
        }

        .page h1 {
            font: 800 32px 'Plus Jakarta Sans', sans-serif;
            letter-spacing: -1px;
            margin: 0 0 8px
        }

        .muted {
            color: var(--muted)
        }

        .card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 25px;
            margin: 18px 0;
            box-shadow: 0 4px 18px #18332e08
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 17px
        }

        .full {
            grid-column: 1/-1
        }

        label {
            display: block;
            font-weight: 700;
            margin-bottom: 7px;
            color: #344640
        }

        input,
        textarea {
            box-sizing: border-box;
            width: 100%;
            border: 1px solid #dbe3df;
            border-radius: 9px;
            padding: 11px 12px;
            background: #fff;
            color: var(--ink);
            font: inherit;
            outline: 0
        }

        input:focus,
        textarea:focus {
            border-color: #7eaaa0;
            box-shadow: 0 0 0 3px #e1efea
        }

        textarea {
            min-height: 115px
        }

        .btn {
            padding: 10px 14px;
            border-radius: 9px;
            text-decoration: none;
            border: 1px solid #dce3df;
            color: #344640;
            background: #fff;
            font: 600 14px 'DM Sans', sans-serif;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center
        }

        .btn.primary {
            background: var(--navy);
            color: #fff;
            border-color: var(--navy)
        }

        .btn.primary:hover {
            background: var(--navy2)
        }

        .notice {
            padding: 12px 15px;
            border-radius: 10px;
            background: #def3e8;
            color: #176442;
            margin: 14px 0
        }

        .error {
            color: #b42318;
            font-size: 13px;
            margin-top: 4px
        }

        .list {
            padding: 0;
            overflow: hidden
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid var(--line);
            padding: 17px 20px
        }

        .row:last-child {
            border: 0
        }

        .actions {
            display: flex;
            gap: 8px
        }

        .danger {
            color: #c63c2e;
            border-color: #f2c9c3
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px
        }

        .stat {
            margin: 18px 0
        }

        .stat strong {
            font: 800 35px 'Plus Jakarta Sans';
            display: block;
            color: var(--navy)
        }

        .bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px
        }

        .bar .btn {
            background: var(--navy);
            color: #fff;
            border-color: var(--navy)
        }

        body.collapsed {
            --side: 78px
        }

        body.collapsed .sidebar {
            padding-left: 14px;
            padding-right: 14px
        }

        body.collapsed .brand-text,
        body.collapsed .side-label,
        body.collapsed .side-nav span,
        body.collapsed .profile-mini div,
        body.collapsed .logout span {
            display: none
        }

        body.collapsed .brand {
            padding: 0 9px
        }

        body.collapsed .side-nav a {
            padding: 0;
            justify-content: center
        }

        body.collapsed .profile-mini {
            justify-content: center;
            padding: 10px 0
        }

        body.collapsed .logout {
            text-align: center;
            padding: 11px 0
        }

        /* Frontend palette: ink, panel, line, cyan */
        :root {
            --navy: #10151f;
            --navy2: #171e2a;
            --paper: #10151f;
            --line: #303b4c;
            --ink: #f1f5f9;
            --muted: #aeb9c9;
            --accent: #8bdcf4
        }

        body {
            background: var(--paper);
            color: var(--ink)
        }

        .sidebar {
            background: #10151f;
            border-right: 1px solid var(--line)
        }

        .brand-mark {
            background: #8bdcf4;
            box-shadow: 0 5px 15px #8bdcf440
        }

        .brand-mark svg {
            stroke: #10151f
        }

        .brand-text span {
            color: #8bdcf4
        }

        .side-label {
            color: #718096
        }

        .side-nav a {
            color: #aeb9c9
        }

        .side-nav a:hover {
            background: #171e2a;
            color: #fff
        }

        .side-nav a.active {
            background: #8bdcf4;
            color: #10151f
        }

        .side-bottom {
            border-color: var(--line)
        }

        .avatar {
            background: #8bdcf4;
            color: #10151f
        }

        .profile-mini small {
            color: #718096
        }

        .logout {
            color: #aeb9c9
        }

        .logout:hover {
            background: #171e2a;
            color: #fff
        }

        .collapse {
            background: #171e2a;
            border-color: var(--line);
            color: #8bdcf4;
            box-shadow: 0 4px 12px #0006
        }

        .topbar {
            background: #10151f;
            border-color: var(--line)
        }

        .topbar-title {
            color: #f1f5f9
        }

        .site-link {
            border-color: var(--line);
            background: #171e2a;
            color: #f1f5f9
        }

        .site-link:hover {
            border-color: #8bdcf4;
            color: #8bdcf4
        }

        .menu-btn {
            color: #8bdcf4
        }

        .card {
            background: #171e2a;
            border-color: var(--line);
            box-shadow: none
        }

        .page h1,
        .stat strong {
            color: #f1f5f9
        }

        .muted {
            color: #aeb9c9
        }

        label {
            color: #dbe5f0
        }

        input,
        textarea {
            background: #10151f;
            border-color: #303b4c;
            color: #f1f5f9
        }

        input:focus,
        textarea:focus {
            border-color: #8bdcf4;
            box-shadow: 0 0 0 3px #8bdcf422
        }

        .btn {
            background: #171e2a;
            border-color: #303b4c;
            color: #dbe5f0
        }

        .btn.primary,
        .bar .btn {
            background: #8bdcf4;
            color: #10151f;
            border-color: #8bdcf4
        }

        .btn.primary:hover {
            background: #b3ebfa
        }

        .notice {
            background: #17333d;
            color: #8bdcf4
        }

        .row {
            border-color: var(--line)
        }

        .danger {
            color: #fca5a5;
            border-color: #7f3b45
        }

        .danger:hover {
            background: #3b1e25
        }

        .error {
            color: #fca5a5
        }

        @media(max-width:760px) {
            :root {
                --side: 0px
            }

            .sidebar {
                width: 260px;
                transform: translateX(-100%)
            }

            body.mobile-open .sidebar {
                transform: translateX(0);
                box-shadow: 15px 0 40px #000a
            }

            body.mobile-open:after {
                content: '';
                position: fixed;
                z-index: 10;
                inset: 0;
                background: #0009
            }

            .main {
                margin-left: 0
            }

            .topbar {
                height: 70px;
                padding: 0 20px
            }

            .content {
                padding: 28px 20px
            }

            .menu-btn {
                display: block
            }

            .collapse {
                display: none
            }

            .grid,
            .stats {
                grid-template-columns: 1fr
            }

            .right-actions .site-link {
                display: none
            }

            .bar {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column
            }

            .row {
                padding: 15px;
                align-items: flex-start
            }

            .actions {
                flex-wrap: wrap
            }

            .page h1 {
                font-size: 27px
            }
        }
    </style>
</head>

<body>
    <aside class="sidebar" id="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand"><span class="brand-mark"><svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M4 7.5h5l1.5 2H20v8.5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" />
                    <path d="M4 7.5v-1a2 2 0 0 1 2-2h3l1.5 2H18a2 2 0 0 1 2 2v1" />
                    <path d="M8.5 14h7" />
                </svg></span><span class="brand-text">portfolio<span>.</span></span></a>
        <button class="collapse" id="collapseButton" aria-label="Perkecil atau perluas sidebar"><span class="hamburger"></span></button>
        <p class="side-label">MENU UTAMA</p>
        <nav class="side-nav">
            <a class="{{ request()->routeIs('admin.dashboard')?'active':'' }}" href="{{ route('admin.dashboard') }}"><i class="icon bi bi-grid-1x2"></i><span>Ringkasan</span></a>
            <a class="{{ request()->routeIs('admin.profile.*')?'active':'' }}" href="{{ route('admin.profile.edit') }}"><i class="icon bi bi-person"></i><span>Profil saya</span></a>
            <a class="{{ request()->routeIs('admin.experiences.*')?'active':'' }}" href="{{ route('admin.experiences.index') }}"><i class="icon bi bi-briefcase"></i><span>Pengalaman</span></a>
            <a class="{{ request()->routeIs('admin.educations.*')?'active':'' }}" href="{{ route('admin.educations.index') }}"><i class="icon bi bi-mortarboard"></i><span>Pendidikan</span></a>
            <a class="{{ request()->routeIs('admin.projects.*')?'active':'' }}" href="{{ route('admin.projects.index') }}"><i class="icon bi bi-kanban"></i><span>Proyek</span></a>
            <a class="{{ request()->routeIs('admin.skills.*')?'active':'' }}" href="{{ route('admin.skills.index') }}"><i class="icon bi bi-stars"></i><span>Keahlian</span></a>
            <a class="{{ request()->routeIs('admin.account.*')?'active':'' }}" href="{{ route('admin.account.edit') }}"><i class="icon bi bi-shield-lock"></i><span>Akun login</span></a>
        </nav>
        <div class="side-bottom">
            <div class="profile-mini"><span class="avatar">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</span>
                <div><strong>{{ auth()->user()->name }}</strong><small>Administrator</small></div>
            </div>
            <form method="post" action="{{ route('logout') }}">@csrf<button class="logout"><span>↪ &nbsp; Keluar</span></button></form>
        </div>
    </aside>
    <div class="main">
        <header class="topbar">
            <div><button class="menu-btn" id="menuButton" aria-label="Buka menu">☰</button>
                <div class="topbar-title">Content Management</div>
                <div class="topbar-sub">Kelola informasi portfolio Anda</div>
            </div>
            <div class="right-actions"><a class="site-link" href="{{ route('portfolio') }}" target="_blank">Lihat situs ↗</a><span class="avatar">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</span></div>
        </header>
        <main class="content page">@yield('content')</main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const body = document.body,
            collapse = document.getElementById('collapseButton'),
            menu = document.getElementById('menuButton');
        if (localStorage.getItem('admin-sidebar') === 'collapsed') body.classList.add('collapsed');
        collapse?.addEventListener('click', () => {
            body.classList.toggle('collapsed');
            localStorage.setItem('admin-sidebar', body.classList.contains('collapsed') ? 'collapsed' : 'expanded')
        });
        menu?.addEventListener('click', () => body.classList.toggle('mobile-open'));
        document.addEventListener('click', e => {
            if (body.classList.contains('mobile-open') && !e.target.closest('#sidebar') && !e.target.closest('#menuButton')) body.classList.remove('mobile-open')
        });
        document.querySelectorAll('.delete-form').forEach(form => form.addEventListener('submit', event => {
            event.preventDefault();
            Swal.fire({
                title: 'Hapus data ini?',
                text: 'Data yang dihapus tidak dapat dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#8bdcf4',
                cancelButtonColor: '#303b4c',
                color: '#f1f5f9',
                background: '#171e2a'
            }).then(result => {
                if (result.isConfirmed) form.submit()
            })
        }));
        @if(session('success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: @json(session('success')),
            showConfirmButton: false,
            timer: 3200,
            timerProgressBar: true,
            color: '#f1f5f9',
            background: '#171e2a',
            iconColor: '#8bdcf4'
        });
        @endif
    </script>
</body>

</html>
