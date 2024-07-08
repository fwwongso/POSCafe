<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'gender' => fake()->randomElement([
                'Laki-laki',
                'Perempuan',
            ]),
            'age' => fake()->numberBetween(10, 70),
            'phone' => fake()->numerify(12),
            'address' => fake()->sentence(),
        ];
    }
}
