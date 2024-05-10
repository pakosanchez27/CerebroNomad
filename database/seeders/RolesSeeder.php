<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 1 ,'name' => 'admin', 'description' => 'Administrator'],
            ['id' => 2 ,'name' => 'editor', 'description' => 'Editor'],
            ['id' => 3 ,'name' => 'analista', 'description' => 'Analista'],
            ['id' => 4 ,'name' => 'vendedor', 'description' => 'Vendedor ']
        ];

        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
