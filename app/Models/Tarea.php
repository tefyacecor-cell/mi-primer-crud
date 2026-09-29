<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
 // Campos que se pueden asignar masivamente desde formularios
 protected $fillable = [
    'titulo',
    'descripcion',
    'completada',
    'fecha_limite',
    ];
    // Conversión automática del booleano
    protected $casts = [
    'completada' => 'boolean',
    'fecha_limite' => 'date',
    ];
   
};