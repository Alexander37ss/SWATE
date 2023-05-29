@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')
  <div class="float-right mt-0 col-4">
    <div class="input-group ml-5">
    @if(Session::has('busqueda'))
      <input type="text" class="input-github w-75" id="buscadorAlumno" placeholder="Filtrar por nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="findPerfil();">
      @else
      <input type="text" class="input-github w-75" id="busquedaConsultar" placeholder="Filtrar por nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="BuscarAlumnos();">
      @endif
      <div class="input-group-append">
        <button class="btn-github ml-1"><i class="fas fa-search"></i></button>
      </div>
      <!-- fin botón -->
    </div>
  <!-- fin input group -->
  </div>
  <!-- fin col -->
    <br>
    <br>
    <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="card-header">
          <span id="resultados">100</span> resultados de {{$alumnos->count();}}
        </div>
        <table class="table table-hover table-sm" id="tabla">
          <tbody>
            @foreach ($alumnos as $a)
              <tr class="bg-cetis-table">
                <td><svg class="text-blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 1024 1024"><path fill="currentColor" d="M288 320a224 224 0 1 0 448 0a224 224 0 1 0-448 0zm544 608H160a32 32 0 0 1-32-32v-96a160 160 0 0 1 160-160h448a160 160 0 0 1 160 160v96a32 32 0 0 1-32 32z"/></svg><a class="ab-underline" href="{{url('perfil', $a->nombre_completo)}}"> {{$a->nombre_completo}}</a></td>
                <td class="text-secondary" width="40%">{{$a->carrera}}</td>
                <td class="text-secondary text-center">{{$a->grupo}}</td>
              </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- fin col -->
@stop
