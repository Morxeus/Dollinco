<div class="row padding-1 p-1">
    <div class="col-md-12">
        


        <div class="form-group">
    <label for="TipoAnotacion">Tipo de Anotación</label>
    <select name="TipoAnotacion" id="TipoAnotacion" class="form-control" required>
        <option value="">Seleccione un tipo de Anotación</option>
        <option value="Positiva" {{ old('TipoAnotacion', $anotacion->TipoAnotacion ?? '') == 'Positiva' ? 'selected' : '' }}>Positiva</option>
        <option value="Positiva (Curso)" {{ old('TipoAnotacion', $anotacion->TipoAnotacion ?? '') == 'Positiva (Curso)' ? 'selected' : '' }}>Positiva (Curso)</option>
        <option value="Negativa" {{ old('TipoAnotacion', $anotacion->TipoAnotacion ?? '') == 'Negativa' ? 'selected' : '' }}>Negativa</option>
        <option value="Negativa (Curso)" {{ old('TipoAnotacion', $anotacion->TipoAnotacion ?? '') == 'Negativa (Curso)' ? 'selected' : '' }}>Negativa (Curso)</option>
    </select>
    @error('TipoAnotacion')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="Fecha" class="form-control @error('Fecha') is-invalid @enderror" value="{{ old('Fecha', $anotacion?->Fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('Fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="Descripcion" class="form-control @error('Descripcion') is-invalid @enderror" value="{{ old('Descripción', $anotacion?->Descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('Descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>