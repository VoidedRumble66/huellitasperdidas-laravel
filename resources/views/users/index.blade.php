<x-layout>
    @section('css')
    <style>
        .dt-center { text-align: center; }
        .avatar-mini { width: 40px; height: 40px; object-fit: cover; border-radius: 50%; }
    </style>
    @endsection

    @php
        // DEMO sin BD: reemplaza por consulta real
        $usuarios = [
            ['id'=>1,'nombre'=>'Rodrigo Méndez','email'=>'rodrigo@demo.mx','rol'=>'admin','estado'=>'Activo','nacimiento'=>'2003-05-12','telefono'=>'9611234567','avatar'=>asset('image/images.jpeg')],
            ['id'=>2,'nombre'=>'Naomi Valdiviezo','email'=>'naomi@demo.mx','rol'=>'usuario','estado'=>'Activo','nacimiento'=>'2006-01-20','telefono'=>'9611112233','avatar'=>asset('image/images.jpeg')],
            ['id'=>3,'nombre'=>'Daniel Tamayo','email'=>'daniel@demo.mx','rol'=>'voluntario','estado'=>'Inactivo','nacimiento'=>'2006-03-15','telefono'=>'9619998877','avatar'=>asset('image/images.jpeg')],
        ];
    @endphp

    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
            <h1 class="h3 mb-0">Usuarios</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Agregar usuario
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table id="tablaUsuarios" class="table table-striped table-hover w-100">
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>F. Nac.</th>
                        <th class="dt-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $u)
                        <tr>
                            <td><img src="{{ $u['avatar'] }}" class="avatar-mini" alt="{{ $u['nombre'] }}"></td>
                            <td>{{ $u['nombre'] }}</td>
                            <td>{{ $u['email'] }}</td>
                            <td class="text-capitalize">{{ $u['rol'] }}</td>
                            <td>
                                <span class="badge {{ $u['estado']==='Activo' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $u['estado'] }}
                                </span>
                            </td>
                            <td>{{ $u['nacimiento'] }}</td>
                            <td class="dt-center text-nowrap">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('users.edit', $u['id']) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger" disabled title="Eliminar (pendiente)">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
    <script>
        new DataTable('#tablaUsuarios', {
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            ordering:  true,
            responsive: true
        });
    </script>
    @endsection
</x-layout>
