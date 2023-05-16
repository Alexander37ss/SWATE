@extends('appOrientadora')

@section('titulo')
@stop

@section('contenido')

<?php 
    $meses = [
        "01" => 'Enero',
        "02" => 'Febrero',
        "03" => 'Marzo',
        "04" => 'Abril',
        "05" => 'Mayo',
        "06" => 'Junio',
        "07" => 'Julio',
        "08" => 'Agosto',
        "09" => 'Septiembre',
        "10" => 'Octubre',
        "11" => 'Noviembre',
        "12" => 'Diciembre'
    ];
    $i = 0;
    ?>
<div class="container" style="margin-top: 50px">
  <div class="searchInput shadow-sm">
    <input type="text" placeholder="Escribe el nombre del alumno" id="buscadorAlumno" onchange="findPerfil();">
    <div class="resultBox">
    </div>
    <div class="icon"><i class="fas fa-search"></i></div>
  </div>
  @if(Session::has('flash_message'))
      <li class="text-red text-sm mt-2 ml-1" style="list-style: none;">El nombre del alumno no se encuentra en nuestros registros. Por favor, verifique que haya escrito su nombre completo correctamente.</li>
  @endif
</div>
<br><br><br>
    <div class="text-center">
        <h3 class="font-bold">Últimas actividades</h3>
    </div>
    <hr class="w-50">
    <br>
    <div class="row ml-5 mr-3">
        @foreach($tramites as $a)
        <div class="col-md-4 mb-4">
            <a href="{{url('tramite_detalle', $a->id)}}" class="a">
            @if($a->autorizado == 1)
            <div class="card-custom">
                @else <div class="card-custom card-refuse">
                    @endif
<!--         <span class="pricing">
				<span>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59L21 7Z"/></svg>
				</span>
			</span> -->
    <h3 class="card__title">Trámite @if($a->autorizado == 1) <span class="text-blue">aceptado</span><span class="badge bg-primary float-right"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59L21 7Z"/></svg></span> @else <span class="text-red">rechazado</span><span class="badge bg-danger float-right"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12L20 6.91Z"/></svg></span>  @endif </h3>
    <p class="card__content">Has @if($a->autorizado == 1) aceptado @else rechazado @endif el @if($a->tipo_id == 3) justificante @else pase de salida @endif del alumno <b>{{$a->alumno->nombre_completo}}</b> por motivos de <b>desconocido</b>.</p>
    <div class="card__date">
        {{$a->created_at->format('d/m/Y');}}
    </div>
    @if($a->autorizado == 1)
    <div class="card__arrow">
    @else <div class="card__arrow_altern">
    @endif
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
        </svg>
    </div>
</div>
</div>
</a>
        @if(++$i == 9) 
        <?php 
                  break;
                  ?>
                  @endif
                  @endforeach
                </div>
                <br>
                <div class="mx-auto" align="center">
                    <a class="btn btn-danger" href="{{url('historial')}}"> 
                        Mostrar más       
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
    </a>
                </div>
                </div>
                <br>
                  @stop
                  