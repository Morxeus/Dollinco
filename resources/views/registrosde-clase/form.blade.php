<div class="row padding-1 p-1">
    <div class="col-md-12">
        

        <div class="form-group mb-2 mb20">
            <label for="i_d_curso_asignatura" class="form-label">{{ __('Malla') }}</label>
            <select name="IDCursoAsignatura" class="form-control @error('IDCursoAsignatura') is-invalid @enderror" id="i_d_curso_asignatura">
                <option value="">{{ __('Seleccione un curso malla') }}</option>
                @foreach($mallas as $malla)
                    <option value="{{ $malla->IDCursoAsignatura }}" {{ old('IDCursoAsignatura', $registrosdeClase?->IDCursoAsignatura) == $malla->IDCursoAsignatura ? 'selected' : '' }}>
                        {{ $malla->IDCurso }} <!-- Ajustar según tus columnas -->
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDCursoAsignatura', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="numero_matricula" class="form-label">{{ __('Número Matrícula') }}</label>
            <select name="NumeroMatricula" class="form-control @error('NumeroMatricula') is-invalid @enderror" id="numero_matricula">
                <option value="">{{ __('Seleccione una matrícula') }}</option>
                @foreach($matriculas as $matricula)
                    <option value="{{ $matricula->NumeroMatricula }}" {{ old('NumeroMatricula', $registrosdeClase?->NumeroMatricula) == $matricula->NumeroMatricula ? 'selected' : '' }}>
                        {{ $matricula->NumeroMatricula }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('NumeroMatricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="i_d_evaluacion" class="form-label">{{ __('Evaluación') }}</label>
            <select name="IDEvaluacion" class="form-control @error('IDEvaluacion') is-invalid @enderror" id="i_d_evaluacion">
                <option value="">{{ __('Seleccione una evaluación') }}</option>
                @foreach($evaluacions as $evaluacion)
                    <option value="{{ $evaluacion->IDEvaluacion }}" {{ old('IDEvaluacion', $registrosdeClase?->IDEvaluacion) == $evaluacion->IDEvaluacion ? 'selected' : '' }}>
                        {{ $evaluacion->IDEvaluacion }} <!-- Ajustar según tus columnas -->
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="i_d_asistencia" class="form-label">{{ __('Asistencia') }}</label>
            <select name="IDAsistencia" class="form-control @error('IDAsistencia') is-invalid @enderror" id="i_d_asistencia">
                <option value="">{{ __('Seleccione una asistencia') }}</option>
                @foreach($asistencias as $asistencia)
                    <option value="{{ $asistencia->IDAsistencia }}" {{ old('IDAsistencia', $registrosdeClase?->IDAsistencia) == $asistencia->IDAsistencia ? 'selected' : '' }}>
                        {{ $asistencia->IDAsistencia }} <!-- Ajustar según tus columnas -->
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDAsistencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="i_d_anotacion" class="form-label">{{ __('Anotación') }}</label>
            <select name="IDAnotacion" class="form-control @error('IDAnotacion') is-invalid @enderror" id="i_d_anotacion">
                <option value="">{{ __('Seleccione una anotación') }}</option>
                @foreach($anotacions as $anotacion)
                    <option value="{{ $anotacion->IDAnotacion }}" {{ old('IDAnotacion', $registrosdeClase?->IDAnotacion) == $anotacion->IDAnotacion ? 'selected' : '' }}>
                        {{ $anotacion->IDAnotacion }} <!-- Ajustar según tus columnas -->
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDAnotacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>