<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pre_justificante;
use View;

class BaseController extends Controller
{
    protected $justificantesPendientes;
    protected $justificanteDetalles;

    public function __construct() 
    {
        $this->justificantesPendientes = Pre_justificante::where('estatus_solicitud', 0)
        ->get()->count();
        $this->justificanteDetalles = Pre_justificante::where('estatus_solicitud', 0)->get();
        View::share('justificantesPendientes', $this->justificantesPendientes);
        View::share('justificanteDetalles', $this->justificanteDetalles);
    }
}
