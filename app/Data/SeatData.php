<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SeatData extends Data
{
    public function __construct(
        public string|Optional $first_name,
        public string|Optional $last_name,
        public string|Optional $email,
        public string|Optional $phone_number,
        public string|Optional $father_name,
        public string|Optional $mother_name,
        public string|Optional $birth_date,
        public string|Optional $birth_location,
        public int|Optional $nid,
        public int|Optional $vehicle_id,
        public int|Optional $reservation_id,
        public array|Optional $files,
        public bool|Optional $is_company
    ) {}
}

