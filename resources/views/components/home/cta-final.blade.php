@php
    $rawWhatsapp = config('imb.contact_whatsapp');
    $cleanWhatsapp = preg_replace('/\D+/', '', $rawWhatsapp ?? '') ?: '573000000000';
@endphp

<section id="contacto" data-motion-section data-section-kind="emotional" data-cta-final class="bg-brand-secondary py-20 text-white md:py-28">
    <div class="container-shell">
        <div data-reveal-item data-media-reveal="cta" class="panel border-white/20 bg-white/5 p-8 md:p-12">
            <div class="grid gap-10 lg:grid-cols-[1.05fr_0.95fr]">
                <div class="space-y-6">
                    <span data-reveal-item class="inline-flex rounded-full border border-white/20 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">
                        Captura de Leads / Cierre
                    </span>
                    <h2 data-split="lines" data-reveal-item class="text-3xl font-semibold leading-tight md:text-5xl">
                        Comencemos a planificar tu próximo proyecto.
                    </h2>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-white/15 bg-black/20 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">Ciudad</p>
                            <p class="mt-3 text-base text-white/85">Cali, Colombia</p>
                        </div>
                        <div class="rounded-2xl border border-white/15 bg-black/20 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">Contacto</p>
                            <p class="mt-3 text-base text-white/85">{{ config('imb.contact_form_to') }}</p>
                        </div>
                        <div class="rounded-2xl border border-white/15 bg-black/20 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">WhatsApp Corporativo</p>
                            <p class="mt-3 text-base text-white/85">{{ config('imb.contact_whatsapp') }}</p>
                        </div>
                        <div class="rounded-2xl border border-white/15 bg-black/20 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">Enlace Directo</p>
                            <a
                                href="https://wa.me/{{ $cleanWhatsapp }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="mt-3 inline-flex items-center gap-2 text-base font-semibold text-white"
                            >
                                WhatsApp Corporativo
                                <span aria-hidden="true">-&gt;</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-white/15 bg-black/20 p-6 md:p-8">
                    @if (session('contact_success'))
                        <div class="mb-5 rounded-2xl border border-emerald-300/25 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100">
                            {{ session('contact_success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label for="nombre_completo" class="mb-2 block text-sm font-medium text-white/80">Nombre completo</label>
                            <input id="nombre_completo" name="nombre_completo" type="text" value="{{ old('nombre_completo') }}" class="contact-input" required>
                            @error('nombre_completo')
                                <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="empresa" class="mb-2 block text-sm font-medium text-white/80">Empresa</label>
                            <input id="empresa" name="empresa" type="text" value="{{ old('empresa') }}" class="contact-input" required>
                            @error('empresa')
                                <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="correo_corporativo" class="mb-2 block text-sm font-medium text-white/80">Correo Corporativo</label>
                                <input id="correo_corporativo" name="correo_corporativo" type="email" value="{{ old('correo_corporativo') }}" class="contact-input" required>
                                @error('correo_corporativo')
                                    <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="telefono" class="mb-2 block text-sm font-medium text-white/80">Teléfono</label>
                                <input id="telefono" name="telefono" type="text" value="{{ old('telefono') }}" class="contact-input" required>
                                @error('telefono')
                                    <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="proyecto" class="mb-2 block text-sm font-medium text-white/80">Cuéntanos sobre tu proyecto.</label>
                            <textarea id="proyecto" name="proyecto" rows="5" class="contact-input min-h-36" required>{{ old('proyecto') }}</textarea>
                            @error('proyecto')
                                <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn-primary w-full justify-center">
                            Enviar propuesta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
