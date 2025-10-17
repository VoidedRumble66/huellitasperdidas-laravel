<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Huellitas Perdidas</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    @yield('css')
</head>
<body>

<header>
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img class="rounded-circle" width="30" height="30"
                     src="{{ asset('image/logo.huellitas.png') }}" alt="Logo">
                <span>Huellitas Perdidas</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNav" aria-controls="mainNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('mascotas') ? 'active' : '' }}" href="{{ route('mascotas.index') }}">
                        Mascotas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('publicar') ? 'active' : '' }}" href="{{ route('publicar') }}">
                        Publicar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('acerca') ? 'active' : '' }}" href="{{ route('acerca') }}">
                        Acerca de..
                    </a>
                </li>

            </ul>


                {{-- Perfil a la derecha --}}
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Bienvenido Rodrigo
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
                            <li><a class="dropdown-item" href="{{ url('/nosotros') }}">Nosotros</a></li>
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    {{ $slot }}
</main>

<footer class="border-top mt-5">
    <div class="container py-4 text-center text-muted small">
        © {{ date('Y') }} Huellitas Perdidas
    </div>
</footer>

{{-- jQuery (solo si usarás DataTables con jQuery) --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

{{-- JS extra por-vista --}}
@yield('js')
</body>
</html>
