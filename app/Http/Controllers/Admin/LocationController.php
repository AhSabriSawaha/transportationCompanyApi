<?php

namespace App\Http\Controllers\Admin;

use App\Data\LocationData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Location\StoreLocationRequest;
use App\Http\Requests\Admin\Location\UpdateLocationRequest;
use App\Http\Resources\Admin\LocationResource;
use App\Models\Location;
use App\Services\FileService;
use App\Services\LocationService;
use Illuminate\Http\Request;

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


    public function store(StoreLocationRequest $request)
    {
        $validated = $request->validated();

        $files = $validated['files'];
        $location = $this->locationService->store(LocationData::from($validated));

        foreach($files as $file) {
            FileService::uploadImage($location, $file, 'images');
        }


        return response()->json([
            'data' => LocationResource::make($location)
        ]);
    }

    public function update(UpdateLocationRequest $request,Location $location)
    {
        $location = $this->locationService->update(LocationData::from($request->validated()),$location);

        return response()->json([
            'data' => LocationResource::make($location)
        ]);
    }

    public function delete(Location $location)
    {
        $location->delete();

        return response()->json([
            'data' => 'true'
        ]);
    }

}
