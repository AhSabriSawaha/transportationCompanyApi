<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationData extends Data
{
    public function __construct(
        public string|Optional $description,
        // public int|Optional $location_id,
        public int|Optional $trip_id,
        public string|Optional $file,
    ) {}
}

