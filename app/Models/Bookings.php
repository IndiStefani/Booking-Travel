<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'schedule_id',
        'passenger_name',
        'phone_number',
        'pickup_address',
        'dropoff_address',
        'seat_number',
        'payment_status',
        'proof_of_payment',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function schedule()
    {
        return $this->belongsTo(Schedules::class, 'schedule_id');
    }
}
