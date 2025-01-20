<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nombre' => 'Aena',
            'telefono' => '111111111',
            'email' => 'info@aena.com',
            'direccion' => 'Calle 1, Madrid, España',
        ]);

        Cliente::create([
            'nombre' => 'Google',
            'telefono' => '222222222',
            'email' => 'contact@google.com',
            'direccion' => 'Calle 2, Madrid, España',
        ]);
    }
}
