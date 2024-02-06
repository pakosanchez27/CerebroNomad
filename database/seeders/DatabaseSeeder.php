<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Rols;
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
            DoctorSeeder::class,
            InsuranceSeeder::class,
            PatientSeeder::class,
            AddressSeeder::class,
            GuardianSeeder::class,


        ]);
    }
}
