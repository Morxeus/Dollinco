<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="i_d_matricula_estado" class="form-label">{{ __('Idmatriculaestado') }}</label>
            <input type="text" name="IDMatriculaEstado" class="form-control @error('IDMatriculaEstado') is-invalid @enderror" value="{{ old('IDMatriculaEstado', $estadoMatricula?->IDMatriculaEstado) }}" id="i_d_matricula_estado" placeholder="Idmatriculaestado">
            {!! $errors->first('IDMatriculaEstado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado_matricula" class="form-label">{{ __('Estadomatricula') }}</label>
            <input type="text" name="EstadoMatricula" class="form-control @error('EstadoMatricula') is-invalid @enderror" value="{{ old('EstadoMatricula', $estadoMatricula?->EstadoMatricula) }}" id="estado_matricula" placeholder="Estadomatricula">
            {!! $errors->first('EstadoMatricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>