<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_plate' => strtoupper($this->faker->bothify('??###??')),
            'brand' => $this->faker->randomElement(['Toyota', 'Ford', 'Honda', 'Chevrolet', 'Nissan', 'BMW', 'Mercedes-Benz', 'Volkswagen', 'Audi', 'Kawasaki', 'Harley-Davidson', 'Ducati']),
            'vehicle_type' => $this->faker->randomElement(['car', 'motorcycle', 'truck']),
            'axles' => $this->faker->randomNumber(0),
            'total_fee_paid' => $this->faker->randomNumber(0),
        ];
    }
}
