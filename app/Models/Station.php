<?php

namespace App\Models;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['name', 'city', 'total_collected_fee'];

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'station_vehicle')
                    ->withPivot('fee', 'description')
                    ->withTimestamps();
    }
}
