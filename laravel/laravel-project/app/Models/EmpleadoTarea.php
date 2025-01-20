<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmpleadoTarea extends Pivot
{
    use HasFactory;

    protected $fillable = ['empleado_id', 'tarea_id', 'progreso'];
}
