<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Patient::factory()
        ->count(110)
        ->hasInsurance(1)
        ->hasGuardian(1)
        ->hasDoctor(5)
        ->hasAddress(1)
        ->create();


       
}

    
}
