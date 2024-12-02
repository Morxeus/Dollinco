<div class="row padding-1 p-1">
    <div class="col-md-12">
        

        <div class="form-group mb-2 mb20">
            <label for="i_d_registrode_clase" class="form-label">{{ __('Idregistrodeclase') }}</label>
            <select name="IDRegistrodeClase" class="form-control @error('IDRegistrodeClase') is-invalid @enderror" id="i_d_registrode_clase">
                <option value="">{{ __('Seleccione un registro de clase') }}</option>
                @foreach($registrosdeClases as $registrodeClase)
                    <option value="{{ $registrodeClase->IDRegistrodeClase }}" {{ old('IDRegistrodeClase', $profesorClase?->IDRegistrodeClase) == $registrodeClase->IDRegistrodeClase ? 'selected' : '' }}>
                        {{ $registrodeClase->IDRegistrodeClase }} <!-- Aquí puedes personalizar el campo mostrado -->
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDRegistrodeClase', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="run_profesor" class="form-label">{{ __('Runprofesor') }}</label>
            <select name="RunProfesor" class="form-control @error('RunProfesor') is-invalid @enderror" id="run_profesor">
                <option value="">{{ __('Seleccione un profesor') }}</option>
                @foreach($profesorDirectors as $profesor)
                    <option value="{{ $profesor->RunProfesor }}" {{ old('RunProfesor', $profesorClase?->RunProfesor) == $profesor->RunProfesor ? 'selected' : '' }}>
                        {{ $profesor->RunProfesor }} <!-- Aquí puedes personalizar el campo mostrado -->
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