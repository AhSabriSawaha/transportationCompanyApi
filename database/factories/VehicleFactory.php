<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
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
            'rows_num' => $this->faker->randomNumber(),
            'left_seat' => $this->faker->randomNumber(),
            'right_seat' => $this->faker->randomNumber(),
            'last_row' => $this->faker->randomNumber(),
            'full_seat_number' => $this->faker->randomNumber(),
            'color' => $this->faker->colorName(),
        ];
    }
}
