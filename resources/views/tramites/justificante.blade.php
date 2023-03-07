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
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('tramites/prejustificanteAlumno', auth()->user()->name)}}" method="POST">
          @csrf 
            <div class="card-body">
            <!-- Alumno -->
            <div class = "form-group">
              <label for="">Alumno:</label>
              <input name="nombre" type="text" class= "form-control" disabled value="{{ auth()->user()->name}}">
            </div>
            <!-- Motivo -->
            <div class="form-group">
              <label for="exampleSelectBorder">Motivo:</label>
              <select name="motivo" class="custom-select form-control-border" id="Motivo" onchange="AparecerOtroMotivo()" required>
                <option>Escoge un motivo...</option>
                <option value="Motivos de salud">Motivo de salud</option>
                <option value="Motivos vacacional">Motivo vacacional</option>
                <option value="Motivos de perdida">Motivo de perdida</option>
                <option value="Otro">Otro...</option>
              </select>
            </div>
            <!-- Otro... -->
              <div class="form-group inactive" id="OtroMotivo">
                    <label>Otro:</label>
                    <textarea name="motivo_otro" class="form-control" rows="3" placeholder="Escribe..."></textarea>
                  </div>
                </div>
                <div class="row">
                    <!-- Del -->
                    <div class="form-group mr-5 ml-4">
                      <label for="exampleFormControlSelect2">Del día:</label>
                      <select multiple class="form-control" name="del">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                          <option>13</option>
                          <option>14</option>
                          <option>15</option>
                          <option>16</option>
                          <option>17</option>
                          <option>18</option>
                          <option>19</option>
                          <option>20</option>
                          <option>21</option>
                          <option>22</option>
                          <option>23</option>
                          <option>24</option>
                          <option>25</option>
                          <option>26</option>
                          <option>27</option>
                          <option>28</option>
                          <option>29</option>
                          <option>30</option>
                          <option>31</option>
                      </select>
                    </div>
                    <!-- Al -->
                    <div class="form-group ml-2">
                        <label for="exampleFormControlSelect2">Al día:</label>
                          <select multiple class="form-control" name="al" required>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                          </select>
                    </div>
                  </div>

              <!-- Evidencia -->
              <div class="form-group ml-2">
                <label for="exampleInputFile">Añadir evidencia(opcional)</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Elegir archivo</label>
                  </div>
                </div>
              </div>

              <!-- INE -->
              <div class="form-group ml-2">
                  <label for="exampleInputFile">INE del padre o tutor:</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" >
                      <label class="custom-file-label" for="customFile">Elegir archivo</label>
                    </div>
                  </div>
                  <br>
                        
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
          </form>
        </div>
      </div>
  </div>
<script src="{{ asset('jsswate/main.js') }}"></script>
@stop
