<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    use HasFactory;

    protected $table = 'drivers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'phone_number',
        'license_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedules::class);
    }
}
