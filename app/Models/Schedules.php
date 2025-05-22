<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'travel_route_id',
        'vehicle_id',
        'driver_id',
        'departure_time',
        'price',
        'available_seats',
    ];

    public function travelRoute()
    {
        return $this->belongsTo(TravelRoutes::class, 'travel_route_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class, 'vehicle_id');
    }
    public function driver()
    {
        return $this->belongsTo(Drivers::class, 'driver_id');
    }
}
