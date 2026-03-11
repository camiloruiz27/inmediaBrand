<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmedia Brand</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white antialiased">
    <section class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(56,189,248,0.18),_transparent_35%),radial-gradient(circle_at_80%_30%,_rgba(168,85,247,0.18),_transparent_30%)]"></div>

        <div class="relative mx-auto max-w-7xl px-6 py-8">
            <header class="flex items-center justify-between">
                <div class="text-xl font-semibold tracking-wide">Inmedia Brand</div>
                <a href="#contacto" class="rounded-full border border-white/15 px-5 py-2 text-sm font-medium hover:bg-white/10 transition">
                    Hablemos
                </a>
            </header>

            <div class="flex min-h-[85vh] items-center">
                <div class="max-w-4xl">
                    <span class="mb-6 inline-flex rounded-full border border-cyan-400/20 bg-cyan-400/10 px-4 py-1 text-sm text-cyan-300">
                        Diseño moderno + estrategia digital
                    </span>

                    <h1 class="text-5xl font-bold leading-tight md:text-7xl">
                        Creamos experiencias visuales que atraen, conectan y convierten.
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg text-slate-300 md:text-xl">
                        Una landing elegante, rápida y enfocada en conversión para presentar tu marca
                        con autoridad y generar más oportunidades de negocio.
                    </p>

                    <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                        <a href="#contacto" class="rounded-2xl bg-white px-7 py-4 text-center font-semibold text-slate-900 shadow-lg shadow-white/10 transition hover:scale-105">
                            Quiero impulsar mi marca
                        </a>
                        <a href="#servicios" class="rounded-2xl border border-white/15 px-7 py-4 text-center font-semibold transition hover:bg-white/10">
                            Ver servicios
                        </a>
                    </div>

                    <div class="mt-12 grid max-w-2xl grid-cols-1 gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur">
                            <p class="text-2xl font-bold">+120%</p>
                            <p class="text-sm text-slate-300">Más impacto visual</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur">
                            <p class="text-2xl font-bold">UX</p>
                            <p class="text-sm text-slate-300">Pensado para convertir</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur">
                            <p class="text-2xl font-bold">CTA</p>
                            <p class="text-sm text-slate-300">Llamados a la acción claros</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>