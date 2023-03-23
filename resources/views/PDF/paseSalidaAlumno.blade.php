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
            font-size: 10px;
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
        .dos{
            width: 650px;
        }
    </style>
</head>
<?php
    $meses = [
        "01" => 'ENERO',
        "02" => 'FEBRERO',
        "03" => 'MARZO',
        "04" => 'ABRIL',
        "05" => 'MAYO',
        "06" => 'JUNIO',
        "07" => 'JULIO',
        "08" => 'AGOSTO',
        "09" => 'SEPTIEMBRE',
        "10" => 'OCTUBRE',
        "11" => 'NOVIEMBRE',
        "12" => 'DICIEMBRE'
    ];
?>
<body>
            <!-- UNO -->
            <div class="contenedor">
        <img class="header" src="{{asset('img/header.jpg')}}">
    </div>
    <div class="tamano">
        <br><br>
        <div class="fecha-lugar">
            Culiacán Sin., {{ $fecha_solicitada->format('j') }} 
            de <?php echo($meses[ $mes ]); ?>
            del {{ $fecha_solicitada->format('Y') }}.
        </div>
        <br>
        <div align="center"><b>PASE DE SALIDA</b><br></div>

    <br>
    <span class="linea">NOMBRE: </span><b>{{ $alumno->nombre_completo }}</b><br>
    <span class="linea">HORA DE SALIDA: </span><b>{{ $hora }}</b><br>
    <span class="linea">MOTIVO DE SALIDA: </span><b class="datosalumno">{{ $motivo }}</b><br>
    <span class="linea">OBSERVACIONES: </span><b>{{ $observaciones }}</b><br>
    <br><br>
    <div class="row">
        <div class="float-left ml-5">
            <div class="text-center">
                <p><b>A T E N T A M E N T E</b></p><br>
                <p ><b>____________________________________</b></p>
                <p ><b>LIC. ROSANGEL CAMACHO GONZÁLEZ</b></p>
                <p ><b>ORIENTADORA EDUCATIVA DEL 2DO. SEMESTRE</b></p>
            </div>
        </div>
        <div>
            <div class="text-center">
                <p><b>A T E N T A M E N T E</b></p><br>
                <p><b>____________________________________</b></p>
                <p><b>{{$alumno -> nombre_completo}}</b></p>
                <p><b>PAPÁ</b></p>
            </div>
        </div>
    </div>
        <br>
        <footer ><img src="{{asset('img/footer.jpg')}}" alt=""></footer>

        <br><br><br><br><hr><br>
            <!-- DOS -->
        <img class="dos" src="{{asset('img/header.jpg')}}">
    <div class="tamano">
        <br><br>
        <div class="fecha-lugar">
            Culiacán Sin., {{ $fecha_solicitada->format('j') }} 
            de <?php echo($meses[ $mes ]); ?>
            del {{ $fecha_solicitada->format('Y') }}.
        </div>
        <br>
        <div align="center"><b>PASE DE SALIDA</b><br></div>

    <br>
    <span class="linea">NOMBRE: </span><b>{{ $alumno->nombre_completo }}</b><br>
    <span class="linea">HORA DE SALIDA: </span><b>{{ $hora }}</b><br>
    <span class="linea">MOTIVO DE SALIDA: </span><b class="datosalumno">{{ $motivo }}</b><br>
    <span class="linea">OBSERVACIONES: </span><b>{{ $observaciones }}</b><br>
    <br><br>
    <div class="row">
        <div class="float-left ml-5">
            <div class="text-center">
                <p><b>A T E N T A M E N T E</b></p><br>
                <p ><b>____________________________________</b></p>
                <p ><b>LIC. ROSANGEL CAMACHO GONZÁLEZ</b></p>
                <p ><b>ORIENTADORA EDUCATIVA DEL 2DO. SEMESTRE</b></p>
            </div>
        </div>
        <div>
            <div class="text-center">
                <p><b>A T E N T A M E N T E</b></p><br>
                <p><b>____________________________________</b></p>
                <p><b>{{$alumno -> nombre_completo}}</b></p>
                <p><b>PAPÁ</b></p>
            </div>
        </div>
    </div>
        <br>
        <footer ><img src="{{asset('img/footer.jpg')}}" alt=""></footer>
</body>
</html>