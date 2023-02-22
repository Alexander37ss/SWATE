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
        .header{
            top: -25px;
            position: absolute;
            width: 650px;
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
        <img class="header" src="{{asset('img/header.jpg')}}">
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

    Nombre: <span class="datosalumno">{{ $alumno->nombre }}</span><br>
    <span>Control: <b>20325061070401</b></span><br>
    <span>Carrera: <b>PROGRAMACION</b></span><br>
    <span>Semestre: <b>SEXTO</b></span><br>
    <span>Grupo: <b>A</b></span><br>
    <span>Turno: <b>VESPERTINO</b></span><br>
    <span>Periodo escolar: <b>FEB-JUL 2023, que comprende del 01/FEB2023 al 06/JUL/2023</b></span><br>
    <span>Periodo vacacional: <b>Del 01/ABR/2023 al 15/ABR/2023 y del 07/JUL/2023 al 06/AGO/2023</b></span><br>
    <span>Clave: <b>25DCT0107I</b></span><br>
    <span>Modo: <b>PRESENCIAL</b></span><br><br>
    <span>Se extiende la presente en la ciudad de <b>CULIACAN, SINALOA;</b> al dia <b>21</b> del mes de <b>FEBRERO</b> del año <b>2023</b> para los fines legales que al interesado(a) convengan.</span>
    <br><br>
    <p align="center"><b>A T E N T A M E N T E</b></p>
    <br>
    <p align="center"><b>____________________________________</b></p>
    <br>
    <p align="center"><b>GABRIEL G. VAZQUEZ MARTINEZ</b></p>
    <p align="center"><b>DIRECTOR DEL PLANTEL</b></p>
</div>
<br><br><br><br><br><br><br><br>
<footer class="main-footer"><img src="{{asset('img/footer.jpg')}}" alt=""></footer>
</body>
</html>