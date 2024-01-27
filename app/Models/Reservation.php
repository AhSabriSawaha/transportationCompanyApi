<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['total_price'];

    protected $casts = [
        'is_paid' => 'boolean',
        'ticket_number' => 'integer',
        'total_price' => 'integer',
        'trip_id' => 'integer',
    ];

    public function seats() {
        return $this->hasMany(Seat::class);
    }
    public function trip() {
        return $this->belongsTo(Trip::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->trip->price * $this->ticket_number;
    }
}
