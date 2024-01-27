<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'about_us', 'email', 'phone_number', 'address', 'facebook', 'website', 'work_time'
    ];

    protected $casts = [
        'about_us' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'address' => 'string',
        'facebook' => 'string',
        'website' => 'string',
        'work_time' => 'string'
    ];
}
