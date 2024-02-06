<?php

namespace Database\Seeders;

use App\Models\Guardian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Patient;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Guardian::factory()
        ->count(10)
        ->create();
    }
}
