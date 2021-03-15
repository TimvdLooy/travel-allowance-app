<?php

namespace Database\Seeders;

use App\Models\Transport;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    /**
     * Seeds the Transport table.
     *
     * @return void
     */
    public function run()
    {
        $transports = [
            ['name' => 'Car', 'compensation_per_km' => 0.10],
            ['name' => 'Bus', 'compensation_per_km' => 0.25],
            ['name' => 'Train', 'compensation_per_km' => 0.25],
            ['name' => 'Bike', 'compensation_per_km' => 0.50]
        ];

        foreach ($transports as $transport) {
            Transport::factory(1)->create($transport);
        }
    }
}
