<section id="portafolio" data-motion-section data-section-kind="cinematic" data-portfolio-section class="bg-brand-surface py-20 md:py-28">
    <div class="container-shell">
        <div class="flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-3xl space-y-6">
                <span data-reveal-item class="eyebrow">Galeria Vimeo</span>
                <h2 data-reveal-item class="text-3xl font-semibold leading-tight text-brand-secondary md:text-5xl">
                    Conoce nuestra galeria audiovisual en nuestro canal de Vimeo.
                </h2>
            </div>
            <div data-reveal-item class="flex items-center gap-3">
                <button type="button" class="portfolio-nav-btn" data-portfolio-prev aria-label="Proyecto anterior">
                    <span aria-hidden="true">&lt;</span>
                </button>
                <button type="button" class="portfolio-nav-btn" data-portfolio-next aria-label="Proyecto siguiente">
                    <span aria-hidden="true">&gt;</span>
                </button>
                <a href="#" data-hover-lift class="btn-secondary">Ir a Vimeo</a>
            </div>
        </div>

        <div class="portfolio-track mt-12 flex snap-x snap-mandatory gap-6 overflow-x-auto pb-4" data-portfolio-track tabindex="0">
            @foreach ([
                ['categoria' => 'Video Corporativo', 'titulo' => 'Marca Empresarial 360', 'detalle' => 'Direccion visual y narrativa para posicionamiento corporativo.'],
                ['categoria' => 'Storytelling', 'titulo' => 'Campana de Lanzamiento', 'detalle' => 'Concepto audiovisual para conectar con audiencias clave.'],
                ['categoria' => 'Spot Comercial', 'titulo' => 'Producto Hero', 'detalle' => 'Pieza comercial de alto impacto para medios digitales.'],
                ['categoria' => 'Diseno Web', 'titulo' => 'Plataforma de Marca', 'detalle' => 'Web editorial con foco en conversion y presencia premium.'],
                ['categoria' => 'Institucional', 'titulo' => 'Narrativa de Trayectoria', 'detalle' => 'Historias de marca para fortalecer confianza y reputacion.'],
                ['categoria' => 'Contenido Digital', 'titulo' => 'Serie para Redes', 'detalle' => 'Sistema de contenido secuencial para alcance sostenido.'],
            ] as $item)
                <article data-portfolio-item data-media-reveal="portfolio" data-hover-tilt @class([
                    'group relative shrink-0 snap-start overflow-hidden rounded-3xl border border-brand-border bg-brand-surface shadow-[0_30px_90px_-65px_rgba(31,31,31,0.55)]',
                    'w-[88%] md:w-[62%]',
                    'xl:w-[50%]' => $loop->first,
                    'xl:w-[34%]' => !$loop->first,
                ])>
                    <div class="relative overflow-hidden {{ $loop->first ? 'aspect-[16/11]' : 'aspect-[16/10]' }}">
                        <div data-parallax data-layer="media" data-parallax-y="{{ $loop->first ? 36 : 24 }}" class="absolute inset-0 bg-[linear-gradient(130deg,_rgba(10,10,10,0.95)_5%,_rgba(58,58,58,0.55)_48%,_rgba(185,151,0,0.88)_100%)]"></div>
                        <div data-parallax data-layer="accent" data-parallax-y="{{ $loop->first ? 20 : 14 }}" class="absolute inset-0 bg-[radial-gradient(circle_at_18%_18%,_rgba(242,217,78,0.28)_0%,_transparent_42%)]"></div>
                        <div class="absolute inset-x-0 bottom-0 h-2/3 bg-[linear-gradient(to_top,_rgba(0,0,0,0.72)_8%,_transparent_90%)]"></div>
                        <div data-media-overlay class="absolute inset-0 opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[linear-gradient(to_top,_rgba(242,217,78,0.16),_transparent_50%)]"></div>
                        <div class="absolute inset-x-6 bottom-6">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-brand-accent">{{ $item['categoria'] }}</p>
                            <h3 class="mt-2 font-semibold text-white {{ $loop->first ? 'text-3xl' : 'text-2xl' }}">{{ $item['titulo'] }}</h3>
                        </div>
                    </div>
                    <div class="space-y-3 p-6">
                        <p class="text-sm leading-relaxed text-brand-text-muted">{{ $item['detalle'] }}</p>
                        <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-secondary transition group-hover:text-brand-primary-dark">
                            Ver proyecto
                            <span aria-hidden="true">-&gt;</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
