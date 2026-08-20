<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Media Brand | Productora Audiovisual Corporativa y de Marca</title>
    <meta name="description" content="Productora Audiovisual Corporativa y de Marca en Cali. Videos de alto nivel para comunicación corporativa, estrategia de marca y storytelling empresarial.">
    <link rel="icon" type="image/png" href="{{ asset('assets/clients/icon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/clients/icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-loading">
    <x-ui.page-loader />
    <x-home.whatsapp-float />

    <main class="relative" data-page="home">
        <x-home.hero />
        <x-home.sticky-header />
        <x-home.podcast />
        <x-home.dna />
        <x-home.services />
        <x-home.portfolio />
        <x-home.clients />
        <x-home.cta-final />
    </main>

    <x-home.footer />
</body>
</html>
