<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TripResource;
use App\Models\Trip;
use App\Services\TripService;

class TripController extends Controller
{
    public function __construct(
        public TripService $tripService
    )
    {

    }
    public function index()
    {
        $trips = $this->tripService->get();

        return response()->json([
            'data' => TripResource::collection($trips)
        ]);

    }


    public function myTrips()
    {
        $trips = $this->tripService->getByUser(auth()->user());

        return response()->json([
            'data' => TripResource::collection($trips)
        ]);
    }
    public function show(Trip $trip)
    {
        // if needed for a location and a vehicle
        $trip->load(['location', 'vehicle']);

        return response()->json([
            'data' => TripResource::make($trip)
        ]);
    }
}
