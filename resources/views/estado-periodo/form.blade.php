<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group">
    <label for="NombreEstado">Estado *</label>
    <select name="NombreEstado" id="NombreEstado" class="form-control" required>
        <option value="">Seleccione un estado</option>
        <option value="Activo" {{ old('NombreEstado', $estado->NombreEstado ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Finalizado" {{ old('NombreEstado', $estado->NombreEstado ?? '') == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
    </select>
    @error('NombreEstado')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>