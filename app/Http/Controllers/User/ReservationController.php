<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ReservationResource;
use App\Models\Reservation;
use App\Services\ReservationService;

class ReservationController extends Controller
{
    public function __construct(
        public ReservationService $reservationService
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
        $reservation->load('trip');
        return response()->json([
            'data' => ReservationResource::make($reservation)
        ]);
    }
}
