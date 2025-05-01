<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        img {
            width: 200px;
            height: auto;
        }

    </style>
</head>

<body>
    <h1>Ficha de la obra</h1>
    <img src="{{ public_path('qrcode_' . $obra->id . '.png') }}" alt="Código QR">
    <p><strong>Número de obra:</strong></p>
    <p>{{ $obra->numero }}</p>
    <p><strong>Nombre de la obra:</strong></p>
    <p>{{ $obra->nombre }}</p>
    <p><strong>Objeto de la obra:</strong></p>
    <p>{{ $obra->objeto }}</p>
    <img src="{{ public_path('qrcode_' . $obra->id . '.png') }}" alt="Código QR">
</body>

</html>
