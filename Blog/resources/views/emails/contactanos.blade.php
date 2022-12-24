<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Correo electrónico</h1>
    <p>Nombre: {{ $contacto['name'] }}</p>
    <p>Correo: {{ $contacto['email'] }}</p>
    <p>Asunto: {{ $contacto['subject'] }}</p>
    <p>Contenido: {{ $contacto['content'] }}</p>
</body>
</html>