<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function trips() {
        return $this->hasMany(Trip::class);
    }

    public function seats() {
        return $this->hasMany(Seat::class);
    }

    // public function getFullSeatNumberAttribute() {
    //     return $this->last_row +
    //          ($this->rows_num -1) * $this->right_seat +
    //          ($this->rows_num -1) * $this->left_seat;
    // }
    protected $casts = [
        'rows_num' => 'integer',
        'left_seat' => 'integer',
        'right_seat' => 'integer',
        'last_row' => 'integer',
        'full_seat_number' => 'integer',
        'color' => 'string',
    ];

}
