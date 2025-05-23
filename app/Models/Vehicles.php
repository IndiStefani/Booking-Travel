<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'plate_number',
        'type',
        'capacity',
        'photo',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedules::class);
    }
}
