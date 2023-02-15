<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte PDF Generico</title>
    <style>
        h3{
            background-color: blue;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid black;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <h1>Datos del alumno</h1><hr>
    <h5>ID: {{ $alumno->id }}</h5>
    <h5>Nombre: {{ $alumno->nombre }}</h5>
    <h5>Edad: {{ $alumno->edad }}</h5>
    @if ($alumno->sexo == 0)
        <h5>Sexo: Femenino</h5>
    @else
        <h5>Sexo: Masculino</h5>
    @endif
</body>
</html>