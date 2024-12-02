<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_registro_clases" class="form-label">{{ __('Idregistroclases') }}</label>
            <input type="text" name="IdRegistroClases" class="form-control @error('IdRegistroClases') is-invalid @enderror" value="{{ old('IdRegistroClases', $registroclase?->IdRegistroClases) }}" id="id_registro_clases" placeholder="Idregistroclases">
            {!! $errors->first('IdRegistroClases', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_malla" class="form-label">{{ __('Idmalla') }}</label>
            <input type="text" name="IdMalla" class="form-control @error('IdMalla') is-invalid @enderror" value="{{ old('IdMalla', $registroclase?->IdMalla) }}" id="id_malla" placeholder="Idmalla">
            {!! $errors->first('IdMalla', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_clase" class="form-label">{{ __('Fechaclase') }}</label>
            <input type="text" name="FechaClase" class="form-control @error('FechaClase') is-invalid @enderror" value="{{ old('FechaClase', $registroclase?->FechaClase) }}" id="fecha_clase" placeholder="Fechaclase">
            {!! $errors->first('FechaClase', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_clase" class="form-label">{{ __('Descripcionclase') }}</label>
            <input type="text" name="DescripcionClase" class="form-control @error('DescripcionClase') is-invalid @enderror" value="{{ old('DescripcionClase', $registroclase?->DescripcionClase) }}" id="descripcion_clase" placeholder="Descripcionclase">
            {!! $errors->first('DescripcionClase', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>