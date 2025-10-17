<x-layout>
    {{-- ========= CSS opcional mínimo (todo Bootstrap-friendly) ========= --}}
    @section('css')
    <style>
        /* Números grandes de los pasos, usando solo un par de utilidades */
        .step-circle {
            width: 56px; height: 56px; border-radius: 50%;
            display: inline-flex; align-items: center; justify-content: center;
            font-weight: 700;
        }
            /* Tamaño del carrusel */
        #hpCarousel .carousel-item img {
            max-height: 450px; /* <- Cambia esta altura a la que quieras */
            object-fit: cover; /* Recorta bien sin deformar */
        }
        /* Pequeño esqueleto si no hay datos aún */
        .skeleton { background: linear-gradient(90deg,#eee,#f5f5f5,#eee); background-size: 200% 100%; animation: sh 1.2s infinite; }
        @keyframes sh { 0%{background-position:200% 0} 100%{background-position:-200% 0} }
    </style>
    @endsection
    {{-- ========= HERO / CARRUSEL ========= --}}
    <div id="hpCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hpCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#hpCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#hpCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            {{-- Usa imágenes en public/img/slide1.jpg, slide2.jpg, slide3.jpg --}}
            <div class="carousel-item active">
                <img src="{{ asset('image/slide1.jpg') }}" class="d-block w-100" alt="Ayudemos a reunir familias">
                <div class="carousel-caption text-start">
                    <h2 class="fw-bold">Ayudemos a reunir familias</h2>
                    <p>Una plataforma para encontrar y reportar mascotas extraviadas en Ocosingo.</p>
                    <a href="{{ route('publicar') }}" class="btn btn-success">Publicar reporte</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/slide2.jpg') }}" class="d-block w-100" alt="Encuentra a tu mejor amigo">
                <div class="carousel-caption">
                    <h2 class="fw-bold">Encuentra a tu mejor amigo</h2>
                    <p>Explora los reportes recientes y busca mascotas cerca de ti.</p>
                    <a href="{{ route('extraviados') }}" class="btn btn-outline-light">Buscar mascotas</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/slide3.jpg') }}" class="d-block w-100" alt="Únete y ayuda">
                <div class="carousel-caption text-end">
                    <h2 class="fw-bold">¡Únete y ayuda!</h2>
                    <p>Comparte reportes y colabora con la comunidad.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Regístrate</a>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#hpCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hpCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    {{-- ========= MASCOTAS RECIENTES (placeholder sin BD) ========= --}}
    @php
        /**
         * Cuando conectes BD, este bloque se reemplaza por:
         * $recientes = Mascota::with(['especie','raza','fotoPrincipal'])
         *     ->orderByDesc('fechadeextravio')
         *     ->limit(4)->get();
         */
        $recientes = []; // <-- DEJA VACÍO mientras no haya BD
        // Ejemplo manual temporal (puedes borrar si quieres dejarlo vacío):
        // $recientes = [
        //   ['id'=>1,'nombre'=>'Kira','especie'=>'Perro','raza'=>'Mestizo','foto'=>asset('imgmascotas/demo1.jpg')],
        //   ['id'=>2,'nombre'=>'Mishu','especie'=>'Gato','raza'=>'Siames','foto'=>asset('imgmascotas/demo2.jpg')],
        // ];
    @endphp

    <section class="py-5">
        <div class="container">
            <h2 class="h3 mb-4">Mascotas Extraviadas Recientes</h2>
            <div class="row g-4">
                @forelse ($recientes as $m)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 shadow-sm">
                            <div class="ratio ratio-4x3">
                                @if(!empty($m['foto']))
                                    <img src="{{ $m['foto'] }}" class="card-img-top object-fit-cover" alt="{{ $m['nombre'] }}">
                                @else
                                    <div class="d-flex align-items-center justify-content-center bg-light">
                                        <i class="bi bi-image fs-1 text-secondary"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-1">{{ $m['nombre'] }}</h5>
                                <p class="card-text text-muted small">{{ $m['especie'] }} — {{ $m['raza'] }}</p>
                                <a href="{{ url('/detalle-mascota/'.$m['id']) }}" class="btn btn-outline-primary btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Placeholders mientras no hay datos --}}
                    @for ($i = 0; $i < 4; $i++)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card h-100 shadow-sm">
                                <div class="ratio ratio-4x3 skeleton"></div>
                                <div class="card-body">
                                    <div class="skeleton" style="height: 18px; width: 60%; border-radius:6px;"></div>
                                    <div class="skeleton mt-2" style="height: 14px; width: 80%; border-radius:6px;"></div>
                                    <button class="btn btn-outline-secondary btn-sm mt-3" disabled>Pendiente de conectar BD</button>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('extraviados') }}" class="btn btn-success">Ver más mascotas</a>
            </div>
        </div>
    </section>

    {{-- ========= LLAMADO / CTA ========= --}}
    <section class="bg-light py-5 text-center">
        <div class="container">
            <h2 class="h3">¿Perdiste a tu mascota?</h2>
            <a href="{{ route('publicar') }}" class="btn btn-primary m-2">Reportar mascota perdida</a>
            <a href="{{ route('extraviados') }}" class="btn btn-outline-success m-2">Buscar mascotas</a>
        </div>
    </section>

    {{-- ========= ¿CÓMO FUNCIONA? ========= --}}
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="h3 mb-3">¿Cómo funciona?</h2>
            <p class="mb-5 text-muted">
                Con Huellitas Perdidas puedes reportar, buscar y ayudar a reunir mascotas con sus familias. ¡Sigue estos pasos sencillos!
            </p>

            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-4">
                    <div class="h-100 p-4 border rounded-3">
                        <div class="step-circle bg-success text-white mb-3 mx-auto">1</div>
                        <h4 class="mb-2">Reporta o busca una mascota</h4>
                        <p class="text-muted">
                            Si tu mascota se perdió o encontraste una, crea un reporte en la plataforma. Llena los datos y sube una foto para facilitar la búsqueda.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="h-100 p-4 border rounded-3">
                        <div class="step-circle bg-success text-white mb-3 mx-auto">2</div>
                        <h4 class="mb-2">Comparte la publicación</h4>
                        <p class="text-muted">
                            Difunde el reporte con tu familia, amigos y vecinos usando redes sociales o WhatsApp para aumentar las probabilidades de éxito.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="h-100 p-4 border rounded-3">
                        <div class="step-circle bg-success text-white mb-3 mx-auto">3</div>
                        <h4 class="mb-2">Conecta y reúne a la familia</h4>
                        <p class="text-muted">
                            Si tienes información, comenta o contacta al dueño desde el reporte. Entre todos podemos reunir familias y hacer comunidad.
                        </p>
                    </div>
                </div>
            </div>

            <p class="mt-5 text-muted">
                ¡Tu ayuda es valiosa! Compartir reportes puede marcar la diferencia para una mascota perdida y su familia.
            </p>
        </div>
    </section>

    {{-- ========= JS (solo Bootstrap APIs) ========= --}}
    @section('js')
    <script>
        // Auto-rotación del carrusel (5s) – ya respeta swipe en móvil por Bootstrap
        const hpCarousel = document.querySelector('#hpCarousel');
        if (hpCarousel) {
            new bootstrap.Carousel(hpCarousel, { interval: 5000, ride: 'carousel', pause: 'hover', touch: true });
        }
    </script>
    @endsection
</x-layout>
