<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'booking_id',
        'amount',
        'payment_method',
        'payment_date',
        'status',
    ];
    public function booking()
    {
        return $this->belongsTo(Bookings::class, 'booking_id');
    }
}
