<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class VehicleData extends Data
{
    public function __construct(
        public int|Optional $rows_num,
        public int|Optional $left_seat,
        public int|Optional $right_seat,
        public int|Optional $last_row,
        public int|Optional $full_seat_number,
        public string|Optional $color,
    ) {}
}

