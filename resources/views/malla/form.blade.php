<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombre_malla" class="form-label">{{ __('Nombre malla *') }}</label>
            <input type="text" name="NombreMalla" class="form-control @error('NombreMalla') is-invalid @enderror" value="{{ old('NombreMalla', $malla?->NombreMalla) }}" id="nombre_malla" placeholder="Nombremalla">
            {!! $errors->first('NombreMalla', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_curso" class="form-label">{{ __('Curso ofrecido *') }}</label>
            <select name="IdCurso" class="form-control @error('IdCurso') is-invalid @enderror" id="id_curso">
                <option value="">Seleccionar Curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->IDCurso }}" {{ old('IdCurso', $malla?->IdCurso) == $curso->IDCurso ? 'selected' : '' }}>
                        {{ $curso->NombreCurso }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('IdCurso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_asignaturas" class="form-label">{{ __('Asignaturas *') }}</label>
            <div>
                <input type="checkbox" id="select_all_asignaturas" onclick="toggleAsignaturas(this)"> {{ __('Seleccionar todas') }}
            </div>
            @foreach($asignaturas as $asignatura)
                <div class="form-check">
                    <input 
                        type="checkbox" 
                        name="IdAsignatura[]" 
                        class="form-check-input" 
                        id="asignatura_{{ $asignatura->IDAsignatura }}" 
                        value="{{ $asignatura->IDAsignatura }}"
                        {{ (is_array(old('IdAsignatura')) && in_array($asignatura->IDAsignatura, old('IdAsignatura', $malla->asignaturas?->pluck('IDAsignatura')->toArray() ?? []))) ? 'checked' : '' }}>
                    <label class="form-check-label" for="asignatura_{{ $asignatura->IDAsignatura }}">
                        {{ $asignatura->NombreAsignatura }}
                    </label>
                </div>
            @endforeach
            {!! $errors->first('IdAsignatura', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <script>
            function toggleAsignaturas(source) {
                checkboxes = document.querySelectorAll('input[name="IdAsignatura[]"]');
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = source.checked;
                });
            }
        </script>

        <div class="form-group mb-2 mb20">
            <label for="numero_matricula" class="form-label">{{ __('Matrícula *') }}</label>
            <select name="NumeroMatricula" class="form-control @error('NumeroMatricula') is-invalid @enderror" id="numero_matricula">
                <option value="">Seleccionar Matrícula</option>
                @foreach($matriculas as $matricula)
                    <option value="{{ $matricula->NumeroMatricula }}" {{ old('NumeroMatricula', $malla?->NumeroMatricula) == $matricula->NumeroMatricula ? 'selected' : '' }}>
                        {{ $matricula->RunAlumno }} - {{ $matricula->NumeroMatricula }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('NumeroMatricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="form-group mb-2 mb20">
            <label for="run_profesor" class="form-label">{{ __('Profesor *') }}</label>
            <select name="RunProfesor" class="form-control @error('RunProfesor') is-invalid @enderror" id="run_profesor">
                <option value="">Seleccionar Profesor</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->RunProfesor }}" {{ old('RunProfesor', $malla?->RunProfesor) == $profesor->RunProfesor ? 'selected' : '' }}>
                        {{ $profesor->Nombres }} {{ $profesor->Apellidos }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('RunProfesor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>