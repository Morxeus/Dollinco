<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_anotacion" class="form-label">{{ __('Idanotacion') }}</label>
            <input type="text" name="IdAnotacion" class="form-control @error('IdAnotacion') is-invalid @enderror" value="{{ old('IdAnotacion', $anotacion?->IdAnotacion) }}" id="id_anotacion" placeholder="Idanotacion">
            {!! $errors->first('IdAnotacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_anotacion" class="form-label">{{ __('Tipoanotacion') }}</label>
            <input type="text" name="TipoAnotacion" class="form-control @error('TipoAnotacion') is-invalid @enderror" value="{{ old('TipoAnotacion', $anotacion?->TipoAnotacion) }}" id="tipo_anotacion" placeholder="Tipoanotacion">
            {!! $errors->first('TipoAnotacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_anotacion" class="form-label">{{ __('Descripcionanotacion') }}</label>
            <input type="text" name="DescripcionAnotacion" class="form-control @error('DescripcionAnotacion') is-invalid @enderror" value="{{ old('DescripcionAnotacion', $anotacion?->DescripcionAnotacion) }}" id="descripcion_anotacion" placeholder="Descripcionanotacion">
            {!! $errors->first('DescripcionAnotacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>