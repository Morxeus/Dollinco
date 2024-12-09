<div class="row g-3 p-3">
    <div class="col-md-6">
    <div class="form-group">
    <label for="id_malla" class="form-label">{{ __('Malla *') }}</label>
    <select name="IdMalla" id="id_malla" class="form-control @error('IdMalla') is-invalid @enderror">
        <option value="">{{ __('Seleccione una malla') }}</option>
        @foreach ($mallas as $malla)
            <option value="{{ $malla->IdMalla }}" 
                {{ old('IdMalla', $registroclase?->IdMalla) == $malla->IdMalla ? 'selected' : '' }}>
                {{ $malla->NombreMalla }} - {{ $malla->asignatura->NombreAsignatura ?? 'Sin Asignatura' }}
            </option>
        @endforeach
    </select>
</div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="fecha_clase" class="form-label">{{ __('Fecha de la Clase *') }}</label>
            <input type="date" name="FechaClase" class="form-control @error('FechaClase') is-invalid @enderror" 
                value="{{ old('FechaClase', $registroclase?->FechaClase) }}" id="fecha_clase">
            {!! $errors->first('FechaClase', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="descripcion_clase" class="form-label">{{ __('Descripción de la Clase *') }}</label>
            <textarea name="DescripcionClase" id="descripcion_clase" 
                class="form-control @error('DescripcionClase') is-invalid @enderror" 
                placeholder="Ingrese una descripción">{{ old('DescripcionClase', $registroclase?->DescripcionClase) }}</textarea>
            {!! $errors->first('DescripcionClase', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-12 text-center mt-4">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>