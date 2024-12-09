<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="run_alumno" class="form-label">{{ __('RUN del Alumno *') }}</label>
            @if (isset($alumno) && $alumno->exists)
                <!-- Mostrar el campo como solo lectura si estamos editando -->
                <input type="text" 
                       name="RunAlumno" 
                       class="form-control @error('RunAlumno') is-invalid @enderror" 
                       value="{{ old('RunAlumno', $alumno->RunAlumno) }}" 
                       id="run_alumno" 
                       placeholder="RUN del Alumno"
                       readonly>
            @else
                <!-- Campo editable si estamos creando -->
                <input type="text" 
                       name="RunAlumno" 
                       class="form-control @error('RunAlumno') is-invalid @enderror" 
                       value="{{ old('RunAlumno') }}" 
                       id="run_alumno" 
                       placeholder="RUN del Alumno">
            @endif
            {!! $errors->first('RunAlumno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="nombres" class="form-label">{{ __('Nombres *') }}</label>
            <input type="text" name="Nombres" class="form-control @error('Nombres') is-invalid @enderror" value="{{ old('Nombres', $alumno?->Nombres) }}" id="nombres" placeholder="Nombres del Alumno">
            {!! $errors->first('Nombres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellidos" class="form-label">{{ __('Apellidos *') }}</label>
            <input type="text" name="Apellidos" class="form-control @error('Apellidos') is-invalid @enderror" value="{{ old('Apellidos', $alumno?->Apellidos) }}" id="apellidos" placeholder="Apellidos del Alumno">
            {!! $errors->first('Apellidos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nacimiento" class="form-label">{{ __('Fecha de Nacimiento *') }}</label>
            <input type="date" name="FechaNacimiento" class="form-control @error('FechaNacimiento') is-invalid @enderror" value="{{ old('FechaNacimiento', $alumno?->FechaNacimiento) }}" id="fecha_nacimiento" placeholder="Fecha de Nacimiento">
            {!! $errors->first('FechaNacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="genero" class="form-label">{{ __('Género *') }}</label>
            <select name="Genero" class="form-control @error('Genero') is-invalid @enderror" id="genero">
                <option value="" disabled selected>Seleccione un género</option> <!-- Opción por defecto -->
                <option value="M" {{ (old('Genero', $alumno?->Genero) == 'M') ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ (old('Genero', $alumno?->Genero) == 'F') ? 'selected' : '' }}>Femenino</option>
                <option value="O" {{ (old('Genero', $alumno?->Genero) == 'O') ? 'selected' : '' }}>Otro</option>
            </select>
            {!! $errors->first('Genero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Dirección *') }}</label>
            <input type="text" name="Direccion" class="form-control @error('Direccion') is-invalid @enderror" value="{{ old('Direccion', $alumno?->Direccion) }}" id="direccion" placeholder="Dirección del Alumno">
            {!! $errors->first('Direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
