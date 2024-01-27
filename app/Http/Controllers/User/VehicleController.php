<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\VehicleResource;
use App\Models\Vehicle;
use App\Services\VehicleService;

class VehicleController extends Controller
{
    public function __construct(
        public VehicleService $VehicleService
    )
    {}

    public function index()
    {
        $vehicles = $this->VehicleService->get();

        return response()->json([
            'data' => VehicleResource::collection($vehicles)
        ]);
    }


    public function show(Vehicle $vehicle)
    {
        return response()->json([
            'data' => VehicleResource::make($vehicle)
        ]);
    }
}
