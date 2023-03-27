<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tramite_detalle extends Model
{
    use HasFactory;

    protected $table = 'tramite_detalles';

    protected $fillable = [
        'tramite_id',
        'motivo',
        'motivo_otro',
        'nom_tutor',
        'fecha',
        'del',
        'al'
    ];
}
