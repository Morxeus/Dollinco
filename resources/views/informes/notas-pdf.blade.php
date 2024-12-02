<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Notas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Informe de Notas</h1>
    <p>Apoderado ID: {{ $apoderadoId }}</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>RUN</th>
                <th>Alumno</th>
                <th>Fecha Nacimiento</th>
                <th>Curso</th>
                <th>Asignatura</th>
                <th>Fecha Evaluación</th>
                <th>Nota</th>
                <th>Desempeño</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                <tr>
                    <td>{{ $nota->RUN }}</td>
                    <td>{{ $nota->Alumno }}</td>
                    <td>{{ $nota->FechaNacimiento }}</td>
                    <td>{{ $nota->Curso }}</td>
                    <td>{{ $nota->Asignatura }}</td>
                    <td>{{ $nota->FechaEvaluacion }}</td>
                    <td>{{ $nota->Nota }}</td>
                    <td>{{ $nota->Desempeño }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
