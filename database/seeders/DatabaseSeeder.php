<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([



            UsersSeeder::class,
            PatientSeeder::class,
            GuardianSeeder::class,
            AddressSeeder::class,
            TestSeeder::class,
            


        ]);
    }
}
