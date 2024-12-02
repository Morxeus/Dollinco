<div class="row padding-1 p-1">
    <div class="col-md-12">
        

        <div class="form-group mb-2 mb20">
            <label for="año" class="form-label">{{ __('Año') }}</label>
            <input type="date" name="Año" class="form-control @error('Año') is-invalid @enderror" value="{{ old('Año', $curso?->Año) }}" id="año" placeholder="Año">
            {!! $errors->first('Año', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_curso" class="form-label">{{ __('Nombrecurso') }}</label>
            <input type="text" name="NombreCurso" class="form-control @error('NombreCurso') is-invalid @enderror" value="{{ old('NombreCurso', $curso?->NombreCurso) }}" id="nombre_curso" placeholder="Nombrecurso">
            {!! $errors->first('NombreCurso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>