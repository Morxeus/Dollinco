<!DOCTYPE html>
<html>
<head>
    <title>Notificación de Reunión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
        }
        .header {
            background-color: #0056b3;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            color: #333333;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666666;
            margin-top: 20px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Notificación de Reunión</h1>
        </div>
        <div class="content">
            <p>Estimado apoderado,</p>

            <p>Se le informa que tiene una reunión agendada. A continuación, los detalles:</p>
            <ul>
                <li><strong>Tipo de Reunión:</strong> {{ $reunion['TipoReunion'] }}</li>
                <li><strong>Descripción:</strong> {{ $reunion['DescripcionReunion'] }}</li>
                <li><strong>Fecha y Hora:</strong> {{ $reunion['FechaInicio'] }}</li>
            </ul>

            <p>Por favor, tome nota de esta información.</p>

            <p>Saludos cordiales,</p>
            <p><strong>Equipo de Coordinación</strong></p>
        </div>
        <div class="footer">
            Este correo es informativo. Por favor, no responda a este mensaje.
        </div>
    </div>
</body>
</html>
