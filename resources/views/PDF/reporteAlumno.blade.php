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
    <h1>Reporte Generico</h1>
    <hr>
    <h5>{{ $alumno->id }}</h5>
    <h5>{{ $alumno->nombre }}</h5>
    <h5>{{ $alumno->edad }}</h5>
    @foreach ($alumnos as $a)
        <h5>Sexo: Femenino</h5>
    @else
        <h5>Sexo: Masculino</h5>
    @endforeach
</body>
</html>
