<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelRoutes extends Model
{
    use HasFactory;

    protected $table = 'travel_routes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'from_location',
        'to_location',
        'slug',
        'distance',
        'estimated_time',
    ];
}
