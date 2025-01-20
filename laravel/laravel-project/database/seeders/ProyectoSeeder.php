<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    public function run()
    {
        Proyecto::create([
            'nombre' => 'Desarrollo Web',
            'descripcion' => 'Desarrollo de un sitio web corporativo.',
            'fecha_inicio' => '2024-01-01',
            'fecha_fin' => '2024-06-01',
            'presupuesto' => 5000,
            'cliente_id' => 1,
            'estado' => 'en_progreso',
        ]);

        Proyecto::create([
            'nombre' => 'Aplicación Móvil',
            'descripcion' => 'Desarrollo de una aplicación para iOS y Android.',
            'fecha_inicio' => '2024-02-01',
            'fecha_fin' => '2024-12-01',
            'presupuesto' => 8000,
            'cliente_id' => 2, 
            'estado' => 'activo',
        ]);
    }
}
