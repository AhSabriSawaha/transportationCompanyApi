<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            // 'location_id' => LocationResource::make($this->whenLoaded('location')),
            'trip' => TripResource::make($this->whenLoaded('trip')),
            'description' => $this->description,
            'file' => $this->getFirstMediaUrl('images'),
        ];
    }
}
