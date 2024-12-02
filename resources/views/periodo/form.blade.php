<div class="row padding-1 p-1">
    <div class="col-md-12">
        

        <div class="form-group mb-2 mb20">
            <label for="fecha_inicio" class="form-label">{{ __('Fechainicio') }}</label>
            <input type="date" name="FechaInicio" class="form-control @error('FechaInicio') is-invalid @enderror" value="{{ old('FechaInicio', $periodo?->FechaInicio) }}" id="fecha_inicio" placeholder="Fechainicio">
            {!! $errors->first('FechaInicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_fin" class="form-label">{{ __('Fechafin') }}</label>
            <input type="date" name="FechaFin" class="form-control @error('FechaFin') is-invalid @enderror" value="{{ old('FechaFin', $periodo?->FechaFin) }}" id="fecha_fin" placeholder="Fechafin">
            {!! $errors->first('FechaFin', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado_periodo" class="form-label">{{ __('Estado del Periodo') }}</label>
            <select name="IDPeriodoE" class="form-control @error('IDPeriodoE') is-invalid @enderror" id="estado_periodo">
                <option value="">{{ __('Seleccione un estado') }}</option>
                @foreach($estados as $estado)
                    <option value="{{ $estado->IDPeriodoE }}" {{ old('IDPeriodoE', $periodo?->IDPeriodoE) == $estado->IDPeriodoE ? 'selected' : '' }}>
                        {{ $estado->NombreEstado }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDPeriodoE', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>