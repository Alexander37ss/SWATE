<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tramite extends Model
{
    use HasFactory;

    protected $fillable = [
        'tramite_id',
        'motivo',
        'motivo_otro',
        'del',
        'al',
        'dia',
        'mes',
        'ano'
    ];    
}
