<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Station;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_ifCanGetIndex()
    {
        $response = $this->get(route('stations'));
        $response->assertStatus(200);
        $response->assertViewIs('stations');
        $response->assertViewHas('stations');
    }
    public function test_it_displays_a_station_with_its_vehicles()
    {
        $station = Station::factory()->create();
        $vehicles = Vehicle::factory(3)->create();
    
        $station->vehicles()->attach(
            $vehicles->mapWithKeys(function ($vehicle) {
                return [$vehicle->id => ['fee' => rand(5, 50), 'description' => 'Test fee']];
            })
        );
    
        $response = $this->get(route('stations.show', $station->id));
    
        $response->assertStatus(200)
                 ->assertViewIs('stations.show')
                 ->assertViewHas('station', function ($viewStation) use ($station) {
                     return $viewStation->id === $station->id;
                 });
    
        foreach ($vehicles as $vehicle) {
            $response->assertSee($vehicle->license_plate);
        }
    }
    
}


