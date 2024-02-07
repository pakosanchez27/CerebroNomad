<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
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
            'calle' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'colonia' => $this->faker->citySuffix(),
            'ciudad' => $this->faker->city(),
            'estado' => $this->faker->state(),
            'pais' => $this->faker->country(),
            'referencias' => $this->faker->text(),
            'codigo_postal' => $this->faker->postcode(),
            

        ];
    }
}
