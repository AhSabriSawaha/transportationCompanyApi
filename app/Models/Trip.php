<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $with = ['media'];
    protected $guarded  = [];

    protected $casts = [
        'location_id' => 'boolean',
        'price' => 'integer',
        'duration' => 'integer',
        'description' => 'string',
        'price_description' => 'string',
        'start_time' => 'date'
    ];

    public function notification() {
        return $this->belongsTo(Notification::class);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }
}
