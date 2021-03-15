<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Transport;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Seeds the Employee table
     *
     * @return void
     */
    public function run()
    {
        $carId = Transport::where('name', 'Car')->first()->id;
        $busId = Transport::where('name', 'Bus')->first()->id;
        $trainId = Transport::where('name', 'Train')->first()->id;
        $bikeId = Transport::where('name', 'Bike')->first()->id;

        $employees = [
            ['name' => 'Paul', 'distance_from_work' => 60, 'workdays_per_week' => 5, 'transport_id' => $carId],
            ['name' => 'Martin', 'distance_from_work' => 8, 'workdays_per_week' => 4 , 'transport_id' => $busId],
            ['name' => 'Jeroen', 'distance_from_work' => 9, 'workdays_per_week' => 5 , 'transport_id' => $bikeId] ,
            ['name' => 'Tineke', 'distance_from_work' => 4, 'workdays_per_week' => 3, 'transport_id' => $bikeId],
            ['name' => 'Arnout', 'distance_from_work' => 23, 'workdays_per_week' => 5 , 'transport_id' => $trainId],
            ['name' => 'Mathijs', 'distance_from_work' => 11, 'workdays_per_week' => 4.5 , 'transport_id' => $bikeId],
            ['name' => 'Rens', 'distance_from_work' => 12, 'workdays_per_week' => 5 , 'transport_id' => $carId]
        ];

        foreach ($employees as $employee) {
            Employee::factory(1)->create($employee);
        }
    }
}
