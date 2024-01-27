<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $files = [];
        // dd($this->getMedia('*'));
        foreach($this->getMedia('*') as $media) {
            $files[]= $media['original_url'];
        }
        return [
            'id' => $this->id,
            'takeoff' => $this->takeoff,
            'destination' => $this->destination,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'files' => $files
        ];
    }
}
