<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'price' => $this->price,
            'duration' => $this->duration,
            'description' => $this->description,
            'price_description' => $this->price_description,
            'start_time' => $this->start_time,
            'location' => LocationResource::make($this->whenLoaded('location')),
            'vehicle' => VehicleResource::make($this->whenLoaded('vehicle')),
        ];
    }
}
