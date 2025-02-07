<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\station>
 */
class stationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Estación de Peaje Sevilla', 'Estación de Peaje Málaga', 'Estación de Peaje Córdoba', 'Estación de Peaje Granada', 'Estación de Peaje Jerez de la Frontera', 'Estación de Peaje Almería', 'Estación de Peaje Huelva', 'Estación de Peaje Marbella', 'Estación de Peaje Jaén', 'Estación de Peaje Fuengirola']),
            'city' => $this->faker->randomElement(['Sevilla', 'Málaga', 'Córdoba', 'Granada', 'Jerez de la Frontera', 'Almería', 'Huelva', 'Marbella', 'Jaén', 'Fuengirola']),
            'total_collected_fee' => $this->faker->randomFloat(2, 0, 9999999999),
        ];
    }
}
