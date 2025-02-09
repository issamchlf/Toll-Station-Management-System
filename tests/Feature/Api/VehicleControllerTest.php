<?php


namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Vehicle;
use App\Models\Station;

class VehicleControllerTest extends TestCase
{
    use RefreshDatabase;


    public function test_CheckIfReceiveAllEntryOfVehicleInJsonFile()
    {
        $vehicle = Vehicle::factory(1)->create();
        $response = $this->get(route('vehicleIndex'));

        $response->assertStatus(200)
            ->assertJsonCount(1);

    }

    public function test_CheckIfCanCreateEntryInVehicleWithJson()
    {

        $response = $this->postJson(route('vehicle.store'), [
            'license_plate' => 'ABC-123',
            'brand' => 'Toyota',
            'vehicle_type' => 'car',
            'axles' => 2,
            'total_fee_paid' => 0
        ]);

    $response->assertStatus(201);
    $response = $this->get(route('vehicleIndex'));
    $response->assertStatus(200)
    ->assertJsonCount(1); 
    }

    public function test_CheckIfCanUpdateEntryInVehicleWithJson()
    {
        $vehicle = Vehicle::factory(1)->create();
        $response = $this->putJson(route('vehicle.update', $vehicle[0]->id), [
            'license_plate' => 'XYZ-789',
            'brand' => 'Honda',
            'vehicle_type' => 'motorcycle',
            'axles' => 2,
            'total_fee_paid' => 50
        ]);

        $response->assertStatus(200);
        $response = $this->get(route('vehicleIndex'));
        $response->assertStatus(200)
        ->assertJsonCount(1); 
    }

    public function test_CheckIfCanDeleteEntryInVehicleWithJson()
    {
        $vehicle = Vehicle::factory(1)->create();
        $response = $this->delete(route('vehicle.destroy', $vehicle[0]->id));
        $response->assertStatus(200);
        $response = $this->get(route('vehicleIndex'));
        $response->assertStatus(200)
        ->assertJsonCount(0); 
    }

    public function test_CheckIfCanGetVehicleByStationWithJson()
    {
        $station = Station::factory()->create(); 
        $vehicles = Vehicle::factory(3)->create(); 
    
        $station->vehicles()->attach(
            $vehicles->mapWithKeys(fn($v) => [
                $v->id => [
                    'fee' => $v->calculateFee(),
                    'description' => "Toll charged from vehicle {$v->license_plate}"
                ]
            ])
        );
    
        $response = $this->get(route('getVehiclesByStation', $station->id));
        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }
    
    

    public function test_CheckIfCanGetTotalCollectedFeeWithJson()
    {
        $station = Station::factory()->create(['total_collected_fee' => 150]);
        $response = $this->get(route('getTotalCollected', $station->id));
        $response->assertStatus(200)
                 ->assertJson([
                     'station' => $station->name,
                     'total_collected_fee' => 150
                 ]);
    }

    public function test_CheckIfCanAssignRandomVehiclesToStationsWithJson()
    {
        Station::factory()->count(3)->create();
        Vehicle::factory()->count(10)->create();
    
        $response = $this->post(route('assignRandomVehiclesToStations'));
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'message',
                     'total_collected_fees'
                 ]);
    }

}

