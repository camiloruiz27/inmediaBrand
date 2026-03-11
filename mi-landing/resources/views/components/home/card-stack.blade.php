<section id="recopilacion" data-motion-section data-section-kind="structured" class="bg-brand-bg py-20 md:py-28">
    <div class="container-shell">
        <div class="max-w-3xl space-y-6">
            <span data-reveal-item class="eyebrow">Inspiramos A Tus Clientes</span>
            <h2 data-reveal-item data-split="lines" class="text-3xl font-semibold leading-tight text-brand-secondary md:text-5xl">
                Reunimos estrategia, creatividad y ejecucion en una composicion curada de capacidades IMB.
            </h2>
            <p data-reveal-item class="text-base leading-relaxed text-brand-text-muted md:text-lg">
                Durante mas de una decada hemos ayudado a las empresas a comunicar experiencias honestas y emocionales a traves de estrategias audiovisuales efectivas.
            </p>
        </div>
    </div>

    <div class="container-shell mt-12">
        <div data-card-stack-wrap class="relative">
            <div data-card-stack class="grid gap-6 lg:relative lg:min-h-[780px] lg:gap-0">
            @foreach ([
                [
                    'tag' => 'Storytelling',
                    'title' => 'Historias que conectan y posicionan',
                    'copy' => 'Comunicacion corporativa y de marca con narrativa clara, humana y memorable.',
                    'ratio' => 'aspect-[16/10]',
                    'video' => '/media/imb/stack-storytelling-loop.mp4',
                    'poster' => '/media/imb/stack-storytelling-poster.webp',
                ],
                [
                    'tag' => 'Produccion',
                    'title' => 'Piezas audiovisuales con direccion premium',
                    'copy' => 'Produccion y postproduccion para videos corporativos, institucionales y comerciales.',
                    'ratio' => 'aspect-[4/3]',
                    'video' => '/media/imb/stack-production-loop.mp4',
                    'poster' => '/media/imb/stack-production-poster.webp',
                ],
                [
                    'tag' => 'Digital',
                    'title' => 'Diseno web y marketing con enfoque de negocio',
                    'copy' => 'De la idea a la ejecucion integral, con una experiencia visual coherente en cada canal.',
                    'ratio' => 'aspect-[3/2]',
                    'video' => '/media/imb/stack-digital-loop.mp4',
                    'poster' => '/media/imb/stack-digital-poster.webp',
                ],
            ] as $card)
                <article data-stack-card class="card-stack-item media-frame relative mx-auto w-full max-w-5xl overflow-hidden rounded-3xl border border-brand-border bg-brand-surface shadow-[0_38px_90px_-50px_rgba(31,31,31,0.45)] lg:absolute lg:inset-x-0 lg:top-0">
                    <div class="grid gap-0 md:grid-cols-[1.05fr_0.95fr]">
                        <div class="p-7 md:p-10">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-text-muted">{{ $card['tag'] }}</p>
                            <h3 class="mt-4 text-2xl font-semibold leading-tight text-brand-secondary md:text-3xl">{{ $card['title'] }}</h3>
                            <p class="mt-4 text-sm leading-relaxed text-brand-text-muted md:text-base">{{ $card['copy'] }}</p>
                            <a href="#contacto" data-hover-lift class="btn-secondary mt-7">Hablemos de tu proyecto</a>
                        </div>

                        <div class="relative overflow-hidden border-t border-brand-border md:border-l md:border-t-0">
                            <div class="{{ $card['ratio'] }} w-full bg-brand-secondary">
                                <video
                                    class="h-full w-full object-cover"
                                    autoplay
                                    muted
                                    loop
                                    playsinline
                                    preload="none"
                                    poster="{{ $card['poster'] }}"
                                    data-loop-video
                                >
                                    <source src="{{ str_replace('.mp4', '.webm', $card['video']) }}" type="video/webm" />
                                    <source src="{{ $card['video'] }}" type="video/mp4" />
                                </video>
                            </div>
                            <div data-media-overlay class="absolute inset-0 bg-[linear-gradient(to_top,_rgba(0,0,0,0.42)_0%,_rgba(0,0,0,0.04)_58%)]"></div>
                        </div>
                    </div>
                </article>
            @endforeach
            </div>
        </div>
    </div>
</section>
