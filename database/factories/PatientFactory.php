<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->name(),
            'apellido_paterno' => fake()->lastName(),
            'apellido_materno' => fake()->lastName(),
            'sexo' => fake()->randomElement(['Hombre', 'Mujer']),
            'fecha_nacimiento' => fake()->date(),
            'num_identificacion' => fake()->randomNumber(8),
            'email' => fake()->email(),
            'telefono' => fake()->phoneNumber(),
            'tipo_sangre' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'descripcion_medica' => fake()->text(),
            'insurances_id' => Insurance::factory(),
            'doctors_id' => Doctor::factory(),

            
        ];
    }
}
