<?php

namespace Database\Seeders;

use App\Models\Prioridad;
use Illuminate\Database\Seeder;

class PrioridadSeeder extends Seeder
{
    public function run()
    {
        Prioridad::create([
            'nombre' => 'Alta',
            'descripcion' => 'Tarea de alta prioridad',
        ]);

        Prioridad::create([
            'nombre' => 'Media',
            'descripcion' => 'Tarea de prioridad media',
        ]);

        Prioridad::create([
            'nombre' => 'Baja',
            'descripcion' => 'Tarea de baja prioridad',
        ]);
    }
}
