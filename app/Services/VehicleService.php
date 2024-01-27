<?php


namespace App\Services;

use App\Data\VehicleData;
use App\Models\Vehicle;
use Spatie\QueryBuilder\QueryBuilder;

class VehicleService
{
    public function get()
    {
        return QueryBuilder::for(Vehicle::query())
            ->allowedFilters([
                'full_seat_number'
            ])
            ->get();
    }

    public function store(VehicleData $data)
    {
        return Vehicle::create($data->toArray());
    }

    public function update(VehicleData $data, Vehicle $vehicle)
    {
        $vehicle->update($data->toArray());

        return $vehicle;
    }
}
