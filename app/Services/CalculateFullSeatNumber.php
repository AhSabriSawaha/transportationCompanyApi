<?php


namespace App\Services;

use App\Data\VehicleData;
use App\Models\Vehicle;
use Spatie\QueryBuilder\QueryBuilder;

class CalculateFullSeatNumber
{
    public function calc($vehicle)
    {
        $vehicle->full_seat_number =  $vehicle->last_row +
                 ($vehicle->rows_num -1) * $vehicle->right_seat +
                 ($vehicle->rows_num -1) * $vehicle->left_seat;
        $vehicle->save();
        return $vehicle;
    }
}
