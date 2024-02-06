<?php

namespace Database\Seeders;

use App\Models\Rols;
use Illuminate\Database\Seeder;

class RolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utiliza el método create para crear un nuevo registro en la tabla
        Rols::create([
            
            'name' => 'Admin'
        ]);

        Rols::create([
            
            'name' => 'Editor'
        ]);

        Rols::create([
            
            'name' => 'Analista'
        ]);
    }
}
