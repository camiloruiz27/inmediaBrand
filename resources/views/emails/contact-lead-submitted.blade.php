<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo lead desde Inmedia Brand</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1a1a1a; line-height: 1.6;">
    <h1 style="font-size: 20px; margin-bottom: 16px;">Nuevo lead desde Inmedia Brand</h1>
    <p><strong>Nombre completo:</strong> {{ $lead['nombre_completo'] }}</p>
    <p><strong>Empresa:</strong> {{ $lead['empresa'] }}</p>
    <p><strong>Correo corporativo:</strong> {{ $lead['correo_corporativo'] }}</p>
    <p><strong>Teléfono:</strong> {{ $lead['telefono'] }}</p>
    <p><strong>Proyecto:</strong></p>
    <p>{{ $lead['proyecto'] }}</p>
</body>
</html>
