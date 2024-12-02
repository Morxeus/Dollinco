<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="i_d_curso_asignatura" class="form-label">{{ __('Idcursoasignatura') }}</label>
            <input type="text" name="IDCursoAsignatura" class="form-control @error('IDCursoAsignatura') is-invalid @enderror" value="{{ old('IDCursoAsignatura', $malla?->IDCursoAsignatura) }}" id="i_d_curso_asignatura" placeholder="Idcursoasignatura">
            {!! $errors->first('IDCursoAsignatura', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="i_d_curso" class="form-label">{{ __('Idcurso') }}</label>
            <select name="IDCurso" class="form-control @error('IDCurso') is-invalid @enderror" id="i_d_curso">
                <option value="">{{ __('Seleccione un curso') }}</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->IDCurso }}" {{ old('IDCurso', $malla?->IDCurso) == $curso->IDCurso ? 'selected' : '' }}>
                        {{ $curso->NombreCurso }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDCurso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label class="form-label">{{ __('Asignaturas') }}</label>
            <div class="d-flex flex-wrap">
                @foreach($asignaturas as $asignatura)
                    <div class="form-check mr-3 mb-2">
                        <input type="checkbox" 
                        name="IDAsignatura[]" 
                        value="{{ $asignatura->IDAsignatura }}" 
                        class="form-check-input @error('IDAsignatura') is-invalid @enderror" 
                        id="asignatura_{{ $asignatura->IDAsignatura }}"
                        {{ in_array($asignatura->IDAsignatura, $selectedAsignaturas) ? 'checked' : '' }}>
                 
                        <label class="form-check-label" for="asignatura_{{ $asignatura->IDAsignatura }}">
                            {{ $asignatura->NombreAsignatura }}
                        </label>
                    </div>
                @endforeach
            </div>
            {!! $errors->first('IDAsignatura', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        

        <div class="form-group mb-2 mb20">
            <label for="numero_matricula" class="form-label">{{ __('Número de Matrícula') }}</label>
            <select name="NumeroMatricula" class="form-control @error('NumeroMatricula') is-invalid @enderror" id="numero_matricula">
                <option value="">{{ __('Seleccione una matrícula') }}</option>
                @foreach($matriculas as $matricula)
                    <option value="{{ $matricula->NumeroMatricula }}" {{ old('NumeroMatricula', $malla?->NumeroMatricula) == $matricula->NumeroMatricula ? 'selected' : '' }}>
                        {{ $matricula->NumeroMatricula }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('NumeroMatricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
