<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    use HasFactory;
    
    protected $table = 'prioridades';
    protected $fillable = ['nombre', 'descripcion'];

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
