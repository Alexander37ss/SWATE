@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')

<section class="content">
  <div class="container-fluid">
  <form action="{{ url('tramites/procesoPaseSalida')}}/{{$alumno->id}}" method="POST">
          @csrf 
  <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
      <!-- /.card-header -->
      <div class="card-header">
      <i class="fas fa-door-open"></i> Formulario de pase de salida
      </div>
      <div class="card-body ml-2 mr-2">
      <div class = "form-group">
                <p class="text-bold">Alumno</p>
                <input type="text" class= "input-github w-75 shadow-sm" disabled value="{{ $alumno -> nombre_completo}}">
                </div>
                <!-- Motivo -->
                <div class="form-group">
                  <p class="text-bold" for="exampleSelectBorder">Motivo</p>
                  <select name="motivo" class="input-github w-75 shadow-sm" id="MotivoPase" onchange="AparecerOtroMotivoPase()" required>
                    <option disabled selected>Escoge un motivo...</option>
                    <option value="Motivo de salud">Motivo de salud</option>
                    <option value="Motivo vacacional">Motivo vacacional</option>
                    <option value="Motivo de perdida">Motivo de perdida</option>
                    <option value="Otro">Otro...</option>
                  </select>
                </div>
                <!-- Otro... -->
                <div class="form-group inactive" id="OtroMotivoPase">
                  <p class="text-bold">Otro</p>
                  <textarea class="input-github w-75 shadow-sm" name="otro" rows="3" placeholder="Escribe..."></textarea>
                </div>
                <!-- Observaciones... -->
                <div class = "form-group">
                <p class="text-bold">Observaciones</p>
                <textarea type="text" class="input-github w-75 shadow-sm" name="observaciones"></textarea>
                </div>
          <!-- row -->
          <div class="float-right">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check text-white"></i></button>
          </div>
        </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    <!-- x -->
    </form>
    </div>
    </div>
@stop
