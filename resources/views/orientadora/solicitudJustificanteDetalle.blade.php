@extends('appOrientadora')

@section('titulo')
@stop

@section('contenido')
<?php 
    $meses = [
        "1" => 'ENERO',
        "2" => 'FEBRERO',
        "3" => 'MARZO',
        "4" => 'ABRIL',
        "5" => 'MAYO',
        "6" => 'JUNIO',
        "7" => 'JULIO',
        "8" => 'AGOSTO',
        "9" => 'SEPTIEMBRE',
        "10" => 'OCTUBRE',
        "11" => 'NOVIEMBRE',
        "12" => 'DICIEMBRE'
    ];
?>
<?php
 if($fdsfa = "{{ }}")
?>
            <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
            <div class="card-header">
              <div class="card-title">
                Detalles de solicitud
              </div>
            </div>
              <div class="card-body ml-2">
                <!-- Alumno -->
                <div class="form-group mb-4">
                  <p class="text-bold">Alumno</p>
                  <input type="text" class="input-github w-75 shadow-sm" disabled value="{{ $datosAlumno->nombre_completo }}">
                </div>
                <!-- Motivo -->
                <div class="form-group my-4">
                  <p class="text-bold">Motivo</p>
                        <input type="text" class= "input-github w-75 shadow-sm" disabled value="@if($datosSolicitud->motivo == 'Otro'){{$datosSolicitud->motivo_otro}} @else {{$datosSolicitud->motivo}} @endif">
                      </div>
                <div class="form-group my-4">
                    <!-- Del -->
                    <p><b>Se desea justificar los día(s)</b></p>
                    <input class="input-github w-75 shadow-sm" type="text" disabled value="@if($datosSolicitud->del == $datosSolicitud->al) {{$datosSolicitud->del}} @else {{$datosSolicitud->del}} al {{$datosSolicitud->al}} @endif">
                    <br>
                    <br>
                  </div>
                     
                <!-- /.card-body -->
                
                <!-- Alumno -->
                <div class='form-group'>
                    <a href="{{asset('/tramites/solicitudJustificante')}}" class="btn bg-primary inactive" id="regresar"> Regresar </a> 
                  </div>
                  <div class="form-group float-right" id="botonesDetalle">
                    <a href="{{ url('tramites/solicitudAceptarJustificante')}}/{{$datosAlumno->nombre_completo}}/{{$datosSolicitud->id}}" class="btn bg-primary">Aceptar</a>
                    <a href="{{ url('tramites/solicitudDescargarJustificante')}}/{{$datosAlumno->nombre_completo}}/{{$datosSolicitud->id}}" class="btn bg-primary" id="refresh">Aceptar y Descargar</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Denegar</button>
                  </div>
                </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comentarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Alumno:</label>
            <input name="alumno" type="text" class="form-control" id="recipient-name" value="{{$datosAlumno->nombre_completo}}">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mensaje:</label>
            <textarea name="causa" class="form-control" id="message-text" placeholder="Escribe la causa del rechazo de solicitud"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="{{ url('tramites/solicitudDenegarJustificante')}}/{{$datosAlumno->nombre_completo}}/{{$datosSolicitud->id}}" class="btn bg-danger">Enviar</a>
      </div>
    </div>
  </div>
</div>
@stop
