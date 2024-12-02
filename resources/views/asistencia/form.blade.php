<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="Fecha" class="form-control @error('Fecha') is-invalid @enderror" value="{{ old('Fecha', $asistencia?->Fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('Fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado_asistencia" class="form-label">{{ __('Estadoasistencia') }}</label>
            <input type="text" name="EstadoAsistencia" class="form-control @error('EstadoAsistencia') is-invalid @enderror" value="{{ old('EstadoAsistencia', $asistencia?->EstadoAsistencia) }}" id="estado_asistencia" placeholder="Estadoasistencia">
            {!! $errors->first('EstadoAsistencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>