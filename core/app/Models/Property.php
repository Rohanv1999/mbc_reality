<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $casts = [
        'social_media' => 'object'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function propertyInfo()
    {
        return $this->hasOne(PropertyInfo::class, 'property_id');
    }

   
}
