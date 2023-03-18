<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\tramite;

class HomeController extends Controller
{
        # Funciones para visualización del historial
        public function homeHistorial(){
            $fecha = Carbon::now();
            $mes = $fecha->format('m');
            $ano = $fecha->format('Y');
            
            $tramites = tramite::where('orientadora_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->get();
            $justificantes = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->get();
            $paseSalida = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 2]])
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->get();
    
            return view('orientadora.home', compact('tramites', 'justificantes', 'paseSalida', 'mes', 'ano'));
        }
        
        public function homeHistorialTipo($tipo){
            $fecha = Carbon::now();
            $mes = $fecha->format('m');
            $ano = $fecha->format('Y');
            
            $tramites = tramite::where([['orientadora_id', auth()->user()->id], ['tipo_id', $tipo]])
            ->orderBy('id', 'DESC')
            ->get();
            $justificantes = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->get();
            $paseSalida = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 2]])
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->get();
    
            return view('orientadora.home', compact('tramites', 'justificantes', 'paseSalida', 'mes', 'ano'));
        }  

}
