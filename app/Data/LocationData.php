<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class LocationData extends Data
{
    public function __construct(
        public string|Optional $takeoff,
        public string|Optional $destination,
        public int|Optional $category_id,
        public array|Optional $files
    ) {}
}

