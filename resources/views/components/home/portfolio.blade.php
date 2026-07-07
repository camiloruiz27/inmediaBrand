@php
    $youtubeChannelUrl = config('imb.youtube_channel_url');
    $vimeoChannelUrl = config('imb.vimeo_channel_url');

    $normalizePortfolioEmbed = static function (string $url): ?array {
        $parts = parse_url($url);
        if (!is_array($parts)) {
            return null;
        }

        $host = strtolower($parts['host'] ?? '');
        $path = trim($parts['path'] ?? '', '/');
        parse_str($parts['query'] ?? '', $query);

        if (str_contains($host, 'youtube.com') || str_contains($host, 'youtu.be')) {
            $videoId = $query['v'] ?? null;

            if (!$videoId && str_contains($host, 'youtu.be')) {
                $videoId = $path !== '' ? explode('/', $path)[0] : null;
            }

            if (!$videoId && str_contains($path, 'embed/')) {
                $segments = explode('/', $path);
                $embedIndex = array_search('embed', $segments, true);
                $videoId = $embedIndex !== false && isset($segments[$embedIndex + 1]) ? $segments[$embedIndex + 1] : null;
            }

            if (!$videoId) {
                return null;
            }

            return [
                'provider' => 'youtube',
                'embed_url' => 'https://www.youtube.com/embed/' . $videoId . '?rel=0',
                'original_url' => $url,
            ];
        }

        if (str_contains($host, 'vimeo.com')) {
            $segments = array_values(array_filter(explode('/', $path)));
            $videoId = null;

            foreach ($segments as $segment) {
                if (ctype_digit($segment)) {
                    $videoId = $segment;
                    break;
                }
            }

            if (!$videoId) {
                return null;
            }

            return [
                'provider' => 'vimeo',
                'embed_url' => 'https://player.vimeo.com/video/' . $videoId,
                'original_url' => $url,
            ];
        }

        return null;
    };

    $portfolioItems = collect(config('imb.portfolio_video_urls', []))
        ->filter()
        ->values()
        ->map(function (string $url) use ($normalizePortfolioEmbed) {
            $normalized = $normalizePortfolioEmbed($url);

            return [
                'url' => $url,
                'embed' => $normalized['embed_url'] ?? null,
                'provider' => $normalized['provider'] ?? null,
            ];
        });
@endphp

<section id="trabajos" data-motion-section data-section-kind="cinematic" data-portfolio-section class="bg-brand-surface py-20 md:py-28">
    <div class="container-shell">
        <div class="flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-3xl space-y-6">
                <span data-reveal-item class="eyebrow">Nuestros Trabajos</span>
                <h2 data-reveal-item class="text-3xl font-semibold leading-tight text-brand-secondary md:text-5xl">
                    Calidad Audiovisual y trabajos que hablan por nosotros.
                </h2>
                <p data-reveal-item class="text-base leading-relaxed text-brand-text-muted md:text-lg">
                    Te invitamos a conocer la calidad técnica y el storytelling de nuestros videos.
                </p>
            </div>
            <div data-reveal-item class="flex flex-wrap items-center gap-3">
                <button type="button" class="portfolio-nav-btn" data-portfolio-prev aria-label="Proyecto anterior">
                    <span aria-hidden="true">&lt;</span>
                </button>
                <button type="button" class="portfolio-nav-btn" data-portfolio-next aria-label="Proyecto siguiente">
                    <span aria-hidden="true">&gt;</span>
                </button>
                <a href="{{ $youtubeChannelUrl }}" target="_blank" rel="noopener noreferrer" data-hover-lift class="btn-secondary">Ver canal de YouTube</a>
                <a href="{{ $vimeoChannelUrl }}" target="_blank" rel="noopener noreferrer" data-hover-lift class="btn-secondary">Ver portafolio en Vimeo</a>
            </div>
        </div>

        <div class="portfolio-track mt-12 flex snap-x snap-mandatory gap-6 overflow-x-auto pb-4" data-portfolio-track tabindex="0">
            @foreach ($portfolioItems as $item)
                <article
                    data-portfolio-item
                    data-media-reveal="portfolio"
                    class="relative block w-[88%] shrink-0 snap-start overflow-hidden rounded-3xl border border-brand-border bg-brand-surface shadow-[0_30px_90px_-65px_rgba(31,31,31,0.55)] md:w-[62%] xl:w-[34%]"
                >
                    <div class="relative aspect-[16/10] overflow-hidden bg-brand-secondary">
                        @if ($item['embed'])
                            <iframe
                                src="{{ $item['embed'] }}"
                                title="Video {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }} de Nuestro Trabajo"
                                class="h-full w-full"
                                loading="lazy"
                                allow="autoplay; encrypted-media; picture-in-picture; web-share"
                                allowfullscreen
                                referrerpolicy="strict-origin-when-cross-origin"
                            ></iframe>
                        @else
                            <div class="absolute inset-0 bg-[linear-gradient(130deg,_rgba(10,10,10,0.95)_5%,_rgba(58,58,58,0.55)_48%,_rgba(185,151,0,0.88)_100%)]"></div>
                            <div class="absolute inset-0 flex flex-col items-start justify-end gap-4 p-6">
                                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-black/25 px-4 py-2 text-xs font-semibold uppercase tracking-[0.18em] text-white/80">
                                    Video {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </div>
                                <a
                                    href="{{ $item['url'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn-secondary border-white/24 bg-transparent text-white hover:bg-white/10 hover:text-white"
                                >
                                    Ver video
                                </a>
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
