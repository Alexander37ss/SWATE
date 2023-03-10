@extends('appOrientadora')

@section('titulo')
    <h1>Pase salida</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/alumno/consultar') }}">Consultar alumnos</a></li>
    <li class="breadcrumb-item active">Pase salida</li>
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
    </div>
    <!-- card body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
  </form>
</div>
<script src="{{ asset('jsswate/justificanteOrientadora.js') }}"></script>

@stop
