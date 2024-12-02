<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="run_apoderado" class="form-label">{{ __('RunApoderado') }}</label>
            @if (isset($apoderado) && $apoderado->exists)
                <!-- Mostrar el campo como readonly si estamos editando -->
                <input type="text" 
                       name="RunApoderado" 
                       class="form-control @error('RunApoderado') is-invalid @enderror" 
                       value="{{ old('RunApoderado', $apoderado->RunApoderado) }}" 
                       id="run_apoderado" 
                       placeholder="RunApoderado"
                       readonly>
            @else
                <!-- Campo editable si estamos creando -->
                <input type="text" 
                       name="RunApoderado" 
                       class="form-control @error('RunApoderado') is-invalid @enderror" 
                       value="{{ old('RunApoderado') }}" 
                       id="run_apoderado" 
                       placeholder="RunApoderado">
            @endif
            {!! $errors->first('RunApoderado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        
        <div class="form-group mb-2">
            <label for="nombres">{{ __('Nombres') }}</label>
            <input type="text" 
                   name="Nombres" 
                   class="form-control @error('Nombres') is-invalid @enderror" 
                   value="{{ old('Nombres', $apoderado?->Nombres) }}" 
                   placeholder="Nombres completos">
            {!! $errors->first('Nombres', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group mb-2">
            <label for="apellidos">{{ __('Apellidos') }}</label>
            <input type="text" 
                   name="Apellidos" 
                   class="form-control @error('Apellidos') is-invalid @enderror" 
                   value="{{ old('Apellidos', $apoderado?->Apellidos) }}" 
                   placeholder="Apellidos completos">
            {!! $errors->first('Apellidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group mb-2">
            <label for="correo">{{ __('Correo') }}</label>
            <input type="email" 
                   name="Correo" 
                   class="form-control @error('Correo') is-invalid @enderror" 
                   value="{{ old('Correo', $apoderado?->Correo) }}" 
                   placeholder="correo@ejemplo.com">
            {!! $errors->first('Correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group mb-2">
            <label for="telefono">{{ __('Teléfono') }}</label>
            <input type="text" 
                   name="Telefono" 
                   id="telefono" 
                   class="form-control @error('Telefono') is-invalid @enderror" 
                   value="{{ old('Telefono', $apoderado?->Telefono) }}" 
                   placeholder="Ej: +56912345678">
            {!! $errors->first('Telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

        <div class="form-group mb-2">
            <label for="genero">{{ __('Género') }}</label>
            <select name="Genero" class="form-control @error('Genero') is-invalid @enderror">
                <option value="" disabled {{ old('Genero', $apoderado?->Genero) ? '' : 'selected' }}>Seleccione un género</option>
                <option value="M" {{ old('Genero', $apoderado?->Genero) === 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('Genero', $apoderado?->Genero) === 'F' ? 'selected' : '' }}>Femenino</option>
                <option value="O" {{ old('Genero', $apoderado?->Genero) === 'O' ? 'selected' : '' }}>Otro</option>
            </select>
            {!! $errors->first('Genero', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group mb-2">
            <label for="direccion">{{ __('Dirección') }}</label>
            <input type="text" 
                   name="Direccion" 
                   class="form-control @error('Direccion') is-invalid @enderror" 
                   value="{{ old('Direccion', $apoderado?->Direccion) }}" 
                   placeholder="Dirección completa">
            {!! $errors->first('Direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
