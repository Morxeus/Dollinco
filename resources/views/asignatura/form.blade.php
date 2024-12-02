<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group">
    <label for="NombreAsignatura">Asignatura</label>
    <select name="NombreAsignatura" id="NombreAsignatura" class="form-control" required>
        <option value="">Seleccione una asignatura</option>
        <option value="Lenguaje y Comunicación" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Lenguaje y Comunicación' ? 'selected' : '' }}>Lenguaje y Comunicación</option>
        <option value="Matemática" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Matemática' ? 'selected' : '' }}>Matemática</option>
        <option value="Ciencias Naturales" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Ciencias Naturales' ? 'selected' : '' }}>Ciencias Naturales</option>
        <option value="Historia, Geografía y Ciencias Sociales" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Historia, Geografía y Ciencias Sociales' ? 'selected' : '' }}>Historia, Geografía y Ciencias Sociales</option>
        <option value="Educación Física y Salud" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Educación Física y Salud' ? 'selected' : '' }}>Educación Física y Salud</option>
        <option value="Artes Visuales" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Artes Visuales' ? 'selected' : '' }}>Artes Visuales</option>
        <option value="Música" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Música' ? 'selected' : '' }}>Música</option>
        <option value="Tecnología" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
        <option value="Inglés" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Inglés' ? 'selected' : '' }}>Inglés</option>
        <option value="Religión" {{ old('NombreAsignatura', $asignatura->NombreAsignatura ?? '') == 'Religión' ? 'selected' : '' }}>Religión</option>
    </select>
    @error('NombreAsignatura')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
