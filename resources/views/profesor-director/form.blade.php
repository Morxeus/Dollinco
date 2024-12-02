<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="run_profesor" class="form-label">{{ __('Run Profesor') }}</label>
            @if (isset($profesorDirector) && $profesorDirector->exists)
                <input type="text" 
                       name="RunProfesor" 
                       class="form-control @error('RunProfesor') is-invalid @enderror" 
                       value="{{ old('RunProfesor', $profesorDirector->RunProfesor) }}" 
                       id="run_profesor" 
                       readonly>
            @else
                <input type="text" 
                       name="RunProfesor" 
                       class="form-control @error('RunProfesor') is-invalid @enderror" 
                       value="{{ old('RunProfesor') }}" 
                       id="run_profesor">
            @endif
            {!! $errors->first('RunProfesor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombres" class="form-label">{{ __('Nombres') }}</label>
            <input type="text" 
                   name="Nombres" 
                   class="form-control @error('Nombres') is-invalid @enderror" 
                   value="{{ old('Nombres', $profesorDirector?->Nombres) }}" 
                   id="nombres">
            {!! $errors->first('Nombres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellidos" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" 
                   name="Apellidos" 
                   class="form-control @error('Apellidos') is-invalid @enderror" 
                   value="{{ old('Apellidos', $profesorDirector?->Apellidos) }}" 
                   id="apellidos">
            {!! $errors->first('Apellidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo" class="form-label">{{ __('Correo') }}</label>
            <input type="email" 
                   name="Correo" 
                   class="form-control @error('Correo') is-invalid @enderror" 
                   value="{{ old('Correo', $profesorDirector?->Correo) }}" 
                   id="correo">
            {!! $errors->first('Correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" 
                   name="telefono" 
                   class="form-control @error('telefono') is-invalid @enderror" 
                   value="{{ old('telefono', $profesorDirector?->telefono) }}" 
                   id="telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
