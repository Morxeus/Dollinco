<div class="row padding-1 p-1">
    <div class="col-md-12">
        

        <div class="form-group mb-2 mb20">
            <label for="tipo_reunion" class="form-label">{{ __('Tipo de Reunión *') }}</label>
            <select name="TipoReunion" id="tipo_reunion" class="form-control @error('TipoReunion') is-invalid @enderror">
                <option value="General" {{ old('TipoReunion', $reunion?->TipoReunion) == 'General' ? 'selected' : '' }}>General</option>
                <option value="Específica" {{ old('TipoReunion', $reunion?->TipoReunion) == 'Específica' ? 'selected' : '' }}>Específica</option>
            </select>
            {!! $errors->first('TipoReunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_inicio" class="form-label">{{ __('Fecha y hora de inicio *') }}</label>
            <input type="datetime-local" name="FechaInicio" 
                   class="form-control @error('FechaInicio') is-invalid @enderror" 
                   value="{{ old('FechaInicio', optional($reunion->FechaInicio)->format('Y-m-d\TH:i')) }}" 
                   id="fecha_inicio">
            {!! $errors->first('FechaInicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="fecha_fin" class="form-label">{{ __('Fecha y hora de fin *') }}</label>
            <input type="datetime-local" name="FechaFin" 
                   class="form-control @error('FechaFin') is-invalid @enderror" 
                   value="{{ old('FechaFin', optional($reunion->FechaFin)->format('Y-m-d\TH:i')) }}" 
                   id="fecha_fin">
            {!! $errors->first('FechaFin', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_reunion" class="form-label">{{ __('Descripción reunión') }}</label>
            <textarea name="DescripcionReunion" 
                      class="form-control @error('DescripcionReunion') is-invalid @enderror" 
                      id="descripcion_reunion" 
                      rows="4" 
                      placeholder="Descripción de la reunión">{{ old('DescripcionReunion', $reunion?->DescripcionReunion) }}</textarea>
            {!! $errors->first('DescripcionReunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="run_profesor" class="form-label">{{ __('Run Profesor *') }}</label>
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

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>