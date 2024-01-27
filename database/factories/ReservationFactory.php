<?php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'description' => $this->faker->text(),
            'is_paid' => $this->faker->boolean(),
            'ticket_number' => $this->faker->numberBetween(1, 50),
            'trip_id' => Trip::factory()->create(),
            'total_price' => $this->faker->numberBetween(1000, 100000),

        ];
    }
}
