@extends('appAlumno')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')

<section class="content">
  <div class="container-fluid">
  <form action="{{url('alumno/prejustificante', auth()->user()->name)}}" method="POST">
          @csrf 
  <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
      <!-- /.card-header -->
      <div class="card-header">
        <div class="card-title">
          Formulario de justificante
        </div>
      </div>
      <div class="card-body ml-2 mr-2">
   <!-- Alumno -->
        <div class="mb-3">
        <p class="mb-2 font-bold">Alumno</p>
         <input name="nombre" type="text" class= "input-github shadow-sm w-75 py-2" disabled value="{{ auth()->user()->name}} (Tú)">
        </div>
            <!-- Motivo -->
            <div class="mb-3">
              <p class="mb-2 font-bold">Motivo</p>
              <select name="motivo" class="input-github shadow-sm w-75 py-2" id="motivos" onchange="AparecerOtroMotivo()" required>
                <option>Escoge un motivo...</option>
                <option value="Motivos de salud">Motivo de salud</option>
                <option value="Motivos vacacional">Motivo vacacional</option>
                <option value="Motivos de perdida">Motivo de perdida</option>
                <option value="Otro">Otro...</option>
              </select>
            </div>
            <!-- Otro... -->
            <div class="form-group inactive" id="OtroMotivo">
              <p class="font-bold">Otro:</p>
              <textarea name="motivo_otro" class="form-control" rows="3" placeholder="Escribe..."></textarea>
            </div>
            <!-- Fechas -->
            <div class="row">
              <div class="col-2">
                <p class="mb-2 font-bold">Desde</p>
                <input type="date" class="input-github w-1 py-2" name="del">
              </div>
            <!-- col -->
            <div class="col">
              <p class="mb-2 font-bold">Hasta</p>
              <input type="date" class="input-github w-1 py-2" name="al">
            </div>
          <!-- col -->
          </div>
          <!-- row -->
          <div class="float-right">
            <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane text-white"></i></button>
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
