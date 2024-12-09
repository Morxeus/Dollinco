<div class="row padding-1 p-1">
    <div class="col-md-12">

        <!-- Select para Registro de Clases -->
        <div class="form-group mb-2 mb20">
            <label for="id_registro_clases" class="form-label">{{ __('Curso y Asignatura *') }}</label>
            <select name="IdRegistroClases" id="id_registro_clases" class="form-control @error('IdRegistroClases') is-invalid @enderror">
                <option value="" selected disabled>Seleccione un curso y asignatura</option>
                @foreach ($registroClases as $registroClase)
                    @if ($registroClase->malla && $registroClase->malla->curso && $registroClase->malla->asignatura)
                        <option value="{{ $registroClase->IdRegistroClases }}" 
                            {{ old('IdRegistroClases', $detalleregistroclase?->IdRegistroClases ?? '') == $registroClase->IdRegistroClases ? 'selected' : '' }}>
                            Curso: {{ $registroClase->malla->curso->NombreCurso }} - Asignatura: {{ $registroClase->malla->asignatura->NombreAsignatura }} 
                        </option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('IdRegistroClases', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <!-- Select para Evaluaciones -->
        <div class="form-group mb-2 mb20">
            <label for="id_evaluacion" class="form-label">{{ __('Evaluación') }}</label>
            <select name="IdEvaluacion" id="id_evaluacion" class="form-control @error('IdEvaluacion') is-invalid @enderror">
                <option value="" selected disabled>Seleccione una evaluación</option>
                @foreach ($evaluaciones as $evaluacion)
                    <option value="{{ $evaluacion->IdEvaluacion }}" 
                        {{ old('IdEvaluacion', $detalleregistroclase?->IdEvaluacion ?? '') == $evaluacion->IdEvaluacion ? 'selected' : '' }}>
                        {{ $evaluacion->NombreEvaluacion }} - {{ $evaluacion->FechaEvaluacion }} - {{ $evaluacion->DescripcionEvaluacion }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IdEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Select para Alumnos -->
        <div class="form-group mb-2 mb20">
            <label for="numero_matricula" class="form-label">{{ __('Alumno *') }}</label>
            <select name="NumeroMatricula" id="numero_matricula" class="form-control @error('NumeroMatricula') is-invalid @enderror">
                <option value="" selected disabled>Seleccione un alumno</option>
                @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->NumeroMatricula }}" 
                        {{ old('NumeroMatricula', $detalleregistroclase?->NumeroMatricula ?? '') == $alumno->NumeroMatricula ? 'selected' : '' }}>
                        {{ $alumno->alumno->RunAlumno }} {{ $alumno->alumno->Nombres }} {{ $alumno->alumno->Apellidos }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('NumeroMatricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo Nota Evaluación -->
        <div class="form-group mb-2 mb20">
            <label for="nota_evaluacion" class="form-label">{{ __('Nota Evaluación ') }}</label>
            <input type="text" name="NotaEvaluacion" class="form-control @error('NotaEvaluacion') is-invalid @enderror" 
                value="{{ old('NotaEvaluacion', $detalleregistroclase?->NotaEvaluacion ?? '') }}" 
                id="nota_evaluacion" placeholder="Nota de la evaluación">
            {!! $errors->first('NotaEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo Asistencia -->
        <div class="form-group mb-2 mb20">
            <label for="id_asistencia" class="form-label">{{ __('Asistencia ') }}</label>
            <select name="IdAsistencia" id="id_asistencia" class="form-control @error('IdAsistencia') is-invalid @enderror">
                <option value="" selected disabled>Seleccione una asistencia</option>
                @foreach ($asistencias as $asistencia)
                    <option value="{{ $asistencia->IdAsistencia }}" 
                        {{ old('IdAsistencia', $detalleregistroclase?->IdAsistencia ?? '') == $asistencia->IdAsistencia ? 'selected' : '' }}>
                        {{ $asistencia->EstadoAsistencia }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IdAsistencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
