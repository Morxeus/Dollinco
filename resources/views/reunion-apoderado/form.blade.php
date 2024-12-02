<div class="row padding-1 p-1">
    <div class="col-md-12">
        <!-- Campo oculto para el IDReunionApoderado -->


        <!-- Selector para tipo de reunión -->
        <div class="form-group mb-2 mb20">
            <label for="tipo_reunion" class="form-label">{{ __('Tipo de Reunión') }}</label>
            <select name="tipo_reunion" id="tipo_reunion" class="form-control @error('tipo_reunion') is-invalid @enderror" onchange="toggleApoderadoField()">
                <option value="general" {{ old('tipo_reunion', $reunionApoderado?->tipo_reunion) == 'general' ? 'selected' : '' }}>General (para todos los apoderados del curso)</option>
                <option value="privada" {{ old('tipo_reunion', $reunionApoderado?->tipo_reunion) == 'privada' ? 'selected' : '' }}>Privada (para un apoderado específico)</option>
            </select>
            {!! $errors->first('tipo_reunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Selector de curso -->
        <div class="form-group mb-2 mb20">
            <label for="IDCurso" class="form-label">{{ __('Curso') }}</label>
            <select name="IDCurso" id="IDCurso" class="form-control @error('IDCurso') is-invalid @enderror" onchange="filtrarApoderados()">
                <option value="">{{ __('Seleccione un curso') }}</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->IDCurso }}" {{ old('IDCurso', $reunionApoderado?->IDCurso) == $curso->IDCurso ? 'selected' : '' }}>
                        {{ $curso->NombreCurso }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDCurso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Selector de apoderado -->
        <div class="form-group mb-2 mb20" id="apoderado_field" style="display: {{ old('tipo_reunion', $reunionApoderado?->tipo_reunion) == 'privada' ? 'block' : 'none' }};">
            <label for="RunApoderado" class="form-label">{{ __('Apoderado') }}</label>
            <select name="RunApoderado" id="RunApoderado" class="form-control @error('RunApoderado') is-invalid @enderror">
                <option value="">{{ __('Seleccione un apoderado') }}</option>
                <!-- Opciones se llenarán dinámicamente con JavaScript -->
            </select>
            {!! $errors->first('RunApoderado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Otros campos existentes -->
        <div class="form-group mb-2 mb20">
            <label for="asistencia" class="form-label">{{ __('Asistencia') }}</label>
            <input type="text" name="Asistencia" class="form-control @error('Asistencia') is-invalid @enderror" value="{{ old('Asistencia', $reunionApoderado?->Asistencia) }}" id="asistencia" placeholder="Asistencia">
            {!! $errors->first('Asistencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hora_inicio_reunion_apoderado" class="form-label">{{ __('Hora de Inicio') }}</label>
            <input type="datetime-local" name="HoraInicioReunionApoderado" class="form-control @error('HoraInicioReunionApoderado') is-invalid @enderror" value="{{ old('HoraInicioReunionApoderado', $reunionApoderado?->HoraInicioReunionApoderado) }}" id="hora_inicio_reunion_apoderado" placeholder="Hora de Inicio">
            {!! $errors->first('HoraInicioReunionApoderado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hora_fin_reunion_apoderado" class="form-label">{{ __('Hora de Fin') }}</label>
            <input type="datetime-local" name="HoraFinReunionApoderado" class="form-control @error('HoraFinReunionApoderado') is-invalid @enderror" value="{{ old('HoraFinReunionApoderado', $reunionApoderado?->HoraFinReunionApoderado) }}" id="hora_fin_reunion_apoderado" placeholder="Hora de Fin">
            {!! $errors->first('HoraFinReunionApoderado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="IDReunion" class="form-label">{{ __('Reunión') }}</label>
            <select name="IDReunion" class="form-control @error('IDReunion') is-invalid @enderror" id="IDReunion">
                <option value="">{{ __('Seleccione una reunión') }}</option>
                @foreach($reunions as $reunion)
                    <option value="{{ $reunion->IDReunion }}" {{ old('IDReunion', $reunionApoderado?->IDReunion) == $reunion->IDReunion ? 'selected' : '' }}>
                        {{ $reunion->TipoReunion }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDReunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>

<script>
    function toggleApoderadoField() {
        const tipoReunion = document.getElementById('tipo_reunion').value;
        const apoderadoField = document.getElementById('apoderado_field');
        apoderadoField.style.display = tipoReunion === 'privada' ? 'block' : 'none';
    }

    function filtrarApoderados() {
        const cursoId = document.getElementById('IDCurso').value;

        if (cursoId) {
            fetch(`/reunion-apoderados/apoderados/curso/${cursoId}`)
                .then(response => {
                    if (!response.ok) throw new Error('Error al cargar apoderados.');
                    return response.json();
                })
                .then(data => {
                    const apoderadoSelect = document.getElementById('RunApoderado');
                    apoderadoSelect.innerHTML = '<option value="">Seleccione un apoderado</option>';
                    data.forEach(apoderado => {
                        apoderadoSelect.innerHTML += `<option value="${apoderado.RunApoderado}">
                            ${apoderado.RunApoderado} - ${apoderado.Nombres} ${apoderado.Apellidos}
                        </option>`;
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            document.getElementById('RunApoderado').innerHTML = '<option value="">Seleccione un apoderado</option>';
        }
    }
</script>
