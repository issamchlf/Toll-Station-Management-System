<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Station;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class vehicleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_ifCanGetIndex()
    {
        $response = $this->get(route('vehicles'));
        $response->assertStatus(200);
        $response->assertViewIs('vehicles');
        $response->assertViewHas('vehicles');
    }
    

}
