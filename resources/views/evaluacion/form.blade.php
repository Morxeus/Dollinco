<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_evaluacion" class="form-label">{{ __('Idevaluacion') }}</label>
            <input type="text" name="IdEvaluacion" class="form-control @error('IdEvaluacion') is-invalid @enderror" value="{{ old('IdEvaluacion', $evaluacion?->IdEvaluacion) }}" id="id_evaluacion" placeholder="Idevaluacion">
            {!! $errors->first('IdEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_evaluacion" class="form-label">{{ __('Nombreevaluacion') }}</label>
            <input type="text" name="NombreEvaluacion" class="form-control @error('NombreEvaluacion') is-invalid @enderror" value="{{ old('NombreEvaluacion', $evaluacion?->NombreEvaluacion) }}" id="nombre_evaluacion" placeholder="Nombreevaluacion">
            {!! $errors->first('NombreEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_evaluacion" class="form-label">{{ __('Descripcionevaluacion') }}</label>
            <input type="text" name="DescripcionEvaluacion" class="form-control @error('DescripcionEvaluacion') is-invalid @enderror" value="{{ old('DescripcionEvaluacion', $evaluacion?->DescripcionEvaluacion) }}" id="descripcion_evaluacion" placeholder="Descripcionevaluacion">
            {!! $errors->first('DescripcionEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_evaluacion" class="form-label">{{ __('Fechaevaluacion') }}</label>
            <input type="text" name="FechaEvaluacion" class="form-control @error('FechaEvaluacion') is-invalid @enderror" value="{{ old('FechaEvaluacion', $evaluacion?->FechaEvaluacion) }}" id="fecha_evaluacion" placeholder="Fechaevaluacion">
            {!! $errors->first('FechaEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>