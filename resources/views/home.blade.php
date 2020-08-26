<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi primera vista</title>
</head>

<body>
    <h1>
        Hola Mundo mundo Laravel - {{ "Hola Mundo $nombre $apellido " }}
    </h1>
    <ul>
        <li><a href="{{ route('estructuras') }}">Estructuras de control y ciclos</a></li>
    </ul>
</body>

</html>
