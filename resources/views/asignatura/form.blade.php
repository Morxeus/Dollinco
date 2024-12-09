<!-- Campo para agregar nuevas opciones -->

<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group">
            <label for="NombreAsignatura">Asignatura *</label>
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

        <div class="form-group mt-2">
            <label for="newOption">Agregar nueva asignatura</label>
            <div class="d-flex">
                <input type="text" id="newOption" class="form-control" placeholder="Escriba una nueva asignatura" />
                <button type="button" id="addOption" class="btn btn-success ml-2">Agregar</button>
            </div>
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>

<script>
    document.getElementById('addOption').addEventListener('click', function() {
        // Obtener el valor del campo de texto
        const newOptionValue = document.getElementById('newOption').value.trim();

        // Verificar que el campo no esté vacío
        if (newOptionValue === '') {
            alert('Por favor, ingrese un valor válido.');
            return;
        }

        // Crear una nueva opción para el select
        const newOption = document.createElement('option');
        newOption.value = newOptionValue;
        newOption.textContent = newOptionValue;

        // Agregar la nueva opción al select
        const select = document.getElementById('NombreAsignatura');
        select.appendChild(newOption);

        // Limpiar el campo de texto
        document.getElementById('newOption').value = '';

        // Seleccionar automáticamente la nueva opción
        select.value = newOptionValue;
    });
</script>
