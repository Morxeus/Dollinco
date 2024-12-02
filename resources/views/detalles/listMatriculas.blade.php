@extends('layouts.app')

@section('template_title')
    Todas las Matrículas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-lg border-0">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white rounded-top">
                        <h4 class="mb-0">Todas las Matrículas</h4>
                        <!-- Campo de búsqueda -->
                        <div>
                            <input type="text" id="search" class="form-control" placeholder="Buscar por Número de Matrícula">
                        </div>
                    </div>

                    <div class="card-body bg-light">
                        <!-- Contenedor para el scroll horizontal -->
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table table-hover table-bordered" id="matriculasTable">
                                <thead class="table-primary">
                                    <tr class="text-center">
                                        <th style="min-width: 50px;">No</th>
                                        <th style="min-width: 150px;">N° Matrícula</th>
                                        <th style="min-width: 150px;">Fecha Inscripción</th>
                                        <th style="min-width: 150px;">Estado Matrícula</th>
                                        <th style="min-width: 150px;">RUN Alumno</th>
                                        <th style="min-width: 200px;">Nombre Alumno</th>
                                        <th style="min-width: 200px;">Apellidos Alumno</th>
                                        <th style="min-width: 200px;">Fecha Nacimiento</th>
                                        <th style="min-width: 200px;">Dirección Alumno</th>
                                        <th style="min-width: 150px;">Género Alumno</th>
                                        <th style="min-width: 150px;">RUN Apoderado</th>
                                        <th style="min-width: 200px;">Nombre Apoderado</th>
                                        <th style="min-width: 200px;">Apellidos Apoderado</th>
                                        <th style="min-width: 200px;">Correo Apoderado</th>
                                        <th style="min-width: 150px;">Teléfono</th>
                                        <th style="min-width: 200px;">Dirección Apoderado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matriculas as $index => $matricula)
                                        <tr class="text-center" onclick="showDetails({{ json_encode($matricula) }})" style="cursor: pointer;">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $matricula->NumeroMatricula }}</td>
                                            <td>{{ $matricula->FechaInscripcion }}</td>
                                            <td>{{ $matricula->estadoMatricula->EstadoMatricula ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->alumno->RunAlumno ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->alumno->Nombres ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->alumno->Apellidos ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->alumno->FechaNacimiento ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->alumno->Direccion ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->alumno->Genero ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->apoderado->RunApoderado ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->apoderado->Nombres ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->apoderado->Apellidos ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->apoderado->Correo ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->apoderado->Telefono ?? 'No disponible' }}</td>
                                            <td>{{ $matricula->apoderado->Direccion ?? 'No disponible' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos adicionales -->
    <style>
        .card {
            border-radius: 15px;
        }
        .table thead th {
            font-weight: bold;
            text-align: center; /* Alineación central de los títulos */
            padding: 12px; /* Espaciado vertical */
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table-hover tbody tr:hover {
            background-color: #e9f5ff;
            transition: background-color 0.3s;
        }
        .table-primary {
            background-color: #c8e1ff;
            color: #0c3c78;
        }
        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-control {
            width: 250px;
        }
    </style>

    <!-- JavaScript para búsqueda y alerta -->
    <script>
        // Función de búsqueda
        document.getElementById('search').addEventListener('keyup', function () {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('#matriculasTable tbody tr');

            rows.forEach(row => {
                const matricula = row.cells[1].textContent.toLowerCase();
                row.style.display = matricula.includes(query) ? '' : 'none';
            });
        });

        // Función para mostrar detalles de una matrícula
        function showDetails(matricula) {
            const message = `
                Número de Matrícula: ${matricula.NumeroMatricula}
                Fecha Inscripción: ${matricula.FechaInscripcion}
                Estado Matrícula: ${matricula.estado_matricula.EstadoMatricula ?? 'No disponible'}
                
                RUN Alumno: ${matricula.alumno.RunAlumno ?? 'No disponible'}
                Nombre Alumno: ${matricula.alumno.Nombres ?? 'No disponible'}
                Apellidos Alumno: ${matricula.alumno.Apellidos ?? 'No disponible'}
                Fecha Nacimiento Alumno: ${matricula.alumno.FechaNacimiento ?? 'No disponible'}
                Dirección Alumno: ${matricula.alumno.Direccion ?? 'No disponible'}
                Género Alumno: ${matricula.alumno.Genero ?? 'No disponible'}
                
                RUN Apoderado: ${matricula.apoderado.RunApoderado ?? 'No disponible'}
                Nombre Apoderado: ${matricula.apoderado.Nombres ?? 'No disponible'}
                Apellidos Apoderado: ${matricula.apoderado.Apellidos ?? 'No disponible'}
                Correo Apoderado: ${matricula.apoderado.Correo ?? 'No disponible'}
                Teléfono Apoderado: ${matricula.apoderado.Telefono ?? 'No disponible'}
                Dirección Apoderado: ${matricula.apoderado.Direccion ?? 'No disponible'}
            `;
            alert(message);
        }
    </script>
@endsection
