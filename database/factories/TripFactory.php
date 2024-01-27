<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Locale;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory()->create(),
            'location_id' => Location::factory()->create(),
            'price' => $this->faker->numberBetween(10000, 100000),
            'duration' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->text(),
            'price_description' => $this->faker->text(),
            'start_time' => $this->faker->date()
        ];
    }
}
