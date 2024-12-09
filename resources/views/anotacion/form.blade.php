<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="tipo_anotacion" class="form-label">{{ __('Tipo de Anotación *') }}</label>
            <select name="TipoAnotacion" 
                    id="tipo_anotacion" 
                    class="form-control @error('TipoAnotacion') is-invalid @enderror">
                <option value="" disabled selected>Seleccione un tipo</option> <!-- Opción por defecto -->
                <option value="Positiva" {{ old('TipoAnotacion', $anotacion?->TipoAnotacion) == 'Positiva' ? 'selected' : '' }}>Positiva</option>
                <option value="Negativa" {{ old('TipoAnotacion', $anotacion?->TipoAnotacion) == 'Negativa' ? 'selected' : '' }}>Negativa</option>
            </select>
            {!! $errors->first('TipoAnotacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="descripcion_anotacion" class="form-label">{{ __('Descripción de la Anotación *') }}</label>
            <textarea name="DescripcionAnotacion" 
                      id="descripcion_anotacion" 
                      class="form-control @error('DescripcionAnotacion') is-invalid @enderror" 
                      rows="4" 
                      placeholder="Ingrese una descripción">{{ old('DescripcionAnotacion', $anotacion?->DescripcionAnotacion) }}</textarea>
            {!! $errors->first('DescripcionAnotacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_detalle_registro_clase" class="form-label">{{ __('Detalle del Registro Clase *') }}</label>
            <select name="IdDetalleRegistroClase" 
                    id="id_detalle_registro_clase" 
                    class="form-control @error('IdDetalleRegistroClase') is-invalid @enderror">
                <option value="">{{ __('Seleccione un registro') }}</option>
                @foreach ($detallesRegistroClase as $detalle)
                    <option value="{{ $detalle->IdDetalleRegistroClase }}" 
                        {{ old('IdDetalleRegistroClase', $anotacion?->IdDetalleRegistroClase) == $detalle->IdDetalleRegistroClase ? 'selected' : '' }}>
                        {{ $detalle->DescripcionRegistroClase ?? 'Registro #' . $detalle->IdDetalleRegistroClase }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IdDetalleRegistroClase', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
