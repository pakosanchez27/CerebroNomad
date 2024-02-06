<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
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
            'edad' => $this->faker->numberBetween(18, 45),
            'email' => $this->faker->email(),
            'telefono' => $this->faker->phoneNumber(),
            'parentesco' => $this->faker->randomElement(['Padre', 'Madre', 'Hermano', 'Hermana', 'Tio', 'Tia', 'Abuelo', 'Abuela', 'Primo', 'Prima', 'Amigo', 'Amiga']),
            'patients_id' => Patient::factory(),
        ];
    }
}
