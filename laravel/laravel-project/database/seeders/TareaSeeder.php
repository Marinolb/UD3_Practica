<?php

namespace Database\Seeders;

use App\Models\Tarea;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    public function run()
    {
        Tarea::create([
            'nombre' => 'Diseño de Página Principal',
            'fecha_inicio' => '2024-01-01',
            'fecha_fin' => '2024-05-01',
            'proyecto_id' => 1, 
            'prioridad_id' => 1, 
            'descripcion' => 'Diseñar la página principal del sitio web.',
            'estado' => 'en_progreso',
        ]);

        Tarea::create([
            'nombre' => 'Desarrollo Backend',
            'fecha_inicio' => '2024-02-01',
            'fecha_fin' => '2024-07-01',
            'proyecto_id' => 1,
            'prioridad_id' => 2,
            'descripcion' => 'Desarrollo del backend para la API del sitio web.',
            'estado' => 'pendiente',
        ]);
    }
}
