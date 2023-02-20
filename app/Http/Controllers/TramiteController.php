<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TramiteController extends Controller
{
    function justificante(){
        return view('tramites.justificante');
    }
    function constancia(){
        return view('tramites.constancia');
    }
    function ConstanciaAlumnoPDF($id){
        $alumno = Alumno::find($id); //DAtos de la base de datos
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.reporteAlumno', array('alumno' => $alumno)); //Carga la vista y la convierte a PDF
        return $pdf->download("reporteAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }
}

