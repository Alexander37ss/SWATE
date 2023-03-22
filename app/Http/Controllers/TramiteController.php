<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use PDF;
use Carbon\Carbon;

class TramiteController extends BaseController
{

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

