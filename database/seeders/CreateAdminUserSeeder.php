<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



    public function run()
    {
        $password = '123456';

        // Crear el usuario administrador por primera vez
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@nomad.com';
        $user->password = Hash::make('password');
        $user->apellido_paterno = 'ApellidoPaterno';
        $user->apellido_materno = 'ApellidoMaterno';
        $user->role_id = 1;
        $user->save();
    }
}
