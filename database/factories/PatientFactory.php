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
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'sexo' => $this->faker->randomElement(['Hombre', 'Mujer']),
            'fecha_nacimiento' => $this->faker->date(),
            'num_identificacion' => $this->faker->randomNumber(8),
            'email' => $this->faker->email(),
            'telefono' => $this->faker->phoneNumber(),
            'tipo_sangre' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'descripcion_medica' => $this->faker->text(),
            'insurance_id' => Insurance::factory()->create()->id,
            'doctor_id' => Doctor::factory()->create()->id,
        ];
    }
}
