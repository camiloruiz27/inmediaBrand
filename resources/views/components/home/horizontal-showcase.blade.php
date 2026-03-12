<section id="showcase-horizontal" data-motion-section data-section-kind="cinematic" class="bg-brand-secondary py-20 text-white md:py-28">
    <div class="container-shell">
        <div class="max-w-3xl space-y-6">
            <span data-reveal-item class="inline-flex items-center rounded-full border border-white/20 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">
                Horizontal Showcase
            </span>
            <h2 data-reveal-item data-split="lines" class="text-3xl font-semibold leading-tight md:text-5xl">
                Soluciones audiovisuales para comunicacion corporativa y de marca.
            </h2>
            <p data-reveal-item class="text-sm leading-relaxed text-white/75 md:text-base">
                Explora este strip horizontal para ver como combinamos direccion creativa, produccion, diseno y marketing digital en un mismo flujo de trabajo.
            </p>
        </div>
    </div>

    <div data-horizontal-parallax class="horizontal-parallax-stage mt-12">
        <div data-horizontal-sticky class="horizontal-parallax-sticky">
            <div data-horizontal-pin class="horizontal-parallax-wrap w-full">
                <div data-horizontal-track class="horizontal-parallax-track flex gap-6 px-6 lg:px-10">
                    @foreach ([
                        [
                            'kicker' => 'Comunicacion Corporativa',
                            'title' => 'Mensajes claros para marcas en crecimiento',
                            'copy' => 'Estrategia audiovisual para comunicar con coherencia en equipos, clientes y aliados.',
                            'media' => '/media/imb/horizontal-corporate-loop.mp4',
                            'poster' => '/media/imb/horizontal-corporate-poster.webp',
                            'type' => 'video',
                        ],
                        [
                            'kicker' => 'Diseno Web',
                            'title' => 'Experiencias digitales que proyectan valor',
                            'copy' => 'Sitios y landings con estructura clara, impacto visual y conversion.',
                            'media' => '/media/imb/horizontal-web-editorial.webp',
                            'poster' => null,
                            'type' => 'image',
                        ],
                        [
                            'kicker' => 'Marketing Digital',
                            'title' => 'Contenido pensado para captar y conectar',
                            'copy' => 'Series cortas, piezas de pauta y microformatos que fortalecen presencia de marca.',
                            'media' => '/media/imb/horizontal-marketing-loop.mp4',
                            'poster' => '/media/imb/horizontal-marketing-poster.webp',
                            'type' => 'video',
                        ],
                        [
                            'kicker' => 'Productora',
                            'title' => 'Videos corporativos, institucionales y spots',
                            'copy' => 'Produccion y postproduccion con acabado premium y narrativa emocional.',
                            'media' => '/media/imb/horizontal-production-editorial.webp',
                            'poster' => null,
                            'type' => 'image',
                        ],
                    ] as $panel)
                        <article data-horizontal-item class="horizontal-panel media-frame relative w-[90vw] max-w-[760px] shrink-0 overflow-hidden rounded-3xl border border-white/20 bg-white/5">
                            <div class="relative aspect-[16/10] overflow-hidden">
                                @if ($panel['type'] === 'video')
                                    <video
                                        class="h-full w-full object-cover"
                                        autoplay
                                        muted
                                        loop
                                        playsinline
                                        preload="none"
                                        poster="{{ $panel['poster'] }}"
                                        data-loop-video
                                    >
                                        <source src="{{ str_replace('.mp4', '.webm', $panel['media']) }}" type="video/webm" />
                                        <source src="{{ $panel['media'] }}" type="video/mp4" />
                                    </video>
                                @else
                                    <picture>
                                        <source srcset="{{ str_replace('.webp', '.avif', $panel['media']) }}" type="image/avif" />
                                        <img src="{{ $panel['media'] }}" alt="{{ $panel['title'] }}" class="h-full w-full object-cover" loading="lazy" />
                                    </picture>
                                @endif
                                <div data-media-overlay class="absolute inset-0 bg-[linear-gradient(to_top,_rgba(0,0,0,0.72)_8%,_rgba(0,0,0,0.2)_54%,_rgba(0,0,0,0.48)_100%)]"></div>
                            </div>
                            <div class="space-y-3 p-6 md:p-8">
                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">{{ $panel['kicker'] }}</p>
                                <h3 class="text-2xl font-semibold leading-tight text-white md:text-3xl">{{ $panel['title'] }}</h3>
                                <p class="text-sm leading-relaxed text-white/75 md:text-base">{{ $panel['copy'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
