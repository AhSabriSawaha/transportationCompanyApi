<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class   InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ticket_number' => ReservationResource::make($this->whenLoaded('trip')),
            // 'ticket_number' => $this->ticket_number,
            // 'total_price' => $this->total_price,
            // 'start_time' => $this->trip->start_time,
            // 'takeoff' => $this->trip->takeoff,
            // 'destination' => $this->trip->destination,
        ];
    }
}
