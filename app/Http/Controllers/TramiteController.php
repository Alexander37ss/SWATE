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
}

