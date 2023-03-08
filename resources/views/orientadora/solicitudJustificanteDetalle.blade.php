@extends('appOrientadora')

@section('titulo')
    <h1>Solicitar justificante</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Solicitar justificante</li>
@stop

@section('contenido')
<link rel="stylesheet" href="{{asset('cssswate/main.css')}}">
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('tramites/prejustificanteAlumno', auth()->user()->name)}}" method="POST">
          @csrf 
            <div class="card-body">
            <!-- Alumno -->
            <div class = "form-group">
              <label for="">Alumno:</label>
              <input name="nombre" type="text" class= "form-control" disabled value="{{ $datosAlumno->nombre_completo }}">
            </div>
                <!-- Motivo -->
                <div class="form-group">
                    <label for="exampleSelectBorder">Motivo:</label>
                        <input name="nombre" type="text" class= "form-control" disabled value="@if($datosSolicitud->motivo == 'Otro'){{$datosSolicitud->motivo_otro}} @else {{$datosSolicitud->motivo}} @endif">
                </div>

                <!-- Otro... -->
                <div class="form-group inactive" id="OtroMotivo">
                    <label>Otro:</label>
                  </div>
                </div>

                <div class="form-group ml-4">
                    <!-- Del -->
                    </b>Se desea justificar los días día:<b>
                        @for ($i = $datosSolicitud->del; $i <=$datosSolicitud->al; $i++){{ $i }}, @endfor 
                        DE @if($datosSolicitud->mes == '01')ENERO @elseif($datosSolicitud->mes == '02')FEBRERO @elseif($datosSolicitud->mes == '03')MARZO @elseif($datosSolicitud->mes == '04')ABRIL @elseif($datosSolicitud->mes == '05')MAYO @elseif($datosSolicitud->mes == '06')JUNIO @elseif($datosSolicitud->mes == '07')JULIO @elseif($datosSolicitud->mes == '08')AGOSTO @elseif($datosSolicitud->mes == '09')SEPTIEMBRE @elseif($datosSolicitud->mes == '10')OCTUBRE@elseif($datosSolicitud->mes == '11')NOVIEMBRE@elseif($datosSolicitud->mes == '12')DICIEMBRE @endif 
                        del {{$datosSolicitud->ano}}</b> del presente año. 
                    <br><br>
                </div>

                <div class="form-group ml-4">
                _____________________   <br>
                |---------------------------------|   <br>    
                |-------Foto evidencia-------|   <br>
                |---------------------------------|   <br>
                |---------------------------------|   <br>
                _____________________
                </div>

                        
                <!-- /.card-body -->
                <div class="form-group ml-4">
                  <button type="submit" class="btn btn-primary">Confirmar</button>
                  <button type="submit" class="btn btn-primary">Confirmar y Descargar</button>
                  <button type="submit" class="btn btn-primary">Denegar</button>
                </div>
          </form>
        </div>
      </div>
  </div>
<script src="{{ asset('jsswate/main.js') }}"></script>
@stop
