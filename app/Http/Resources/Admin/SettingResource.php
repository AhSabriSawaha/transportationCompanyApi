<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'about_us' => $this->about_us,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'website' => $this->website,
            'address' => $this->address,
            'work_time' => $this->work_time,
        ];
    }
}
