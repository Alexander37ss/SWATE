<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('cssswate/main.css')}}">
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <title>Constancia Alumno Cetis 107</title>
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
            text-align: justify;
        }
        .texto{
            line-height: 1.7; 
        }
        .datosalumno{
            text-transform: uppercase;
            font-weight: bold;
            white-space: inherit;
        }
        .piedepagina{
            position: absolute;
            top: 950px;
        }
        .fecha-lugar{
            right: 40px;
            position: absolute;
        }
        .linea{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <img class="header" src="{{asset('img/header.jpg')}}">
    </div>
    <div class="tamano">
        <br><br><br><br>
        <div class="fecha-lugar">
            Culiacán Sin., {{ $dia }} de @if($mes == '01')ENERO @elseif($mes == '02')FEBRERO @elseif($mes == '03')MARZO @elseif($mes == '04')ABRIL @elseif($mes == '05')MAYO @elseif($mes == '06')JUNIO @elseif($mes == '07')JULIO @elseif($mes == '08')AGOSTO @elseif($mes == '09')SEPTIEMBRE @elseif($mes == '10')OCTUBRE@elseif($mes == '11')NOVIEMBRE@elseif($mes == '12')DICIEMBRE @endif del {{$ano}}.
        </div>
        <br><br>
        <div align="center"><b>JUSTIFICANTE DE INASISTENCIAS</b><br></div>

    <br>
    <span class="linea">C.C. PROFESORES DEL GRUPO: </span><b>{{ $alumno->grupo }}</b><br>
    <span class="linea">ESPECIALIDAD: </span><b>{{ $alumno->carrera }}</b><br>
    <span class="linea">TURNO: </span><b class="datosalumno">{{ $alumno->turno }}</b><br>
    <span class="linea">P R E S E N T E.</span>
    <br><br>
    <div class="texto">
        Por este conducto, solicito le sea(n) justificada(s) las inasistencias al alumno(s): 
        <b>{{ $alumno->nombre_completo}}</b> quien, por motivos <b>
        @if($motivo == 'Otro'){{$otro}} @else {{$motivo}} @endif
        </b>, no asistió a clase el(los) dia(s):<b>
        @for ($i = $del; $i <=$al; $i++) {{ $i }}, @endfor 
        DE @if($mes == '01')ENERO @elseif($mes == '02')FEBRERO @elseif($mes == '03')MARZO @elseif($mes == '04')ABRIL @elseif($mes == '05')MAYO @elseif($mes == '06')JUNIO @elseif($mes == '07')JULIO @elseif($mes == '08')AGOSTO @elseif($mes == '09')SEPTIEMBRE @elseif($mes == '10')OCTUBRE@elseif($mes == '11')NOVIEMBRE@elseif($mes == '12')DICIEMBRE @endif del {{$ano}}</b> del presente año. 
        <br>
        Cabe señalar que es RESPONSABILIDAD del ALUMNO(A) regularizarse en la entrega de trabajos y/o tareas que el(la) profesor(a) haya encomendado, haciendo mención que el presente documento NO EXENTA al alumno de sus obligaciones académicas.
    </div>
    <br>
    <p align="center"><b>A T E N T A M E N T E</b></p>
    <br>
    <p align="center"><b>____________________________________</b></p>
    <br>
    <p align="center"><b>LIC. ROSANGEL CAMACHO GONZÁLEZ</b></p>
    <p align="center"><b>ORIENTADORA EDUCATIVA DEL 2DO. SEMESTRE</b></p>
    <br>
<!--     tabla -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Nombre del Profesor</th>
                <th>Firma</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    Fundamentos en los Artículos 31 y 80 del Reglamento Escolar del Plantel
</div>
<footer class="piedepagina"><img src="{{asset('img/footer.jpg')}}" alt=""></footer>
</body>
</html>