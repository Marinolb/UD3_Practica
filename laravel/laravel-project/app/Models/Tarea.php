<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin', 'proyecto_id', 'prioridad_id', 'descripcion', 'estado'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function prioridad()
    {
        return $this->belongsTo(Prioridad::class);
    }

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_tarea')->withPivot('progreso')->withTimestamps();
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
