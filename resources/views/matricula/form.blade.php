<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="numero_matricula" class="form-label">{{ __('Numeromatricula') }}</label>
            <input type="text" name="NumeroMatricula" class="form-control @error('NumeroMatricula') is-invalid @enderror" value="{{ old('NumeroMatricula', $matricula?->NumeroMatricula) }}" id="numero_matricula" placeholder="Numeromatricula">
            {!! $errors->first('NumeroMatricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="run_alumno" class="form-label">{{ __('Run del Alumno') }}</label>
            <select name="RunAlumno" class="form-control @error('RunAlumno') is-invalid @enderror" id="run_alumno">
                <option value="">{{ __('Seleccione un alumno') }}</option>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->RunAlumno }}" {{ old('RunAlumno', $matricula?->RunAlumno) == $alumno->RunAlumno ? 'selected' : '' }}>
                        {{ $alumno->RunAlumno }} - {{ $alumno->Nombres }} {{ $alumno->Apellidos }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('RunAlumno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="run_apoderado" class="form-label">{{ __('Run del Apoderado') }}</label>
            <select name="RunApoderado" class="form-control @error('RunApoderado') is-invalid @enderror" id="run_apoderado">
                <option value="">{{ __('Seleccione un apoderado') }}</option>
                @foreach($apoderados as $apoderado)
                    <option value="{{ $apoderado->RunApoderado }}" {{ old('RunApoderado', $matricula?->RunApoderado) == $apoderado->RunApoderado ? 'selected' : '' }}>
                        {{ $apoderado->RunApoderado }} - {{ $apoderado->Nombres }}  {{ $apoderado->Apellidos }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('RunApoderado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_inscripcion" class="form-label">{{ __('Fechainscripcion') }}</label>
            <input type="date" name="FechaInscripcion" class="form-control @error('FechaInscripcion') is-invalid @enderror" value="{{ old('FechaInscripcion', $matricula?->FechaInscripcion) }}" id="fecha_inscripcion" placeholder="Fechainscripcion">
            {!! $errors->first('FechaInscripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="i_d_matricula_estado" class="form-label">{{ __('Estado de Matrícula') }}</label>
            <select name="IDMatriculaEstado" class="form-control @error('IDMatriculaEstado') is-invalid @enderror" id="i_d_matricula_estado">
                <option value="">{{ __('Seleccione un estado de matrícula') }}</option>
                @foreach($estadoMatriculas as $estado)
                    <option value="{{ $estado->IDMatriculaEstado }}" {{ old('IDMatriculaEstado', $matricula?->IDMatriculaEstado) == $estado->IDMatriculaEstado ? 'selected' : '' }}>
                        {{ $estado->EstadoMatricula }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDMatriculaEstado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>