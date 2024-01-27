<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ReservationData extends Data
{
    public function __construct(
        public bool|Optional $is_paid,
        public int|Optional $trip_id,
        public int|Optional $ticket_number,
        public int|Optional $total_price,
    ) {}
}

