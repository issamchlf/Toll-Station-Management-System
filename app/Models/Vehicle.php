<?php

namespace App\Models;

use App\Models\Station;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['license_plate', 'brand', 'model', 'total_fee_paid'];

    public function Stations()
    {
        return $this->belongsToMany(Station::class);
    }
}
