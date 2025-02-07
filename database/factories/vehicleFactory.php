<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\vehicle>
 */
class vehicleFactory extends Factory
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
            'model' => $this->faker->randomElement(['Corolla', 'Mustang', 'Civic', 'Impala', 'Altima', 'X5', 'C-Class', 'Golf', 'A4', 'Ninja', 'Street Glide', 'Monster']),
            'axles' => $this->faker->randomNumber(0),
            'total_fee_paid' => $this->faker->randomFloat(2, 0, 9999999999),
        ];
    }
}
