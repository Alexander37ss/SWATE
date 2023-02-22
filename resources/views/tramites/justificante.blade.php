@extends('app')

@section('titulo')
    <h1>Solicitar justificante</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Solicitar justificante</li>
@stop

@section('contenido')
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Correo electronico</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                        <label>Cuentanos tu motivo:</label>
                        <textarea class="form-control" rows="3" placeholder="Escribe..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm">
                  <div class="form-group">
                    <label for="exampleInputFile">Añadir archivo(s)</label>
                    <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Elegir archivo</label>
                    </div>
                    </div>
                  </div>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
              </form>
            </div>

@stop
