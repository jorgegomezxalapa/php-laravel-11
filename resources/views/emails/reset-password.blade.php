<!DOCTYPE html>
<html>
<head>
    <title>Restablecer Contraseña</title>
</head>
<body>
    <h2>Hola, {{ $name }}</h2>
    <p>Se ha creado tu cuenta. Para actualizar tu contraseña, haz clic en el siguiente enlace:</p>
    <a href="{{ $resetLink }}">Actualizar Contraseña</a>
    <p>Si no solicitaste esto, ignora este mensaje.</p>
</body>
</html>