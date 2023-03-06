<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pre_justificante extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumno_id',
        'motivo',
        'motivo_otro',
        'del',
        'al',
        'dia',
        'mes',
        'ano'
    ];
}
