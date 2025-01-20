<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call([
            ClienteSeeder::class,
            EmpleadoSeeder::class, 
            PrioridadSeeder::class,
            ProyectoSeeder::class,
            TareaSeeder::class,
            ComentarioSeeder::class,
            EmpleadoTareaSeeder::class,
        ]);
    }
}
