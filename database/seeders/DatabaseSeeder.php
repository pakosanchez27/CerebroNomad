<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Test;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([


            RolesSeeder::class,
            // UsersSeeder::class,
            // PatientSeeder::class,
            // GuardianSeeder::class,
            // AddressSeeder::class,
            // TestSeeder::class,
            CreateAdminUserSeeder::class,




        ]);
    }
}
