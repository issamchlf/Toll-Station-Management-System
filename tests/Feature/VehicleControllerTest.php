<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Vehicle;
use App\Models\Station;

class VehicleControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_vehicles()
    {
        Vehicle::factory()->count(3)->create();

        $response = $this->getJson('/api/vehicles');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_a_vehicle()
    {
        $payload = [
            'license_plate' => 'ABC-123',
            'brand' => 'Toyota',
            'vehicle_type' => 'car',
            'axles' => 2,
            'total_fee_paid' => 0
        ];

        $response = $this->postJson('/api/vehicles', $payload);

        $response->assertStatus(201)
            ->assertJson($payload);
    }

    /** @test */
    public function it_validates_vehicle_creation()
    {
        $response = $this->postJson('/api/vehicles', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'license_plate', 
                'brand', 
                'vehicle_type', 
                'axles', 
                'total_fee_paid'
            ]);
    }

    /** @test */
    public function it_can_show_a_vehicle()
    {
        $vehicle = Vehicle::factory()->create();

        $response = $this->getJson("/api/vehicles/{$vehicle->id}");

        $response->assertStatus(200)
            ->assertJson($vehicle->toArray());
    }

    /** @test */
    public function it_returns_404_for_nonexistent_vehicle()
    {
        $response = $this->getJson("/api/vehicles/999");

        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_update_a_vehicle()
    {
        $vehicle = Vehicle::factory()->create();
        $updateData = [
            'license_plate' => 'XYZ-789',
            'brand' => 'Honda',
            'vehicle_type' => 'motorcycle',
            'axles' => 2,
            'total_fee_paid' => 50
        ];

        $response = $this->putJson("/api/vehicles/{$vehicle->id}", $updateData);

        $response->assertStatus(200)
            ->assertJson($updateData);
    }

    /** @test */
    public function it_can_delete_a_vehicle()
    {
        $vehicle = Vehicle::factory()->create();

        $response = $this->deleteJson("/api/vehicles/{$vehicle->id}");

        $response->assertStatus(200)
            ->assertJson(['message' => 'Vehicle deleted']);

        $this->assertDatabaseMissing('vehicles', ['id' => $vehicle->id]);
    }

    /** @test */
    public function it_can_process_toll_payment()
    {
        $vehicle = Vehicle::factory()->create(['total_fee_paid' => 0]);
        $station = Station::factory()->create(['total_collected_fee' => 0]);

        $response = $this->postJson("/api/vehicles/{$vehicle->id}/pass-station/{$station->id}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'total_collected'
            ]);

        $this->assertDatabaseHas('station_vehicle', [
            'vehicle_id' => $vehicle->id,
            'station_id' => $station->id
        ]);
    }

    /** @test */
    public function it_can_get_vehicles_by_station()
    {
        $station = Station::factory()->create();
        $vehicles = Vehicle::factory()->count(3)->create();
        $station->vehicles()->attach($vehicles);

        $response = $this->getJson("/api/stations/{$station->id}/vehicles");

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_get_total_collected_fees()
    {
        $station = Station::factory()->create(['total_collected_fee' => 150]);

        $response = $this->getJson("/api/stations/{$station->id}/total-collected");

        $response->assertStatus(200)
            ->assertJson([
                'station' => $station->name,
                'total_collected_fee' => 150
            ]);
    }

    /** @test */
    public function it_can_assign_random_vehicles_to_stations()
    {
        Station::factory()->count(3)->create();
        Vehicle::factory()->count(10)->create();

        $response = $this->postJson("/api/vehicles/assign-random");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'total_collected_fees'
            ]);

        $this->assertTrue(Station::sum('total_collected_fee') > 0);
    }
}