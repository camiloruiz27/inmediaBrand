@php
    $youtubeChannelUrl = config('imb.youtube_channel_url');
    $heroPosterPath = public_path('assets/hero/hero-loop-poster.jpg');
    $heroVideoWebmPath = public_path('assets/hero/hero-loop.webm');
    $heroVideoMp4Path = public_path('assets/hero/hero-loop.mp4');
    $hasHeroPoster = file_exists($heroPosterPath);
    $hasHeroVideoWebm = file_exists($heroVideoWebmPath);
    $hasHeroVideoMp4 = file_exists($heroVideoMp4Path);
    $hasHeroVideo = $hasHeroVideoWebm || $hasHeroVideoMp4;
@endphp

<section id="inicio" data-hero-section data-motion-section data-section-kind="hero" class="relative isolate min-h-[100svh] overflow-hidden bg-brand-secondary text-white">
    <div class="absolute inset-0" data-hero-bg>
        <div data-parallax data-layer="bg" data-parallax-y="18" class="absolute inset-0 bg-[radial-gradient(circle_at_18%_14%,_rgba(229,193,0,0.28)_0%,_rgba(229,193,0,0.05)_34%,_transparent_68%)]"></div>
        <div data-parallax data-layer="accent" data-parallax-y="34" class="absolute inset-0 bg-[radial-gradient(circle_at_76%_36%,_rgba(255,255,255,0.10)_0%,_transparent_42%)]"></div>
        <div data-parallax data-layer="bg" data-parallax-y="-12" class="absolute inset-0 bg-[linear-gradient(112deg,_rgba(8,8,8,0.98)_0%,_rgba(28,28,28,0.88)_42%,_rgba(8,8,8,0.98)_100%)]"></div>
        <div class="absolute inset-y-0 right-0 w-[38%] bg-[linear-gradient(90deg,_transparent_0%,_rgba(0,0,0,0.2)_42%,_rgba(0,0,0,0.72)_100%)]"></div>
        <div data-hero-grain class="pointer-events-none absolute inset-0 opacity-20"></div>
        <div data-hero-spotlight class="pointer-events-none absolute inset-0"></div>
    </div>

    <div class="container-shell relative z-10 py-8 lg:py-10">
        <header data-reveal-item class="flex items-center justify-between border-b border-white/12 pb-6">
            <div>
                <a href="#inicio" class="brand-mark brand-mark--on-dark">
                    <img src="{{ asset('assets/clients/logoweb-3.png') }}" alt="In Media Brand" class="brand-mark__image brand-mark__image--hero">
                </a>
                <p class="mt-1 text-[11px] uppercase tracking-[0.28em] text-white/48">Productora Audiovisual Corporativa y de Marca</p>
            </div>
            <a href="#contacto" data-hover-lift class="rounded-full border border-white/20 px-5 py-2 text-xs font-semibold uppercase tracking-[0.2em] transition hover:border-brand-primary hover:text-brand-accent">
                Cotizar
            </a>
        </header>

        <div class="hero-stage pt-10 lg:pt-14">
            <div class="lg:sticky lg:top-24 lg:self-start">
                <x-home.vertical-menu />
            </div>

            <div class="hero-copy space-y-7">
                <span data-reveal-item class="inline-flex rounded-full border border-white/16 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">
                    Productora Audiovisual Corporativa y de Marca
                </span>

                <h1 data-hero-title data-split="lines" data-reveal-item class="max-w-[30ch] font-display text-[clamp(2.5rem,10vw,3.3rem)] font-semibold leading-[1.05]">
                    Producimos contenido en video de alto nivel; soluciones audiovisuales que optimizan tu comunicación corporativa y estrategia de marca.
                </h1>

                <p data-reveal-item class="max-w-2xl text-base leading-relaxed text-white/78 md:text-lg">
                    Le damos fuerza y emotividad a la comunicación corporativa en tus procesos internos y externos, la cultura de tu equipo y el impacto social de tus proyectos convirtiéndolos en mensajes con storytelling humano, emotivo, claro y fácil de entender para todas tus audiencias en los sectores B2B y B2C.
                </p>

                <div data-reveal-item class="flex flex-col gap-4 sm:flex-row">
                    <a data-hover-lift href="#servicios" class="btn-primary">
                        Ver Servicios
                    </a>
                    <a data-hover-lift href="#trabajos" class="btn-secondary border-white/24 bg-transparent text-white hover:bg-white/10 hover:text-white">
                        Ver Trabajos
                    </a>
                </div>
            </div>

            <div class="hero-media-stack">
                <a
                    data-reveal-item
                    data-hero-media
                    data-media-reveal="hero"
                    data-parallax
                    data-layer="media"
                    data-parallax-y="34"
                    data-hover-tilt
                    href="{{ $youtubeChannelUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="hero-feature-card media-frame media-frame-dark relative block overflow-hidden rounded-[2rem] border border-white/14 bg-black/30 shadow-[0_55px_120px_-58px_rgba(0,0,0,0.92)]"
                >
                    @if ($hasHeroVideo)
                        <video
                            class="aspect-[5/6] w-full object-cover opacity-76"
                            autoplay
                            muted
                            loop
                            playsinline
                            poster="{{ $hasHeroPoster ? asset('assets/hero/hero-loop-poster.jpg') : '' }}"
                        >
                            @if ($hasHeroVideoWebm)
                                <source src="{{ asset('assets/hero/hero-loop.webm') }}" type="video/webm">
                            @endif
                            @if ($hasHeroVideoMp4)
                                <source src="{{ asset('assets/hero/hero-loop.mp4') }}" type="video/mp4">
                            @endif
                        </video>
                    @else
                        <div class="aspect-[5/6] bg-[linear-gradient(145deg,_rgba(14,14,14,0.98)_8%,_rgba(52,52,52,0.45)_46%,_rgba(185,151,0,0.52)_100%)]"></div>
                    @endif

                    <div class="hero-feature-card__scanline absolute inset-0"></div>
                    <div data-media-overlay class="absolute inset-0 bg-[linear-gradient(to_top,_rgba(0,0,0,0.88)_10%,_rgba(0,0,0,0.18)_48%,_rgba(0,0,0,0.36)_100%)]"></div>

                    <div class="absolute inset-x-7 bottom-7 z-10 space-y-4">
                        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-brand-accent">Canal de YouTube</p>
                        <h2 class="max-w-[14ch] font-display text-3xl leading-[0.95] text-white">Menos "bla, bla, bla" y más resultados.</h2>
                        <p class="max-w-sm text-sm leading-relaxed text-white/75">
                            Haz clic aquí y juzga tú mismo nuestro trabajo; descubre si es lo que quieres ver en tu organización.
                        </p>
                        <span class="inline-flex items-center gap-2 text-sm font-semibold text-white">
                            Ver calidad audiovisual
                            <span aria-hidden="true">&rarr;</span>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
