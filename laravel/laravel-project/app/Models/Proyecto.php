<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'presupuesto', 'cliente_id', 'estado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
