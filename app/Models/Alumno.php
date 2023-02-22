<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';

    protected $fillable = [
        'nombre',
        'n_control',
        'edad',
        'sexo',
        'fecha_nacimiento',
        'domicilio',
        'telefono',
        'modalidad',
        'turno',
        'grupo',
        'semestre',
        'especialidad',
    ];
}
