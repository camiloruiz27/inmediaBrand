<footer class="border-t border-brand-border bg-brand-surface py-12">
    <div class="container-shell">
        <div class="grid gap-8 md:grid-cols-4">
            <div>
                <div class="brand-mark brand-mark--on-light">
                    <img src="{{ asset('assets/clients/logoweb-3.png') }}" alt="In Media Brand" class="brand-mark__image brand-mark__image--footer">
                </div>
                <p class="mt-3 text-sm text-brand-text-muted">Productora Audiovisual Corporativa y de Marca</p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-text">Navegación</p>
                <ul class="mt-4 space-y-2 text-sm text-brand-text-muted">
                    <li><a href="#inicio" class="transition hover:text-brand-secondary">Inicio</a></li>
                    <li><a href="#podcast" class="transition hover:text-brand-secondary">Podcast</a></li>
                    <li><a href="#adn" class="transition hover:text-brand-secondary">Quiénes Somos</a></li>
                    <li><a href="#servicios" class="transition hover:text-brand-secondary">Servicios</a></li>
                    <li><a href="#trabajos" class="transition hover:text-brand-secondary">Trabajos</a></li>
                </ul>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-text">Contacto</p>
                <ul class="mt-4 space-y-2 text-sm text-brand-text-muted">
                    <li>{{ config('imb.contact_form_to') }}</li>
                    <li>{{ config('imb.contact_whatsapp') }}</li>
                    <li>Cali, Colombia</li>
                </ul>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-text">Redes</p>
                <ul class="mt-4 space-y-2 text-sm text-brand-text-muted">
                    <li><a href="{{ config('imb.youtube_channel_url') }}" target="_blank" rel="noopener noreferrer" class="transition hover:text-brand-secondary">YouTube</a></li>
                    <li><a href="{{ config('imb.vimeo_channel_url') }}" target="_blank" rel="noopener noreferrer" class="transition hover:text-brand-secondary">Vimeo</a></li>
                    <li><a href="{{ config('imb.podcast_spotify_url') ?: '#' }}" target="{{ config('imb.podcast_spotify_url') ? '_blank' : '_self' }}" rel="{{ config('imb.podcast_spotify_url') ? 'noopener noreferrer' : '' }}" class="transition hover:text-brand-secondary {{ config('imb.podcast_spotify_url') ? '' : 'pointer-events-none opacity-60' }}">Spotify Podcast</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-10 border-t border-brand-border pt-6 text-xs text-brand-text-muted">
            <p>© {{ date('Y') }} In Media Brand. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
