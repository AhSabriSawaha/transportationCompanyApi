<?php


namespace App\Services;

use App\Models\Reservation;

class CalcTotalPriceService
{
    public function calc(Reservation $reservation)
    {
        return $reservation->trip->price
         * $reservation->ticket_number;
    }
}
