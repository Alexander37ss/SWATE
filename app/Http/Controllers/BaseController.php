<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $preJustificantes;
    public function construct() 
    {
        $preJustificantes = Pre_justificante::where('estatus_solicitud', 0)
        ->get();
        View::share('preJustificantes', $this->preJustificantes);
    }
}
