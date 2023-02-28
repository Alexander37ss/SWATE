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

}