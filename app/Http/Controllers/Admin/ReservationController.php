<?php

namespace App\Http\Controllers\Admin;

use App\Data\ReservationData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reservation\StoreReservationRequest;
use App\Http\Requests\Admin\Reservation\UpdateReservationRequest;
use App\Http\Resources\Admin\InventoryResource;
use App\Http\Resources\Admin\ReservationResource;
use App\Models\Reservation;
use App\Services\calcTotalPriceService;
use App\Services\ReservationService;

class ReservationController extends Controller
{
    public function __construct(
        public ReservationService $reservationService,
        public CalcTotalPriceService $calcService
    )
    {

    }
    public function index()
    {
        $reservations = $this->reservationService->get();

        return response()->json([
            'data' => ReservationResource::collection($reservations)
        ]);
    }


    public function show(Reservation $reservation)
    {
        // if needed for a trip
        // $reservation->load('trip');
        return response()->json([
            'data' => ReservationResource::make($reservation)
        ]);
    }


    public function store(StoreReservationRequest $request)
    {
        $reservation = $this->reservationService->store(ReservationData::from($request->validated()));

        $reservation->total_price = $this->calcService
        ->calc($reservation);

        return response()->json([
            'data' => ReservationResource::make($reservation)
        ]);
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation = $this->reservationService->update(ReservationData::from($request->validated()), $reservation);
        return response()->json([
            'data' => ReservationResource::make($reservation)
        ]);
    }

    public function delete(Reservation $reservation)
    {
        $reservation->delete();

        return response()->json([
            'data' => 'true'
        ]);
    }

    public function getInventory() {
        $inventories = $this->reservationService->getInventory();

        return response()->json([
            'data' => $inventories,
        ]);
    }

}
