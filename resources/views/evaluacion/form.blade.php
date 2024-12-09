<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="nombre_evaluacion" class="form-label">{{ __('Nombre de la evaluación *') }}</label>
            <input type="text" name="NombreEvaluacion" class="form-control @error('NombreEvaluacion') is-invalid @enderror" value="{{ old('NombreEvaluacion', $evaluacion?->NombreEvaluacion) }}" id="nombre_evaluacion" placeholder="Nombre de la evaluación">
            {!! $errors->first('NombreEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_evaluacion" class="form-label">{{ __('Descripción de la evaluación') }}</label>
            <textarea name="DescripcionEvaluacion" 
                      class="form-control @error('DescripcionEvaluacion') is-invalid @enderror" 
                      id="descripcion_evaluacion" 
                      rows="4" 
                      placeholder="Descripción de la evaluación">{{ old('DescripcionEvaluacion', $evaluacion?->DescripcionEvaluacion) }}</textarea>
            {!! $errors->first('DescripcionEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="fecha_evaluacion" class="form-label">{{ __('Fecha de la evaluación *') }}</label>
            <input type="date" name="FechaEvaluacion" class="form-control @error('FechaEvaluacion') is-invalid @enderror" value="{{ old('FechaEvaluacion', $evaluacion?->FechaEvaluacion) }}" id="fecha_evaluacion" placeholder="Fecha de la evaluación">
            {!! $errors->first('FechaEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
