<?php


namespace App\Services;

use App\Data\ReservationData;
use App\Models\Reservation;
use Spatie\QueryBuilder\QueryBuilder;

class ReservationService
{
    public function get()
    {
        return QueryBuilder::for(Reservation::query())
            ->allowedFilters([
                'is_paid',
                'trip_id',
            ])
            ->with(['trip'])
            ->get();
    }

    public function store(ReservationData $data)
    {
        return Reservation::create($data->toArray());
    }

    public function update(ReservationData $data, Reservation $reservation)
    {
        $reservation->update($data->toArray());

        return $reservation;
    }
    public function getInventory()
    {
        $reservations = QueryBuilder::for(Reservation::query())
        ->allowedFilters([
            'trip_id',
            ])
            ->with(['trip'])
            ->get();

            // dd($reservations);
        $inventoryRecords = [];

        foreach ($reservations as $reservation) {
            $inventoryRecords[] = [
                'ticket_number' => $reservation->ticket_number,
                'total_price' => $reservation->total_price,
                'takeoff' => $reservation->trip->location->takeoff,
                'destination' => $reservation->trip->location->destination,
                'start_time' => $reservation->trip->start_time,
            ];
        }
        return $inventoryRecords;
    }
}
