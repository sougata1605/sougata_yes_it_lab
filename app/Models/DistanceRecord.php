<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistanceRecord extends Model
{
    protected $fillable = [
'lat1', 'lng1', 'lat2', 'lng2', 'distance_km'
];
}
