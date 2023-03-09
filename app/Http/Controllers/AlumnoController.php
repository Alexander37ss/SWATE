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
    # Nos lleva a la vista tramites.justificantes
    function justificante(){ 
        return view('alumno.justificante');
    }

    # Esto se ejecuta cuando el alumno lleno el formulario para solicitar justificante
    function pre_justificanteAlumno(Request $request, $nombreAlumno){
        # Inserción de datos a la tabla pre_justificantes
        $Pre_justificante = new Pre_justificante;

        $Pre_justificante->nombre_solicitante = $nombreAlumno;

        $Pre_justificante->motivo = $request->input('motivo');
        $Pre_justificante->motivo_otro = $request->input('motivo_otro');

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