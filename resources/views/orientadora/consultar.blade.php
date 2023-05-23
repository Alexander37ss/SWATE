@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')
<div class="container mb-0 mr-0">
  <div class="searchInput-sm shadow-sm float-right mt-0 col-5">
  @if(Session::has('busqueda'))
          <input type="text" class="form-control" id="buscadorAlumno" placeholder="Filtrar por nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="findPerfil();">
          @else
          <input type="text" class="form-control" id="busquedaConsultar" placeholder="Filtrar por nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="BuscarAlumnos();">
          @endif
    <div class="resultBox">
    </div>
    <div class="icon"><i class="fas fa-search"></i></div>
  </div>
</div>
<br>
    <br>
    <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-hover table-sm" id="tabla">
          <thead class="">
            <tr>
              <th>Nombre del alumno</th>
              <th>Especialidad</th>
              <th>Grado y grupo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($alumnos as $a)
              <tr class="text-cetis bg-cetis-table">
                <td><a class="a" href="{{url('perfil', $a->nombre_completo)}}">{{$a->nombre_completo}}</a></td>
                <td><a class="a" href="{{url('perfil', $a->nombre_completo)}}">{{$a->carrera}}</a></td>
                <td><a class="a" href="{{url('perfil', $a->nombre_completo)}}">{{$a->grupo}}</a></td>
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
