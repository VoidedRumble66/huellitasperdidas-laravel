<x-layout>
    @section('css')
    <style>.dt-center { text-align:center; }</style>
    @endsection

    @php
        // DEMO sin BD: reemplaza por consulta real cuando conectes
        $mascotas = [
            ['id'=>1, 'nombre'=>'Kira',  'especie'=>'Perro', 'raza'=>'Mestizo',   'fecha'=>'2025-10-10', 'lugar'=>'Col. Centro'],
            ['id'=>2, 'nombre'=>'Mishu', 'especie'=>'Gato',  'raza'=>'Siames',    'fecha'=>'2025-10-11', 'lugar'=>'Barrio Norte'],
            ['id'=>3, 'nombre'=>'Toby',  'especie'=>'Perro', 'raza'=>'Labrador',  'fecha'=>'2025-10-12', 'lugar'=>'Col. Sur'],
            ['id'=>4, 'nombre'=>'Luna',  'especie'=>'Gato',  'raza'=>'Persa',     'fecha'=>'2025-10-13', 'lugar'=>'La Pimienta'],
        ];
    @endphp

    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
            <h1 class="h3 mb-0">Mascotas (consulta)</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('publicar') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Agregar reporte
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table id="tablaMascotas" class="table table-striped table-hover w-100">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Última vez visto</th>
                        <th class="text-nowrap">Fecha de extravío</th>
                        <th class="dt-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mascotas as $m)
                        <tr>
                            <td>{{ $m['nombre'] }}</td>
                            <td>{{ $m['especie'] }}</td>
                            <td>{{ $m['raza'] }}</td>
                            <td>{{ $m['lugar'] }}</td>
                            <td>{{ $m['fecha'] }}</td>
                            <td class="dt-center">
                                <a class="btn btn-sm btn-outline-primary" href="{{ url('/detalle-mascota/'.$m['id']) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-secondary" disabled title="Editar (pendiente)">
                                    <i class="bi bi-pencil"></i>
                                </button>
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
        // DataTables (usa los assets ya incluidos en tu layout)
        new DataTable('#tablaMascotas', {
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            ordering:  true,
            responsive: true
        });
    </script>
    @endsection
</x-layout>
