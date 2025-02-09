<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Station;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_CheckIfReceiveAllEntryOfVehicleInJsonFile()
    {
        $station = Station::factory(1)->create();
        $response = $this->get(route('station.index'));

        $response->assertStatus(200)
            ->assertJsonCount(1);
    }
    public function test_CheckIfCanCreateEntryInVehicleWithJson()
    {
        $response = $this->postJson(route('station.store'), [
            'name' => 'Station 1',
            'city' => 'city 1',
            'total_collected_fee' => 0
        ]);

        $response->assertStatus(201);
        $response = $this->get(route('station.index'));
        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_CheckIfCanUpdateEntryInVehicleWithJson()
    {
        $station = Station::factory(1)->create();
        $response = $this->putJson(route('station.update', $station[0]->id), [
            'name' => 'Station 2',
            'city' => 'City 2',
            'total_collected_fee' => 50
        ]);

        $response->assertStatus(200);
        $response = $this->get(route('station.index'));
        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_CheckIfCanDeleteEntryInVehicleWithJson()
    {
        $station = Station::factory(1)->create();
        $response = $this->delete(route('station.destroy', $station[0]->id));

        $response->assertStatus(200);
        $response = $this->get(route('station.index'));
        $response->assertStatus(200)
            ->assertJsonCount(0);
    }

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
