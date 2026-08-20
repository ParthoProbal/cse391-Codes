<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarListing extends Model
{
    //
    protected $fillable = [
        'user_id',
        'brand_id',
        'city_id',
        'title',
        'model',
        'year',
        'price',
        'mileage',
        'fuel_type',
        'transmission',
        'description',
        'status',
        'is_featured',
        'image',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
