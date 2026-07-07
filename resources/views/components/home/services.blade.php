@php
    $services = [
        [
            'title' => 'Video corporativo e institucional',
            'description' => 'Presentación de empresa, trayectoria y valores. Diseñado para impactar a clientes, aliados estratégicos e inversionistas.',
        ],
        [
            'title' => 'Comunicación interna',
            'description' => 'Cambios de procesos, anuncios corporativos y desarrollo de proyectos internos. Mantén a tu equipo de trabajo informado y alineado.',
        ],
        [
            'title' => 'Capacitación en SST y RRHH',
            'description' => 'Procesos de inducción, reinducción, seguridad industrial, protocolos técnicos y cultura organizacional. Tu personal y visitantes alineados y cumpliendo normatividad',
        ],
        [
            'title' => 'Video de impacto social y comunidades',
            'description' => 'Documentación de proyectos comunitarios, responsabilidad social, sostenibilidad e interacción. Ideal para empresas con operación regional o rural.',
        ],
        [
            'title' => 'Video comercial y promocional',
            'description' => 'Spots premium, lanzamientos de productos de consumo masivo y eventos corporativos. Desarrollados para comunicar beneficios reales y generar conversión.',
        ],
        [
            'title' => 'Reels y contenido para redes',
            'description' => 'Video con contenido de valor, series de Employer Branding y Reels con storytellin. Formatos pensados estratégicamente para conectar con el público, no solo para verse.',
        ],
    ];
@endphp

<section id="servicios" data-motion-section data-section-kind="modular" class="bg-brand-secondary py-20 text-white md:py-28">
    <div class="container-shell">
        <div class="flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-3xl space-y-6">
                <span data-reveal-item class="inline-flex items-center rounded-full border border-white/20 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">Portafolio de Soluciones</span>
                <h2 data-reveal-item class="text-3xl font-semibold leading-tight md:text-5xl">
                    Soluciones audiovisuales estratégicas para tu empresa.
                </h2>
                <p data-reveal-item class="text-base leading-relaxed text-white/75 md:text-lg">
                    ¿Qué necesidades en video tiene tu organización?.
                </p>
            </div>
            <a href="#trabajos" data-hover-lift class="btn-primary">Ver Trabajos</a>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($services as $index => $service)
                <article data-reveal-item data-hover-lift class="service-card panel border-white/15 bg-white/[0.06] p-6">
                    <div class="service-card__index">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</div>
                    <h3 class="mt-5 font-display text-2xl leading-tight text-white">{{ $service['title'] }}</h3>
                    <p class="mt-4 text-sm leading-relaxed text-white/75">{{ $service['description'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
