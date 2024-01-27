<?php

namespace App\Http\Controllers\Admin;

use App\Data\VehicleData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vehicle\StoreVehicleRequest;
use App\Http\Requests\Admin\Vehicle\UpdateVehicleRequest;
use App\Http\Resources\Admin\VehicleResource;
use App\Models\Vehicle;
use App\Services\CalculateFullSeatNumber;
use App\Services\VehicleService;

class VehicleController extends Controller
{
    public function __construct(
        public VehicleService $vehicleService,
        public CalculateFullSeatNumber $calcService
    )
    {}

    public function index()
    {
        $vehicles = $this->vehicleService->get();

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


    public function store(StoreVehicleRequest $request)
    {
        $vehicle = $this->vehicleService->store(VehicleData::from($request->validated()));

        $vehicle = $this->calcService->calc($vehicle);

        return response()->json([
            'data' => VehicleResource::make($vehicle)
        ]);
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle = $this->vehicleService->update(VehicleData::from($request->validated()), $vehicle);
        return response()->json([
            'data' => VehicleResource::make($vehicle)
        ]);
    }

    public function delete(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->json([
            'data' => 'true'
        ]);
    }


}
