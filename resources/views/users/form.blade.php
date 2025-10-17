<x-layout>
    @php
        // mode = 'create' | 'edit'
        $isEdit = ($mode ?? 'create') === 'edit';

        // Sin base de datos
        $user = $isEdit ? [
            'id'        => request()->route('id'),
            'nombre'    => 'Usuario Demo',
            'email'     => 'huellitas@perdidas.mx',
            'rol'       => 'usuario', // admin | usuario | voluntario
            'estado'    => 'activo',  // activo | inactivo
            'telefono'  => '9611234567',
            'nacimiento'=> '2005-08-20',
            'hora'      => '10:30',
            'bio'       => 'Me encantan los perros y ayudar a la comunidad.',
            'avatar'    => asset('image/images.jpeg'),
        ] : [
            'id'        => '',
            'nombre'    => '',
            'email'     => '',
            'rol'       => '',
            'estado'    => 'activo',
            'telefono'  => '',
            'nacimiento'=> '',
            'hora'      => '',
            'bio'       => '',
            'avatar'    => '',
        ];
    @endphp

    @section('css')
    <style>
        .avatar-preview { width: 96px; height: 96px; object-fit: cover; border-radius: 50%; border: 1px solid #e9ecef; }
    </style>
    @endsection

    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
            <h1 class="h3 mb-0">{{ $isEdit ? 'Editar usuario' : 'Agregar usuario' }}</h1>
            <div>
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Volver al listado</a>
            </div>
        </div>

        <form class="needs-validation" novalidate
              action="#"
              method="post"
              enctype="multipart/form-data"
              onsubmit="event.preventDefault(); alert('Solo visual: aquí se enviaría el formulario.');">

            <div class="card mb-4">
                <div class="card-header fw-semibold">Datos del usuario</div>
                <div class="card-body">
                    <div class="row g-3">
                        {{-- Nombre --}}
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre completo <span class="text-danger">*</span></label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required
                                   minlength="3" maxlength="60"
                                   value="{{ $user['nombre'] }}">
                            <div class="invalid-feedback">Ingresa entre 3 y 60 caracteres.</div>
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo electrónico <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" required
                                   value="{{ $user['email'] }}">
                            <div class="invalid-feedback">Ingresa un correo válido.</div>
                        </div>

                        {{-- Teléfono con patrón --}}
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono (10 dígitos) <span class="text-danger">*</span></label>
                            <input type="tel" id="telefono" name="telefono" class="form-control" required
                                   pattern="^\d{10}$" placeholder="9611234567"
                                   value="{{ $user['telefono'] }}">
                            <div class="invalid-feedback">Coloca 10 dígitos (solo números).</div>
                        </div>

                        {{-- Rol --}}
                        <div class="col-md-3">
                            <label for="rol" class="form-label">Rol <span class="text-danger">*</span></label>
                            <select id="rol" name="rol" class="form-select" required>
                                <option value="">Selecciona un rol</option>
                                <option value="admin"      {{ $user['rol']==='admin' ? 'selected' : '' }}>Administrador</option>
                                <option value="usuario"    {{ $user['rol']==='usuario' ? 'selected' : '' }}>Usuario</option>
                                <option value="voluntario" {{ $user['rol']==='voluntario' ? 'selected' : '' }}>Voluntario</option>
                            </select>
                            <div class="invalid-feedback">Selecciona un rol.</div>
                        </div>

                        {{-- Estado  --}}
                        <div class="col-md-3">
                            <label class="form-label d-block">Estado <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="estado" id="estadoActivo" value="activo" required
                                       {{ $user['estado']==='activo' ? 'checked' : '' }}>
                                <label class="form-check-label" for="estadoActivo">Activo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="estado" id="estadoInactivo" value="inactivo" required
                                       {{ $user['estado']==='inactivo' ? 'checked' : '' }}>
                                <label class="form-check-label" for="estadoInactivo">Inactivo</label>
                            </div>
                            <div class="invalid-feedback d-block">Selecciona una opción.</div>
                        </div>

                        {{-- Fecha de nacimiento (date) --}}
                        <div class="col-md-4">
                            <label for="nacimiento" class="form-label">Fecha de nacimiento <span class="text-danger">*</span></label>
                            <input type="date" id="nacimiento" name="nacimiento" class="form-control" required
                                   max="{{ date('Y-m-d') }}"
                                   value="{{ $user['nacimiento'] }}">
                            <div class="invalid-feedback">Selecciona una fecha válida (no futura).</div>
                        </div>

                        {{-- Hora preferida de contacto (time) --}}
                        <div class="col-md-2">
                            <label for="hora" class="form-label">Hora p. contacto <span class="text-danger">*</span></label>
                            <input type="time" id="hora" name="hora" class="form-control" required
                                   value="{{ $user['hora'] }}">
                            <div class="invalid-feedback">Selecciona una hora.</div>
                        </div>

                        {{-- Bio (textarea) --}}
                        <div class="col-12">
                            <label for="bio" class="form-label">Bio / Nota <span class="text-danger">*</span></label>
                            <textarea id="bio" name="bio" rows="3" class="form-control" required
                                      minlength="10" maxlength="300"
                                      placeholder="Cuéntanos algo sobre el usuario…">{{ $user['bio'] }}</textarea>
                            <div class="invalid-feedback">Entre 10 y 300 caracteres.</div>
                        </div>

                        {{-- Avatar (archivo) --}}
                        <div class="col-md-6">
                            <label for="avatar" class="form-label">Avatar (JPG/PNG, máx 1MB) <span class="text-danger">*</span></label>
                            <input type="file" id="avatar" name="avatar" class="form-control" accept="image/png,image/jpeg" {{ $isEdit ? '' : 'required' }}>
                            <div class="form-text">Se recomienda imagen cuadrada.</div>
                            <div class="invalid-feedback">Sube una imagen JPG o PNG (máx 1MB).</div>
                        </div>

                        {{-- Preview --}}
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="d-flex align-items-center gap-3">
                                <img id="avatarPreview" src="{{ $user['avatar'] ?: 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==' }}" class="avatar-preview" alt="Preview">
                                <span class="text-muted small">Vista previa del avatar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Botones --}}
            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Guardar cambios' : 'Crear usuario' }}</button>
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Cancelar</a>
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

        // ===== Preview de avatar + validación de tamaño (<= 1MB) =====
        const avatarInput = document.getElementById('avatar');
        const avatarPreview = document.getElementById('avatarPreview');

        if (avatarInput) {
            avatarInput.addEventListener('change', (e) => {
                const file = e.target.files?.[0];
                if (!file) return;

                // Tamaño máximo 1MB
                if (file.size > 1024 * 1024) {
                    e.target.value = '';
                    alert('La imagen supera 1MB. Selecciona otra por favor.');
                    return;
                }
                const okType = ['image/jpeg','image/png'].includes(file.type);
                if (!okType) {
                    e.target.value = '';
                    alert('Formato no permitido. Usa JPG o PNG.');
                    return;
                }
                const url = URL.createObjectURL(file);
                avatarPreview.src = url;
            });
        }
    </script>
    @endsection
</x-layout>
