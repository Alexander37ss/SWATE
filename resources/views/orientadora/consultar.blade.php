@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')
<div class="card-body mt-0">
<div class="input-group float-right mt-0 col-5">
  <div class="visibility-none" id="remove-filter">
    <a class="btn btn-light remove-filter" href="{{ url('tramites/consultar') }}"type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.73 20.83L17.58 18l-2.85-2.83l1.42-1.41L19 16.57l2.8-2.81l1.42 1.41L20.41 18l2.81 2.83l-1.42 1.41L19 19.4l-2.85 2.84l-1.42-1.41M13 19.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0L7.29 16.7a.989.989 0 0 1-.29-.83v-5.12L2.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L13 10.75v9.13M5.04 5L9 10.06v5.52l2 2v-7.53L14.96 5H5.04Z"/></svg></a>
  </div>
<div class="input-group-prepend">
<a class="btn btn-inactive cursor-default"  type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18 10.5V6l-2.11 1.06A3.999 3.999 0 0 1 12 12a3.999 3.999 0 0 1-3.89-4.94L5 5.5L12 2l7 3.5v5h-1M12 9l-2-1c0 1.1.9 2 2 2s2-.9 2-2l-2 1m2.75-3.58L12.16 4.1L9.47 5.47l2.6 1.32l2.68-1.37M12 13c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-3 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"/></svg></a>
</div>
          @if(Session::has('busqueda'))
          <input type="text" class="form-control" id="buscadorAlumno" placeholder="Filtrar por nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="findPerfil();">
          @else
          <input type="text" class="form-control" id="busquedaConsultar" placeholder="Filtrar por nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="BuscarAlumnos();">
          @endif
        </div>
    <br>
    <br>
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-sm" id="tabla">
          <thead>
            <tr>
              <th>Nombre del alumno</th>
              <th>Especialidad</th>
              <th>Grado y grupo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($alumnos as $a)
              <tr class="cursor-pointer">
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
