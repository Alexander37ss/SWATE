<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Pre_justificante;
use App\Models\User;

class AlumnoController extends Controller
{
    public function consultar(){
        //consultas el alumno
        $alumnos = Alumno::all();
        return view('alumno.consultar', compact('alumnos'));
    }

    public function registrar(){
        //registras alumnos
        return view('alumno.registrar');
    }

    # Nos lleva a la vista tramites.justificates
    function justificanteAlumno($nombrealumno){ 

        $alumno = User::where('name', $nombrealumno)->first();

        return view('tramites.justificante', compact('alumno'));
    }

    # Esto se ejecuta cuando el alumno lleno el formulario para solicitar justificante
    function pre_justificanteAlumno(Request $request, $id){
        # Inserción de datos a la tabla pre_justificantes
        $Pre_justificante = new Pre_justificante;

        $Pre_justificante->alumno_id = $id;

        $Pre_justificante->motivo = $request->input('motivo');
        $Pre_justificante->motivo_otro = $request->input('motivo_otro', null);

        $Pre_justificante->del = $request->input('del');
        $Pre_justificante->al = $request->input('al');

        $fecha = Carbon::now();
        $Pre_justificante->dia = $fecha->format('j');
        $Pre_justificante->mes = $fecha->format('m');
        $Pre_justificante->ano = $fecha->format('Y');

        $Pre_justificante->save();

        return view('tramites.justificante');
    }
}