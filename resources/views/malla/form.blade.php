<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_malla" class="form-label">{{ __('Idmalla') }}</label>
            <input type="text" name="IdMalla" class="form-control @error('IdMalla') is-invalid @enderror" value="{{ old('IdMalla', $malla?->IdMalla) }}" id="id_malla" placeholder="Idmalla">
            {!! $errors->first('IdMalla', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_malla" class="form-label">{{ __('Nombremalla') }}</label>
            <input type="text" name="NombreMalla" class="form-control @error('NombreMalla') is-invalid @enderror" value="{{ old('NombreMalla', $malla?->NombreMalla) }}" id="nombre_malla" placeholder="Nombremalla">
            {!! $errors->first('NombreMalla', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_curso" class="form-label">{{ __('Idcurso') }}</label>
            <input type="text" name="IdCurso" class="form-control @error('IdCurso') is-invalid @enderror" value="{{ old('IdCurso', $malla?->IdCurso) }}" id="id_curso" placeholder="Idcurso">
            {!! $errors->first('IdCurso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_asignatura" class="form-label">{{ __('Idasignatura') }}</label>
            <input type="text" name="IdAsignatura" class="form-control @error('IdAsignatura') is-invalid @enderror" value="{{ old('IdAsignatura', $malla?->IdAsignatura) }}" id="id_asignatura" placeholder="Idasignatura">
            {!! $errors->first('IdAsignatura', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero_matricula" class="form-label">{{ __('Numeromatricula') }}</label>
            <input type="text" name="NumeroMatricula" class="form-control @error('NumeroMatricula') is-invalid @enderror" value="{{ old('NumeroMatricula', $malla?->NumeroMatricula) }}" id="numero_matricula" placeholder="Numeromatricula">
            {!! $errors->first('NumeroMatricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="run_profesor" class="form-label">{{ __('Runprofesor') }}</label>
            <input type="text" name="RunProfesor" class="form-control @error('RunProfesor') is-invalid @enderror" value="{{ old('RunProfesor', $malla?->RunProfesor) }}" id="run_profesor" placeholder="Runprofesor">
            {!! $errors->first('RunProfesor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>