<?php

namespace App\Http\Controllers\User;

use App\Data\SeatData;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Seat\StoreSeatRequest;
use App\Http\Requests\User\Seat\UpdateSeatRequest;
use App\Http\Resources\Admin\SeatResource;
use App\Models\Seat;
use App\Services\FileService;
use App\Services\SeatService;

class SeatController extends Controller
{
    public function __construct(
        public SeatService $seatService
    )
    {}

    public function index()
    {
        $seats = $this->seatService->get();

        return response()->json([
            'data' => SeatResource::collection($seats)
        ]);

    }


    public function show(Seat $seat)
    {
        // if needed for a reservation and a vehicle
        // $seat->load(['reservation', 'vehicle']);
        return response()->json([
            'data' => SeatResource::make($seat)
        ]);
    }


    public function store(StoreSeatRequest $request)
    {
        $validated = $request->validated();

        $files = $validated['files'];
        $seat = $this->seatService->store(SeatData::from($validated));

        foreach($files as $file) {
            FileService::uploadImage($seat, $file, 'images');
        }

        return response()->json([
            'data' => SeatResource::make($seat)
        ]);
    }

    public function update(UpdateSeatRequest $request, seat $seat)
    {
        $seat = $this->seatService->update(seatData::from($request->validated()), $seat);
        return response()->json([
            'data' => SeatResource::make($seat)
        ]);
    }

    public function delete(Seat $seat)
    {
        $seat->delete();

        return response()->json([
            'data' => 'true'
        ]);
    }


}
