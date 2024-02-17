<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Cáncer', 'Tumor', 'Terapia', 'Inmunoterapia']),
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
