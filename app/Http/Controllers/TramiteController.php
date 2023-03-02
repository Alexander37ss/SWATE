<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use PDF;
use Carbon\Carbon;

class TramiteController extends Controller
{
    function justificante(){
        return view('tramites.justificante');
    }
    function justificanteOrientadora($nombrealumno){
        $alumno = Alumno::where('nombre_completo', $nombrealumno)->first();
        return view('tramites.justificanteOrientadora', compact('alumno'));
    }
    function justificanteOrientadoraPDF($id){
        $alumno = Alumno::find($id);
        $motivo = Request('motivo');
        $del = Request('del');
        $al = Request('al');
        $otro = Request('otro');
        $fecha = Carbon::now();
        $dia = $fecha->format('j');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.JustificanteAlumno', array('alumno' => $alumno, 'otro' => $otro, 'fecha' => $fecha, 'dia' => $dia, 'mes' => $mes, 'ano' => $ano, 'motivo' => $motivo, 'del' => $del, 'al' => $al)); //Carga la vista y la convierte a PDF
        return $pdf->download("justificanteAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }
    function constancia(){
        return view('tramites.constancia');
    }
    function paseSalida($nombrealumno){
        $alumno = Alumno::where('nombre_completo', $nombrealumno)->first();
        return view('tramites.pase', compact('alumno'));
    }

    function ConstanciaAlumnoPDF($nombreusuario){
        $alumno = Alumno::where('nombre_completo', $nombreusuario)->first(); //DAtos de la base de datos
        $fecha = Carbon::now();
        $dia = $fecha->format('j');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.ConstanciaAlumno', array('alumno' => $alumno, 'fecha' => $fecha, 'dia' => $dia, 'mes' => $mes, 'ano' => $ano)); //Carga la vista y la convierte a PDF
        return $pdf->download("constanciaAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }
}

