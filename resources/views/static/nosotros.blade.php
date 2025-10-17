<x-layout>
    @section('css')
    <style>
        .hp-icon-lg { font-size: 2rem; }
    </style>
    @endsection

    <section class="py-5">
        <div class="container">
            {{-- Fila principal --}}
            <div class="row align-items-center gy-3 gx-md-5">
                {{-- Imagen --}}
                <div class="col-12 col-md-5 mb-3 mb-md-0 text-center">
                    <img
                        src="{{ asset('image/logo.huellitas.png') }}"
                        alt="Equipo Huellitas Perdidas"
                        class="img-fluid"
                    >
                </div>

                {{-- Texto --}}
                <div class="col-12 col-md-7">
                    <h2 class="h3">¿Quiénes somos?</h2>
                    <p class="text-muted">
                        Somos <strong>Huellitas Perdidas Ocosingo</strong>, un proyecto impulsado por estudiantes de la
                        <strong>Universidad Tecnológica de la Selva</strong>, enfocado en la tecnología para la protección animal.
                        Creemos en el poder de la comunidad, la innovación y la empatía para reunir familias con sus mascotas perdidas.
                    </p>

                    <ul class="list-unstyled ms-1">
                        <li class="mb-2">
                            <i class="bi bi-heart-fill me-2 text-danger"></i>
                            Amor y respeto por los animales
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-people-fill me-2 text-primary"></i>
                            Trabajo en equipo
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-lightbulb-fill me-2 text-warning"></i>
                            Innovación social
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-geo-alt-fill me-2 text-success"></i>
                            Compromiso con Ocosingo
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Tarjetas Misión / Visión / Equipo --}}
            <div class="row g-4 mt-5">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-bandaid-fill text-success hp-icon-lg"></i>
                            <h3 class="h5 mt-3">Misión</h3>
                            <p class="text-muted mb-0">
                                Utilizar la tecnología para facilitar el reencuentro entre mascotas extraviadas y sus familias,
                                promoviendo la cultura de la denuncia y el apoyo comunitario en Ocosingo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-eye-fill text-primary hp-icon-lg"></i>
                            <h3 class="h5 mt-3">Visión</h3>
                            <p class="text-muted mb-0">
                                Ser la plataforma referente en la región para la localización y rescate de mascotas,
                                fomentando la participación ciudadana y la protección animal.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-people-fill text-warning hp-icon-lg"></i>
                            <h3 class="h5 mt-3">Nuestro equipo</h3>
                            <p class="text-muted mb-0">
                                Estudiantes, voluntarios y profesionistas comprometidos con el bienestar animal
                                y el desarrollo tecnológico con causa social.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cómo ayudar / Historia --}}
            <div class="row g-4 mt-5">
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-success">
                        <div class="card-body">
                            <h3 class="h5"><i class="bi bi-hand-thumbs-up-fill text-success me-2"></i>¿Cómo puedes ayudar?</h3>
                            <ul class="list-unstyled mb-3">
                                <li class="mb-2"><i class="bi bi-megaphone-fill me-2 text-primary"></i> Difunde reportes en redes sociales</li>
                                <li class="mb-2"><i class="bi bi-geo-alt-fill me-2 text-danger"></i> Reporta avistamientos de mascotas</li>
                                <li class="mb-2"><i class="bi bi-paw-fill me-2 text-warning"></i> Ofrece refugio temporal</li>
                                <li class="mb-2"><i class="bi bi-people-fill me-2 text-success"></i> Únete como voluntario</li>
                            </ul>
                            <a href="{{ url('/contacto') }}" class="btn btn-success">¡Quiero sumarme!</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="h5"><i class="bi bi-seedling text-success me-2"></i>Nuestra historia</h3>
                            <p class="text-muted mb-0">
                                <strong>Huellitas Perdidas Ocosingo</strong> nació como una idea entre amigos de universidad,
                                preocupados por la cantidad de mascotas extraviadas en la región. Desde 2025, trabajamos
                                para que ninguna mascota se quede sin ser buscada, ni familia sin esperanza.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JS --}}
    @section('js')
    @endsection
</x-layout>
