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
        'alumno_id',
        'autorizado'
    ];    
    
    public function tramite_detalle(){ # Aqui estamos haciendo un INNER JOIN
        return $this->belongsTo(tramite_detalle::class, 'tramite_id'); # Puede tener un 3re parametro que es el valor del primary key
    }
    
    public function tipo(){ 
        return $this->belongsTo(Tipo_tramite::class, 'tipo_id'); 
    }
    
    public function user(){ 
        return $this->belongsTo(User::class, 'orientadora_id'); 
    }

    public function alumno(){ 
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }

    public function prejustificantes(){ 
        return $this->belongsTo(Pre_justificante::class, 'prejustificante_id');
    }
}
