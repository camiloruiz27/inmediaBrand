<section id="clientes" data-motion-section data-section-kind="light" class="bg-brand-bg py-20 md:py-28">
    <div class="container-shell">
        <div class="max-w-3xl space-y-6">
            <span data-reveal-item class="eyebrow">Clientes</span>
            <h2 data-reveal-item class="text-3xl font-semibold leading-tight text-brand-secondary md:text-5xl">
                Marcas que han confiado en nuestro enfoque creativo y estrategico.
            </h2>
        </div>

        @php
            $clients = [
                'bucanero.jpg',
                'cafeteros.jpg',
                'caracol.jpg',
                'cargill.jpg',
                'cenicana.jpg',
                'chipichape.jpg',
                'cutis.jpg',
                'energifondo.jpg',
                'fenavi.jpg',
                'fuerza-activa.jpg',
                'gases.jpg',
                'karens.jpg',
                'logoweb-3.png',
                'melendez.jpg',
                'nestle.jpg',
                'protecnica.jpg',
                'qbano.jpg',
                'rdw.jpg',
                'real.jpg',
                'tecnicana.jpg',
            ];
        @endphp

        <div class="mt-12 hidden overflow-hidden rounded-3xl border border-brand-border bg-brand-surface p-4 md:block" data-clients-marquee>
            <div class="clients-marquee-track flex w-max items-center gap-4" data-clients-track>
                @foreach (array_merge($clients, $clients) as $client)
                    <article class="clients-logo-card flex h-28 w-48 shrink-0 items-center justify-center rounded-2xl border border-brand-border/80 bg-brand-surface-2/45 px-5" data-clients-logo>
                        <img
                            src="{{ asset('assets/clients/' . $client) }}"
                            alt="Logo cliente {{ pathinfo($client, PATHINFO_FILENAME) }}"
                            class="max-h-14 w-full object-contain"
                            loading="lazy"
                            decoding="async"
                        />
                    </article>
                @endforeach
            </div>
        </div>

        <div class="mt-8 grid grid-cols-2 gap-3 md:hidden" data-clients-grid>
            @foreach ($clients as $client)
                <article class="clients-logo-card flex h-24 items-center justify-center rounded-2xl border border-brand-border bg-brand-surface px-4" data-clients-logo>
                    <img
                        src="{{ asset('assets/clients/' . $client) }}"
                        alt="Logo cliente {{ pathinfo($client, PATHINFO_FILENAME) }}"
                        class="max-h-12 w-full object-contain"
                        loading="lazy"
                        decoding="async"
                    />
                </article>
            @endforeach
        </div>

        <div data-reveal-item class="mt-8 panel p-7">
            <p class="text-sm leading-relaxed text-brand-text-muted">
                "Inmedia Brand tradujo nuestra vision en piezas audiovisuales con alto nivel de ejecucion y claridad de mensaje."
            </p>
            <p class="mt-4 text-xs font-semibold uppercase tracking-[0.2em] text-brand-text">Testimonio cliente</p>
        </div>
    </div>
</section>
