<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_reunion" class="form-label">{{ __('Idreunion') }}</label>
            <input type="text" name="IdReunion" class="form-control @error('IdReunion') is-invalid @enderror" value="{{ old('IdReunion', $reunion?->IdReunion) }}" id="id_reunion" placeholder="Idreunion">
            {!! $errors->first('IdReunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_reunion" class="form-label">{{ __('Tiporeunion') }}</label>
            <input type="text" name="TipoReunion" class="form-control @error('TipoReunion') is-invalid @enderror" value="{{ old('TipoReunion', $reunion?->TipoReunion) }}" id="tipo_reunion" placeholder="Tiporeunion">
            {!! $errors->first('TipoReunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_inicio" class="form-label">{{ __('Fechainicio') }}</label>
            <input type="text" name="FechaInicio" class="form-control @error('FechaInicio') is-invalid @enderror" value="{{ old('FechaInicio', $reunion?->FechaInicio) }}" id="fecha_inicio" placeholder="Fechainicio">
            {!! $errors->first('FechaInicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_fin" class="form-label">{{ __('Fechafin') }}</label>
            <input type="text" name="FechaFin" class="form-control @error('FechaFin') is-invalid @enderror" value="{{ old('FechaFin', $reunion?->FechaFin) }}" id="fecha_fin" placeholder="Fechafin">
            {!! $errors->first('FechaFin', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_reunion" class="form-label">{{ __('Descripcionreunion') }}</label>
            <input type="text" name="DescripcionReunion" class="form-control @error('DescripcionReunion') is-invalid @enderror" value="{{ old('DescripcionReunion', $reunion?->DescripcionReunion) }}" id="descripcion_reunion" placeholder="Descripcionreunion">
            {!! $errors->first('DescripcionReunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="run_profesor" class="form-label">{{ __('Runprofesor') }}</label>
            <input type="text" name="RunProfesor" class="form-control @error('RunProfesor') is-invalid @enderror" value="{{ old('RunProfesor', $reunion?->RunProfesor) }}" id="run_profesor" placeholder="Runprofesor">
            {!! $errors->first('RunProfesor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>