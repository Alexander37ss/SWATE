@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')

<section class="content">
  <div class="container-fluid">
  <form action="{{ url('tramites/procesoJustificante')}}/{{$alumno->id}}" method="POST">
          @csrf 
  <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
      <!-- /.card-header -->
      <div class="card-header">
      <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19.903 8.586a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.952.952 0 0 0-.051-.259c-.01-.032-.019-.063-.033-.093zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z"/><path fill="currentColor" d="M8 12h8v2H8zm0 4h8v2H8zm0-8h2v2H8z"/></svg> Formulario de justificante
      </div>
      <div class="card-body ml-2 mr-2">
   <!-- Alumno -->
        <div class="mb-3">
        <p class="mb-2 font-bold">Alumno</p>
         <input name="nombre" type="text" class= "input-github shadow-sm w-75 py-2" disabled value="{{ $alumno -> nombre_completo}}">
        </div>
            <!-- Motivo -->
            <div class="mb-3">
              <p class="mb-2 font-bold">Motivo</p>
              <select name="motivo" class="input-github shadow-sm w-75 py-2" id="motivos" onchange="AparecerOtroMotivo()" required>
                <option selected disabled>Escoge un motivo...</option>
                <option value="Motivos de salud">Motivo de salud</option>
                <option value="Motivos vacacional">Motivo vacacional</option>
                <option value="Motivos de perdida">Motivo de perdida</option>
                <option value="Otro">Otro...</option>
              </select>
            </div>
            <!-- Otro... -->
            <div class="form-group inactive" id="OtroMotivo">
              <p class="font-bold">Otro:</p>
              <textarea name="motivo_otro" class="input-github w-75" rows="3" placeholder="Escribe..."></textarea>
            </div>
            <!-- Fechas -->
            <div class="row">
              <div class="col-2">
                <p class="mb-2 font-bold">Desde</p>
                <input type="date" class="input-github w-1 py-2 shadow-sm" name="del" onfocus="{{}}" required>
              </div>
            <!-- col -->
            <div class="col">
              <p class="mb-2 font-bold">Hasta</p>
              <input type="date" class="input-github w-1 py-2 shadow-sm" name="al" required>
            </div>
          <!-- col -->
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
