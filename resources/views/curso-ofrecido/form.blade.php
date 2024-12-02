<div class="row padding-1 p-1">
    <div class="col-md-12">
        

        <div class="form-group mb-2 mb20">
            <label for="año" class="form-label">{{ __('Año') }}</label>
            <input type="date" name="Año" class="form-control @error('Año') is-invalid @enderror" value="{{ old('Año', $cursoOfrecido?->Año) }}" id="año" placeholder="Año">
            {!! $errors->first('Año', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="curso" class="form-label">{{ __('Seleccione un curso') }}</label>
            <select name="IDCurso" class="form-control @error('IDCurso') is-invalid @enderror" id="curso">
                <option value="">{{ __('Seleccione un curso') }}</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->IDCurso }}" {{ old('IDCurso', $cursoOfrecido?->IDCurso) == $curso->IDCurso ? 'selected' : '' }}>
                        {{ $curso->NombreCurso }} - {{ \Carbon\Carbon::parse($curso->Año)->format('Y') }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDCurso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="letra" class="form-label">{{ __('Letra') }}</label>
            <input type="text" name="Letra" class="form-control @error('Letra') is-invalid @enderror" value="{{ old('Letra', $cursoOfrecido?->Letra) }}" id="letra" placeholder="Letra">
            {!! $errors->first('Letra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cupos" class="form-label">{{ __('Cupos') }}</label>
            <input type="text" name="Cupos" class="form-control @error('Cupos') is-invalid @enderror" value="{{ old('Cupos', $cursoOfrecido?->Cupos) }}" id="cupos" placeholder="Cupos">
            {!! $errors->first('Cupos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="i_d_periodo" class="form-label">{{ __('Seleccione un periodo') }}</label>
            <select name="IDPeriodo" class="form-control @error('IDPeriodo') is-invalid @enderror" id="periodo">
                <option value="">{{ __('Seleccione un periodo') }}</option>
                @foreach($periodos as $periodo)
                    <option value="{{ $periodo->IDPeriodo }}" {{ old('IDPeriodo', $cursoOfrecido?->IDPeriodo) == $periodo->IDPeriodo ? 'selected' : '' }}>
                        {{ $periodo->FechaInicio }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IDPeriodo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>