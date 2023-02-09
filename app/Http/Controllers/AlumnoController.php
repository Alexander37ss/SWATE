<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function consultar(){
        //consultas el alumno
        return view('alumno.consultar');
    }

    public function registrar(){
        //consultas el alumno
        return view('alumno.registrar');
    }

    public function reportePdf(){
        $alumnos = array("Alumno1", "Alumno2", "Alumno3"); //DAtos de la base de datos
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.reporteGenerico', array('alumnos' => $alumnos)); //Carga la vista y la convierte a PDF
        return $pdf->download("reporteGenerico.pdf"); //Descarga el PDF con ese nombre
    }
}
