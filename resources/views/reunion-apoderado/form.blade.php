@php
    // Definir si es edición o creación para manejar dinámicamente el formulario
    $isEdit = isset($reunionApoderado) && $reunionApoderado->exists;
@endphp

<!-- Mostrar mensajes de error generales -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $isEdit ? route('reunion-apoderados.update', $reunionApoderado->IdReunionApoderado) : route('reunion-apoderados.store') }}" method="POST">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <!-- Selección de Reunión -->
    <div class="form-group mb-2">
        <label for="IdReunion" class="form-label">Reunión *</label>
        <select name="IdReunion" id="IdReunion" class="form-control" {{ $isEdit ? 'disabled' : '' }}>
            <option value="" disabled {{ !$isEdit ? 'selected' : '' }}>Seleccione una reunión</option>
            @foreach($reuniones as $reunion)
                <option value="{{ $reunion->IdReunion }}" 
                    {{ old('IdReunion', $isEdit ? $reunionApoderado->IdReunion : '') == $reunion->IdReunion ? 'selected' : '' }}>
                    {{ $reunion->TipoReunion }} - {{ $reunion->DescripcionReunion }}
                </option>
            @endforeach
        </select>
        @if ($isEdit)
            <input type="hidden" name="IdReunion" value="{{ $reunionApoderado->IdReunion }}">
        @endif
        @error('IdReunion')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tipo de Reunión -->
    <div class="form-group mb-2">
        <label for="TipoReunion" class="form-label">Tipo de Reunión *</label>
        <select name="TipoReunion" id="TipoReunion" class="form-control" {{ $isEdit ? 'readonly' : '' }} onchange="handleReunionType()">
            <option value="" disabled {{ !$isEdit ? 'selected' : '' }}>Seleccione el tipo de reunión</option>
            <option value="General" {{ old('TipoReunion', $isEdit ? $reunionApoderado->TipoReunion : '') == 'General' ? 'selected' : '' }}>General</option>
            <option value="Específica" {{ old('TipoReunion', $isEdit ? $reunionApoderado->TipoReunion : '') == 'Específica' ? 'selected' : '' }}>Específica</option>
        </select>
        @error('TipoReunion')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>


    <!-- Selección de Curso -->
    <div class="form-group mb-2">
        <label for="IdCurso" class="form-label">Curso *</label>
        <select name="IdCurso" id="IdCurso" class="form-control" onchange="loadApoderados()">
            <option value="" disabled>Seleccione un curso</option>
            @foreach($cursos as $curso)
                <option value="{{ $curso->IDCurso }}" 
                    {{ old('IdCurso', $isEdit ? $reunionApoderado->IdCurso : '') == $curso->IDCurso ? 'selected' : '' }}>
                    {{ $curso->NombreCurso }}
                </option>
            @endforeach
        </select>
        @error('IdCurso')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

   <!-- Selección de Apoderado en reuniones específicas -->
<div class="form-group mb-2" id="SelectApoderadoGroup" style="display: {{ $isEdit && $reunionApoderado->TipoReunion === 'General' ? 'none' : 'block' }};">
    <label for="RunApoderado" class="form-label">Apoderado Específico *</label>
    <select name="RunApoderado" id="RunApoderado" class="form-control">
        <option value="" disabled selected>Seleccione un apoderado</option>
        @if(isset($apoderados))
            @foreach($apoderados as $apoderado)
                <option value="{{ $apoderado->RunApoderado }}" 
                    {{ old('RunApoderado', $isEdit ? $reunionApoderado->RunApoderado : '') == $apoderado->RunApoderado ? 'selected' : '' }}>
                    {{ $apoderado->Nombres }} {{ $apoderado->Apellidos }}
                </option>
            @endforeach
        @endif
    </select>
    @error('RunApoderado')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Tabla de Apoderados y Asistencia -->
<div class="form-group mb-2" id="ApoderadosGroup">
    <label for="ApoderadosTable" class="form-label">Apoderados y Asistencia *</label>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Asistencia</th>
            </tr>
        </thead>
        <tbody id="ApoderadosTable">
            @if(isset($apoderados) && count($apoderados) > 0)
                @foreach($apoderados as $apoderado)
                    <tr>
                        <td>{{ $apoderado->Nombres }} {{ $apoderado->Apellidos }}</td>
                        <td>
                            <input type="hidden" name="asistencias[{{ $apoderado->RunApoderado }}]" value="No">
                            <input type="checkbox" name="asistencias[{{ $apoderado->RunApoderado }}]" value="Sí"
                                {{ old("asistencias.{$apoderado->RunApoderado}", $apoderado->Asistencia ?? '') === 'Sí' ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2" class="text-center">No hay apoderados disponibles.</td>
                </tr>
            @endif
        </tbody>
    </table>
    @error('asistencias')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


    <!-- Botón Guardar -->
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Guardar Reunión</button>
    </div>
</form>

<script>
function handleReunionType() {
    const tipoReunion = document.getElementById('TipoReunion').value;
    const selectApoderadoGroup = document.getElementById('SelectApoderadoGroup');

    // Ocultar o mostrar el select de apoderado específico
    if (tipoReunion === 'General') {
        selectApoderadoGroup.style.display = 'none';
    } else {
        selectApoderadoGroup.style.display = 'block';
    }
}


function loadApoderados() {
    const cursoId = document.getElementById('IdCurso').value;
    const selectApoderado = document.getElementById('RunApoderado');
    const apoderadosTable = document.getElementById('ApoderadosTable');

    fetch(`/reunion-apoderados/cursos/${cursoId}/apoderados`)
        .then(response => response.json())
        .then(data => {
            selectApoderado.innerHTML = '<option value="" disabled selected>Seleccione un apoderado</option>';
            data.forEach(apoderado => {
                selectApoderado.innerHTML += `
                    <option value="${apoderado.RunApoderado}">${apoderado.Nombres} ${apoderado.Apellidos}</option>`;
            });

            apoderadosTable.innerHTML = '';
            data.forEach(apoderado => {
                apoderadosTable.innerHTML += `
                    <tr>
                        <td>${apoderado.Nombres} ${apoderado.Apellidos}</td>
                        <td>
                            <input type="hidden" name="asistencias[${apoderado.RunApoderado}]" value="No">
                            <input type="checkbox" name="asistencias[${apoderado.RunApoderado}]" value="Sí">
                        </td>
                    </tr>`;
            });
        })
        .catch(error => {
            console.error('Error al cargar los apoderados:', error);
            apoderadosTable.innerHTML = '<tr><td colspan="2" class="text-center">Error al cargar los apoderados.</td></tr>';
        });
}
</script>
