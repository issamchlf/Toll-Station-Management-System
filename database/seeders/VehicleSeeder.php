<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            ['license_plate' => 'ABC-1234', 'brand' => 'Toyota', 'vehicle_type' => 'car', 'axles' => 2, 'total_fee_paid' => 50.00],
            ['license_plate' => 'XYZ-5678', 'brand' => 'Honda', 'vehicle_type' => 'motorcycle', 'axles' => 2, 'total_fee_paid' => 30.00],
            ['license_plate' => 'JKL-9101', 'brand' => 'Ford', 'vehicle_type' => 'truck', 'axles' => 6, 'total_fee_paid' => 120.00],
            ['license_plate' => 'MNO-1122', 'brand' => 'Chevrolet', 'vehicle_type' => 'car', 'axles' => 2, 'total_fee_paid' => 60.00],
            ['license_plate' => 'PQR-3344', 'brand' => 'Tesla', 'vehicle_type' => 'car', 'axles' => 2, 'total_fee_paid' => 70.00],
            ['license_plate' => 'STU-5566', 'brand' => 'BMW', 'vehicle_type' => 'motorcycle', 'axles' => 2, 'total_fee_paid' => 40.00],
            ['license_plate' => 'VWX-7788', 'brand' => 'Mercedes', 'vehicle_type' => 'car', 'axles' => 2, 'total_fee_paid' => 80.00],
            ['license_plate' => 'YZA-9900', 'brand' => 'Volkswagen', 'vehicle_type' => 'truck', 'axles' => 5, 'total_fee_paid' => 130.00],
            ['license_plate' => 'BCD-1112', 'brand' => 'Audi', 'vehicle_type' => 'car', 'axles' => 2, 'total_fee_paid' => 90.00],
            ['license_plate' => 'EFG-1314', 'brand' => 'Hyundai', 'vehicle_type' => 'car', 'axles' => 2, 'total_fee_paid' => 50.00],
            ['license_plate' => 'HIJ-1516', 'brand' => 'Nissan', 'vehicle_type' => 'truck', 'axles' => 4, 'total_fee_paid' => 140.00],
            ['license_plate' => 'KLM-1718', 'brand' => 'Mazda', 'vehicle_type' => 'motorcycle', 'axles' => 2, 'total_fee_paid' => 45.00],
            ['license_plate' => 'NOP-1920', 'brand' => 'Subaru', 'vehicle_type' => 'car', 'axles' => 2, 'total_fee_paid' => 65.00],
            ['license_plate' => 'QRS-2122', 'brand' => 'Jeep', 'vehicle_type' => 'car', 'axles' => 2, 'total_fee_paid' => 85.00],
            ['license_plate' => 'TUV-2324', 'brand' => 'Lexus', 'vehicle_type' => 'car', 'axles' => 2, 'total_fee_paid' => 95.00],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
