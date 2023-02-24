@extends('app')

@section('titulo')
    <h1>Solicitar justificante</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Solicitar justificante</li>
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
                <!-- Motivo -->
                <div class="form-group">
                  <label for="exampleSelectBorder">Motivo:</label>
                  <select class="custom-select form-control-border" id="Motivo" onchange="AparecerOtroMotivo()">
                    <option>Escoge un motivo...</option>
                    <option value="Motivo de salud">Motivo de salud</option>
                    <option value="Motivo vacacional">Motivo vacacional</option>
                    <option value="Motivo de perdida">Motivo de perdida</option>
                    <option value="Otro">Otro...</option>
                  </select>
                </div>
                <!-- Otro... -->
                  <div class="form-group inactive" id="OtroMotivo">
                        <label>Otro:</label>
                        <textarea class="form-control" rows="3" placeholder="Escribe..."></textarea>
                      </div>
                    </div>
                    <!-- INE -->
                    <div class="form-group">
                    <label for="exampleInputFile">Añadir evidencia (opcional):</label>
                    <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Elegir archivo</label>
                    </div>
                    </div>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputFile">INE del padre o tutor:</label>
                    <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Elegir archivo</label>
                    </div>
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
