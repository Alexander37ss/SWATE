@extends('appOrientadora')

@section('titulo')
    <h1>Pase salida</h1>
@stop

@section('breadcrum')
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
              <form action="{{ url('tramites/procesoPaseSalida')}}/{{$alumno->id}}" method="POST">
                @csrf
                <div class="card-body">
               <!-- Alumno -->
                <div class = "form-group">
                <label for="">Alumno:</label>
                <input type="text" class= "form-control" disabled value="{{ $alumno -> nombre_completo}}">
                </div>
                <!-- Motivo -->
                <div class="form-group">
                  <label for="exampleSelectBorder">Motivo:</label>
                  <select name="motivo" class="custom-select form-control-border" id="MotivoJustificante" onchange="AparecerOtroMotivoJustificante()" required>
                    <option>Escoge un motivo...</option>
                    <option value="Motivo de salud">Motivo de salud</option>
                    <option value="Motivo vacacional">Motivo vacacional</option>
                    <option value="Motivo de perdida">Motivo de perdida</option>
                    <option value="Otro">Otro...</option>
                  </select>
                </div>
                <!-- Otro... -->
                  <div class="form-group inactive" id="OtroMotivoJustificante">
                        <label>Otro:</label>
                        <textarea class="form-control" name="otro" rows="3" placeholder="Escribe..."></textarea>
                      </div>
                <div class="row">       
      </div>
      <!-- Observaciones -->
      <div class = "form-group">
       <label for="">Observaciones:</label>
       <textarea type="text" class= "form-control" name="observaciones"></textarea>
       </div>
    </div>
    <!-- card body -->
    <div class="card-footer">
      <button type="submit" class="btn bg-cetis">Confirmar</button>
      <a href="{{asset('/tramites/consultar')}}/{{$alumno->id}}" class="btn bg-cetis" id="consultar">
        <p>Enviar Email al Tutor</p>
      </a>
    </div>
  </form>
</div>
<script src="{{ asset('jsswate/justificanteOrientadora.js') }}"></script>

@stop
