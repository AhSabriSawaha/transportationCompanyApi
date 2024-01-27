<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'father_name' => $this->faker->name(),
            'mother_name' => $this->faker->name(),
            'birth_date' => $this->faker->date(),
            'birth_location' => $this->faker->city(),
            'nid' => $this->faker->numberBetween(1111111, 9999999),
            'reservation_id' => Reservation::factory()->create(),
            'vehicle_id' => Vehicle::factory()->create(),
            'is_company' => $this->faker->boolean(),
        ];
    }
}
