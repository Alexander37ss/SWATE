<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fecha extends Model
{
    use HasFactory;

    protected $table = 'fechas';

    protected $fillable = [
        'fecha'
    ];
}
