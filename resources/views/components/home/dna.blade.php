@php
    $aboutImagePath = public_path('assets/about/enrique-gonzalez-bts.jpeg');
    $hasAboutImage = file_exists($aboutImagePath);
@endphp

<section id="adn" data-motion-section data-section-kind="editorial" class="bg-brand-bg py-20 md:py-28">
    <div class="container-shell">
        <div class="grid gap-10 lg:grid-cols-[1.15fr_0.85fr] lg:items-stretch">
            <div class="space-y-7">
                <span data-reveal-item class="eyebrow">Sobre Nosotros</span>
                <h2 data-reveal-item data-split="lines" class="text-3xl font-semibold leading-tight text-brand-secondary md:text-5xl">
                    Quiénes Somos
                </h2>
                <p data-reveal-item class="max-w-2xl text-base leading-relaxed text-brand-text-muted md:text-lg">
                    Somos una productora audiovisual fundada en 2017 y liderada por Enrique González, su CEO, Productor Audiovisual y Filmmaker con más de 28 años de experiencia en la industria de la televisión y el video corporativo. Gracias a su visión y experticia, ha liderado producciones de alto impacto para multinacionales como Cargill, Nestlé, Federación Nacional de Cafeteros, Starbucks, Grupo Prochem y destacadas compañías del sector industrial de la caña de azúcar, el sector avícola y el sector químico industrial, logrando exportar su trabajo a Europa, Centroamérica y USA.
                </p>

                <div data-reveal-item data-media-reveal="editorial" class="panel overflow-hidden p-8">
                    <div class="grid gap-6 sm:grid-cols-3">
                        <div data-hover-lift>
                            <dt class="text-3xl font-semibold text-brand-secondary">10+ Años</dt>
                            <dd class="mt-2 text-sm text-brand-text-muted">De sólida trayectoria empresarial en el mercado.</dd>
                        </div>
                        <div data-hover-lift>
                            <dt class="text-3xl font-semibold text-brand-secondary">Equipos y Tecnología</dt>
                            <dd class="mt-2 text-sm text-brand-text-muted">Producción y postproducción con estándares técnicos internacionales.</dd>
                        </div>
                        <div data-hover-lift>
                            <dt class="text-3xl font-semibold text-brand-secondary">Operación Transnacional</dt>
                            <dd class="mt-2 text-sm text-brand-text-muted">Empresa con raíces caleñas y capacidad de cobertura fuera del país.</dd>
                        </div>
                    </div>
                </div>
            </div>

            <div data-reveal-item data-media-reveal="editorial" class="about-visual panel relative isolate overflow-hidden">
                @if ($hasAboutImage)
                    <img
                        src="{{ asset('assets/about/enrique-gonzalez-bts.jpeg') }}"
                        alt="Enrique González Detrás de cámaras"
                        class="h-full min-h-[420px] w-full object-cover"
                        loading="lazy"
                        decoding="async"
                    />
                @else
                    <div class="min-h-[420px] bg-[linear-gradient(140deg,_rgba(24,24,24,0.95)_0%,_rgba(92,92,92,0.45)_50%,_rgba(229,193,0,0.4)_100%)]"></div>
                @endif
                <div class="about-visual__overlay absolute inset-0"></div>
            </div>
        </div>
    </div>
</section>
