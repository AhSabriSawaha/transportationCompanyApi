<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TripData extends Data
{
    public function __construct(
        public int|Optional $duration,
        public string|Optional $description,
        public string|Optional $price_description,
        public string|Optional $start_time,
        public int|Optional $location_id,
        public int|Optional $vehicle_id,
        public int|Optional $price,
    ) {}
}

