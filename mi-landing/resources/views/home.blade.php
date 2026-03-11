<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmedia Brand | Hacemos Visible Tu Marca</title>
    <meta name="description" content="Agencia y productora audiovisual en Cali. Estrategia, narrativa y contenido visual para hacer visible tu marca.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-loading">
    <x-ui.page-loader />

    <main class="relative" data-page="home">
        <x-home.hero />
        <x-home.sticky-header />
        <x-home.dna />
        <x-home.benefits />
        <x-home.card-stack />
        <x-home.services />
        <x-home.horizontal-showcase />
        <x-home.portfolio />
        <x-home.freelancers />
        <x-home.why-us />
        <x-home.clients />
        <x-home.cta-final />
    </main>

    <x-home.footer />
</body>
</html>
