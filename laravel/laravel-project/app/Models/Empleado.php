<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'telefono', 'fecha_contratacion', 'rol'];

    public function tareas()
    {
        return $this->belongsToMany(Tarea::class, 'empleado_tarea')->withPivot('progreso')->withTimestamps();
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
