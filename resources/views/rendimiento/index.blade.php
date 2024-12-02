@extends('layouts.app')

@section('template_title')
    Visualización de Notas
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Rendimiento Académico - Visualización de Notas</h4>
                    </div>

                    <div class="card-body bg-light">
                        <h5 class="mb-4">Consultar Rendimiento Académico</h5>
                        <form id="formNotas">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="estudiante" class="form-label">Seleccionar Estudiante</label>
                                    <select id="estudiante" name="estudiante" class="form-control">
                                        <option value="" disabled selected>-- Seleccione un estudiante --</option>
                                        @foreach($estudiantes as $estudiante)
                                            <option value="{{ $estudiante->RunAlumno }}">
                                                {{ $estudiante->NombreCompleto }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="asignatura" class="form-label">Seleccionar Asignatura</label>
                                    <select id="asignatura" name="asignatura" class="form-control">
                                        <option value="" disabled selected>-- Seleccione una asignatura --</option>
                                        @foreach($asignaturas as $asignatura)
                                            <option value="{{ $asignatura->NombreAsignatura }}">
                                                {{ $asignatura->NombreAsignatura }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Consultar Notas</button>
                        </form>

                        <div class="table-responsive mt-4">
                            <h5>Notas del Estudiante</h5>
                            <table class="table table-hover table-striped table-bordered" id="tablaNotas">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Evaluación</th>
                                        <th>Fecha</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Datos dinámicos -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('formNotas').addEventListener('submit', function(e) {
            e.preventDefault();

            const estudiante = document.getElementById('estudiante').value;
            const asignatura = document.getElementById('asignatura').value;
            const tabla = document.getElementById('tablaNotas').querySelector('tbody');

            if (!estudiante || !asignatura) {
                alert('Seleccione un estudiante y una asignatura.');
                return;
            }

            fetch("{{ route('rendimiento.consultar') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ estudiante, asignatura })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la consulta');
                }
                return response.json();
            })
            .then(data => {
                tabla.innerHTML = '';
                if (data.length === 0) {
                    tabla.innerHTML = `
                        <tr>
                            <td colspan="4" class="text-center">No se encontraron notas para este estudiante y asignatura.</td>
                        </tr>
                    `;
                } else {
                    data.forEach((nota, index) => {
                        tabla.innerHTML += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${nota.Descripcion}</td>
                                <td>${nota.FechaEvaluacion}</td>
                                <td>${nota.Nota}</td>
                            </tr>
                        `;
                    });
                }
            })
            .catch(error => {
                console.error(error);
                alert('Ocurrió un error al consultar las notas.');
            });
        });
    </script>
@endsection
