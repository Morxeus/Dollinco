<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Calificaciones</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            height: 80px;
        }
        .header h1 {
            margin: 0;
            text-align: center;
        }
        .school-info {
            text-align: center;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: center;
            padding: 8px;
        }
        .observation {
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/logo_colegio.png') }}" alt="Logo Colegio" class="logo">
        <h1>Informe de Calificaciones</h1>
        <span>Chile, {{ \Carbon\Carbon::now()->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}</span>
    </div>

    <div class="school-info">
        <p><strong>Escuela:</strong> Escuela Dollinco</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Asignatura</th>
                <th>Evaluación</th>
                <th>Promedio de Notas</th>
                <th>Observación</th>
                <th>Asistencia (%)</th> <!-- Nueva columna para asistencia -->
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                <tr>
                    <td>{{ $nota->NombreAlumno }} {{ $nota->ApellidoAlumno }}</td>
                    <td>{{ $nota->NombreAsignatura }}</td>
                    <td>{{ $nota->NombreEvaluacion }}</td>
                    <td>{{ number_format($nota->PromedioNotas, 2) }}</td>
                    <td>{{ $nota->Observacion }}</td>
                    <td>{{ number_format($nota->PorcentajeAsistencia, 2) }}%</td> <!-- Mostrar el porcentaje de asistencia -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="observation">
        <p><strong>Nota:</strong> Este informe refleja el desempeño académico promedio de los estudiantes según los registros disponibles.</p>
    </div>
</body>
</html>
