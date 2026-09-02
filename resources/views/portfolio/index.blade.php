<!doctype html>
<html lang="id" class="scroll-smooth bg-slate-950">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <meta name="description" content="Portfolio {{ $profile?->name ?? '' }}">
    <title>{{ $profile?->name ?? 'Portfolio' }} - Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Arial', 'Helvetica Neue', 'sans-serif'],
                        mono: ['Courier New', 'monospace']
                    },
                    colors: {
                        ink: '#10151f',
                        panel: '#171e2a',
                        line: '#303b4c',
                        cyan: '#8bdcf4',
                        soft: '#aeb9c9'
                    }
                }
            }
        }
    </script>
    <style>
        @media print {

            header nav,
            header>a:last-child,
            .print-hide {
                display: none
            }

            body {
                background: #fff !important;
                color: #10151f !important
            }

            .bg-ink {
                background: #fff !important
            }
        }
    </style>
</head>

<body class="bg-ink font-sans text-slate-100 antialiased">
    <main class="min-h-screen">
        <div class="mx-auto max-w-6xl px-6 py-6 sm:px-10 lg:px-14 lg:py-10">
            <header class="flex items-center justify-between border-b border-line pb-5">
                <a href="#top" class="font-mono text-xs font-semibold uppercase tracking-[.22em] text-cyan">{{ strtoupper(substr($profile?->name ?? 'P',0,2)) }} / PORTFOLIO</a>
                <nav class="hidden gap-7 text-xs font-medium uppercase tracking-[.14em] text-soft sm:flex">
                    <a class="transition hover:text-cyan" href="#experience">Pengalaman</a>
                    <a class="transition hover:text-cyan" href="#projects">Proyek</a>
                    <a class="transition hover:text-cyan" href="#contact">Kontak</a>
                </nav>
                <a href="#contact" class="rounded-full bg-cyan px-4 py-2 text-xs font-semibold text-ink transition hover:-translate-y-0.5"><i class="bi bi-telephone" style="margin-right:8px"></i>Hubungi saya</a>
            </header>
            <section id="top" class="grid gap-10 border-b border-line py-12 lg:grid-cols-[1.15fr_.85fr] lg:items-start lg:py-20">
                <div>
                    <p class="mb-5 font-mono text-xs uppercase tracking-[.18em] text-cyan">Available for new opportunities</p>
                    <h1 class="max-w-3xl text-balance text-6xl font-bold leading-[.92] tracking-[-.07em] sm:text-8xl lg:text-9xl">{{ strtok($profile?->name ?? 'Nama Anda',' ') }}<br><span class="text-cyan">{{ str_replace(strtok($profile?->name ?? 'Nama Anda',' '),'',$profile?->name ?? '') ?: 'Developer.' }}</span></h1>
                </div>
                <div class="flex max-w-sm flex-col gap-6 lg:justify-self-end">
                    <figure class="relative ml-auto w-full max-w-[18rem] overflow-hidden rounded-2xl border border-line bg-panel shadow-2xl shadow-cyan/10">
                        @if($profile?->photo_url)<img src="{{ filter_var($profile->photo_url, FILTER_VALIDATE_URL) ? $profile->photo_url : asset('storage/'.$profile->photo_url) }}" alt="{{ $profile->name }}" class="aspect-[4/5] w-full object-cover">@else<div class="aspect-[4/5] grid place-items-center text-7xl font-bold text-cyan">{{ strtoupper(substr($profile?->name ?? 'P',0,1)) }}</div>@endif
                        <figcaption class="absolute bottom-3 left-3 rounded-full bg-ink/90 px-3 py-1 font-mono text-[10px] uppercase tracking-[.14em]">{{ $profile?->name }}</figcaption>
                    </figure>
                    <div>
                        <p class="mb-6 text-xl leading-relaxed text-soft">{{ $profile?->headline }}</p>
                        <div class="flex flex-wrap gap-x-5 gap-y-2 font-mono text-xs text-soft">@if($profile?->location)<span>⌖ {{ $profile->location }}</span>@endif @if($profile?->website)<a class="hover:text-cyan" href="{{ $profile->website }}" target="_blank">↗ Website</a>@endif</div>
                    </div>
                </div>
            </section>
            <section class="grid gap-8 border-b border-line py-12 lg:grid-cols-[.35fr_.65fr] lg:py-16">
                <p class="font-mono text-xs uppercase tracking-[.18em] text-cyan">01 / Profile</p>
                <div class="grid gap-8 sm:grid-cols-2">
                    <p class="text-2xl font-medium leading-snug tracking-tight">{{ $profile?->strengths ?? 'Membangun solusi digital yang fungsional dan mudah digunakan.' }}</p>
                    <div class="text-sm leading-relaxed text-soft">
                        <p>{{ $profile?->about }}</p>@if($profile?->achievement)<p class="mt-4 border-l-2 border-cyan pl-4 text-slate-200">{{ $profile->achievement }}</p>@endif
                    </div>
                </div>
            </section>
            @if($experiences->isNotEmpty())
            <section id="experience" class="grid gap-8 border-b border-line py-12 lg:grid-cols-[.35fr_.65fr] lg:py-16">
                <p class="font-mono text-xs uppercase tracking-[.18em] text-cyan">02 / Experience</p>
                <div class="divide-y divide-line">@foreach($experiences as $item)<article class="grid gap-3 py-7 first:pt-0 sm:grid-cols-[.25fr_.75fr]">
                        <p class="font-mono text-xs text-soft">{{ $item->period }}</p>
                        <div>
                            <h2 class="text-xl font-semibold">{{ $item->role }}</h2>
                            <p class="mt-1 font-mono text-xs uppercase tracking-[.12em] text-cyan">{{ $item->company }} @if($item->location) / {{ $item->location }} @endif</p>
                            <p class="mt-4 max-w-lg text-sm leading-relaxed text-soft">{{ $item->description }}</p>
                        </div>
                    </article>@endforeach</div>
            </section>
            @endif
            <section id="skills" class="grid gap-8 border-b border-line py-12 lg:grid-cols-[.35fr_.65fr] lg:py-16">
                <p class="font-mono text-xs uppercase tracking-[.18em] text-cyan">03 / Skills</p>
                <div>
                    <h2 class="mb-5 text-xl font-semibold">Keahlian</h2>
                    <div class="flex flex-wrap gap-2">@forelse($skills as $skill)<span title="{{ $skill->category }} · {{ $skill->level }}%" class="rounded-full border border-line px-3 py-2 text-xs text-soft transition hover:border-cyan hover:text-cyan">{{ $skill->name }}</span>@empty<span class="text-soft">Keahlian belum ditambahkan.</span>@endforelse</div>
                </div>
            </section>
            <section id="education" class="grid gap-8 border-b border-line py-12 lg:grid-cols-[.35fr_.65fr] lg:py-16">
                <p class="font-mono text-xs uppercase tracking-[.18em] text-cyan">04 / Education</p>
                <div>
                    <h2 class="mb-5 text-xl font-semibold">Pendidikan</h2>
                    @forelse($educations as $education)<article class="mb-5 last:mb-0">
                        <p class="font-medium">{{ $education->degree }} · {{ $education->study_program }}</p>
                        <p class="mt-1 text-sm text-soft">{{ $education->institution }} · {{ $education->start_date }} — {{ $education->end_date ?: 'Sekarang' }}@if($education->location) · {{ $education->location }}@endif</p>@if($education->description)<p class="mt-2 text-sm leading-relaxed text-soft">{{ $education->description }}</p>@endif
                    </article>@empty<p class="text-soft">Informasi pendidikan belum ditambahkan.</p>@endforelse
                </div>
            </section>
            @if($projects->isNotEmpty())
            <section id="projects" class="grid gap-8 border-b border-line py-12 lg:grid-cols-[.35fr_.65fr] lg:py-16">
                <p class="font-mono text-xs uppercase tracking-[.18em] text-cyan">05 / Projects</p>
                <div class="grid gap-5 sm:grid-cols-2">@foreach($projects as $project)<button type="button" data-project-title="{{ $project->title }}" data-project-category="{{ $project->category }}" data-project-description="{{ $project->description }}" data-project-technologies="{{ $project->technologies }}" data-project-image="{{ $project->image_url ? $project->imageUrl() : '' }}" class="project-card group overflow-hidden rounded-xl border border-line bg-panel text-left transition hover:-translate-y-1 hover:border-cyan">
                        <div class="aspect-[16/9] bg-slate-800">@if($project->image_url)<img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">@else<div class="grid h-full place-items-center font-mono text-3xl text-cyan/60">{{ strtoupper(substr($project->title,0,1)) }}</div>@endif</div>
                        <div class="p-5">
                            <p class="font-mono text-[10px] uppercase tracking-[.14em] text-cyan">{{ $project->category }}</p>
                            <h2 class="mt-2 text-xl font-semibold">{{ $project->title }}</h2>
                            <p class="mt-3 text-sm leading-relaxed text-soft">{{ $project->description }}</p>
                            <p class="mt-5 font-mono text-[11px] text-cyan/80">{{ $project->technologies }}</p>
                        </div>
                    </button>@endforeach</div>
            </section>
            @endif
            <div id="project-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/80 p-4 backdrop-blur-sm" role="dialog" aria-modal="true" aria-labelledby="project-modal-title">
                <div class="relative max-h-[90vh] w-full max-w-2xl overflow-y-auto rounded-2xl border border-line bg-panel shadow-2xl">
                    <button type="button" onclick="closeProjectModal()" class="absolute right-3 top-3 z-10 grid h-9 w-9 place-items-center rounded-full bg-ink/80 text-xl text-soft hover:text-cyan" aria-label="Tutup">&times;</button>
                    <img id="project-modal-image" class="hidden aspect-video w-full object-cover" alt="">
                    <div class="p-6 sm:p-8">
                        <p id="project-modal-category" class="font-mono text-xs uppercase tracking-[.14em] text-cyan"></p>
                        <h2 id="project-modal-title" class="mt-2 text-2xl font-bold sm:text-3xl"></h2>
                        <p id="project-modal-description" class="mt-4 leading-relaxed text-soft"></p>
                        <p id="project-modal-technologies" class="mt-5 font-mono text-xs text-cyan/80"></p>
                    </div>
                </div>
            </div>
            <footer id="contact" class="grid gap-8 py-12 lg:grid-cols-[.35fr_.65fr] lg:py-16">
                <p class="font-mono text-xs uppercase tracking-[.18em] text-cyan">06 / Contact</p>
                <div>
                    <h2 class="max-w-2xl text-4xl font-bold leading-tight tracking-[-.05em] sm:text-6xl">Punya proyek menarik?<br><span class="text-cyan">Mari ngobrol.</span></h2>
                    <div class="mt-10 flex flex-col gap-3 text-sm text-soft sm:flex-row sm:flex-wrap sm:gap-x-8">@if($profile?->email)<a class="hover:text-cyan" href="https://mail.google.com/mail/?view=cm&fs=1&to={{ rawurlencode($profile->email) }}" target="_blank" rel="noopener">✉ {{ $profile->email }}</a>@endif @if($profile?->phone)@php($whatsappNumber=preg_replace('/^0/', '62', preg_replace('/\D+/', '', $profile->phone)))<a class="hover:text-cyan" href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener">☎ {{ $profile->phone }}</a>@endif @if($profile?->linkedin)<a class="hover:text-cyan" href="{{ $profile->linkedin }}" target="_blank">in LinkedIn</a>@endif @if($profile?->github)<a class="hover:text-cyan" href="{{ $profile->github }}" target="_blank">⌘ GitHub</a>@endif</div>
                </div>
            </footer>
            <div class="border-t border-line pt-5 font-mono text-[10px] uppercase tracking-[.16em] text-soft">© {{ date('Y') }} {{ $profile?->name ?? 'Portfolio' }}</div>
        </div>
    </main>
    <script>
        const projectModal = document.getElementById('project-modal');
        function openProjectModal(card) {
            document.getElementById('project-modal-title').textContent = card.dataset.projectTitle;
            document.getElementById('project-modal-category').textContent = card.dataset.projectCategory || '';
            document.getElementById('project-modal-description').textContent = card.dataset.projectDescription || 'Deskripsi belum tersedia.';
            document.getElementById('project-modal-technologies').textContent = card.dataset.projectTechnologies || '';
            const image = document.getElementById('project-modal-image');
            image.src = card.dataset.projectImage || '';
            image.alt = card.dataset.projectTitle;
            image.classList.toggle('hidden', !card.dataset.projectImage);
            projectModal.classList.remove('hidden'); projectModal.classList.add('flex'); document.body.classList.add('overflow-hidden');
        }
        function closeProjectModal() { projectModal.classList.add('hidden'); projectModal.classList.remove('flex'); document.body.classList.remove('overflow-hidden'); }
        document.querySelectorAll('.project-card').forEach(card => card.addEventListener('click', () => openProjectModal(card)));
        projectModal?.addEventListener('click', event => { if (event.target === projectModal) closeProjectModal(); });
        document.addEventListener('keydown', event => { if (event.key === 'Escape') closeProjectModal(); });
    </script>
</body>

</html>
