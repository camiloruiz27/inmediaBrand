@php
    $spotifyUrl = config('imb.podcast_spotify_url');
    $youtubeUrl = config('imb.podcast_youtube_url');
    $podcastHeading = 'ESTRATEGAS Podcast / La voz de los líderes que transforman e inspiran industrias.';
@endphp

<section id="podcast" data-motion-section data-section-kind="dark" class="bg-brand-secondary py-12 text-white md:py-16">
    <div class="container-shell">
        <div class="podcast-strip panel border-white/15 bg-white/[0.05] p-6 md:p-8">
            <div class="grid gap-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
                <div class="space-y-4">
                    <span data-reveal-item class="inline-flex items-center rounded-full border border-white/20 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">
                        Podcast
                    </span>
                    <h2 data-reveal-item class="text-3xl font-semibold leading-tight md:text-4xl">
                        {{ $podcastHeading }}
                    </h2>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <a
                        href="{{ $spotifyUrl ?: '#' }}"
                        target="{{ $spotifyUrl ? '_blank' : '_self' }}"
                        rel="{{ $spotifyUrl ? 'noopener noreferrer' : '' }}"
                        data-hover-lift
                        class="podcast-link-card {{ $spotifyUrl ? '' : 'pointer-events-none opacity-80' }}"
                        title="{{ $podcastHeading }}"
                    >
                        <span class="podcast-link-card__eyebrow">Spotify</span>
                        <strong class="podcast-link-card__title">Pestaña Menú: Podcast</strong>
                        <span class="podcast-link-card__meta">Enlace externo: Redirigir a la lista de reproducción de Spotify y YouTube del Podcast.</span>
                    </a>

                    <a
                        href="{{ $youtubeUrl ?: '#' }}"
                        target="{{ $youtubeUrl ? '_blank' : '_self' }}"
                        rel="{{ $youtubeUrl ? 'noopener noreferrer' : '' }}"
                        data-hover-lift
                        class="podcast-link-card {{ $youtubeUrl ? '' : 'pointer-events-none opacity-80' }}"
                        title="{{ $podcastHeading }}"
                    >
                        <span class="podcast-link-card__eyebrow">YouTube</span>
                        <strong class="podcast-link-card__title">Pestaña Menú: Podcast</strong>
                        <span class="podcast-link-card__meta">Enlace externo: Redirigir a la lista de reproducción de Spotify y YouTube del Podcast.</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
