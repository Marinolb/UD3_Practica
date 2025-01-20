<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['tarea_id', 'empleado_id', 'comentario'];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
