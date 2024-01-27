<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $files = [];
        foreach($this->getMedia('*') as $media) {
            $files[]= $media['original_url'];
        }
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'nid' => $this->nid,
            'phone_number' => $this->phone_number,
            'father_name' => $this->father_name,
            'mother_name' => $this->mother_name,
            'birth_date' => $this->birth_date,
            'birth_location' => $this->birth_location,
            'vehicle' => VehicleResource::make($this->whenLoaded('vehicle')),
            'reservation' => ReservationResource::make($this->whenLoaded('reservation')),
            'files' => $files,
        ];
    }
}
