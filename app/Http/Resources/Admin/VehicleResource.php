<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'color' => $this->color,
            'full_seat_number' => $this->full_seat_number,
            'last_row' => $this->last_row,
            'rows_num' => $this->rows_num,
            'left_seat' => $this->left_seat,
            'right_seat' => $this->right_seat,
        ];
    }
}
