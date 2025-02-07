<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    use RefreshDatabase;
    public function run()
    {
        $this->call(StationSeeder::class);
        $this->call(VehicleSeeder::class);
    }
    
}
