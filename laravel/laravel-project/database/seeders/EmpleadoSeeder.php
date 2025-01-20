<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    public function run()
    {
        Empleado::create([
            'nombre' => 'Carlos Pérez',
            'email' => 'carlos.perez@igformacion.com',
            'telefono' => '123456789',
            'fecha_contratacion' => '2020-05-01',
            'rol' => 'Desarrollador Backend',
        ]);

        Empleado::create([
            'nombre' => 'Ana Gómez',
            'email' => 'ana.gomez@igformacion.com',
            'telefono' => '112345678',
            'fecha_contratacion' => '2019-06-01',
            'rol' => 'Diseñadora Gráfica',
        ]);

        Empleado::create([
            'nombre' => 'Juan López',
            'email' => 'juan.lopez@igformacion.com',
            'telefono' => '223456789',
            'fecha_contratacion' => '2024-07-01',
            'rol' => 'Desarrollador Backend',
        ]);

        Empleado::create([
            'nombre' => 'Clara Sánchez',
            'email' => 'clara.sanchez@igformacion.com',
            'telefono' => '212345678',
            'fecha_contratacion' => '2022-09-01',
            'rol' => 'Diseñadora Gráfica',
        ]);
    }
}
