<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        .encabezado {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 80px;
            height: auto;
        }
        .titulo {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .contenido {
            text-align: justify;
            margin-top: 30px;
        }
        .firma {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="encabezado">
        <img src="{{ public_path('img/logo_colegio.png') }}" alt="Logo Colegio" class="logo">
        <div class="titulo">{{ $colegio['nombre'] }}</div>
        <div>Región del BioBío</div>
    </div>
    <div class="contenido">
        <p>
        Certifico que el alumno: 
        <strong>{{ $alumno['nombre'] }} {{ $alumno['apellido'] }}</strong>, 
        RUT: <strong>{{ $alumno['rut'] }}</strong>, es alumno regular del 
        establecimiento rural <strong>{{ $colegio['nombre'] }}</strong>, 
        Región del BioBío.
        </p>
        <p>
        Se extiende el presente certificado a petición del apoderado: 
        <strong>{{ $apoderado['nombre'] }} {{ $apoderado['apellido'] }}</strong>, 
        RUT: <strong>{{ $apoderado['rut'] }}</strong>, para los fines que estime convenientes.
        </p>

        <p>
            Los Ángeles, {{ $fecha }}
        </p>
    </div>
    <div class="firma">
        ____________________________________ <br>
        Firma y Sello
    </div>
</body>
</html>





