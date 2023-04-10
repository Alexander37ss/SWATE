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
        'ano',
        'grupo'
    ];

    public function alumno(){ # Aqui estamos haciendo un INNER JOIN
        return $this->belongsTo(Alumno::class, 'alumno_id'); # Puede tener un 3re parametro que es el valor del primary key
    }
}
