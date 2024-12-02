<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="i_d_reunion" class="form-label">{{ __('Idreunion') }}</label>
            <input type="text" name="IDReunion" class="form-control @error('IDReunion') is-invalid @enderror" value="{{ old('IDReunion', $reunion?->IDReunion) }}" id="i_d_reunion" placeholder="Idreunion">
            {!! $errors->first('IDReunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_reunion" class="form-label">{{ __('Tiporeunion') }}</label>
            <select name="TipoReunion" class="form-control @error('TipoReunion') is-invalid @enderror" id="tipo_reunion">
                <option value="" disabled selected>{{ __('Seleccione un tipo de reunión') }}</option>
                <option value="A" {{ old('TipoReunion', $reunion?->TipoReunion) == 'A' ? 'selected' : '' }}>General</option>
                <option value="B" {{ old('TipoReunion', $reunion?->TipoReunion) == 'B' ? 'selected' : '' }}>Privada</option>
                <option value="C" {{ old('TipoReunion', $reunion?->TipoReunion) == 'C' ? 'selected' : '' }}>Otro</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>
            {!! $errors->first('TipoReunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="run_profesor" class="form-label">{{ __('Run Profesor') }}</label>
            <select name="RunProfesor" class="form-control @error('RunProfesor') is-invalid @enderror" id="run_profesor">
                <option value="">{{ __('Seleccione un profesor') }}</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->RunProfesor }}" {{ old('RunProfesor', $reunion?->RunProfesor) == $profesor->RunProfesor ? 'selected' : '' }}>
                        {{ $profesor->Nombres }} {{ $profesor->Apellidos }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('RunProfesor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">{{ __('Fecha') }}</label>
            <input type="date" name="Fecha" class="form-control @error('Fecha') is-invalid @enderror" value="{{ old('Fecha', $reunion?->Fecha) }}" id="fecha" placeholder="Fecha">
            {!! $errors->first('Fecha', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>