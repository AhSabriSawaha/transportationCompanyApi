<?php

namespace App\Http\Controllers\Admin;

use App\Data\TripData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Trip\StoreTripRequest;
use App\Http\Requests\Admin\Trip\UpdateTripRequest;
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


    public function show(Trip $trip)
    {
        // if needed for a location and a vehicle
        // $trip->load(['location', 'vehicle']);

        return response()->json([
            'data' => TripResource::make($trip)
        ]);
    }


    public function store(StoreTripRequest $request)
    {
        $trip = $this->tripService->store(TripData::from($request->validated()));

        return response()->json([
            'data' => TripResource::make($trip)
        ]);
    }

    public function update(UpdateTripRequest $request, Trip $trip)
    {
        $trip = $this->tripService->update(TripData::from($request->validated()), $trip);
        return response()->json([
            'data' => TripResource::make($trip)
        ]);
    }

    public function delete(Trip $trip)
    {
        $trip->delete();

        return response()->json([
            'data' => 'true'
        ]);
    }


}
