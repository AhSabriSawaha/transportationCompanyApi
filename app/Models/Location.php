<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Location extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'takeoff', 'destination', 'category_id'
    ];
    protected $casts = [
        'takoff' => 'string',
        'destination' => 'string',
        'category_id' => 'integer',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function trips() {
        return $this->hasMany(Trip::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }
}
