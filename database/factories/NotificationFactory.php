<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->text(),
            // 'location_id' => Location::factory()->create(),
            'trip_id' => Trip::factory()->create(),
        ];
    }
}
