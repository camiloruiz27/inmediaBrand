@php
    $rawWhatsapp = config('imb.contact_whatsapp');
    $cleanWhatsapp = preg_replace('/\D+/', '', $rawWhatsapp ?? '') ?: '573000000000';
@endphp

<a
    href="https://wa.me/{{ $cleanWhatsapp }}"
    target="_blank"
    rel="noopener noreferrer"
    class="whatsapp-float"
    aria-label="Abrir chat de WhatsApp de Inmedia Brand"
>
    <span class="whatsapp-float__icon" aria-hidden="true">
        <img src="{{ asset('assets/icons/whatsapp-float.png') }}" alt="" class="whatsapp-float__icon-image">
    </span>
    <span class="whatsapp-float__text">WhatsApp</span>
</a>
