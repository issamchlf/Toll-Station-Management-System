<?php

namespace App\Models;

use App\Models\Station;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['license_plate', 'brand', 'model', 'axles', 'total_fee_paid'];

    public function stations()
    {
        return $this->belongsToMany(Station::class, 'station_vehicle')
                    ->withPivot('fee', 'description')
                    ->withTimestamps();
    }
    
    public function calculateFee()
    {
        if ($this->vehicle_type === 'car') {
            return 100;
        } elseif ($this->vehicle_type === 'motorcycle') {
            return 50;
        } elseif ($this->vehicle_type === 'truck') {
            return 50 * $this->axles;
        }
        return 0;
    }
}
