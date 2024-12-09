<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="estado_matricula" class="form-label">{{ __('Estado de la Matrí­cula *') }}</label>
            <select name="EstadoMatricula" id="estado_matricula" class="form-control @error('EstadoMatricula') is-invalid @enderror">
                <option value="">{{ __('Seleccione un estado') }}</option>
                @foreach(['Confirmada', 'Pendiente', 'Rechazada', 'Anulada', 'Suspendida', 'Finalizada'] as $estado)
                    <option value="{{ $estado }}" {{ old('EstadoMatricula', $estadoMatricula?->EstadoMatricula) === $estado ? 'selected' : '' }}>
                        {{ $estado }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('EstadoMatricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    
    
        </div>
        <div class="col-md-12 mt20 mt-2">
            <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
        </div>
    </div>