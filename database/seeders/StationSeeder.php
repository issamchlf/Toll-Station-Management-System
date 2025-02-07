<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationSeeder extends Seeder
{
    use RefreshDatabase;
    public function run()
    {
        DB::table('stations')->insert([
            [
                'name' => 'Grand Central Station',
                'city' => 'New York',
                'total_collected_fee' => 5000.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Union Station',
                'city' => 'Los Angeles',
                'total_collected_fee' => 3200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'King’s Cross Station',
                'city' => 'London',
                'total_collected_fee' => 4500.25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gare du Nord',
                'city' => 'Paris',
                'total_collected_fee' => 6000.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tokyo Station',
                'city' => 'Tokyo',
                'total_collected_fee' => 8000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Central Station',
                'city' => 'Sydney',
                'total_collected_fee' => 4000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
