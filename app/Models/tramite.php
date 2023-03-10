<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tramite extends Model
{
    use HasFactory;

    protected $table = 'tramites';
    

    protected $fillable = [
        'tipo_id',
        'orientadora_id',
        'alumno_id'
    ];    
}
