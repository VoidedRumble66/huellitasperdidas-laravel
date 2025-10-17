<x-layout>
    @section('css')
    <style>

        .hp-thumb { width: 100px; height: 100px; object-fit: cover; border-radius: .5rem; }
        .hp-thumb-wrap { width: 100px; height: 100px; position: relative; }
        .hp-remove {
            position: absolute; top: -8px; right: -8px;
            border-radius: 50%; line-height: 1; padding: .25rem .45rem;
        }
    </style>
    @endsection

    @php

        $usuarioMock = [
            'id'       => '',   
            'nombre'   => '',   
            'correo'   => '',   
            'telefono' => '',   
        ];

        $especies = [
            ['id' => 1, 'nombre' => 'Perro'],
            ['id' => 2, 'nombre' => 'Gato'],
            ['id' => 3, 'nombre' => 'Ave'],
        ];
    @endphp

    <div class="container py-4">
        <h1 class="h3 mb-4">Reportar Mascota</h1>


        <form class="needs-validation" novalidate action="#" method="post" enctype="multipart/form-data"
              onsubmit="event.preventDefault(); alert('Solo visual: aquí se enviaría el formulario.');">

            {{-- ===== Información del responsable ===== --}}
            <div class="card mb-4">
                <div class="card-header fw-semibold">Información del responsable</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">ID de Usuario</label>
                            <input type="text" class="form-control" value="{{ $usuarioMock['id'] }}" placeholder="(pendiente)"
                                   readonly disabled>
                            <input type="hidden" name="usuario_id" value="{{ $usuarioMock['id'] }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" value="{{ $usuarioMock['nombre'] }}" placeholder="(pendiente)"
                                   readonly disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" value="{{ $usuarioMock['correo'] }}" placeholder="(pendiente)"
                                   readonly disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" value="{{ $usuarioMock['telefono'] }}" placeholder="(pendiente)"
                                   readonly disabled>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== Información de la mascota ===== --}}
            <div class="card mb-4">
                <div class="card-header fw-semibold">Información de la mascota</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombreMascota" class="form-label">Nombre de mascota <span class="text-danger">*</span></label>
                            <input type="text" id="nombreMascota" name="nombreMascota" class="form-control" required>
                            <div class="invalid-feedback">Escribe el nombre de la mascota.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="ubicacion" class="form-label">Visto por última vez <span class="text-danger">*</span></label>
                            <input type="text" id="ubicacion" name="ubicacion" class="form-control" placeholder="Colonia, calle, punto de referencia" required>
                            <div class="invalid-feedback">Indica el lugar donde fue visto.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="especie" class="form-label">Especie <span class="text-danger">*</span></label>
                            <select id="especie" name="especie" class="form-select" required>
                                <option value="">Selecciona especie</option>
                                @foreach ($especies as $e)
                                    <option value="{{ $e['id'] }}">{{ $e['nombre'] }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Selecciona la especie.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="raza" class="form-label">Raza <span class="text-danger">*</span></label>
                            <select id="raza" name="raza" class="form-select" required disabled>
                                <option value="">Selecciona raza</option>
                            </select>
                            <div id="ayudaRaza" class="form-text d-none"></div>
                            <div class="invalid-feedback">Selecciona la raza.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="fecha" class="form-label">Fecha de extravío <span class="text-danger">*</span></label>
                            <input type="date" id="fecha" name="fecha" class="form-control" required>
                            <div class="invalid-feedback">Selecciona la fecha.</div>
                        </div>

                        <div class="col-12">
                            <label for="descripcion" class="form-label">Descripción detallada <span class="text-danger">*</span></label>
                            <textarea id="descripcion" name="descripcion" rows="3" class="form-control"
                                      placeholder="Color, tamaño, collar, señas particulares, etc." required></textarea>
                                    {{-- Radios: requerido (mínimo dos opciones) --}}
                                    <div class="col-md-6">
                                        <label class="form-label d-block">¿Tiene collar? <span class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tieneCollar" id="collarSi" value="si" required>
                                            <label class="form-check-label" for="collarSi">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tieneCollar" id="collarNo" value="no" required>
                                            <label class="form-check-label" for="collarNo">No</label>
                                        </div>
                                        <div class="invalid-feedback d-block">Selecciona una opción.</div>
                                    </div>

                                    {{-- Numérico con rango y filtro (opcional, pero ayuda al criterio) --}}
                                    <div class="col-md-6">
                                        <label for="recompensa" class="form-label">Recompensa (MXN)</label>
                                        <input type="number" id="recompensa" name="recompensa" class="form-control"
                                            min="0" max="10000" step="1" placeholder="0">
                                        <div class="form-text">Ingresa un valor entre 0 y 10,000.</div>
                                    </div>


                            <div class="invalid-feedback">Describe a la mascota.</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== Fotos ===== --}}
            <div class="card mb-4">
                <div class="card-header fw-semibold">Fotos de la mascota</div>
                <div class="card-body">
                    <div class="mb-2">
                        <input type="file" id="fotos" name="fotos[]" class="form-control" accept="image/*" multiple required>
                        <div class="form-text">Arrastra o selecciona varias imágenes. La primera será la portada.</div>
                        <div class="invalid-feedback">Agrega al menos una foto.</div>
                    </div>
                    <div id="preview" class="d-flex flex-wrap gap-2"></div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Publicar reporte</button>
                <a href="{{ url('/') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    @section('js')
    <script>
        // ===== Validación Bootstrap =====
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) { event.preventDefault(); event.stopPropagation(); }
                    form.classList.add('was-validated');
                }, false);
            });
        })();

        // ===== Datos simulados de razas por especie =====
        const RAZAS_POR_ESPECIE = {
            1: [ // Perro
                { id: 101, nombre: 'Mestizo' },
                { id: 102, nombre: 'Labrador' },
                { id: 103, nombre: 'Chihuahua' },
                { id: 104, nombre: 'Pitbull' },
            ],
            2: [ // Gato
                { id: 201, nombre: 'Mestizo' },
                { id: 202, nombre: 'Siames' },
                { id: 203, nombre: 'Persa' },
            ],
            3: [ // Ave
                { id: 301, nombre: 'Perico' },
                { id: 302, nombre: 'Canario' },
            ],
        };

        const especieSelect = document.getElementById('especie');
        const razaSelect = document.getElementById('raza');
        const ayudaRaza = document.getElementById('ayudaRaza');

        function resetRazas(msg = '') {
            razaSelect.innerHTML = '<option value="">Selecciona raza</option>';
            razaSelect.disabled = true;
            ayudaRaza.classList.toggle('d-none', !msg);
            ayudaRaza.textContent = msg;
        }

        especieSelect.addEventListener('change', () => {
            const id = especieSelect.value;
            if (!id) return resetRazas();
            const lista = RAZAS_POR_ESPECIE[id] || [];
            if (!lista.length) return resetRazas('No hay razas registradas para esta especie (demo).');

            razaSelect.innerHTML = '<option value="">Selecciona raza</option>' +
                lista.map(r => `<option value="${r.id}">${r.nombre}</option>`).join('');
            razaSelect.disabled = false;
            ayudaRaza.classList.add('d-none');
        });

        // ===== Preview incremental de imágenes =====
        const fileInput = document.getElementById('fotos');
        const preview = document.getElementById('preview');
        const dt = new DataTransfer();

        function renderPreview() {
            preview.innerHTML = '';
            Array.from(dt.files).forEach((file, idx) => {
                const url = URL.createObjectURL(file);
                const wrap = document.createElement('div');
                wrap.className = 'hp-thumb-wrap';

                const img = document.createElement('img');
                img.className = 'hp-thumb';
                img.src = url;
                img.alt = file.name;

                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'btn btn-sm btn-danger hp-remove';
                btn.innerHTML = '&times;';
                btn.addEventListener('click', () => {
                    dt.items.remove(idx);
                    fileInput.files = dt.files;
                    renderPreview();
                });

                wrap.appendChild(img);
                wrap.appendChild(btn);
                preview.appendChild(wrap);
            });
        }

        fileInput.addEventListener('change', (e) => {
            Array.from(e.target.files).forEach(f => dt.items.add(f));
            fileInput.files = dt.files;
            renderPreview();
        });
    </script>
    @endsection
</x-layout>
