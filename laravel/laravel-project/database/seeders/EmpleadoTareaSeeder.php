<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmpleadoTarea;

class EmpleadoTareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmpleadoTarea::create([
            'empleado_id' => 1, 
            'tarea_id' => 1,  
            'progreso' => 50,  
        ]);

        EmpleadoTarea::create([
            'empleado_id' => 2, 
            'tarea_id' => 2,   
            'progreso' => 20,  
        ]);

        EmpleadoTarea::create([
            'empleado_id' => 3, 
            'tarea_id' => 1,  
            'progreso' => 10,  
        ]);

        EmpleadoTarea::create([
            'empleado_id' => 4, 
            'tarea_id' => 2,   
            'progreso' => 80,  
        ]);
    }
}
