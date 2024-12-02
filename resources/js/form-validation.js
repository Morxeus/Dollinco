document.addEventListener('DOMContentLoaded', function() {
    const runAlumnoInput = document.getElementById('run_alumno');
    if (runAlumnoInput) {
        runAlumnoInput.addEventListener('input', function() {
            this.value = formatRUT(this.value);
        });
    }

    function formatRUT(rut) {
        rut = rut.replace(/[^\dkK]/g, ''); // Solo permite dígitos y "K"
        return rut.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.').replace(/(\d+)([kK0-9])$/, '$1-$2');
    }
});
