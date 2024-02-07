<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Address;
use App\Models\Patient;
use App\Models\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'insurances_id' => Insurance::factory(),
            'doctors_id' => Doctor::factory(),
            'addresses_id' => Address::factory(),
        ];
    }
}
