<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Alumno;

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

    public function reportePdf(){
        $alumnos = array("Alumno1", "Alumno2", "Alumno3"); //DAtos de la base de datos
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.reporteGenerico', array('alumnos' => $alumnos)); //Carga la vista y la convierte a PDF
        return $pdf->download("reporteGenerico.pdf"); //Descarga el PDF con ese nombre
    }
 
    public function reporteAlumnoPDF($id){
        $alumno = Alumno::find($id); //DAtos de la base de datos
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.reporteAlumno', array('alumno' => $alumno)); //Carga la vista y la convierte a PDF
        return $pdf->download("reporteAlumno.pdf".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }   
}