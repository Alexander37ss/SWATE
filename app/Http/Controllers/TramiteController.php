<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use PDF;

class TramiteController extends Controller
{
    function justificante(){
        return view('tramites.justificante');
    }
    function constancia(){
        return view('tramites.constancia');
    }

    function justificantePOST(){
        
    }

    function ConstanciaAlumnoPDF($nombreusuario){
        $alumno = Alumno::where('nombre', $nombreusuario)->first(); //DAtos de la base de datos
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.reporteAlumno', array('alumno' => $alumno)); //Carga la vista y la convierte a PDF
        return $pdf->download("reporteAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }
}

