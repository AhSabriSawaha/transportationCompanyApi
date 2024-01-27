<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\LocationResource;
use App\Models\Location;
use App\Services\LocationService;

class LocationController extends Controller
{
    public function __construct(
        public LocationService $locationService
    )
    {}

    public function index()
    {
        $categories = $this->locationService->get();

        return response()->json([
            'data' => LocationResource::collection($categories)
        ]);
    }

    public function show(Location $location)
    {
        $location->load(['category']);  // if needed for a category with the single location
        return response()->json([
            'data' => LocationResource::make($location)
        ]);
    }
}
