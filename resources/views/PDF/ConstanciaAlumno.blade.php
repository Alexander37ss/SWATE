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
        .contenedor{
          display: flex;
        }
        .sep{
            top: -50px;
            position: absolute;
            width: 250px;
        }
        .dgeti{
            top: 50px;
            position: absolute;
            width: 150px;
            top: -4px;
            left: 280px;
        }
        .tamano{
            font-size: 15px;
            font-family: sans-serif;
        }
        .datosalumno{
            text-transform: uppercase;
            font-weight: bold;
            white-space: inherit;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <img class="sep" src="{{asset('img/seplogo.png')}}">
        <img class="dgeti" src="{{asset('img/dgetilogo.png')}}" width="200px">
    </div>
    <br><br><br><br><br>
        <div class="tamano">
        DEPTO DE: SERVICIOS ESCOLARES <br>
        OFICINA: CONTROL ESCOLAR <br>
        ASUNTO: <b>CONSTANCIA DE ESTUDIOS</b>
    <br><br>
    <b>A QUIÉN CORRESPONDA:</b>
    <br><br>
    El que suscribe, Director de Centro de Estudios, perteneciente al Sistema Educativo Nacional,
    por medio de la presente hace <b>C O N S T A R</b> que el alumno (a), cuyos datos aparecen a
    continuación, está inscrito en esta Institución Educativa en el Ciclo Escolar <b>2022-2023:</b>
    <br><br><br>

    Nombre: <span class="datosalumno">{{ $alumno->nombre }}</span>
    <h5>Edad: {{ $alumno->edad }}</h5>
    @if ($alumno->sexo == 0)
        <h5>Sexo: Femenino</h5>
    @else
        <h5>Sexo: Masculino</h5>
    @endif
    </div>
</body>
</html>