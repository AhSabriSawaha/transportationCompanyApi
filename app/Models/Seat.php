<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Seat extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded  = [];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'father_name' => 'string',
        'mother_name' => 'string',
        'phone_number' => 'string',
        'birth_location' => 'string',
        'nid' => 'string',
        'reservation_id' => 'integer',
        'vehicle_id' => 'integer',
        'is_company' => 'boolean',
    ];

    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }
}
