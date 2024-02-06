<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
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
            'name' => $this->faker->name(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'sexo' => $this->faker->randomElement(['Hombre', 'Mujer']),
            'email' => $this->faker->email(),
            'telefono' => $this->faker->phoneNumber(),
            'especialidad' => $this->faker->randomElement(["General Medicine", "Cardiology", "Pediatrics", "Dermatology", "Orthopedics", "Gynecology", "Neurology", "Ophthalmology", "Psychiatry", "Oncology"]), 
            'cedula' => $this->faker->randomNumber(8),
            'nombre_clinica' => $this->faker->company(),
            
            
        ];
    }
}
