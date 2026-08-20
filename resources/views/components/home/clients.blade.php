@php
    $clientFiles = collect(\Illuminate\Support\Facades\File::files(public_path('assets/clients')))
        ->filter(fn ($file) => in_array(strtolower($file->getExtension()), ['png', 'jpg', 'jpeg', 'webp', 'svg'], true))
        ->reject(fn ($file) => strtolower($file->getFilename()) === 'logoweb-3.png')
        ->sortBy(function ($file) {
            preg_match('/^(\d+)/', $file->getFilename(), $matches);

            return isset($matches[1]) ? (int) $matches[1] : PHP_INT_MAX;
        })
        ->values()
        ->all();

    $featuredClients = $clientFiles;
    $largerLogoFiles = [
        '1 CARGILL.png',
        '2 FEDERACION DE CAFETEROS.png',
        '3 NESTLE.png',
        '5 PROCHEM.png',
        '7 ATALAC.png',
        '8 ASOCAÑA.png',
        '12 BUCANERO.png',
        '13 CARACOL.PNG',
        '14 FONDEBUCANERO.png',
        '17 MELENDEZ.PNG',
        '19 QBANO.png',
        '24 ENERGIFONDO.png',
        '29 HISTORY_CHANNEL.png',
        '30 KARENS_PIZZA.png',
    ];
    $largestLogoFiles = [
        '1 CARGILL.png',
        '7 ATALAC.png',
        '12 BUCANERO.png',
        '17 MELENDEZ.PNG',
        '19 QBANO.png',
    ];

    $testimonials = [
        [
            'name' => 'Gerente',
            'role' => 'Cargo',
            'quote' => 'Espacio reservado para declaraciones escritas e imágenes de los gerentes y directores que recomiendan a In Media Brand.',
        ],
        [
            'name' => 'Gerente',
            'role' => 'Cargo',
            'quote' => 'Espacio reservado para declaraciones escritas e imágenes de los gerentes y directores que recomiendan a In Media Brand.',
        ],
        [
            'name' => 'Gerente',
            'role' => 'Cargo',
            'quote' => 'Espacio reservado para declaraciones escritas e imágenes de los gerentes y directores que recomiendan a In Media Brand.',
        ],
    ];
@endphp

<section id="clientes" data-motion-section data-section-kind="editorial" class="bg-brand-bg py-20 text-brand-text md:py-28">
    <div class="container-shell">
        <div class="max-w-3xl space-y-6">
            <span data-reveal-item class="eyebrow">Clientes</span>
            <h2 data-reveal-item class="text-3xl font-semibold leading-tight text-brand-secondary md:text-5xl">
                Clientes que han Confiado en nuestro trabajo.
            </h2>
            <p data-reveal-item class="text-base leading-relaxed text-brand-text-muted md:text-lg">
                Espacio reservado para declaraciones escritas e imágenes de los gerentes y directores que recomiendan a In Media Brand.
            </p>
        </div>

        <div class="clients-theater mt-14 rounded-[2rem] border border-brand-border/80 bg-brand-surface p-6 md:p-8 xl:p-10">

            <div class="logo-theater-grid">
                @foreach ($featuredClients as $client)
                    @php
                        $featuredSpan = ($loop->iteration - 1) % 4 === 0;
                        $clientFilename = $client->getFilename();
                        $clientLabel = preg_replace('/^\d+\s*/', '', pathinfo($clientFilename, PATHINFO_FILENAME));
                    @endphp
                    <article
                        data-reveal-item
                        data-clients-logo
                        data-hover-lift
                        @class([
                            'logo-theater-card',
                            'logo-theater-card--featured' => $featuredSpan,
                        ])
                    >
                        <img
                            src="{{ asset('assets/clients/' . $clientFilename) }}"
                            alt="Logo cliente {{ $clientLabel }}"
                            class="logo-theater-card__image"
                            loading="lazy"
                            decoding="async"
                        />
                    </article>
                @endforeach
            </div>
        </div>

        {{--<div class="mt-12 grid gap-6 lg:grid-cols-3">
            @foreach ($testimonials as $testimonial)
                @php
                    $photoPath = 'assets/testimonials/testimonial-' . str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) . '.jpg';
                    $hasPhoto = file_exists(public_path($photoPath));
                @endphp
                <article data-reveal-item class="panel overflow-hidden border-brand-border bg-brand-surface p-0 shadow-[0_28px_70px_-58px_rgba(0,0,0,0.35)]">
                    <div class="testimonial-photo-wrap relative h-56 overflow-hidden bg-brand-surface-2">
                        @if ($hasPhoto)
                            <img
                                src="{{ asset($photoPath) }}"
                                alt="{{ $testimonial['name'] }}"
                                class="h-full w-full object-cover"
                                loading="lazy"
                                decoding="async"
                            />
                        @else
                            <div class="h-full bg-[linear-gradient(135deg,_rgba(255,255,255,0.95)_0%,_rgba(229,229,229,0.92)_50%,_rgba(242,217,78,0.4)_100%)]"></div>
                        @endif
                    </div>
                    <div class="p-7">
                        <p class="text-sm leading-relaxed text-brand-text-muted">{{ $testimonial['quote'] }}</p>
                        <p class="mt-5 font-semibold text-brand-secondary">{{ $testimonial['name'] }}</p>
                        <p class="mt-1 text-xs uppercase tracking-[0.18em] text-brand-text-muted">{{ $testimonial['role'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>--}}
    </div>
</section>
