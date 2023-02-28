@extends('app')

@section('titulo')
    <h1>Pase de salida</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Pase de salida</li>
@stop

@section('contenido')
<link rel="stylesheet" href="{{asset('cssswate/main.css')}}">
    <section class="content>
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
              <!-- /.card-header -->
              <!-- form start -->
              <form action="POST" href="{{url('tramites/procesandojustificante')}}">
                <div class="card-body">
                <!-- Alumno -->
                <div class = "form-group">
                <label for="">Alumno:</label>
                <input type="text" class= "form-control" disabled value="Alexander Palazuelos Beltran">
                </div>
                <!-- Motivo -->
                <div class="form-group">
                  <label for="exampleSelectBorder">Motivo:</label>
                  <select class="custom-select form-control-border" id="Motivo" onchange="AparecerOtroMotivo()">
                    <option>Escoge un motivo...</option>
                    <option value="Motivo de salud">Emergencia</option>
                    <option value="Motivo vacacional">No hay más clases</option>
                    <option value="Otro">Otro...</option>
                  </select>
                </div>
                <!-- Otro... -->
                  <div class="form-group inactive" id="OtroMotivo">
                        <label>Otro:</label>
                        <textarea class="form-control" rows="3" placeholder="Escribe..."></textarea>
                      </div>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
              </form>
            </div>
            <script src="{{ asset('jsswate/main.js') }}"></script>

@stop
