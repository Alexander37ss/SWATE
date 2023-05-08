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
    <div class="input-box justify-content-center shadow-sm">
      <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z"/></svg></i>
      <input type="text" placeholder="Buscar alumnos" />
      <button class="button">Buscar</button>
    </div>
    <br><br>
    <div class="text-center">
        <h3 class="font-bold">Últimas actividades</h3>
    </div>
    <hr class="w-50">
    <br>
    <div class="row ml-5 mr-5">
        @foreach($tramites as $a)
        <div class="col">
        <div class="card card-custom bg-white border-white border-0">
          <img class="card-custom-img" src="{{asset('images/userojo.png')}}"></img>
          <div class="card-custom-avatar">
            <img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Card has minimum height set but will expand if more space is needed for card body content. You can use Bootstrap <a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks" target="_blank">card-decks</a> to align multiple cards nicely in a row.</p>
          </div>
          <div class="card-footer" style="background: inherit; border-color: inherit;">
            <a href="#" class="btn btn-primary">Option</a>
            <a href="#" class="btn btn-outline-primary">Other option</a>
          </div>
        </div>
        </div>
        @if(++$i == 3) 
        <?php 
                  break;
                  ?>
                  @endif
                  @endforeach
                </div>
                  @stop
                  