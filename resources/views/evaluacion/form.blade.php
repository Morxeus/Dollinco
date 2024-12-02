<div class="row padding-1 p-1">
    <div class="col-md-12">
        

        <div class="form-group mb-2 mb20">
            <label for="fecha_evaluacion" class="form-label">{{ __('Fechaevaluacion') }}</label>
            <input type="date" name="FechaEvaluacion" class="form-control @error('FechaEvaluacion') is-invalid @enderror" value="{{ old('FechaEvaluacion', $evaluacion?->FechaEvaluacion) }}" id="fecha_evaluacion" placeholder="Fechaevaluacion">
            {!! $errors->first('FechaEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nota" class="form-label">{{ __('Nota') }}</label>
            <input type="text" name="Nota" class="form-control @error('Nota') is-invalid @enderror" 
                   value="{{ old('Nota', $evaluacion?->Nota) }}" id="nota" placeholder="Nota" 
                   pattern="^[0-7](\.[0-9]+)?$" title="Ingrese un número decimal entre 0 y 7 con punto decimal.">
            {!! $errors->first('Nota', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>