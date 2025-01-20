<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    public function run()
    {
        Comentario::create([
            'tarea_id' => 1, 
            'empleado_id' => 1, 
            'comentario' => 'La página principal está casi lista, solo faltan algunos detalles.',
        ]);

        Comentario::create([
            'tarea_id' => 2, 
            'empleado_id' => 2, 
            'comentario' => 'El diseño está aprobado, empezamos con el desarrollo del backend.',
        ]);

        Comentario::create([
            'tarea_id' => 1, 
            'empleado_id' => 3, 
            'comentario' => 'No encuentro mas que bugs',
        ]);

        Comentario::create([
            'tarea_id' => 2, 
            'empleado_id' => 4, 
            'comentario' => 'Lo tenemos casi chicos, para antes de la fecha!',
        ]);
    }
}
