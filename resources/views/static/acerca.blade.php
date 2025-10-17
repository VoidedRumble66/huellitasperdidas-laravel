<x-layout>
    <div class="container py-4">
        <h1 class="h3 mb-4">Acerca de…</h1>
        <div class="row g-4">
            @php

                $equipo = [
                    ['nombre'=>'Rodrigo Méndez Encinos', 'modulo'=>'Mascotas (consulta)', 'foto'=>asset('image/equipo/rodrigo.jpg'), 'link'=>route('mascotas.index')],
                    ['nombre'=>'Cristian Gabriel Montiel Torres',        'modulo'=>'Publicar mascota',    'foto'=>asset('image/equipo/naomi.jpg'),   'link'=>route('publicar')],
                    ['nombre'=>'Jose Miguel Escobar Roblero',           'modulo'=>'Usuarios/Perfil',     'foto'=>asset('image/equipo/daniel.jpg'),  'link'=>url('/usuarios')],
                    ['nombre'=>'Jose Jahir Román Hernández', 'modulo'=>'Usuarios/Perfil', 'foto'=>asset('image/equipo/jahir.jpg'), 'link'=>route('users.index')],

                ];
            @endphp

            @foreach ($equipo as $p)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $p['foto'] }}" alt="{{ $p['nombre'] }}" class="card-img-top img-fluid"
                             style="object-fit: cover; aspect-ratio: 16/9;">
                        <div class="card-body">
                            <h5 class="card-title mb-1">{{ $p['nombre'] }}</h5>
                            <p class="card-text text-muted mb-3">{{ $p['modulo'] }}</p>
                            <a href="{{ $p['link'] }}" class="btn btn-outline-primary btn-sm">
                                Ver módulo
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
